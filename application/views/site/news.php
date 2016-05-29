<div class="news container">
    <section class="box-search">
        <form action="" method="post">
            <div>
                <input type="text" name="search" value="" placeholder="Search...">
                <button type="submit">Search</button>
            </div> 
        </form>
    </section>
    <section class="clearfix">
        <div class="news-text">
            <?php foreach($news as $item){?>
            <div class="new-text clearfix">
                <div class="new-img">
                    <a href="<?=base_url('chi-tiet-tin-tuc')?>/<?=$item['slug']?>"><img src="<?php echo base_url(); ?>/uploads/<?php echo $item['url']; ?>" alt="<?php echo $item['title']; ?>"></a>
                </div>
                <div class="new-desc">
                    <h2><a href="<?=base_url('chi-tiet-tin-tuc')?>/<?=$item['slug']?>"><?php echo $item['title']; ?></a></h2>
                    <p><?php echo $this->function->the_excerpt(strip_tags($item['content']),200).'
                            ...'; ?></p>
                    <a href="<?=base_url('chi-tiet-tin-tuc')?>/<?=$item['slug']?>">Xem thêm <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                </div>
            </div>
            <?php } ?>
            <?php echo $pagination_link; ?>
        </div>
        <!-- news-text -->
        <div class="news-video">
            <?php foreach ($video_news as $item) { ?>
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