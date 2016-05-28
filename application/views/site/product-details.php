<div class="product-details-inner">
    <section class="product-details-s1">
        <div class="container">
            <h1 class="product-title"><?php echo $product['name']; ?></h1>
            <div class="product-into clearfix">
                <div class="product-desc">
                    <?php echo $product['desc']; ?>
                </div>
                <div class="product-img">
                    <div class="product-img-inner">
                        <div class="item">
                            <img src="<?php echo base_url(); ?>/uploads/<?php echo $product['url']; ?>" alt="<?php echo $product['name']; ?>">
                        </div>
                    </div>
                </div>
            </div>
            <div class="product-components">
                <h2 class="title">Thành phần dinh dưỡng</h2>
                <?php echo $product['components']; ?>
            </div>
            <div class="product-manual">
                <h2 class="title">Hướng dẫn</h2>
                <?php echo $product['manual']; ?>
            </div>
        </div>
    </section>
</div>