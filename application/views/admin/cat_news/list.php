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
                <button class="addbutton radius3" title="table2" onclick="location.href='<?php echo base_url(); ?>admin/cat_news/add';">Add</button> &nbsp;
                <button class="deletebutton radius3" title="table2" onclick="return confirm_del();">Delete Selected</button> &nbsp;
                <!-- <button class="updatebutton radius3" title="table2">Update Position</button> -->
            </div><!--tableoptions-->
            <table cellpadding="0" cellspacing="0" border="0" id="table2" class="stdtable stdtablecb">
                <thead>
                    <tr>
                        <th class="head0"><input type="checkbox" class="checkall" /></th>
                        <th class="head0">Tiêu đề</th>
                        <th class="head0">Vị trí</th>
                        <th class="head0">Trạng thái</th>
                        <th class="head0">&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(!empty($all_cat_news )){
                    foreach ($all_cat_news as $item){ ?>
                        <tr>
                            <td class="center"><input type="checkbox" value="<?php echo $item['id']; ?>" /></td>
                            <td align="center"><?php echo $item['title']; ?></td>
                            <td align="center"><?php echo $item['position']; ?></td>
                            <td align="center"><a href="#" class='statebutton state-<?php echo $item['state']==1?"show":"hide"?>' id="<?php echo $item['id']; ?>" onclick="changState(this);" state="<?php echo $item['state']; ?>"></a></td>
                            <td class="center"><a href="<?php echo base_url(); ?>admin/cat_news/edit/<?php echo $item['id']; ?>" class="edit">Edit</a> - <a href="<?php echo base_url(); ?>admin/cat_news/del/<?php echo $item['id']; ?>" class="delete" onclick="return confirm_del();">Delete</a></td>
                        </tr>
                    <?php  }
                    }else{
                        echo "<tr>";
                            echo "<td colspan='6' align='center'>EMPTY DATA !!!</td>";
                        echo "</tr>";
                    }?>
                </tbody>
            </table>

            <script type="text/javascript">
            function confirm_del(){
                if(!window.confirm("Continue delete?")){
                    return false;
                }
            }

            function changState(_this){
                var id = jQuery(_this).attr('id');
                var state = jQuery(_this).attr('state');

                jQuery.ajax({
                    url: "<?php echo base_url(); ?>admin/cat_news/update_state", // Url to which the request is send
                    type: "POST", // Type of request to be send, called as method
                    data: {id:id, state: state}, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                    success: function(data) // A function to be called if request succeeds
                    {
                        if(data == 1){
                            jQuery(_this).removeClass('state-hide');
                            jQuery(_this).addClass('state-show');
                        }else{
                            jQuery(_this).removeClass('state-show');
                            jQuery(_this).addClass('state-hide');
                        }
                        jQuery(_this).attr('state',data);
                    }
                });
            }

            function delRowsSelected(){
                var id = [];
                jQuery('input[type=checkbox]:checked').not('.checkall').each(function(){return id.push(jQuery(this).val())});
                jQuery.ajax({
                    url: "<?php echo base_url(); ?>admin/cat_news/del_rows_selected", // Url to which the request is send
                    type: "POST", // Type of request to be send, called as method
                    data: { "id": id }, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                    success: function(data) // A function to be called if request succeeds
                    {
                        
                    },
                    complete: function() {
                        location.reload();
                    }  

                });
            }
            </script>
        </div>
        <!--content-->
    </div>
    <!--maincontentinner-->