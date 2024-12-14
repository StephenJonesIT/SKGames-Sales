@extends('layouts.app')

@section('content')
@if (Auth::check())
    @include('layouts.nav-top-login')    
@else
    @include('layouts.nav-top')
@endif
    <!-- Chi tiết sản phẩm -->
<div class="container d-flex justify-content-center align-items-center" style="padding-top: 100px;">
        <div class="col-lg-8 col-md-10">
            <div class="card">
                <div class="row no-gutters">
                    <div class="col-md-6">
                        @if ($product->image != "")
                        <img class="card-img" src="{{ asset('/uploads/products/' . $product->image) }}" alt="">
                        @endif
                    </div>
                    <div class="col-md-6 d-flex flex-column">
                        <div class="card-body">
                            <h5 class="card-text">ID: <b> {{ $product->name }}</b></h5>
                                <p class="card-text">Tướng: {{ $product->hero }} - Trang phục: {{ $product->skin }}</p>
                                <p class="card-text text-danger"><b>Giá: {{ number_format($product->price, 0, ',', '.') }} VND</b></p>
                                <form action="{{route('momo')}}" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-primary w-100">Xác nhận mua hàng</button>
                                </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('layouts.description')
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

@include('layouts.footer')
@endsection