<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web bán nick game </title>
    <link rel="stylesheet" href="{{ asset('/trangchu/styles/trangchu.css')}}">
</head>

<body>
 <!-- HEADER -->
 <header>
    <img src="/trangchu/images/logo1.png" alt="" width=70px>
    <nav class ="navigation">
        <a href ="#">Trang chủ</a>
        <a href ="#">Sản phẩm</a>
        <a href ="#">Blog</a>
        <a href ="#">Liên hệ</a>
        <a href="napthe.html" target="_blank">Nạp thẻ</a>


<!---------------------------------------------------- FORM LOGIN------------------------------------------------------------------------------------>
        <button class ="btnlogin" onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Đăng nhập</button>
        <div id="id01" class="modallogin">

            <form class="modal-contentlogin animate" method="post">
              <div class="imgcontainer">
                <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Nhấn Thoát">&times;</span>
                
              </div>
          
              <div class="containerlogin">
                <label for="uname"><b>Tên đăng nhập</b></label>
                <input type="text" name="uname" required>
          
                <label for="psw"><b>Mật khẩu</b></label>
                <input type="password"  name="psw" required>
                  
                <button type="submit">Đăng nhập</button>
                <label>
                  <input type="checkbox" checked="checked" name="remember"> Ghi nhớ đăng nhập
                </label>
                <p>Quên mật khẩu ?<a href="#">Nhấn vào đây</a></p>
                <p>Bạn chưa có tài khoản?<a href="/trangchu/dangky.html" target="_blank">Tạo tài khoản</a></p>
              </div>
          
              <div class="container" style="background-color:#f1f1f1">
                <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Thoát</button>
                <span class="psw"><a href="#">Quên mật khẩu?</a></span>
              </div>
            </form>
          </div>
          


<!----------------------------------------------------END  FORM LOGIN------------------------------------------------------------------------------------>
    </nav>
</header>
<!----------------------------------------------------END  HEADER------------------------------------------------------------------------------------>

