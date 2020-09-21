<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" class="background-main no-js">
<head>
    <title><?php include "include/title.php"; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="robots" content="index, follow">
	<meta name="description" content="<?php include "include/description.php"; ?>">
	<meta name="keywords" content="<?php include "include/keywords.php"; ?>">
	<meta name="author" content="Robby Prihandaya">
	<meta http-equiv="imagetoolbar" content="no">
	<meta name="language" content="Indonesia">
	<meta name="revisit-after" content="7">
	<meta name="webcrawlers" content="all">
	<meta name="rating" content="general">
	<meta name="spiders" content="all">

  <link rel="shortcut icon" href="favicon.png" />
  <link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="rss.xml" />
    <link href="<?php echo "$f[folder]/framework/addons/camera/css/camera.css" ?>" rel="stylesheet" />
    <link href="<?php echo "$f[folder]/css/social-icons.css" ?>" rel="stylesheet" />
    <link href="<?php echo "$f[folder]/css/style.css" ?>" rel="stylesheet" />
    <link href="<?php echo "$f[folder]/css/theme-color.css" ?>" rel="stylesheet" />
    <link href="<?php echo "$f[folder]/css/responsive.css" ?>" rel="stylesheet" />
    <link href="<?php echo "$f[folder]/css/firefox.css" ?>" rel="stylesheet" />
    <script src="<?php echo "$f[folder]/framework/js/modernizr.js" ?>"></script>
	<link href="<?php echo "$f[folder]/js/js-image-slider.css" ?>" rel="stylesheet" type="text/css" />
    <script src="<?php echo "$f[folder]/js/js-image-slider.js" ?>" type="text/javascript"></script>
    <link rel="stylesheet" href="<?php echo "$f[folder]"; ?>/datatables/dataTables.bootstrap.css">
</head>

