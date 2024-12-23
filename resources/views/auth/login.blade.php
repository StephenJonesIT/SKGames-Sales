@extends('layouts.app')

@section('content')
@include('layouts.nav-top');

<div class="login-logo text-center mb-4 mt-6"> 
    <a href="../../index2.html"><b>Admin</b>LTE</a> 
</div>

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-4 mt-6">
            <div class="card mt-5">
                <div class="card-header">
                    <h4 class="">Đăng Nhập</h4>
                </div>
                @if ($errors->has('email'))
                <div class="alert alert-danger">
                    {{ $errors->first('email')}}
                </div>
                 @endif
                 
                <div class="card-body login-card-body">
                    <form action="{{route('login.post')}}" method="post">
                        @csrf
                       
                        <!-- Email input -->
                        <div class="mb-4">
                            <div class="input-group">
                                <input  type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Tên đăng nhập hoặc email">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-envelope"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Password input -->
                        <div class="mb-4">
                            <div class="input-group">
                                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"" placeholder="Mật khẩu">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>                
                            </div>
                        </div>
                
                        <!-- Remember Me & Sign In button -->
                        <div class="text-end  mb-3">
                            <a href="forgot-password.html" class="text-dark">Quên Mật Khẩu?</a>
                        </div>
                        <div class="row mb-4">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary w-100">Đăng Nhập</button>
                            </div>
                        </div>
                    </form>

                    <div class="text-center mb-4">
                        <p>CHƯA CÓ TÀI KHOẢN?</p>                        
                    </div>
                    <div class="row mb-4">
                        <div class="col-12">
                            <a href="{{route('register')}}" class="btn btn-success w-100 mb-2">
                                 Đăng Ký Ngay
                            </a>
                        </div>
                    </div>

                    <div class="text-center mb-4">
                        <p>HOẶC ĐĂNG NHẬP QUA</p>                        
                    </div>
                    <div class="row mb-4 justify-content-center">
                        <div class="col-4"> <a href="{{route('auth.redirection','facebook')}}" class="btn btn-facebook w-100 mb-2"> 
                            <i class="fab fa-facebook mr-2"></i> Facebook </a> 
                        </div>
                        <div class="col-4">
                            <a href="{{route('auth.redirection','google')}}" class="btn btn-danger w-100">
                                <i class="fab fa-google mr-2"></i> Google
                            </a>
                        </div>
                    </div>
                    <!-- Social Media Sign-in -->
                  
                    
                    <!-- Forgot Password & Register -->
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

