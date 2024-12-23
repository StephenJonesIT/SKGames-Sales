@extends('admin.layouts.app')

@section('content')
    
   <!-- Content Header (Page header) -->
   <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Products</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Product</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div>
  </div>
  <!-- /.content-header -->

  <section class="content">
    <div class="container-fluid ">

      <div class="row justify-content-center mt-4">
        <div class="col-md-6 d-flex justify-content-end">
          <a href="{{route('admin.products.index')}}" class="btn btn-danger">Back</a>
        </div>
      </div>

      <div class="row justify-content-center">
        <!-- left column -->
        <div class="col-md-6 mt-4">
          <!-- general form elements -->
          <div class="card card-dark">
            <div class="card-header text-center">
              <h3 class="card-title w-100">Create Product</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form enctype="multipart/form-data" action="{{ route('admin.products.store')}}" method="POST">
                @csrf
              <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">ID Account</label>
                    <input value="{{ old('name')}}" type="text" class="form-control @error('name') is-invalid @enderror" id="exampleInputEmail1" name="name" placeholder="ID Account">
                    @error('name')
                        <p class="invalid-feedback">{{$message}}</p>
                    @enderror
                  </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Skin</label>
                    <input value="{{ old('skin')}}" type="text" class="form-control @error('skin') is-invalid @enderror" id="exampleInputEmail1" name="skin" placeholder="Skin">
                    @error('skin')
                    <p class="invalid-feedback">{{$message}}</p>
                    @enderror
                  </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Hero</label>
                    <input value="{{ old('hero')}}" type="text" class="form-control @error('hero') is-invalid @enderror" id="exampleInputEmail1" name="hero" placeholder="Hero">
                    @error('hero')
                    <p class="invalid-feedback">{{$message}}</p>
                    @enderror
                  </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Price</label>
                    <input value="{{ old('price')}}" type="text" class="form-control  @error('price') is-invalid @enderror" id="exampleInputEmail1" name="price" placeholder="Price">
                    @error('price')
                    <p class="invalid-feedback">{{$message}}</p>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Description</label>
                    <textarea value="{{ old('description')}}"  cols="30" rows="5" class="form-control" name="description"></textarea>
                  </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Username</label>
                  <input value="{{ old('username')}}" type="text" class="form-control @error('username') is-invalid @enderror" id="exampleInputEmail1" name="username"  placeholder="Username">
                  @error('username')
                  <p class="invalid-feedback">{{$message}}</p>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input value="{{ old('password')}}" type="text" class="form-control @error('password') is-invalid @enderror" id="exampleInputPassword1" name="password" placeholder="Password">
                  @error('password')
                  <p class="invalid-feedback">{{$message}}</p>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">File Image</label>
                  <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input  @error('image') is-invalid @enderror" name="image" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                    </div>
                </div>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" class="btn btn-primary w-100">SAVE</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
@endsection