<!-------------------------------------------------------PRODUCT---------------------------------------------------------------------------------------->
        <div id="wp-products">
            <h2>SẢN PHẨM CỦA CHÚNG TÔI</h2>
            <ul id="list-products">
                <div class="item">
                    <img src="/trangchu/images/hinhb1.png" alt="">
                    <div class="name">ID 550992</div>
                    <div class="desc">Tướng: 192 Trang phục: 356 </div>
                    <div class="price">2.000.000 VNĐ</div>
                    <div class="box-mid">
                        <button>Mua ngay</button>
                    </div>
                </div>


                <div class="item">
                    <img src="/trangchu/images/hinhb2.png" alt="">
                    <div class="name">ID 550991</div>
                    <div class="desc">Tướng: 165 Trang phục: 980</div>
                    <div class="price">4.000.000 VNĐ</div>
                    <div class="box-mid">
                        <button>Mua ngay</button>
                    </div>
                </div>


                <div class="item">
                    <img src="/trangchu/images/hinhb3.png" alt="">
                    <div class="name">ID 550990</div>
                    <div class="desc">Tướng: 164 Trang phục: 178</div>
                    <div class="price">1.000.000 VNĐ</div>
                    <div class="box-mid">
                        <button>Mua ngay</button>
                    </div>
                </div>
                <div class="item">
                    <img src="/trangchu/images/hinhb4.png" alt="">
                    <div class="name">ID 550989</div>
                    <div class="desc">Tướng: 164 Trang phục: 283</div>
                    <div class="price">1.100.000 VNĐ</div>
                    <div class="box-mid">
                        <button>Mua ngay</button>
                    </div>
                </div>

                <div class="item">
                    <img src="/trangchu/images/hinhb5.png" alt="">
                    <div class="name">ID 550987</div>
                    <div class="desc">Tướng: 164 Trang phục: 187</div>
                    <div class="price">870.000 VNĐ</div>
                    <div class="box-mid">
                        <button>Mua ngay</button>
                    </div>
                </div>

                <div class="item">
                    <img src="/trangchu/images/hinhb6.png" alt="">
                    <div class="name">ID 550986</div>
                    <div class="desc">Tướng: 164 Trang phục: 163</div>
                    <div class="price">600.000 VNĐ</div>
                    <div class="box-mid">
                        <button>Mua ngay</button>
                    </div>
                </div>

                <div class="item">
                    <img src="/trangchu/images/hinhb7.png" alt="">
                    <div class="name">ID 550900</div>
                    <div class="desc">Tướng: 200 Trang phục: 100</div>
                    <div class="price">700.000 VNĐ</div>
                    <div class="box-mid">
                        <button>Mua ngay</button>
                    </div>
                </div>

                <div class="item">
                    <img src="/trangchu/images/hinhb8.png" alt="">
                    <div class="name">ID 550910</div>
                    <div class="desc">Tướng: 170 Trang phục: 140</div>
                    <div class="price">500.000 VNĐ</div>
                    <div class="box-mid">
                        <button>Mua ngay</button>
                    </div>
                </div>

                <div class="item">
                    <img src="/trangchu/images/hinhb9.png" alt="">
                    <div class="name">ID 550800</div>
                    <div class="desc">Tướng: 300 Trang phục: 290</div>
                    <div class="price">1.600.000 VNĐ</div>
                    <div class="box-mid">
                        <button>Mua ngay</button>
                    </div>
                </div>

                <div class="item">
                    <img src="/trangchu/images/hinhb10.png" alt="">
                    <div class="name">ID 550999</div>
                    <div class="desc">Tướng: 150 Trang phục: 90</div>
                    <div class="price">200.000 VNĐ</div>
                    <div class="box-mid">
                        <button>Mua ngay</button>
                    </div>
                </div>
            </ul>
            <div class="list-page">
                <div class="item">
                    <a href="">1</a>
                </div>
                <div class="item">
                    <a href="">2</a>
                </div>
                <div class="item">
                    <a href="">3</a>
                </div>
                <div class="item">
                    <a href="">4</a>
                </div>
            </div>
        </div>

        <div id="saleoff">
            <div class="box-left">
                <h1>
                    <span>GIẢM GIÁ LÊN ĐẾN</span>
                    <span>50%</span>
                </h1>
            </div>
            <div class="box-right" >
                <a >
                    <img src="images/sale.png">
                </a>
            </div>
        </div>

        <div id="comment">
            <h2>NHẬN XÉT CỦA KHÁCH HÀNG</h2>
            <div id="comment-body">
                <div class="prev">
                    <a href="#">
                        <img src="images/prev.png" alt="">
                    </a>
                </div>
                <ul id="list-comment">
                    <li class="item">
                        <div class="avatar">
                            <img src="images/avatar_1.png">

                        </div>
                        <div class="stars">
                            <span>
                                <img src="images/star.png" alt="">
                            </span>
                            <span>
                                <img src="images/star.png" alt="">
                            </span>
                            <span>
                                <img src="images/star.png" alt="">
                            </span>
                            <span>
                                <img src="images/star.png" alt="">
                            </span>
                            <span>
                                <img src="images/star.png" alt="">
                            </span>
                        </div>
                        <div class="name">Nguyễn Đình Vũ</div>

                        <div class="text">
                            <p>Tôi rất hài lòng với sản phẩm này. 
                                Nó hoạt động tốt hơn mong đợi của tôi và 
                                tôi rất thích sử dụng nó.</p>
                        </div>
                    </li>
                    <li class="item">
                        <div class="avatar">
                            <img src="images/avatar_1.png" alt="">

                        </div>
                        <div class="stars">
                            <span>
                                <img src="images/star.png" alt="">
                            </span>
                            <span>
                                <img src="images/star.png" alt="">
                            </span>
                            <span>
                                <img src="images/star.png" alt="">
                            </span>
                            <span>
                                <img src="images/star.png" alt="">
                            </span>
                            <span>
                                <img src="images/star.png" alt="">
                            </span>
                        </div>
                        <div class="name">Trần Ngọc Sơn</div>

                        <div class="text">
                            <p>Tôi rất vui mừng được chia sẻ trải nghiệm tuyệt vời của mình với Wed bán nick game. 
                                Tôi đã sử dụng Wed bán nick game trong vài tháng qua và tôi rất ấn tượng với chất lượng, 
                                hiệu quả và dịch vụ khách hàng của họ.</p>
                        </div>
                    </li>
                    <li class="item">
                        <div class="avatar">
                            <img src="images/avatar_1.png">

                        </div>
                        <div class="stars">
                            <span>
                                <img src="images/star.png" alt="">
                            </span>
                            <span>
                                <img src="images/star.png" alt="">
                            </span>
                            <span>
                                <img src="images/star.png" alt="">
                            </span>
                            <span>
                                <img src="images/star.png" alt="">
                            </span>
                            <span>
                                <img src="images/star.png" alt="">
                            </span>
                        </div>
                        <div class="name">Nguyễn Trần Vi</div>

                        <div class="text">
                            <p>Tôi rất vui mừng được chia sẻ trải nghiệm tuyệt vời của mình với Wed bán nick game. 
                                Tôi đã sử dụng Wed bán nick game trong vài tháng qua và tôi rất ấn tượng với chất lượng, 
                                hiệu quả và dịch vụ khách hàng của họ</p>
                        </div>
                    </li>
                </ul>
                <div class="next">
                    <a href="#">
                        <img src="images/next.png">
                    </a>
                </div>
            </div>
        </div>




        
        <div id="footer">
            <div class="box">
                <div class="logo">
                    <img src="images/logo1.png" alt="">
                </div>
                <p>Cung cấp sản phẩm với chất lượng an toàn cho quý khách</p>
            </div>
            <div class="box">
                <h3>Các chính sách của chúng tôi</h3>
                <ul class="quick-menu">
                    <div class="item">
                        <a href="">Thông tin tài khoản</a>
                        <br>
                        <a href="">Các loại tài khoản</a>
                        <br>
                        <a href="">Phương Thức Thanh Toán</a>
                        <br>
                        <a href="">Các loại dịch vụ</a>
                    </div>
                </ul>
                
            </div>
            <div class="box">
                <h3>LIÊN HỆ</h3>
                <ul class="quick-menu">
                    <div class="item">
                        <a href="">Hotline : 0830535364</a>
                        <br>
                        <a href="">mail : pnh9@gmail.com</a>
                    </div>
                </ul>
                <form action="">
                    <input type="text" placeholder="Địa chỉ email">
                    <button>Nhận tin</button>
                </form>
            </div>
        </div>
    </div>
    <script src="scripts/trangchu.js"></script>
</body>

</html>