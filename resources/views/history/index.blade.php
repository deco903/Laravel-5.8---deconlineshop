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
            <li class="breadcrumb-item active" aria-current="page">History</li>
         </ol>
        </nav>
       </div>
       <!--end of breadcumb-->
       <div class="col-md-12">
           <div class="card">
              <div class="card-body">
              <h3><i class="fa fa-history"></i>Check out</h3>
              <table class="table">
                  <thead>
                      <tr>
                          <th>No</th>
                          <th>Tanggal</th>
                          <th>Status</th>
                          <th>Jumlah harga</th>
                          <th>Aksi</th>
                      </tr>
                  </thead>
                  <tbody>
                     @foreach($pesanan as $pesan)
                      <tr>
                          <td>{{$loop->iteration}}</td>
                          <td>{{$pesan->tanggal}}</td>
                          <td>
                              @if($pesan->status == 1)
                              sudah pesan dan belum bayar
                              @else
                              sudah dibayar
                              @endif
                          </td>
                          <td>Rp. {{number_format($pesan->jumlah_harga+$pesan->kode)}}</td>
                          <td>
                              <a href="{{url('history')}}/{{$pesan->id}}" class="btn btn-primary">
                              <i class="fa fa-info"></i>detail</a>
                          </td>
                      </tr>
                      @endforeach
                  </tbody>
              </table>
             </div>
         </div>
       </div>
   </div>
</div>
@endsection
