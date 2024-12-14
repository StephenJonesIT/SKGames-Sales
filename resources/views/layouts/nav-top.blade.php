    <nav class="container-fluid navbar navbar-expand-md navbar-light bg-light fixed-top mb-4">
        <a class="navbar-brand" href="#"><img src="/uploads/logo1.png" alt="Logo" width="70px"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('index')}}">Trang chủ<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Sản phẩm</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Liên hệ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login.page') }}">SPIN</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login.page') }}">Nạp thẻ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-danger text-white" href="{{ route('login.page') }}">Đăng nhập</a>
                </li>
            </ul>
        </div>
    </nav>