@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
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
            <li class="breadcrumb-item active" aria-current="page">Profile</li>
         </ol>
        </nav>
       </div>
       <!--end of breadcumb-->
        <div class="col-md-12">

            <div class="card">
                <div class="card-body">
                    <h4><i class="fa fa-user"></i> My profile</h4>
                    <table class="table">
                        <tbody>
                            <tr>
                                <th>nama</th>
                                <th width="10">:</th>
                                <th>{{$user->name}}</th>
                            </tr>
                            <tr>
                                <th>email</th>
                                <th>:</th>
                                <th>{{$user->email}}</th>
                            </tr>
                            <tr>
                                <th>no HP</th>
                                <th>:</th>
                                <th>{{$user->nohp}}</th>
                            </tr>
                            <tr>
                                <th>alamat</th>
                                <th>:</th>
                                <th>{{$user->alamat}}</th>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-12 mt-2">
            <div class="card">
                <div class="card-body">
                    <h4><i class="fa fa-pencil-alt"></i>Edit Profile</h4>
                    <form method="POST" action="{{ url('profile') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" 
                                value="{{ $user->name }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-2 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                                 value="{{  $user->email }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- <div class="form-group row">
                            <label for="nohp" class="col-md-2 col-form-label text-md-right">no HP</label>

                            <div class="col-md-6">
                                <input id="nohp" type="text" class="form-control @error('nohp') is-invalid @enderror" name="nohp" 
                                value="{{ $user->nohp }}" required autocomplete="nohp" autofocus>

                                @error('nohp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="alamat" class="col-md-2 col-form-label text-md-right">Alamat</label>

                            <div class="col-md-6">
                                <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror"
                                required="" >{{$user->alamat}}</textarea>

                                @error('alamat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> -->

                        <div class="form-group row">
                            <label for="password" class="col-md-2 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-2 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-2">
                                <button type="submit" class="btn btn-primary">
                                    save
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
