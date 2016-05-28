<div class="business container">
    <section class="clearfix">
        <div class="business-text">
            <?php foreach ($all_business as $item) { ?>
                <div class="business-item">
                    <p><span>Tỉnh: </span><?php echo $item['province']; ?></p>
                    <p><span>Người liên hệ :</span><?php echo $item['contact_name']; ?></p>
                    <p><span>Email: </span> <?php echo $item['email']; ?></p>
                    <p><span>Số điện thoại: </span> <?php echo $item['phone']; ?></p>
                </div>
            <?php } ?>
        </div>
        <!-- news-text -->
        <div class="business-video">
            <?php foreach ($video_business as $item) { ?>
                <div class="item-clip clearfix">
                    <div class="clip">
                        <a href="https://www.youtube.com/embed/<?php echo $item['video_url']; ?>" class="fancybox-video fancybox.iframe">
                            <div class="ovlay">
                                <img src="<?php echo base_url(); ?>public/site/img/icon-play-gl.png" alt="<?php echo $item['title']; ?>">
                            </div>
                            <img class="img-responsive" src="http://img.youtube.com/vi/<?php echo $item['video_url']; ?>/0.jpg" alt="<?php echo $item['title']; ?>">
                        </a>
                    </div>
                    <div class="title-clip"><a href="<?php echo $item['video_url']; ?>"><?php echo $item['title']; ?></a></div>
                </div>
            <?php } ?>
        </div>
        <!-- news-video -->
    </section>
</div>