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

            <form id="formAddFaq" class="stdform" method="post" action="<?php echo base_url(); ?>admin/faqs/add">
                <p>
                    <label>Question</label>
                    <span class="field"><textarea name="txtQuestion" id="faqs_question" cols="80" rows="5" class="longinput ckeditor"></textarea></span>
                </p>
                <p>
                    <label>Answer</label>
                    <span class="field"><textarea name="txtAnswer" id="faqs_answer" cols="80" rows="5" class="longinput ckeditor"></textarea></span>
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
                    <button class="submit radius2" name="btnAddFaq">Add</button>
                </p>
            </form>
        </div>
        <!--content-->
    </div>
    <!--maincontentinner-->
