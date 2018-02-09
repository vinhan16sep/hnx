
<section class="page-title" style="background-image:url(<?php echo site_url('assets/public/img/background/blogs.jpg')?>);">
    <div class="auto-container">
        <div class="title">Read our</div>
        <h2>Blog</h2> </div>
</section>
<section class="blog-page-section">
    <div class="auto-container">
        <div class="row clearfix">

            <?php for($i = 0; $i < 6; $i++){ ?>
            <div class="news-block col-md-4 col-sm-6 col-xs-12">
                <div class="inner-box">
                    <div class="image">
                        <a href="<?php echo base_url('blogs/detail') ?>"><img src="<?php echo site_url('assets/public/img/background/news-1.jpg')?>" alt="" /></a>
                    </div>
                    <div class="lower-box">
                        <h3><a href="<?php echo base_url('blogs/detail') ?>">Magic Happen</a></h3>
                        <div class="post-date">Jan 10, 2017 / Recipes / by Andrea</div>
                        <div class="text">Aenean sollicitudin, lorem quis bibendum auctor elit consequat ipsum, nec sagittis sem nibh id elit. Duised odio siamet nibh vulputate cursus amet mauris. </div><a href="./blog-classic.html" class="read-more">Read More <span class="arrow ion-ios-arrow-thin-right"></span></a> </div>
                </div>
            </div>
            <?php } ?>

        </div>
        <div class="styled-pagination text-center">
            <ul class="clearfix">
                <li><a class="active" href="#">1</a></li>
                <li><a href="#">2</a></li>
            </ul>
            <div class="pages">Page 1 of 2</div>
        </div>
    </div>
</section>