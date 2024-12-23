@extends('admin.layouts.app')

@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Orders</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.dashbroad')}}">Home</a></li>
            <li class="breadcrumb-item active">Orders</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div>
  </div>
    
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid ">
    
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
                  <h3 class="card-title w-100">List Order</h3>
                </div>
                <div class="card-body">
                  <table class="table">
                    <tr>
                      <th>ID Order</th>
                      <th>Full Name</th>
                      <th>Email</th>
                      <th>ID Product</th>
                      <th>Price</th>
                      <th>Status</th>
                      <th>Created at</th>
                      <th>Action</th>
                    </tr> 
                    @if ($orders->isNotEmpty())
                        @foreach ($orders as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->user_name}}</td>
                                <td>{{$item->user_email}}</td>
                                <td>{{$item->product_name}}</td>
                                <td>{{$item->total_price}}</td>
                                <td>{{$item->status}}</td>
                                <td>{{\Carbon\Carbon::parse($item->created_at)->format('Y-m-d')}}</td>
                                <td>
                                    @if ($item->status=="Chờ thanh toán")
                                    <a href="{{route('admin.order.edit',$item->id)}}" class="btn btn-primary">Edit</a>
                                    @endif    
                                </td>
                            </tr>
                        @endforeach
                    @endif
                  </table>   
                </div>
                <div class="d-flex justify-content-center"> {{ $orders->links() }} </div>
              </div>
            </div>
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>

@endsection