
<section class="page-title" style="background-image:url(<?php echo site_url('assets/public/img/background/6.jpg')?>);">
    <!--<div class="auto-container">
        <div class="title">Read our blog</div>
        <h2>MAGIC HAPPEN</h2>
    </div>-->
</section>
<section class="blog-page-section">
    <div class="auto-container">

        <div class="container">
            <div class="inner-box">
                <div class="lower-box">
                    <h1><?php echo $blog['blog_title'] ?></h1>
                    <div class="post-date"><?php echo $blog['created_at'] ?></div>

                    <div class="text">
                        <article>
                            <?php echo $blog['blog_content'] ?>
                        </article>
                    </div>

                </div>
            </div>
        </div>

        <div class="row clearfix">

        </div>
    </div>
</section>