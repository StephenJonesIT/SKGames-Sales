@extends('layouts.app')

@section('content')
    @include('layouts.nav-top');

    <div class="container-fluid mt-5">
        <div class="row justify-content-center">
            <div class="col-md-4 mt-6">
                <div class="card mt-5">
                    <div class="card-header">
                        <h4 class="">Đăng Ký</h4>
                    </div>
                    <div class="card-body login-card-body">
                        <form enctype="multipart/form-data" action="{{ route('register.post') }}" method="post">
                            @csrf
                            <div class="mb-4">
                                <div class="input-group">
                                    <input value="{{ old('name') }}" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        placeholder="Full name">
                                  
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-user"></span>
                                        </div>
                                    </div>
                                    @error('name')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4">
                                <div class="input-group">
                                    <input value="{{ old('email') }}" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        placeholder="Email">

                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-envelope"></span>
                                        </div>
                                    </div>
                                    @error('email')
                                        <p class="invalid-feedback">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4">
                                <div class="input-group">
                                    <input value="{{ old('password') }}" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        placeholder="Password">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-lock"></span>
                                        </div>
                                    </div>
                                    @error('password')
                                        <p class="invalid-feedback">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4">
                                <div class="input-group">
                                    <input value="{{ old('password_confirmation') }}" type="password"
                                        name="password_confirmation"
                                        class="form-control @error('password_confirmation') is-invalid @enderror"
                                        placeholder="Retype password">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-lock"></span>
                                        </div>
                                    </div>
                                    @error('password_confirmation')
                                        <p class="invalid-feedback">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mt-5">
                                <div class="col-8">
                                    <div class="icheck-primary">
                                        <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                                        <label for="agreeTerms">
                                            Tôi đồng ý <a href="#">điều khoản</a>
                                        </label>
                                    </div>
                                </div>
                                <!-- /.col -->
                                <div class="col-4">
                                    <button type="submit" class="btn btn-primary btn-block">Đăng Ký</button>
                                </div>
                                <!-- /.col -->
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
