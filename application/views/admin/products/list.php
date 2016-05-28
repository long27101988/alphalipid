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
                    <button class="addbutton radius3" title="table2" onclick="location.href='<?php echo base_url(); ?>admin/products/add';">Add</button> &nbsp;
                    <button class="deletebutton radius3" title="table2">Delete Selected</button> &nbsp;
                    <!-- <button class="updatebutton radius3" name="updatebutton" title="table2">Update Position</button> -->
                    </div><!--tableoptions-->
                    <table cellpadding="0" cellspacing="0" border="0" id="table2" class="stdtable stdtablecb">
                        <thead>
                            <tr>
                                <th class="head0"><input type="checkbox" class="checkall" /></th>
                                <th class="head0">Tên sản phẩm</th>
                                <th class="head0">Hình ảnh</th>
                                <th class="head0">Mô tả</th>
                                <!-- <th class="head0">Thành phần</th>
                                <th class="head0">Hướng dẫn</th> -->
                                <th class="head0">Giá</th>
                                <th class="head0">Vị trí</th>
                                <th class="head0">Trạng thái</th>
                                <th class="head0">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>    
                            <?php if(!empty($all_products )){
                            foreach ($all_products as $item){ ?>
                            	<tr>
                                    <td class="center"><input type="checkbox" /></td>
                                    <td align="center"><?php echo $item['name']; ?></td>
                                    <td align="center"><img src="<?php echo base_url(); ?>/uploads/<?php echo $item['url']; ?>" alt="" width="100px"></td>
                                    <td align="left"><?php echo $this->function->the_excerpt(strip_tags($item['desc']),200).'...'; ?></td>
                                    <!-- <td align="left"><?php echo $this->function->the_excerpt(strip_tags($item['components']),200).'...'; ?></td>
                                    <td align="left"><?php echo $this->function->the_excerpt(strip_tags($item['manual']),200).'...'; ?></td> -->
                                    <td align="left"><?php echo $item['price']; ?></td>
                                    <td align="center"><?php echo $item['position']; ?></td>
                                    <td align="center"><a href="#" class='statebutton state-<?php echo $item['state']==1?"show":"hide"?>' id="<?php echo $item['id']; ?>" onclick="changState(this);" state="<?php echo $item['state']; ?>"></a></td>
                                    <td class="center"><a href="<?php echo base_url(); ?>admin/products/edit/<?php echo $item['id']; ?>" class="edit">Edit</a> - <a href="<?php echo base_url(); ?>admin/products/del/<?php echo $item['id']; ?>" class="delete" onclick="return confirm_del();">Delete</a></td>
                                </tr>
                            <?php  }
                            }else{
                                echo "<tr>";
                                    echo "<td colspan='10' align='center'>EMPTY DATA !!!</td>";
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
                            url: "<?php echo base_url(); ?>admin/products/update_state", // Url to which the request is send
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
                    </script>
                </div>
                <!--content-->
            </div>
            <!--maincontentinner-->