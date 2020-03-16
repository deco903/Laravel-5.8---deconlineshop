@extends('layouts.app')

@section('content')

<div class="container">
   <div class="row">
       <div class="col-md-12">
        <a href="{{url('home')}}" class="btn btn-primary"><i class="fa fa-arrow-left"></i>Kembali</a>
       </div>
       <div class="col-md-12 mt-2">
       <nav aria-label="breadcrumb">
         <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('home')}}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{$resbrg->nama_barang}}</li>
         </ol>
        </nav>
       </div>
       <div class="col-md-12 mt-3">
           <div class="card">
               <div class="card-header">
               </div> 
               <div class="card-body">
                   <div class="row">
                      <div class="col-md-6">
                          <img src="{{url('upload')}}/{{$resbrg->gambar}}" class="rounded mx-auto d-block mb-5" 
                          width="400" alt="">  
                      </div>  
                      <div class="col-md-6 mt-4">
                           <h2>{{$resbrg->nama_barang}}</h2>
                           <table class="table">
                               <tbody>
                                   <tr>
                                       <td>harga</td>
                                       <td>:</td>
                                       <td>Rp. {{ number_format($resbrg->harga)}}</td>
                                   </tr>
                                   <tr>
                                       <td>stok</td>
                                       <td>:</td>
                                       <td>{{ number_format($resbrg->stok)}}</td>
                                   </tr>
                                   <tr>
                                       <td>keterangan</td>
                                       <td>:</td>
                                       <td>{{($resbrg->keterangan)}}</td>
                                   </tr>
                                   <tr>
                                       <td>Jumlah pesan</td>
                                       <td>:</td>
                                       <td>
                                            <form action="{{url('pesan')}}/{{$resbrg->id}}" method="post">
                                            @csrf
                                            <input type="text" name="jumlah_pesan" class="form-control" 
                                            required="">
                                            <button type="submit" class="btn btn-primary mt-2"><i class="fa fa-shopping-cart"></i> keranjang</button>
                                        </form>
                                        </td>
                                    </tr>
                               </tbody>
                           </table>
                      </div>
                   </div> 
               </div>
           </div>
       </div> 
   </div>
</div>
@endsection
