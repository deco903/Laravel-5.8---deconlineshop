@extends('layouts.app')

@section('content')

<div class="container">
   <div class="row">
       <div class="col-md-12">
        <a href="{{url('home')}}" class="btn btn-primary"><i class="fa fa-arrow-left"></i>Kembali</a>
       </div>
       <!--breadcumb-->
       <div class="col-md-12 mt-2">
           <nav aria-label="breadcrumb">
            @if(session('succes'))
              <div class="alert alert-success" role="alert">
               {{session('succes')}}
              </div>
            @endif
         <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('home')}}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Check out</li>
         </ol>
        </nav>
       </div>
       <!--end of breadcumb-->
       <div class="col-md-12">
           <div class="card">
              <div class="card-body">
              <h3><i class="fa fa-shopping-cart"></i>Check out</h3>
              @if(!empty($pesanan))
              <p align="right">Tanggal Pesan : {{$pesanan->tanggal}}</p>
               <table class="table table-striped">
                <thead>
                    <tr>
                     <th>No</th>
                     <th>Gambar</th>
                     <th>Nama barang</th>
                     <th>Jumlah</th>
                     <th>Harga</th>
                     <th>Total Harga</th>
                     <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pesanan_details as $pesdetail)
                    <tr>
                    <td>{{$loop->iteration}}</td> 
                    <td>
                    <img src="{{url('upload')}}/{{$pesdetail->barang->gambar}}" width="100" height="100" alt="Card image cap">
                    </td>
                    <td>{{$pesdetail->barang->nama_barang}}</td>
                    <td>{{$pesdetail->jumlah}} Potong</td> 
                    <td align="left">Rp. {{number_format($pesdetail->barang->harga)}}</td>
                    <td align="left">Rp. {{number_format($pesdetail->jumlah_harga)}}</td>
                    <td>
                      <form action="{{url('check-out')}}/{{$pesdetail->id}}" method="post">
                        @csrf
                        {{method_field('DELETE')}}
                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash" 
                        onclick="return confirm('apakah anda yakin hapus?')"></i></button>
                      </form>
                    </td>
                    </tr>
                </tbody>
                @endforeach
                <tr>
                    <td colspan="5" align="right"><strong>Total Harga</strong></td>
                    <td><strong>Rp. {{number_format($pesanan->jumlah_harga)}}</strong></td>
                    <td>
                        <a href="{{url('konfirmasi-check-out')}}" class="btn btn-success" 
                         onclick="return confirm('apakah anda yakin check out?')"><i class="fa fa-shopping-cart"></i>Check out</a>
                    </td>
                </tr>
               </table>
               @endif
             </div>
         </div>
       </div>
   </div>
</div>
@endsection
