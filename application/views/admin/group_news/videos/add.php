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

            <form id="formAddVideoNew" class="stdform" method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>admin/news/video_add">
                <p>
                    <label>Nhóm tin:</label>
                    <span class="field">
                        <select name="selCatNew" class="mediuminput">
                            <?php foreach($group_news as $value){ ?>
                                <option value="<?= $value['id']?>" <?php if($value['id'] == $id_cate) {echo "selected='selected'";} ?>><?=$value['title']?></option>
                            <?php }?>
                        </select>
                    </span>
                </p>
                <p>
                    <label>Title</label>
                    <span class="field"><input type="text" name="txtTitle" id="" class="longinput"/></span>
                </p>
                <p>
                    <label>Video Link</label>
                    <span class="field"><input type="text" name="txtVideoUrl" id="" class="longinput"/></span>
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
                    <button class="submit radius2" name="btnAddVideoNew">Add</button>
                </p>
            </form>
        </div>
        <!--content-->
    </div>
    <!--maincontentinner-->
