@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if(session('succes'))
                         <div class="alert alert-success" role="alert">
                         {{session('succes')}}
                         </div>
                     @endif
            <img src="{{asset('images/logo.jpg')}}" style="width:200px;height:100px;"  class="rounded mx-auto d-block mb-5" alt="">
        </div>
        @foreach($barang as $resbrg)
        <div class="col-md-4">
        <div class="card">
        <img src="{{url('upload')}}/{{$resbrg->gambar}}" height="300" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title">{{$resbrg->nama_barang}}</h5>
            <p class="card-text">
                <strong>Harga : </strong> Rp. {{number_format($resbrg->harga)}}<br>
                <strong>Stock : </strong> {{($resbrg->stok)}}<br>
                <hr>
                <strong>Keterangan :</strong><br>
                {{($resbrg->keterangan)}} 
               
            </p>
            <a href="{{url('pesan')}}/{{$resbrg->id}}" class="btn btn-primary mb-3"><i class="fa fa-shopping-cart"></i> Pesan</a><br>
        </div>
        </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
