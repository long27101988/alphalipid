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
            <form id="formEditNew" class="stdform" method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>admin/news/edit/<?php echo $info['id']; ?>">
                <p>
                    <label>Nhóm tin:</label>
                    <span class="field">
                        <select name="selCatNew" class="mediuminput">
                            <?php foreach($group_news as $value){ ?>
                                <option value="<?php echo $value['id']?>" <?php if($info['cat_id'] == $value['id']){echo "selected='selected'";} ?>><?php echo $value['title']?></option>
                            <?php }?>
                        </select>
                    </span>
                </p>
                <p>
                    <label>Tiêu đề</label>
                    <span class="field"><input type="text" name="txtTitle" value="<?php echo $info['title'] ?>" class="longinput"/></span>
                </p>
                <p>
                    <label>Desc</label>
                    <span class="field">
                        <textarea name="txtDesc" id="news_desc" cols="80" rows="5" class="longinput"><?php echo $info['desc']; ?></textarea>
                    </span>
                </p>
                <p>
                    <label>Nội dung</label>
                    <span class="field">
                        <textarea name="txtContent" cols="80" rows="5" class="longinput ckeditor"><?php echo $info['content']; ?></textarea>
                    </span>
                </p>
                <p class="clearfix">
                    <span class="field">
                        <img class="previewing" src="<?php echo base_url(); ?>/uploads/<?php echo $info['url']; ?>" alt="" width="100px">
                    </span>
                </p>
                <p>
                    <label>Hình ảnh</label>
                    <span class="field">
                        <input type="file" name="fileImg" class="img-upload mediuminput"/>
                    </span>
                </p>
                <p>
                    <label>Vị trí</label>
                    <span class="field"><input type="text" name="txtPosition" value="<?php echo $info['position']; ?>" class="smallinput"/></span>
                </p>
                <p class="stdformbutton">
                    <button class="submit radius2" name="btnEditNew">Chỉnh sửa</button>
                </p>
            </form>
        </div>
        <!--content-->
    </div>
    <!--maincontentinner-->
