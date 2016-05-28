<section class="maincontent noright">
    <div class="maincontentinner">
        <ul class="maintabmenu">
            <li class="current"><a href="#">Intro</a></li>
            <li><a href="<?php echo base_url(); ?>admin/intro/video_index">Videos</a></li>
        </ul>
        <!--maintabmenu-->
        <div class="content">

            <?php 
                if(isset($_SESSION['flash_mess']) && $_SESSION['flash_mess'] != ''){
                    echo "<div class='notification msgsuccess'>";
                    echo "<a class='close'></a>";
                    echo "<p>".$this->session->flashdata('flash_mess')."</p>";
                    echo "</div>";
                }
            ?>

            <table cellpadding="0" cellspacing="0" border="0" id="table2" class="stdtable stdtablecb">
                <thead>
                    <tr>
                        <th class="head0">Content</th>
                        <th class="head0">&nbsp;</th>
                    </tr>
                </thead>
                <tbody>    
                    <?php foreach ($intro as $item): ?>
                    	<tr>
                            <td align="left"><?php echo $this->function->the_excerpt(strip_tags($item['content']),200).'
                            ...'; ?></td>
                            <td class="center"><a href="<?php echo base_url(); ?>admin/intro/edit/<?php echo $item['id']; ?>" class="edit">Edit</a></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
        <!--content-->
    </div>
    <!--maincontentinner-->