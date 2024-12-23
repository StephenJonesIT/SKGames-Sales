@extends('layouts.app')

@section('content')

@if (Auth::check())
    @include('layouts.nav-top-login')
@else
    @include('layouts.nav-top')
@endif

<div class="container mt-5">
    <h4 class="my-4">Lịch sử mua hàng</h4>
    <h2 class="my-4">Lịch sử mua hàng</h2>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Full Name</th>
                <th>Product ID</th>
                <th>Tổng giá</th>
                <th>Ngày tạo</th>
                <th>Trạng thái</th>
            </tr>
        </thead>
        <tbody>
            @if ($orders->isNotEmpty())
            @foreach ($orders as $orderHistory)
            <tr>
                <td>{{ $orderHistory->id }}</td>
                <td>{{ $orderHistory->user_name }}</td>
                <td>{{ $orderHistory->product_name }}</td>
                <td>{{ $orderHistory->total_price }}</td>
                <td>{{\Carbon\Carbon::parse($orderHistory->created_at)->format('Y-m-d')}}</td>
                <td>
                    @if ($orderHistory->status == "Chờ thanh toán")
                    <form action="{{ route('momo.repayment')}}" method="POST" class="w-100">
                        @method('post')
                        @csrf
                        <input type="hidden" name="id" value="{{$orderHistory->id}}" class="form-control">
                        <button type="submit" class="btn btn-danger w-100">{{$orderHistory->status}}</button>
                    </form>
                    @else
                        {{ $orderHistory->status }}
                    @endif                   
                </td>
            </tr>
            @endforeach
            @else 
            <tr> 
                <td colspan="6" class="text-center">Không có đơn hàng nào</td> 
            </tr> 
            @endif
        </tbody>
    </table>
</div>

<div class="d-flex justify-content-center mt-5">
    <h2 >SẢN PHẨM LIÊN QUAN</h2>
</div>

<div class="container text-center">
    <div class="row justify-content-center">
        @if ($products->isNotEmpty())
            @foreach ($products as $item)
            <div class="card col-lg-3 col-md-4 col-sm-6 mt-5 mb-4 mx-4 mx-md-4  mx-sm-2">
                <div class="item" data-id="{{$item->name}}" data-price="{{number_format($item->price, 0, ',', '.')}}" data-skin="tướng {{$item->hero}}">
                    @if ($item->image != "")
                    <img src="{{asset('uploads/products/'.$item->image)}}" alt="">
                    @endif
                    <div class="name">ID {{$item->name}}</div>
                    <div class="desc">Tướng: {{$item->hero}} - Trang phục: {{$item->skin}}</div>
                    <div class="price">{{number_format($item->price, 0, ',', '.')}}</div>
                    <div class="col mt-5">
                        <a href="{{route('product.detail',$item->id)}}" class="btn btn-success w-100">
                            Mua Ngay
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        @endif
    </div>
</div>
@endsection
