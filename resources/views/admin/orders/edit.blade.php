@extends('admin.layouts.app')

@section('content')
    
   <!-- Content Header (Page header) -->
   <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Orders</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Order</li>
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
          <a href="{{route('admin.order.index')}}" class="btn btn-danger">Back</a>
        </div>
      </div>

      <div class="row justify-content-center">
        <!-- left column -->
        <div class="col-md-6 mt-4">
          <!-- general form elements -->
          <div class="card card-dark">
            <div class="card-header text-center">
              <h3 class="card-title w-100">Edit Status</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form enctype="multipart/form-data" action="{{ route('admin.order.update', $order->id) }}" method="POST">
              @method('put')
              @csrf
              <div class="card-body">
                  <div class="form-group">
  
                      <label for="orderStatus">Trạng thái đơn hàng</label>
                      <select class="form-control @error('status') is-invalid @enderror" id="orderStatus" name="status">
                          <option value="Hoàn Thành" {{ old('status', $order->status) == 'Hoàn Thành' ? 'selected' : '' }}>Hoàn Thành</option>
                          <option value="Hủy" {{ old('status', $order->status) == 'Hủy' ? 'selected' : '' }}>Hủy</option>
                      </select>
                      @error('status')
                      <p class="invalid-feedback">{{ $message }}</p>
                      @enderror
                  </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                  <button type="submit" class="btn btn-primary w-100">Lưu</button>
              </div>
          </form>
          
          </div>
        </div>
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
@endsection