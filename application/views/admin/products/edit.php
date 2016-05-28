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
                    echo "<p>";
                    echo validation_errors();   
                    echo "</p>";
                    echo "</div>";
                } 
            ?>

            <form id="formEditProduct" class="stdform" method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>admin/products/edit/<?php echo $info['id']; ?>">
                <p>
                    <label>Name</label>
                    <span class="field"><input type="text" name="txtName" value="<?php echo $info['name'] ?>" class="longinput"/></span>
                </p>
                <p class="clearfix">
                    <span class="field">
                        <img class="previewing" src="<?php echo base_url(); ?>/uploads/<?php echo $info['url']; ?>" alt="" width="100px">
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
                        <textarea name="txtDesc" cols="80" rows="5" class="longinput ckeditor"><?php echo $info['desc']; ?></textarea>
                    </span>
                </p>
                <p>
                    <label>Components</label>
                    <span class="field">
                        <textarea name="txtComponents" cols="80" rows="5" class="longinput ckeditor"><?php echo $info['components']; ?></textarea>
                    </span>
                </p>
                <p>
                    <label>Manual</label>
                    <span class="field">
                        <textarea name="txtManual" cols="80" rows="5" class="longinput ckeditor"><?php echo $info['manual']; ?></textarea>
                    </span>
                </p>
                <p>
                    <label>Price</label>
                    <span class="field"><input type="text" name="txtPrice" value="<?php echo $info['price']; ?>" class="mediuminput"/></span>
                </p>
                <p>
                    <label>Position</label>
                    <span class="field"><input type="text" name="txtPosition" value="<?php echo $info['position']; ?>" class="smallinput"/></span>
                </p>
                <p class="stdformbutton">
                    <button class="submit radius2" name="btnEditProduct">Edit</button>
                </p>
            </form>
        </div>
        <!--content-->
    </div>
    <!--maincontentinner-->
