<section class="maincontent noright">
    <div class="maincontentinner">
        <ul class="maintabmenu">
            <li class="current"><a href="#"><?php echo $title; ?></a></li>
        </ul>
        <!--maintabmenu-->
        <div class="content">
            <?php
                if(validation_errors() != ''){
                    echo "<div class='notification msgerror'>";
                    echo "<a class='close'></a>";
                    echo validation_errors();
                    echo "</div>";
                }
            ?>
            <form id="formEditSlider" class="stdform" enctype="multipart/form-data" method="post" action="<?php echo base_url(); ?>admin/slider/edit/<?php echo $info['id']; ?>">
                <p>
                    <label>Title</label>
                    <span class="field"><input type="text" name="txtTitle" value="<?php echo $info['title'] ?>" class="mediuminput"/></span>
                </p>
                <p class="clearfix">
                    <span class="field">
                        <img class="previewing" src="<?php echo base_url(); ?>/uploads/<?php echo $info['url']; ?>" alt="" width="50px">
                    </span>
                </p>
                <p>
                    <label>Image</label>
                    <span class="field">
                        <input type="file" name="fileImg" id="slider_img" class="img-upload mediuminput"/>
                    </span>
                </p>
                <p>
                    <label>Position</label>
                    <span class="field"><input type="text" name="txtPosition" value="<?php echo $info['position'] ?>" class="smallinput"/></span>
                </p>
                <p class="stdformbutton">
                    <button class="submit radius2" name="btnEditSlider">Edit</button>
                </p>
            </form>
        </div>
        <!--content-->
    </div>
    <!--maincontentinner-->
