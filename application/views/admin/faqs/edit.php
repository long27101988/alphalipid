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

            <form id="formEditFaq" class="stdform" method="post" action="<?php echo base_url(); ?>admin/faqs/edit/<?php echo $info['id']; ?>">
                <p>
                    <label>Question</label>
                    <span class="field"><textarea name="txtQuestion" id="faqs_question" cols="80" rows="5" class="longinput ckeditor"><?php echo $info['question']; ?></textarea></span>
                </p>
                <p>
                    <label>Answer</label>
                    <span class="field"><textarea name="txtAnswer" id="faqs_answer" cols="80" rows="5" class="longinput ckeditor"><?php echo $info['answer']; ?></textarea></span>
                </p>
                <p>
                    <label>Position</label>
                    <span class="field"><input type="text" name="txtPosition" value="<?php echo $info['position']; ?>" class="smallinput"/></span>
                </p>
                <p class="stdformbutton">
                    <button class="submit radius2" name="btnEditFaq">Edit</button>
                </p>
            </form>
        </div>
        <!--content-->
    </div>
    <!--maincontentinner-->

