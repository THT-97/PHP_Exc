<html>
    <?php $page_title="Index"; include ('includes/headtag.html')?>
    <body style="background-color: darkseagreen">
        <?php include ('includes/header.php');?>
        <div class="col-2 float-right m-1 bg-white" style="height: 75%"></div>
        <div class="col-8 mt-2 float-left d-flex justify-content-center">
                <div id="picSlide" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="includes/img/index1.jpg" alt="1"/>
                    </div>
                    <div class="carousel-item">
                        <img src="includes/img/index2.png" alt="2"/>
                    </div>
                    <div class="carousel-item">
                        <img src="includes/img/index3.jpg" alt="3"/>
                    </div>					
		</div>
                <a class="carousel-control-prev" href="#picSlide" data-slide="prev"><i class="carousel-control-prev-icon control"></i></a>
		<a class="carousel-control-next" href="#picSlide" data-slide="next"><i class="bg-secondary carousel-control-next-icon control"></i></a>
		<ul class="carousel-indicators">
                    <li data-target="#picSlide" data-slide-to="0" class="active bg-dark"></li>
                    <li data-target="#picSlide" data-slide-to="1" class="bg-dark"></li>
                    <li data-target="#picSlide" data-slide-to="2" class="bg-dark"></li>
		</ul>
            </div>
        </div>
        <div class="col-12 float-left m-10">
            
        </div>
        <?php include ('includes/footer.html')?>
    </body>
</html>