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
            <form id="formEditCatNew" class="stdform" method="post" action="<?php echo base_url(); ?>admin/cat_news/edit/<?php echo $info['id']; ?>">
                <p>
                    <label>Title</label>
                    <span class="field">
                        <input type="text" name="txtTitle" value="<?php echo $info['title']; ?>" class="longinput"/>
                    </span>
                </p>
                <p>
                    <label>Position</label>
                    <span class="field"><input type="text" name="txtPosition" value="<?php echo $info['position']; ?>" class="smallinput"/></span>
                </p>
                <p class="stdformbutton">
                    <button class="submit radius2" name="btnEditCatNew">Edit</button>
                </p>
            </form>
        </div>
        <!--content-->
    </div>
    <!--maincontentinner-->