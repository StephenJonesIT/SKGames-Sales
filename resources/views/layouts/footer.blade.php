
<!-- Footer -->
<footer class="bg-danger text-white mt-5" style="">
    <div class="container py-4">
        <div class="row">
            <!-- Logo và mô tả -->
            <div class="col-md-4  justify-content-center">
                <div class="logo">
                    <img src="{{ asset('/uploads/logo1.png') }}" alt="Logo" class="img-fluid">
                </div>
                <p>Cung cấp sản phẩm với chất lượng an toàn</p>
            </div>
            <!-- Liên kết nhanh -->
            <div class="col-md-4">
                <h5>Liên kết nhanh</h5>
                <ul class="list-unstyled">
                    @if (Auth::check())
                    <li><a href="{{route('home')}}" class="text-white">Trang chủ</a></li>
                    @else
                    <li><a href="{{route('index')}}" class="text-white">Trang chủ</a></li>
                    @endif

                    @if (Auth::check())
                    <li><a href="#" class="text-white">Liên hệ</a></li>
                    @else
                    <li><a href="#" class="text-white">Liên hệ</a></li>
                    @endif

                    @if (Auth::check())
                    <li><a href="#" class="text-white">Blog</a></li>
                    @else
                    <li><a href="#" class="text-white">Blog</a></li>
                    @endif
                    
                    @if (Auth::check())
                    <li><a href="#" class="text-white">Nạp thẻ</a></li>
                    @else
                    <li><a href="#" class="text-white">Nạp thẻ</a></li>
                    @endif
                </ul>
            </div>
            <!-- Liên hệ -->
            <div class="col-md-4">
                <h5>Liên hệ</h5>
                <ul class="list-unstyled">
                    <li><i class="fa fa-map-marker"></i> 180 Cao Lỗ, phường 4, Quận 8</li>
                    <li><i class="fa fa-phone"></i> 037.603.3147</li>
                    <li><i class="fa fa-envelope"></i><a class="email" href="mailto:nk10052003@gmail.com">  nk10052003@gmail.com</a></li>
                </ul>
                <div class="">
                    <div class="scrolling-comments">
                        <div class="comments">
                            <p>acc tốt | acc rẻ | acc giá rẻ | chất lượng tuyệt vời | dịch vụ nhanh chóng</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center mt-4">
            <p class="mb-0">&copy; 2024 Bản quyền thuộc về SKGame</p>
        </div>
    </div>
</footer>
