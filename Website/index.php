<html style="scroll-behavior: smooth">
    <?php $page_title="Index"; include ('includes/headtag.html')?>
    <style>
        .vmarquee {
            white-space: nowrap;
            overflow: hidden;
            box-sizing: border-box;
        }
        .vmarquee ul {
            display: inline-block;
            animation: vmarquee 30s linear infinite;
        }
        @keyframes vmarquee {
            0%   { transform: translate(0, 100%); }
            100% { transform: translate(0, -101%); }
        }
    </style>
    <body style="background-color: darkseagreen;">
        <?php include ('includes/header.php');?>
        <div class="col-8 float-left">
            <div class="col-12 m-4 float-left d-flex justify-content-center">
                    <div id="picSlide" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <a href="#php"><img src="includes/img/index1.jpg" width="1000px" height="500px" alt="1"/></a>
                        </div>
                        <div class="carousel-item">
                            <a href="#xampp"><img src="includes/img/index2.png" width="1000px" height="500px" alt="2"/></a>
                        </div>
                        <div class="carousel-item">
                            <a href="#mysql"><img src="includes/img/index3.jpg" width="1000px" height="500px" alt="3"/></a>
                        </div>					
                    </div>
                        <a class="carousel-control-prev col-1" href="#picSlide" data-slide="prev">
                            <i style="font-size: 300%" class="fa fa-caret-left text-primary" aria-hidden="true"></i>
                        </a>
                        <a class="carousel-control-next col-1" href="#picSlide" data-slide="next">
                            <i style="font-size: 300%" class="fa fa-caret-right text-primary" aria-hidden="true"></i>
                        </a>
                    <ul class="carousel-indicators">
                        <li data-target="#picSlide" data-slide-to="0" class="active bg-dark"></li>
                        <li data-target="#picSlide" data-slide-to="1" class="bg-dark"></li>
                        <li data-target="#picSlide" data-slide-to="2" class="bg-dark"></li>
                    </ul>
                </div>
            </div>
            <div id="php" class="col-12 float-left">
                <h2 class="text-uppercase" style="font-family: 'Tahoma'; color: darkblue">Giới thiệu PHP – PHP là gì?</h2>
                <ul>
                    <li><h3>PHP viết tắt của PHP Hypertext Preprocessor</h3></li>
                    <li><h3>Là ngôn ngữ server-side script</h3></li>
                    <li><h3>Cú pháp ngôn ngữ giống ngôn ngữ C & Perl</h3></li>
                </ul>
                <h2 class="text-uppercase" style="font-family: 'Tahoma'; color: darkblue">Đặc điểm của PHP</h2>
                <ul>
                    <li><h3>Ngôn ngữ đơn giản</h3></li>
                    <li><h3>Miễn phí, download dễ dàng từ Internet</h3></li>
                    <li><h3>Luôn được cải tiến và cập nhật(mã nguồn mở)</h3></li>
                    <li><h3>PHP có thể thực thi trên bất cứ hệ điều hành nào</h3></li>
                    <li><h3>Có thể dễ dàng nối kết với các HQTCSDL như: MySQL, Microsoft SQL Server 2000, Oracle, PostgreSQL, Adabas, dBase, Informix....</h3></li>
                </ul>
            </div>
            <div id="xampp" class="col-12 float-left">
                <h2 class="text-uppercase" style="font-family: 'Tahoma'; color: orange">XAMPP</h2>
                <ul>
                    <li><h3>XAMPP là viết tắt của X(Hệ điều hành bất kì), Apache, MySQL, PHP và Perl</h3></li>
                    <li><h3>Là chương trình mã nguồn mở, tạo máy chủ Web Server được tích hợp sẵn Apache, PHP, MySQL, FTP Server, Mail Server và công cụ phpMyAdmin</h3></li>
                    <li><h3>XAMPP có thể hoạt động trên hệ điều hành bất kì</h3></li>
                    <li><h3>XAMPP có chương trình quản lý khá tiện lợi, cho phép chủ động bật tắt hoặc khởi động lại các dịch vụ máy chủ bất kỳ lúc nào</h3></li>
                </ul>
            </div>
            <div id="mysql" class="col-12 float-left" style="margin-bottom: 5%">
                <h2 class="text-uppercase text-primary" style="font-family: 'Tahoma';">MYSQL</h2>
                <ul>
                    <li><h3>MySQL là hệ quản trị cơ sở dữ liệu tự do nguồn mở phổ biến nhất thế giới và rất được ưa chuộng trong quá trình phát triển ứng dụng</h3></li>
                    <li><h3>MySQL có tốc độ cao, ổn định, dễ sử dụng và có nhiều phiên bản cho các hệ điều hành khác nhau</h3></li>
                    <li><h3>MySQL được sử dụng cho việc bổ trợ NodeJs, PHP, Perl, và nhiều ngôn ngữ khác, làm nơi lưu trữ những thông tin trên các trang web viết bằng NodeJs, PHP hay Perl,... </h3></li>
                </ul>
            </div>
        </div>
        <div class="col-2 float-right m-1" style="background-color: lightgray; height: 220%; padding: 0">
            <div style="min-height: 50vh; position: sticky; top: 3em;">
                <div style="background-color: yellow">
                    <h4 class="text-danger text-center text-uppercase">Hỗ trợ</h4>
                </div>
                <div class="vmarquee">
                    <ul style="height: 50vh">
                        <li><a href="http://www.tizag.com/phpT/echo.php" target="_blank">Trang web học PHP</a></li>
                        <li><a href="https://www.php.net/tut.php" target="_blank">Trang web tra cứu các lệnh PHP</a></li>
                        <li><a href="https://www.apachefriends.org/index.html" target="_blank">XAMPP</a></li>
                        <li><a href="https://github.com/THT57131383/PHP_Exc" target="_blank">Mã nguồn trang web</a></li>
                        <li><a href="#">link5</a></li>
                        <li><a href="#">link6</a></li>
                    </ul>
                </div>
                <hr/>
                <div style="height: 15%">
                    <h4 class="text-center text-uppercase" style="color: darkgreen">Được thực hiện với</h4>
                    <a href="https://netbeans.org/" target="_blank"><img alt="netbean" src="includes/img/index_mlogo.jpg" style="width: 100%; height: 90%" /></a>
                </div>
            </div>
        </div>
        <?php include ('includes/footer.html')?>
    </body>
</html>