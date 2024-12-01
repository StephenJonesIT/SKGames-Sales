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
            <li class="breadcrumb-item"><a href="{{route('admin.dashbroad')}}">Home</a></li>
            <li class="breadcrumb-item active">Product</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div>
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid ">
      <div class="row justify-content-center mt-4">
        <div class="col-md-10 d-flex justify-content-end">
          <a href="{{route('admin.products.create')}}" class="btn btn-primary">Create</a>
        </div>
      </div>

      <div class="row justify-content-center">
        @if (Session::has('success'))
        <div class="col-md-10 mt-4">
          <div class="alert alert-success">
            {{Session::get('success')}}
          </div>
        </div>
        @endif
        <!-- left column -->
        <div class="col-md-10 mt-4">
          <!-- general form elements -->
          <div class="card card-dark">

            <div class="card-header">
              <h3 class="card-title w-100">List Product</h3>
            </div>
            <div class="card-body">
              <table class="table">
                <tr>
                  <th>ID Account</th>
                  <th></th>
                  <th>Skin</th>
                  <th>Hero</th>
                  <th>Price</th>
                  <th>Username</th>
                  <th>Password</th>
                  <th>Created at</th>
                  <th>Action</th>
                </tr>
                @if ($products->isNotEmpty())
                @foreach ($products as $item)
                <tr>
                  <td>{{$item->name}}</td>
                  <td>
                    @if ($item->image != "")
                        <img width="40" src="{{asset('uploads/products/'.$item->image)}}" alt="">
                    @endif
                  </td>
                  <td>{{$item->skin}}</td>
                  <td>{{$item->hero}}</td>
                  <td>{{$item->price}}</td>
                  <td>{{$item->username}}</td>
                  <td>{{$item->password}}</td>
                  <td>{{\Carbon\Carbon::parse($item->created_at)->format('d M, Y')}}</td>
                  <td>
                    <a href="{{route('admin.products.edit',$item->id)}}" class="btn btn-warning">Edit</a>
                    <a href="#" onclick="deleteProduct({{$item->id}});" class="btn btn-danger">Delete</a>
                    <form id="delete-product-from-{{$item->id}}" action="{{route('admin.products.destroy',$item->id)}}" method="POST">
                      @csrf
                      @method('delete')
                    </form>
                  </td>
                </tr>
                @endforeach
                @endif
              </table>
            </div>
          </div>
        </div>
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->

@endsection