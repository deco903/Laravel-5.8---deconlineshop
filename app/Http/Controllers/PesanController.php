<?php

namespace App\Http\Controllers;
use App\Barang;
use App\Pesanan;
use App\PesananDetail;
use Auth;//for user login
use App\user;

use Carbon\Carbon;//for real time user order item
use Illuminate\Http\Request;

class PesanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id)
    {
        $resbrg = Barang::where('id',$id)->first(); 
        return view('pesan.index', compact('resbrg'));   
    }

    public function pesan(Request $request, $id)
    {
        $resbrg = Barang::where('id',$id)->first(); 
        $tanggal = Carbon::now();

        //validation stok
        if($request->jumlah_pesan > $resbrg->stok)
        {
            return redirect('pesan/'.$id);
        }
        
        //cek validate
        $cek_pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status',0)->first(); 

        //insert into tabel pesanan
        if(empty($cek_pesanan))
        {
            $pesanan = new Pesanan;
            $pesanan->user_id = Auth::user()->id;
            $pesanan->tanggal = $tanggal;
            $pesanan->status = 0;
            $pesanan->jumlah_harga = 0;
            $pesanan->kode = mt_rand(100,999);
            $pesanan->save();
        }

          //insert into pesanan detail
           $pesanan_baru = Pesanan::where('user_id', Auth::user()->id)->where('status',0)->first(); 

           //check pesanan detail
           $cek_pesanan_detail = pesanandetail::where('barang_id',$resbrg->id)->where('pesanan_id',
           $pesanan_baru->id)->first();
            if(empty($cek_pesanan_detail))
            {   
              $pesanan_detail = new pesanandetail;
              $pesanan_detail->barang_id = $resbrg->id;
              $pesanan_detail->pesanan_id =  $pesanan_baru->id;
              $pesanan_detail->jumlah = $request->jumlah_pesan;
              $pesanan_detail->jumlah_harga =  $resbrg->harga*$request->jumlah_pesan;
              $pesanan_detail->save();
            }else {
             $pesanan_detail = pesanandetail::where('barang_id',$resbrg->id)->where('pesanan_id',
             $pesanan_baru->id)->first();
             $pesanan_detail->jumlah = $pesanan_detail->jumlah+$request->jumlah_pesan;
             
             //price now
             $harga_pesanan_detail_baru = $resbrg->harga*$request->jumlah_pesan;
             $pesanan_detail->jumlah_harga = $pesanan_detail->jumlah_harga+$harga_pesanan_detail_baru;
             $pesanan_detail->update();
            }

            //total
            $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status',0)->first(); 
            $pesanan->jumlah_harga = $pesanan->jumlah_harga+$resbrg->harga*$request->jumlah_pesan;
            $pesanan->update();

          
           return redirect('check-out')->with('succes','barang berhasil dipesan');
        }

        public function check_out()
        {
            $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();
            if(!empty($pesanan))
            {
                $pesanan_details = PesananDetail::where('pesanan_id', $pesanan->id)->get();

            }
        
            return view('pesan.check_out', compact('pesanan', 'pesanan_details'));
        }

        public function delete($id)
        {
            $pesanan_detail = PesananDetail::where('id',$id)->first();
            $pesanan = Pesanan::where('id', $pesanan_detail->pesanan_id)->first();
            $pesanan->jumlah_harga = $pesanan->jumlah_harga-$pesanan_detail->jumlah_harga;
            $pesanan->update();

            $pesanan_detail->delete();
            return redirect('check-out')->with('succes','barang berhasil dihapus');

        }

        public function konfirmasi()
        {
            // $user = user::where('id',auth::user()->id)->first();
            // if(empty($user->alamat))
            // {
            //     return redirect('profile')->with('succes','identitas harap dilengkapi');
            // }

            // if(empty($user->nohp))
            // {
            //     return redirect('profile')->with('succes','identitas harap dilengkapi');
            // }

            $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();
            $pesanan_id =$pesanan->id;
            $pesanan->status = 1;
            $pesanan->update();
            
            //reduce total stok inventory
            $pesanan_details = PesananDetail::where('pesanan_id', $pesanan->id)->get();
            foreach($pesanan_details as $pesdetail){
                $barang = Barang::where('id', $pesdetail->barang_id)->first();
                $barang->stok = $barang->stok-$pesdetail->jumlah;
                $barang->update();
            }

            return redirect('history/'.$pesanan_id)
            ->with('succes','pesanan sukses check out, silahkan langsung lakukan pembayaran');
        }
}
