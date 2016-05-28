<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/admin/css/style.css" />
    <script type="text/javascript" src="<?php echo base_url(); ?>public/admin/js/plugins/jquery-1.7.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>public/admin/js/plugins/jquery-ui-1.8.16.custom.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>public/admin/js/plugins/jquery.validate.min.js"></script>
    <!--<script type="text/javascript" src="js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="js/plugins/jquery.flot.min.js"></script>
    <script type="text/javascript" src="js/plugins/jquery.flot.resize.min.js"></script>-->
    <script type="text/javascript" src="<?php echo base_url(); ?>public/admin/js/custom/general.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>public/admin/js/custom/elements.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>public/admin/js/custom/form.js"></script>
    <!--<script type="text/javascript" src="js/custom/dashboard.js"></script>-->
    <script type="text/javascript" src="<?php echo base_url(); ?>public/admin/js/custom/tables.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>public/admin/js/custom/script.js"></script>
</head>

<body class="loggedin">
    <!-- START OF HEADER -->
    <header class="header radius3">
        <div class="headerinner">
            <a href="index.php"><img src="<?php echo base_url(); ?>public/admin/images/starlight_admin_template_logo_small.png" alt="" /></a>
            <div class="headright">
                <div class="headercolumn">&nbsp;</div>
                <div id="searchPanel" class="headercolumn">
                    <div class="searchbox">
                        <form action="" method="post">
                            <input type="text" id="keyword" name="keyword" class="radius2" value="Search here" />
                        </form>
                    </div>
                    <!--searchbox-->
                </div>
                <!--headercolumn-->
                <div id="notiPanel" class="headercolumn">
                    <div class="notiwrapper">
                        <a href="ajax/messages.php" class="notialert radius2">5</a>
                        <div class="notibox">
                            <ul class="tabmenu">
                                <li class="current"><a href="ajax/messages.php" class="msg">Messages (2)</a></li>
                                <li><a href="ajax/activities.php" class="act">Recent Activity (3)</a></li>
                            </ul>
                            <br clear="all" />
                            <div class="loader"><img src="<?php echo base_url(); ?>public/admin/images/loaders/loader3.gif" alt="Loading Icon" /> Loading...</div>
                            <div class="noticontent"></div>
                            <!--noticontent-->
                        </div>
                        <!--notibox-->
                    </div>
                    <!--notiwrapper-->
                </div>
                <!--headercolumn-->
                <div id="userPanel" class="headercolumn">
                    <a href="" class="userinfo radius2">
                        <img src="<?php echo base_url(); ?>public/admin/images/avatar.png" alt="" class="radius2" />
                        <span><strong><?=$this->session->userdata('session_username');?></strong></span>
                    </a>
                    <div class="userdrop">
                        <ul>
                            <li><a href="">Profile</a></li>
                            <li><a href="">Account Settings</a></li>
                            <li><a href="<?=base_url().'admin/login/logOut'?>">Logout</a></li>
                        </ul>
                    </div>
                    <!--userdrop-->
                </div>
                <!--headercolumn-->
            </div>
            <!--headright-->
        </div>
        <!--headerinner-->
    </header>
    <!--header-->
    <!-- END OF HEADER -->


    <!-- START OF MAIN CONTENT -->
    <main class="mainwrapper">
        <div class="mainwrapperinner">
            <aside class="mainleft">
                <div class="mainleftinner">
                    <div class="leftmenu">

                        <ul>
                            <li class="current"><a href="<?php echo base_url(); ?>admin/dashboard" class="dashboard"><span>Dashboard</span></a></li>
                            <li><a href="<?php echo base_url(); ?>admin/users" class="users"><span>Users</span></a></li>
                            <li><a href="<?php echo base_url(); ?>admin/slider" class="media"><span>Slider</span></a></li>
                            <li><a href="<?php echo base_url(); ?>admin/intro" class="editor"><span>Giới thiệu</span></a></li>
                            <li><a href="<?php echo base_url(); ?>admin/products" class="tables"><span>Sản phẩm</span></a></li>
                            <li><a href="<?php echo base_url(); ?>admin/business" class="buttons"><span>Kinh doanh</span></a></li>
                            <li><a href="<?php echo base_url(); ?>admin/cat_news" class="grid"><span>Danh mục tin tức</span></a></li>
                            <li><a href="<?php echo base_url(); ?>admin/news" class="grid"><span>Tin tức</span></a></li>
                            <li><a href="<?php echo base_url(); ?>admin/faqs" class="chat"><span>Hỏi đáp</span></a></li>
                            <!-- <li><a href="form.html" class="editor menudrop"><span>Forms</span></a>
                                <ul>
                                    <li><a href="form.html"><span>Form Styling</span></a></li>
                                    <li><a href="editor.html"><span>WYSIWYG Editor</span></a></li>
                                    <li><a href="wizard.html"><span>Wizard</span></a></li>
                                </ul>
                            </li>-->
                        </ul>
                    </div>
                    <!--leftmenu-->
                    <div id="togglemenuleft">
                        <a></a>
                    </div>
                </div>
                <!--mainleftinner-->
            </aside>
            <!--mainleft-->


            <?php $this->load->view($subview); ?>


                <footer class="footer">
                    <p>Designed by: <a href="">ThaoLC</a></p>
                </footer>
                <!--footer-->
            </section>
            <!--maincontent-->
        </div>
        <!--mainwrapperinner-->
    </main>
    <!--mainwrapper-->
    <!-- END OF MAIN CONTENT -->
</body>

</html>



