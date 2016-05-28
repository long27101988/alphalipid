<section class="maincontent noright">
    <div class="maincontentinner">
        <ul class="maintabmenu">
            <li class="current"><a href="#"><?php echo $title; ?></a></li>
        </ul>
        <!--maintabmenu-->
        <div class="content">
            
            <?php 
                if(validation_errors() != '' || (isset($_SESSION['flash_mess']) && $_SESSION['flash_mess'] != '')){
                    echo "<div class='notification msgerror'>";
                    echo "<a class='close'></a>";
                    echo "<p>";
                    echo validation_errors();   
                    echo "</p>";
                    echo "</div>";
                } 
            ?>

            <form id="formAddProduct" class="stdform" method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>admin/products/add">
                <p>
                    <label>Name</label>
                    <span class="field"><input type="text" name="txtName" id="" class="longinput"/></span>
                </p>
                <p class="clearfix">
                    <span class="field">
                        <img class="previewing" src="<?php echo base_url(); ?>public/admin/images/no-img.jpg" alt="" width="50px">
                    </span>
                </p>
                <p>
                    <label>Image</label>
                    <span class="field">
                        <input type="file" name="fileImg" class="img-upload mediuminput"/>
                    </span>
                </p>

                <p>
                    <label>Desc</label>
                    <span class="field">
                        <textarea name="txtDesc" cols="80" rows="5" class="longinput ckeditor"></textarea>
                    </span>
                </p>
                <p>
                    <label>Components</label>
                    <span class="field">
                        <textarea name="txtComponents" cols="80" rows="5" class="longinput ckeditor"></textarea>
                    </span>
                </p>
                <p>
                    <label>Manual</label>
                    <span class="field">
                        <textarea name="txtManual" cols="80" rows="5" class="longinput ckeditor"></textarea>
                    </span>
                </p>
                <p>
                    <label>Price</label>
                    <span class="field"><input type="text" name="txtPrice" id="" class="mediuminput"/></span>
                </p>
                <p>
                    <label>Position</label>
                    <span class="field"><input type="text" name="txtPosition" value="<?php echo $next_pos; ?>" class="smallinput"/></span>
                </p>
                </p>
                    <label>State</label>
                    <span class="field">
                        <input name="rdoState" type="radio" checked value="1"> Show &nbsp;&nbsp;
                        <input name="rdoState" type="radio" value="0"> Hide
                    </span>
                </p>
                <p class="stdformbutton">
                    <button class="submit radius2" name="btnAddProduct">Add</button>
                </p>
            </form>
        </div>
        <!--content-->
    </div>
    <!--maincontentinner-->
