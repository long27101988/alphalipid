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

            <form id="formEditBusiness" class="stdform" method="post" action="<?php echo base_url(); ?>admin/business/edit/<?php echo $info['id']; ?>">
                <p>
                    <label>Tỉnh</label>
                    <span class="field"><input type="text" name="txtProvince" value="<?php echo $info['province']; ?>" class="mediuminput"/></span>
                </p>
                <p>
                    <label>Người liên hệ</label>
                    <span class="field"><input type="text" name="txtContactName" value="<?php echo $info['contact_name']; ?>" class="longinput"/></span>
                </p>
                <p>
                    <label>Số điện thoại</label>
                    <span class="field"><input type="text" name="txtPhone" value="<?php echo $info['phone']; ?>" class="smallinput"/></span>
                </p>
                <p>
                    <label>Email</label>
                    <span class="field"><input type="text" name="txtEmail" value="<?php echo $info['email']; ?>" class="mediuminput"/></span>
                </p>
                <p>
                    <label>Position</label>
                    <span class="field"><input type="text" name="txtPosition" value="<?php echo $info['position']; ?>" class="smallinput"/></span>
                </p>
                <p class="stdformbutton">
                    <button class="submit radius2" name="btnEditBusiness">Edit</button>
                </p>
            </form>
        </div>
        <!--content-->
    </div>
    <!--maincontentinner-->
