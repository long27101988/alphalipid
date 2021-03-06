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

            <form id="formEditUser" class="stdform" method="post" action="<?php echo base_url(); ?>admin/users/edit/<?php echo $info['id']; ?>">
                <p>
                    <label>Username</label>
                    <span class="field"><input type="text" name="txtUsername" id=""  value="<?php echo $info['username']; ?>" class="mediuminput"/></span>
                </p>
                <p>
                    <label>Email</label>
                    <span class="field"><input type="text" name="txtEmail" id="" value="<?php echo $info['email']; ?>"class="longinput"/></span>
                </p>
                <p>
                    <label>Password</label>
                    <span class="field"><input type="password" name="txtPassword" id="" value="<?php echo $info['password']; ?>" class="mediuminput"/></span>
                </p>
                <p>
                    <label>Re-password</label>
                    <span class="field"><input type="password" name="txtRePassword" id="" value="<?php echo $info['password']; ?>"class="mediuminput"/></span>
                </p>
                <p class="stdformbutton">
                    <button class="submit radius2" name="btnEditUser">Edit</button>
                </p>
            </form>
        </div>
        <!--content-->
    </div>
    <!--maincontentinner-->
