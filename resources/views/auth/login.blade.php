@extends('layouts.auth')

@section('main-content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-12 col-md-9">
            
            <div class="card o-hidden border-0 shadow-lg my-5" style="background-color: transparent;" >
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-6 d-lg-block d-flex justify-content-center" >
                            <img  class="d-flex justify-content-center ml-5" src="https://upload.wikimedia.org/wikipedia/commons/e/e2/Lambang_Kabupaten_Bogor.png"  alt="">
                        </div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">{{ __('LOGIN PUSAT DATA KOPERASI DAN UMKM KABUPATEN BOGOR') }}</h1>
                                </div>

                                @if ($errors->any())
                                    <div class="alert alert-danger border-left-danger" role="alert">
                                        <ul class="pl-4 my-2">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <form method="POST" action="{{ route('login') }}" class="user">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                    <div class="form-group">
                                        <input type="email" class="form-control form-control-user" name="email" placeholder="{{ __('Akun User') }}" value="{{ old('email') }}" required autofocus>
                                    </div>

                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" name="password" placeholder="{{ __('Kata Sandi') }}" required>
                                    </div>

                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox small">
                                            <input type="checkbox" class="custom-control-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                            <label class="custom-control-label" for="remember">{{ __('Ingat Saya') }}</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-user btn-block" style="background-image: linear-gradient(180deg,#0649f5 10%,#004d50 100%);">
                                            {{ __('Masuk') }}
                                        </button>
                                    </div>

                                    <hr>

                                    <div class="col-lg-12">
                                        <h6 class="d-flex justify-content-center">DINAS KOPERASI DAN UMKM </h6>
                                        <h6 class="d-flex justify-content-center">PEMERINTAH KABUPATEN BOGOR</h6>
                                    </div>
                                    
                               

                                {{-- @if (Route::has('password.request'))
                                    <div class="text-center">
                                        <a class="small" href="{{ route('password.request') }}">
                                            {{ __('Forgot Password?') }}
                                        </a>
                                    </div>
                                @endif

                                @if (Route::has('register'))
                                    <div class="text-center">
                                        <a class="small" href="{{ route('register') }}">{{ __('Create an Account!') }}</a>
                                    </div>
                                @endif --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