<body>
    <!--<canvas id="snowfall"></canvas>-->
    <a class="sr-only" href="#content"></a>
    <div class="header-background">
        <div class="btn-mobile-menu visible-sm visible-xs">
            <button type="button" class="menu-btn">
                <i class="icon-menu"></i>
                <span>Menu</span>
            </button>
        </div>

        <!-- Top Menu -->
        <nav class="social-menu navbar">
			<h2 class="hidden">Top Navigation</h2>
            <div class="container">
				<?php include "top-menu.php"; ?>
			</div>

			<!-- /.navbar-collapse -->
        </nav>
        <div style='background:#e3e3e3'>
                <?php
                  $logoo=mysql_query("SELECT * FROM logo ORDER BY id_logo DESC LIMIT 1");
                  while($b=mysql_fetch_array($logoo)){
                    echo "<img style='height:75px; padding:15px' itemprop='logo' class='site-logo' src='logo/$b[gambar]' alt='main-logo'/>";
                  }
                ?>
                </div>

        <!-- Breaking News -->
        <section class="tkr-breaking-news hidden-xs">
            <div class="container">
                <div class="title">
                    <h3>Breaking News</h3>
                </div>
                <div id="divBreakingNewsTicker" class="content">
					<ul id="js-news" class="js-hidden">
				<?php
				  $terkini=mysql_query("SELECT * FROM berita ORDER BY id_berita  DESC LIMIT 5");
				  $no = 1;
				  while($p=mysql_fetch_array($terkini)){
					if ($p[gambar] == ''){
						echo "<li><a href='berita-$p[judul_seo].html'>
                            <img src='foto_berita/small_no-image.jpg' class='animated fadeIn' alt='news-$no' />$p[judul]</a>
						</li>";
					}else{
						echo "<li><a href='berita-$p[judul_seo].html'>
                            <img src='foto_berita/small_$p[gambar]' class='animated fadeIn' alt='news-$no' />$p[judul]</a>
						</li>";
					}	
					$no++;
				  }
				?>
				</ul>
                </div>
            </div>
        </section>

        <!-- #camera_wrap_1 -->
		<?php 
    		if ($_GET['module']=='home'){
    			echo "<section id='camera_wrap_1' class='container camera_wrap camera_azure_skin'>";
    				include "slide.php";
    			echo "</section>";
    		}
		?>

        <!-- Main Menu -->
        <nav class="main-menu navbar visible-lg visible-md" data-sticky-header="true">
            <h2 class="hidden">Main Navigation</h2>

            <div class="container">
                <div class="row">
                    <!-- Collect the nav links, forms, and other content for toggling -->
						<?php include "main-menu.php"; ?>
                    <!-- /.navbar-collapse -->
                </div>
            </div>

        </nav>

        <!-- Mobile Menu (Pushy Menu) -->
        <?php include "mobile-nav.php"; ?>

        <!-- Mobile-Menu (Close) Site Overlay -->
        <div class="site-overlay"></div>
    </div>
	
    <!-- Main Container -->
    <div class="container main-site-container" itemscope itemtype="http://schema.org/CreativeWork">
        <div class="row">
            <?php 
                if ($_GET['module']=='datapenduduk'){
                    echo "<div class='col-md-12'>";
                      include "data_penduduk.php";
                    echo "</div>";
                }else{
            ?>
                    <div class="col-md-8">
        				<?php include "content.php"; ?>
                    </div>
        			<section class="col-md-4">
        				<?php include "sidebar.php"; ?>
        			</section>
            <?php } ?>

        </div>
		<footer class="container footer-container">
			<?php include "footer.php"; ?>
		</footer>
    </div>

    <div class="btn-goto-top border-radius-2px">
        <i class="icon-arrow-up7"></i>
    </div>

    <!-- Body Scripts -->
    <script src="<?php echo "$f[folder]/framework/js/jquery-2.0.3.min.js" ?>"></script>
    <script src="<?php echo "$f[folder]/framework/js/jquery-migrate-1.2.1.min.js" ?>"></script>
    <script src="<?php echo "$f[folder]/framework/js/jquery.easing.1.3.js" ?>"></script>
    <script src="<?php echo "$f[folder]/framework/bootstrap/js/bootstrap.min.js" ?>"></script>
    <!-- DataTables -->
    <script src="<?php echo "$f[folder]"; ?>/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo "$f[folder]"; ?>/dataTables.bootstrap.min.js"></script>
    <!-- Slider -->
    <script src="<?php echo "$f[folder]/framework/addons/camera/js/camera.min.js" ?>"></script>
    <!-- OWL Carousel -->
    <script src="<?php echo "$f[folder]/framework/addons/owl/owl.carousel.min.js" ?>"></script>
    <!-- Breaking News Ticker -->
    <script src="<?php echo "$f[folder]/framework/addons/breaking-news-ticker/jquery.ticker.js" ?>"></script>
    <!-- Mobile Menu -->
    <script src="<?php echo "$f[folder]/framework/addons/mobile-menu/pushy.js" ?>"></script>
    <!-- Show On Scroll -->
    <script src="<?php echo "$f[folder]/framework/addons/show-on-scroll/jquery.appear.js" ?>"></script>
    <script src="<?php echo "$f[folder]/framework/js/serpentsoft-scripts.js" ?>"></script>
    <script>
  $(function () { 
    $("#example1").DataTable({
      "scrollX": false
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "scrollX": false
    });
  });
