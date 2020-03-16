<?php

namespace App\Http\Controllers;

use App\Barang;
use App\Pesanan;
use App\PesananDetail;
use Auth;//for user login
use App\user;
use Carbon\Carbon;//for real time user order item
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $pesanan = pesanan::where('user_id', Auth::user()->id)->where('status','!=',0)->get();

        return view('history.index', compact('pesanan'));
    }

    public function detail($id)
    {
        $pesanan = Pesanan::where('id', $id)->first();
        
        $pesanan_details = PesananDetail::where('pesanan_id', $pesanan->id)->get();

        return view('history.detail', compact('pesanan','pesanan_details'));
    }
}
