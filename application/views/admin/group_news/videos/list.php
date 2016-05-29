<section class="maincontent noright">
    <div class="maincontentinner">
        <ul class="maintabmenu">
            <li><a href="<?php echo base_url(); ?>admin/news">News</a></li>
            <li class="current"><a href="#">Videos</a></li>
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
                <button class="addbutton radius3" title="table2" onclick="location.href='<?php echo base_url(); ?>admin/news/video_add/<?php echo $id_cate;?>';">Add</button> &nbsp;
                <button class="deletebutton radius3" title="table2">Delete Selected</button> &nbsp;      
                <select class="sel-categories radius3" onchange="changeGroupNews(this);">
                    <?php foreach($group_news as $value){ ?>
                    <option value="<?= $value['id']?>" <?php if($value['id'] == $id){echo "selected='selected'";} ?>><?=$value['title']?></option>
                <?php }?>
                </select> &nbsp;
                <!-- <button class="updatebutton radius3" title="table2">Update Position</button> -->
                </div><!--tableoptions-->
                <table cellpadding="0" cellspacing="0" border="0" id="table2" class="stdtable stdtablecb">
                    <thead>
                        <tr>
                            <th class="head0"><input type="checkbox" class="checkall" /></th>
                            <th class="head0">Tiêu đề</th>
                            <th class="head0">Video Link</th>
                            <th class="head0">Vị trí</th>
                            <th class="head0">Trạng thái</th>
                            <th class="head0">&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>    
                        <?php if(!empty($all_news )){
                        foreach ($all_news as $item){ ?>
                            <tr>
                                <td class="center"><input type="checkbox" /></td>
                                <td align="center"><?php echo $item['title']; ?></td>
                                <td align="center"><?php echo $item['video_url']; ?></td>
                                <td align="center"><?php echo $item['position']; ?></td>
                                <td align="center"><a href="#" class='statebutton state-<?php echo $item['state']==1?"show":"hide"?>' id="<?php echo $item['id']; ?>" onclick="changState(this);" state="<?php echo $item['state']; ?>"></a></td>
                                <td class="center"><a href="<?php echo base_url(); ?>admin/news/video_edit/<?php echo $item['id']; ?>" class="edit">Edit</a> - <a href="<?php echo base_url(); ?>admin/news/video_del/<?php echo $item['id']; ?>" class="delete" onclick="return confirm_del();">Delete</a></td>
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
                        url: "<?php echo base_url(); ?>admin/news/update_video_new_state", // Url to which the request is send
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

                function changeGroupNews(_this){
                    var cat_id = jQuery(_this).val();
                    
                    jQuery.ajax({
                        url: "<?php echo base_url(); ?>admin/news/load_video_news_by_category", // Url to which the request is send
                        type: "POST", // Type of request to be send, called as method
                        data: {cat_id:cat_id}, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                        success: function(data) // A function to be called if request succeeds
                        {
                            /*jQuery("table tbody tr").remove();
                            jQuery("table tbody").html(data);*/
                            window.location.href = "/admin/news/video_index/" + data;
                        }
                    });
                }
                </script>
                <?php echo $pagination_link; ?>
            </div>
            <!--content-->
        </div>
        <!--maincontentinner-->