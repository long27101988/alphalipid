<div class="products-inner">
    <section class="products-s2">
        <h2>Sản phẩm Alpha Lipid</h2>
        <p>Những sản phẩm <strong>Alpha Lipid</strong> được sản xuất từ nguồn sữa tươi chất lượng hàng đầu thế giới đến từ Ireland, được nghiên cứu và phát triển dựa trên nhu cầu dinh dưỡng đặc thù cho sự phát triển toàn diện của trẻ em Việt Nam ở từng độ tuổi khác nhau.</p>
        <div class="container clearfix">
            <?php foreach ($all_products as $item) { ?>
                <div class="item">
                    <a class="hvr-float-shadow" href="<?php echo base_url(); ?>site/products/get_product_by_id/<?php echo $item['id']; ?>" title="<?php echo $item['name']; ?>"><img src="<?php echo base_url(); ?>/uploads/<?php echo $item['url']; ?>" alt="<?php echo $item['name']; ?>"></a>
                    <h2><a href="<?php echo base_url(); ?>site/products/get_product_by_id/<?php echo $item['id']; ?>"><?php echo $item['name']; ?></a></h2>
                    <span></span>
                </div>
            <?php } ?>
        </div>
    </section>
</div>