</script>
    <script>
        jQuery(function () {

            jQuery('#camera_wrap_1').camera({
                //thumbnails: false,
                //height: '500px',
                //loader: 'pie',
                //pagination: true,
                //time: 7000,	//milliseconds between the end of the sliding effect and the start of the nex one
                //transPeriod: 800,	//lenght of the sliding effect in milliseconds
                //hover: true,	//true, false. Puase on state hover. Not available for mobile devices

                //autoAdvance: false,	//true, false Auto Play
                //mobileAutoAdvance: false, //true, false. Auto-advancing for mobile devices

                //fx: 'random',	//'random','simpleFade', 'curtainTopLeft', 'curtainTopRight', 'curtainBottomLeft', 'curtainBottomRight',
                //// 'curtainSliceLeft', 'curtainSliceRight', 'blindCurtainTopLeft', 'blindCurtainTopRight', 'blindCurtainBottomLeft',
                ////'blindCurtainBottomRight', 'blindCurtainSliceBottom', 'blindCurtainSliceTop', 'stampede', 'mosaic', 'mosaicReverse',
                ////'mosaicRandom', 'mosaicSpiral', 'mosaicSpiralReverse', 'topLeftBottomRight', 'bottomRightTopLeft', 'bottomLeftTopRight', 'bottomLeftTopRight'

                ////you can also use more than one effect, just separate them with commas: 'simpleFade, scrollRight, scrollBottom'

                alignment: 'center',           //topLeft, topCenter, topRight, centerLeft, center, centerRight, bottomLeft, bottomCenter, bottomRight
                autoAdvance: true, //true, false Auto Play
                mobileAutoAdvance: true,
                barDirection: 'leftToRight',   //'leftToRight', 'rightToLeft', 'topToBottom', 'bottomToTop'
                barPosition: 'bottom',         //'left', 'right', 'top', 'bottom'
                cols: 6,                      //nr of cols
                rows: 4,					//nr of rows
                slicedCols: 12,
                slicedRows: 8,
                easing: 'easeInOutExpo',      //all easings
                mobileEasing: '',
                fx: 'random',              //'random','simpleFade', 'curtainTopLeft', 'curtainTopRight', 'curtainBottomLeft', 'curtainBottomRight', 'curtainSliceLeft', 'curtainSliceRight', 'blindCurtainTopLeft', 'blindCurtainTopRight', 'blindCurtainBottomLeft', 'blindCurtainBottomRight', 'blindCurtainSliceBottom', 'blindCurtainSliceTop', 'stampede', 'mosaic', 'mosaicReverse', 'mosaicRandom', 'mosaicSpiral', 'mosaicSpiralReverse', 'topLeftBottomRight', 'bottomRightTopLeft', 'bottomLeftTopRight', 'bottomLeftTopRight', 'scrollLeft', 'scrollRight', 'scrollHorz', 'scrollBottom', 'scrollTop'
                mobileFx: '',
                hover: true, //true, false. Puase on state hover. Not available for mobile devices
                navigation: true,
                navigationHover: true,
                mobileNavHover: true,
                pagination: true,
                thumbnails: false,
                playPause: false,
                pauseOnClick: false,
                loader: 'pie',               //pie, bar, none
                loaderColor: '#eeeeee',
                loaderBgColor: '#222222',
                loaderOpacity: 0.8,
                loaderPadding: 2,
                pieDiameter: 38,
                piePosition: 'rightTop',
                portrait: false,
                slideOn: 'next', 			//next, prev, random
                time: 7000,			//milliseconds between the end of the sliding effect and the start of the nex one
                transPeriod: 1200	 //length of the sliding effect in milliseconds
            });

            //function letitsnow() {
            //    // https://github.com/daveWid/canvas-snow
            //    var canvas = document.getElementById("snowfall");
            //    canvas.width = window.innerWidth;
            //    canvas.height = window.innerHeight;
            //    // Now the emitter
            //    var emitter = Object.create(rectangleEmitter);
            //    emitter.setCanvas(canvas);
            //    emitter.setBlastZone(0, -10, canvas.width, 1);
            //    emitter.particle = snow;
            //    emitter.runAhead(0);
            //    emitter.start(60);
            //}

            //letitsnow();

            // Owl
            serpentsoft_owlStartCarousel('divCatScrollBox_1', 2, {
                //items: 2, //10 items above 1000px browser width
                //itemsDesktop: [647, 2], //5 items between 1000px and 901px
                //itemsDesktopSmall: [597, 2], // betweem 900px and 601px

                itemsCustom: [
	                [0, 2],
                    [992, 2],
	                [765, 2],
                    [480, 1],
                    [150, 1],
                ],

                itemsTablet: false, //2 items between 600 and 0
                itemsMobile: false, // itemsMobile disabled - inherit from itemsTablet option
                rewindNav: true,
                lazyLoad: true,
            });


            // Reviews Category
            serpentsoft_owlStartCarousel('divCatReviews_1', 2, {

                itemsCustom: [
	                [0, 2],
                    [992, 2],
	                [765, 2],
                    [480, 1],
                    [150, 1],
                ],

                itemsTablet: false, //2 items between 600 and 0
                itemsMobile: false, // itemsMobile disabled - inherit from itemsTablet option
                rewindNav: true,
                lazyLoad: true,
            });


            // Widget Slides ( divWidgetSlides_1 )
            serpentsoft_owlStartCarousel('divWidgetSlides_1', 1, {

                itemsCustom: [
	                [0, 1],
                    //[992, 1],
	                //[750, 1],
	                //[410, 1],
                    [992, 1],
	                [765, 1],
                    [480, 1],
                    [150, 1],
                ],

                itemsTablet: false, //2 items between 600 and 0
                itemsMobile: false, // itemsMobile disabled - inherit from itemsTablet option
                rewindNav: true,
                lazyLoad: true,
            });
        });
    </script>
    <!-- histats code -->
</body>
</html>
