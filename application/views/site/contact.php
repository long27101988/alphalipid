<div class="contact container">
    <section id="contact-form">
        <div class="contact-form-in">
        </div>
        <form action="" method="">
            <h1>THÔNG TIN CỦA BẠN</h1>
            <?php echo validation_errors(); ?>
            <div class="form-in">
                <input type="text" name="txtName" value="" required placeholder="Họ tên *">
                <br/>
                <input type="text" name="txtEmail" value="" required placeholder="Email *">
                <br/>
                <input type="text" name="txtPhone" value="" placeholder="Điện thoại">
                <br/>
                <input type="text" name="txtAddress" value="" placeholder="Địa chỉ">
                <br/>
                <textarea name="txtContent" required placeholder="Lời nhắn *"></textarea>
                <br/>
                <input type="submit" name="" value="Gửi">
                <br/>
            </div>
        </form>
    </section>
</div>