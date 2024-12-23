<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SKGAMING</title>
    <link rel="stylesheet" href="{{asset('/css/trangchu.css')}}">
     <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
   
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{asset('/css/admin/icheck-bootstrap.min.css')}}">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.1.0/dist/css/adminlte.min.css">
    <!-- Tải thư viện Font Awesome từ CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SZC6Bv1AtQvAz3CWYoSiQkxjaD1+xD5drXSdL5v/UYy/qTXGzh4NtxfijFhtPRwgu0Z8v5ZDlo5j9vOWzZD67w==" crossorigin="anonymous" referrerpolicy="no-referrer" />



</head>

<body>
    @yield('content')

    <script src="{{asset('/js/trangchu.js')}}"></script>
    <script src="{{asset('/js/carousel.js')}}"></script>
    <script src="{{asset('/js/admin/jquery.min.js')}}"></script>
    <!-- Bootstrap 4 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.1.0/dist/js/adminlte.min.js"></script>
        
</body>
</html>
