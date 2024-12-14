@extends('admin.layouts.app')

@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Users</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.dashbroad')}}">Home</a></li>
            <li class="breadcrumb-item active">Users</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div>
  </div>
    
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid ">
          <div class="row justify-content-center mt-4">
            <div class="col-md-10 d-flex justify-content-end">
              <a href="{{route('admin.users.create')}}" class="btn btn-primary">Create</a>
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
                  <h3 class="card-title w-100">List User</h3>
                </div>
                <div class="card-body">
                  <table class="table">
                    <tr>
                      <th>ID</th>
                      <th>Full Name</th>
                      <th>Email</th>
                      <th>Created at</th>
                      <th>Action</th>
                    </tr>
                    @if ($users->isNotEmpty())
                        @foreach ($users as $item)
                            <tr>
                              <td>{{$item->id}}</td>
                              <td>{{$item->name}}</td>
                              <td>{{$item->email}}</td>
                              <td>{{\Carbon\Carbon::parse($item->created_at)->format('d M, Y')}}</td>
                              <td>
                                <a href="{{route('admin.users.edit',$item->id)}}" class="btn btn-warning">Edit</a>
                                <a href="#" onclick="deleteUser({{$item->id}});" class="btn btn-danger">Delete</a>
                                <form id="delete-user-from-{{$item->id}}" action="{{route('admin.users.destroy',$item->id)}}" method="POST">
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
@endsection