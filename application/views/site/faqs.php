<div class="faqs-inner">
    <section class="box-search">
        <form action="" method="post">
            <div>
                <input type="text" name="search" value="" placeholder="Search...">
                <button name="search_faq" type="submit">Search</button>
            </div> 
        </form>
    </section>
    <h1>Những câu hỏi thường gặp</h1>
    <section class="container clearfix">
        <div class="faqs-top">
            <ul class="faqs-qa">
                <?php
                    $i = 0;
                    foreach ($all_faqs as $item) {
                    $i++;
                ?>
                    <li>
                        <a href="#" class="faqs-a">
                            <p class="number"><?php echo $i; ?></p>
                            <?php echo $item['question'] ?>
                            <span><img src="img/down.png" height="8" width="13" alt=""/></span>
                        </a>
                        <div class="faqs-q">
                            <p class="dap">ĐÁP</p>
                            <?php echo $item['answer'] ?>
                            <a href="#"><img src="img/up.png" alt=""></a>
                        </div>
                    </li>
                <?php } ?>
            </ul>
        </div>
        <?php echo $pagination_link; ?>
        <div class="faqs-bottom">
            <h2 class="faqs-title">GỬI CÂU HỎI</h2>
            <?php echo validation_errors(); ?>
            <form action="" method="post">
                <div class="clearfix">
                    <p>
                       <input type="text" name="txtName" value="" required placeholder="Họ tên *"> 
                    </p>
                    <p>
                       <input type="text" name="txtPhone" value="" required placeholder="Điện thoai *" class="last"> 
                    </p>
                </div>
                <div class="clearfix">
                    <p>
                        <input type="text" name="txtEmail" value="" required placeholder="Email *">
                    </p>
                    <p>
                        <input type="text" name="txtAddress" value="" required placeholder="Địa chỉ *">
                    </p>
                    
                </div>
                <div>
                    <textarea name="txtQuestion" required placeholder="Gửi câu hỏi *"></textarea>
                </div>
                <div>
                    <button name="send_question" type="submit">GỬI CÂU HỎI</button>
                </div>
            </form>
        </div>
    </section>
</div>