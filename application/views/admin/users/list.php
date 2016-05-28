<section class="maincontent noright">
    <div class="maincontentinner">
        <ul class="maintabmenu">
            <li class="current"><a href="#"><?php echo $title; ?></a></li>
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
                <div class="tableoptions">
                    <button class="addbutton radius3" title="table2" onclick="location.href='<?php echo base_url(); ?>admin/users/add';">Add</button> &nbsp;
                    <button class="deletebutton radius3" title="table2">Delete Selected</button> &nbsp;
                    </div><!--tableoptions-->
                    <table cellpadding="0" cellspacing="0" border="0" id="table2" class="stdtable stdtablecb">
                        <thead>
                            <tr>
                                <th class="head0"><input type="checkbox" class="checkall" /></th>
                                <th class="head0">Username</th>
                                <th class="head0">Email</th>
                                <th class="head0">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>    
                            <?php foreach ($all_users as $item): ?>
                            	<tr>
                                <td class="center"><input type="checkbox" /></td>
                                <td align="center"><?php echo $item['username']; ?></td>
                                <td align="left"><?php echo $item['email']; ?></td>
                                <td class="center"><a href="<?php echo base_url(); ?>admin/users/edit/<?php echo $item['id']; ?>" class="edit">Edit</a> - <a href="<?php echo base_url(); ?>admin/users/del/<?php echo $item['id']; ?>" class="delete" onclick="return confirm_del();">Delete</a></td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                    <script type="text/javascript">
                        function confirm_del(){
                            if(!window.confirm("Continue delete?")){
                                return false;
                             }
                        }
                    </script>
                </div>
                <!--content-->
            </div>
            <!--maincontentinner-->