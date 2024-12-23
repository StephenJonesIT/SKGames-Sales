@extends('layouts.app')

@section('content')
@if (Auth::check())
@include('layouts.nav-top-login')
@else
@include('layouts.nav-top')
@endif

@include('layouts.slide')
@include('layouts.filter')

@if ($filterApplied)

@if ($products->isEmpty()) 
<div class="alert alert-warning mt-5"> Không tìm thấy sản phẩm nào phù hợp với bộ lọc. </div> 
@endif

@else 
<div class="d-flex justify-content-center mt-5"> 
    <h2>SẢN PHẨM CAO CẤP</h2> 
</div> 
@endif
<div id="results" class="container text-center">
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
@if (!$filterApplied)
<div class="d-flex justify-content-center mt-5"> 
    <h2>SẢN PHẨM THÔNG THƯỜNG</h2> 
</div> 

<div class="container text-center">
    <div class="row justify-content-center">
        @if ($minprices->isNotEmpty())
            @foreach ($minprices as $item)
            <div class="card col-lg-3 col-md-33 col-sm-6 mt-5 mb-4 mx-4 mx-md-4  mx-sm-2">
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
            <div class="d-flex justify-content-center mt-5"> {{ $minprices->links() }} </div>
        @endif 
    </div>
</div>
@endif

@include('layouts.footer')
@endsection