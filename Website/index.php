<html style="scroll-behavior: smooth">
    <?php $page_title="Index"; include ('includes/headtag.html')?>
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
                            <img src="includes/img/index2.png" width="1000px" height="500px" alt="2"/>
                        </div>
                        <div class="carousel-item">
                            <img src="includes/img/index3.jpg" width="1000px" height="500px" alt="3"/>
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
            <div class="col-12 float-left" style="margin-bottom: 5%">
                <p id="php">
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
                        <li><h3>
                                Có thể dễ dàng nối kết với các HQTCSDL như: 
                                MySQL, Microsoft SQL Server 2000, Oracle, PostgreSQL,Adabas, dBase, Informix....
                        </h3></li>
                    </ul>
                </p>
            </div>
        </div>
        <div class="col-2 float-right m-1 bg-white" style="height: 200%; padding: 0">
            <div style="min-height: 30%; position: sticky; top: 3em;">
                <div style="background-color: yellow">
                    <h4 class="text-danger text-center text-uppercase">Hỗ trợ</h4>
                </div>
            </div>
        </div>
        <?php include ('includes/footer.html')?>
    </body>
</html>