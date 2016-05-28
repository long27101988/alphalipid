<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/admin/css/style.css" />
    <script type="text/javascript" src="<?php echo base_url(); ?>public/admin/js/plugins/jquery-1.7.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>public/admin/js/plugins/jquery-ui-1.8.16.custom.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        $('.loginform button').hover(function() {
            $(this).stop().switchClass('default', 'hover');
        }, function() {
            $(this).stop().switchClass('hover', 'default');
        });

        // $('#login').submit(function() {
        //     var u = jQuery(this).find('#username');
        //     if (u.val() == '') {
        //         jQuery('.loginerror').slideDown();
        //         u.focus();
        //         return false;
        //     }
        // });

        // $('#username').keypress(function() {
        //     jQuery('.loginerror').slideUp();
        // });
    });
    </script>
    <!--[if lt IE 9]>
    <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
<![endif]-->
</head>

<body class="login">
    <main class="loginbox radius3">
        <div class="loginboxinner radius3">
            <!-- <div class="loginheader">
                <h1 class="bebas">Sign In</h1>
                <div class="logo"><img src="images/starlight_admin_template_logo.png" alt="" /></div>
            </div> -->
            <!--loginheader-->
            <div class="loginform">
                <div class="loginerror">
                    <p>Invalid username or password</p>
                </div>
                <form id="login" action="<?=current_url()?>" method="post">
                    <p>
                        <label for="username" class="bebas">Username</label>
                        <input type="text" id="username" name="username" class="radius2"/>
                    </p>
                    <p>
                        <label for="password" class="bebas">Password</label>
                        <input type="password" id="password" name="password" class="radius2"/>
                    </p>
                    <p>
                        <button class="radius3 bebas" type="submit" name="login">Sign in</button>
                    </p>
                    <!-- <p><a href="" class="whitelink small">Can't access your account?</a></p> -->
                </form>
            </div>
            <!--loginform-->
        </div>
        <!--loginboxinner-->
    </main>
    <!--loginbox-->
</body>

</html>
