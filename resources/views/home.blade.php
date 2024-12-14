@extends('layouts.app')

@section('content')
    @include('layouts.nav-top-login')
    @include('layouts.banner')
    @include('layouts.filter')
    
    <div class="d-flex justify-content-center mt-5">
        <h2 >SẢN PHẨM NỔI BẬT</h2>
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
        <div class="d-flex justify-content-center mt-5"> {{ $products->links() }} </div>
    </div>
    @include('layouts.footer')
@endsection