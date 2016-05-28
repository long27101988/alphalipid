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

            <form id="formEditVideoNew" class="stdform" method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>admin/news/video_edit/<?php echo $info['id']; ?>">
                <p>
                    <label>Nhóm tin:</label>
                    <span class="field">
                        <select name="selCatNew" class="mediuminput">
                            <?php foreach($group_news as $value){ ?>
                                <option value="<?= $value['id']?>" <?php if($info['cat_id'] == $value['id']){echo "selected='selected'";} ?>><?=$value['title']?></option>
                            <?php }?>
                        </select>
                    </span>
                </p>
                <p>
                    <label>Title</label>
                    <span class="field"><input type="text" name="txtTitle" value="<?php echo $info['title']; ?>" class="longinput"/></span>
                </p>
                <p>
                    <label>Video Link</label>
                    <span class="field"><input type="text" name="txtVideoUrl" value="<?php echo $info['video_url']; ?>" class="longinput"/></span>
                </p>
                <p>
                    <label>Position</label>
                    <span class="field"><input type="text" name="txtPosition" value="<?php echo $info['position']; ?>" class="smallinput"/></span>
                </p>
                <p class="stdformbutton">
                    <button class="submit radius2" name="btnEditVideoNew">Chỉnh sửa</button>
                </p>
            </form>
        </div>
        <!--content-->
    </div>
    <!--maincontentinner-->

