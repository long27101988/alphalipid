<div class="intro container">
    <section class="clearfix">
        <div class="intro-text">
            <?php echo $intro['content']; ?>
        </div>
        <!-- news-text -->
        <div class="intro-video">
            <?php foreach ($video_intro as $item) { ?>
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