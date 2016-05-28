<!DOCTYPE html>
<html>

<head>
    <base href="<?=base_url()?>"/>
    <title><?php echo $title; ?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/site/css/style.css" />
    <script src="<?php echo base_url(); ?>public/site/js/plugins/jquery-1.11.3.min.js"></script>
    <script src="<?php echo base_url(); ?>public/site/js/plugins/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>public/site/js/plugins/owl.carousel.min.js"></script>
    <script src="<?php echo base_url(); ?>public/site/js/plugins/jquery.matchHeight-min.js"></script>
    <script src="<?php echo base_url(); ?>public/site/js/plugins/jquery.nivo.slider.js"></script>
    <script src="<?php echo base_url(); ?>public/site/js/plugins/jquery.fancybox.js"></script>
    <script src="<?php echo base_url(); ?>public/site/js/script.js"></script>
</head>

<body>
    <header id="header" class="header">
        <div class="container clearfix">
            <nav class="menu clearfix">
                <div class="menu-header clearfix">
                    <h1 class="logo"><a href="<?php echo base_url(); ?>">Alpha Lipid</a></h1>
                    <button type="button" class="menu-toggle"><i class="fa fa-bars"></i></button>
                </div>
                <div class="desktop-menu">
                    <div class="hotline">
                        <div class="hotline-inner">
                            Hotline: <span>0963.182.173</span>
                        </div>
                    </div>
                    <ul class="main-menu clearfix">
                        <li class="active"><a href="<?php echo base_url(); ?>">TRANG CHỦ</a></li>
                        <li><a href="<?php echo base_url('gioi-thieu'); ?>.html">GIỚI THIỆU</a></li>
                        <li><a href="<?php echo base_url('san-pham'); ?>.html">SẢN PHẨM</a></li>
                        <li><a href="<?php echo base_url('kinh-doanh'); ?>.html">KINH DOANH</a></li>
                        <li><a href="#">TIN TỨC & SỰ KIỆN <i class="fa fa-caret-down" aria-hidden="true"></i></a>
                            <ul class="sub-menu">
                                <?php foreach ($cat_news as $item) { ?>
                                        <li><a href="<?php echo base_url('tin-tuc'); ?>/<?php echo $item['slug']; ?>.html"><?php echo $item['title']; ?></a></li>
                                <?php } ?> 
                            </ul>
                        </li>
                        <li><a href="<?php echo base_url('hoi-dap'); ?>.html">HỎI ĐÁP</a></li>
                        <li><a href="<?php echo base_url('lien-he'); ?>.html">LIÊN HỆ</a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>
    <!-- header -->
    <main id="main" class="main">
        <?php $this->load->view($subview) ?>
    </main>
    <!-- main -->
    <footer id="footer" class="footer">
        <img class="footer-bg" src="<?php echo base_url(); ?>public/site/img/sua.png" alt="">
        <div class="container clearfix">
            <div class="footer-social">
                <a href="#" title=""><i class="fa fa-facebook"></i></a>
                <a href="#" title=""><i class="fa fa-google-plus"></i></a>
                <a href="#" title=""><i class="fa fa-youtube"></i></a>
            </div>
        </div>
    </footer>
    <!-- footer -->
</body>

</html>
