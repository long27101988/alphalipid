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

            <form id="formAddNew" class="stdform" method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>admin/news/add">
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
                    <label>Tiêu đề</label>
                    <span class="field"><input type="text" name="txtTitle" id="" class="longinput"/></span>
                </p>
                <p>
                    <label>Desc</label>
                    <span class="field">
                        <textarea name="txtDesc" id="news_desc" cols="80" rows="5" class="longinput"></textarea>
                    </span>
                </p>
                <p>
                    <label>Nội dung</label>
                    <span class="field">
                        <textarea name="txtContent" id="news_desc" cols="80" rows="5" class="longinput ckeditor"></textarea>
                    </span>
                </p>
                <p class="clearfix">
                    <span class="field">
                        <img class="previewing" src="<?php echo base_url(); ?>public/admin/images/no-img.jpg" alt="" width="50px">
                    </span>
                </p>
                <p>
                    <label>Hình ảnh</label>
                    <span class="field">
                        <input type="file" name="fileImg" id="news_img" class="img-upload mediuminput"/>
                    </span>
                </p>
                <p>
                    <label>Vị trí</label>
                    <span class="field"><input type="text" name="txtPosition" value="<?php echo $next_pos; ?>" class="smallinput"/></span>
                </p>
                </p>
                    <label>Trạng thái</label>
                    <span class="field">
                        <input name="rdoState" type="radio" checked value="1"> Show &nbsp;&nbsp;
                        <input name="rdoState" type="radio" value="0"> Hide
                    </span>
                </p>
                <p class="stdformbutton">
                    <button class="submit radius2" name="btnAddNew">Thêm</button>
                </p>
            </form>
        </div>
        <!--content-->
    </div>
    <!--maincontentinner-->
