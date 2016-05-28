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

            <form id="formEditIntro" class="stdform" method="post" action="<?php echo base_url(); ?>admin/intro/edit/<?php echo $info['id']; ?>">
                <p>
                    <label>Content</label>
                    <span class="field">
                        <textarea name="txtContent" cols="80" rows="5" class="longinput ckeditor"><?php echo $info['content']; ?></textarea>
                    </span>
                </p>
                <p class="stdformbutton">
                    <button class="submit radius2" name="btnEditIntro">Update</button>
                </p>
            </form>
        </div>
        <!--content-->
    </div>
    <!--maincontentinner-->
