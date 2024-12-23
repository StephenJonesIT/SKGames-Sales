@extends('admin.layouts.app')

@section('content')
    
   <!-- Content Header (Page header) -->
   <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Users</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">User</li>
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
          <a href="{{route('admin.users.index')}}" class="btn btn-danger">Back</a>
        </div>
      </div>

      <div class="row justify-content-center">
        <!-- left column -->
        <div class="col-md-6 mt-4">
          <!-- general form elements -->
          <div class="card card-dark">
            <div class="card-header text-center">
              <h3 class="card-title w-100">Edit User</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form enctype="multipart/form-data" action="{{ route('admin.users.update',$user->id)}}" method="POST">
                @method('put')
                @csrf
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputPassword1">Full Name</label>
                  <input value="{{ old('name',$user->name)}}" type="text" class="form-control @error('name') is-invalid @enderror" id="exampleInputPassword1" name="name" placeholder="Full Name">
                  @error('name')
                  <p class="invalid-feedback">{{$message}}</p>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Username</label>
                  <input value="{{ old('email',$user->email)}}" type="email" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail1" name="email"  placeholder="Email">
                  @error('email')
                  <p class="invalid-feedback">{{$message}}</p>
                  @enderror
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