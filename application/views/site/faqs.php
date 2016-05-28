<div class="faqs-inner">
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
        <div class="faqs-bottom">
            <h2 class="faqs-title">GỬI CÂU HỎI</h2>
            <form action="" method="">
                <div class="clearfix">
                    <p>
                       <input type="text" name="txtName" value="" placeholder="Họ tên *"> 
                    </p>
                    <p>
                       <input type="text" name="txtPhone" value="" placeholder="Điện thoai *" class="last"> 
                    </p>
                </div>
                <div class="clearfix">
                    <p>
                        <input type="text" name="txtEmail" value="" placeholder="Email *">
                    </p>
                    <p>
                        <input type="text" name="txtAddress" value="" placeholder="Địa chỉ *">
                    </p>
                    
                </div>
                <div>
                    <textarea name="txtQuestion" placeholder="Gửi câu hỏi *"></textarea>
                </div>
                <div class="submit">
                    <button type="button">GỬI CÂU HỎI</button>
                </div>
            </form>
        </div>
    </section>
</div>