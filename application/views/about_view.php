<section class="page-title" style="background-image:url(<?php echo site_url('assets/public/img/background/about.jpg')?>);">
    <div class="auto-container">
        <div class="title"><?php echo $this->lang->line('welcome') ?></div>
        <h2><?php echo $this->lang->line('story') ?></h2> </div>
</section>
<section class="table-section">
    <div class="auto-container">
        <div class="row clearfix">
            <div class="image-column col-md-6 col-sm-12 col-xs-12">
                <div class="row clearfix">
                    <div class="column col-md-6 col-sm-6 col-xs-6">
                        <div class="image"> <img src="<?php echo site_url('assets/public/img/resource/table-1.jpg')?>" alt="" /> </div>
                    </div>
                    <div class="column col-md-6 col-sm-6 col-xs-6">
                        <div class="image"> <img src="<?php echo site_url('assets/public/img/resource/table-2.jpg')?>" alt="" /> </div>
                    </div>
                </div>
            </div>
            <div class="content-column col-md-6 col-sm-12 col-xs-12">
                <div class="sec-title centered">
                    <div class="title"><?php echo $this->lang->line('always_delicious') ?></div>
                    <h2><?php echo $this->lang->line('get_the_best') ?></h2> </div>
                <div class="text">
                    <?php echo $this->lang->line('get_the_best_text') ?>
                </div>
                <div class="text-center"> <a href="#" class="theme-btn btn-style-four"><?php echo $this->lang->line('find_a_table') ?></a> </div>
            </div>
        </div>
    </div>
</section>
<section class="carousel-section">
    <div class="auto-container">
        <div class="single-item-carousel owl-theme owl-carousel">
            <div class="slide"> <img src="<?php echo site_url('assets/public/img/resource/slide-2.jpg')?>" alt="" /> </div>
            <div class="slide"> <img src="<?php echo site_url('assets/public/img/resource/slide-2.jpg')?>" alt="" /> </div>
            <div class="slide"> <img src="<?php echo site_url('assets/public/img/resource/slide-2.jpg')?>" alt="" /> </div>
        </div>
    </div>
</section>
<section class="unique-section">
    <div class="auto-container">
        <div class="row clearfix">
            <div class="column col-md-3 col-sm-6 col-xs-12">
                <h2><?php echo $this->lang->line('unique') ?></h2> </div>
            <div class="column col-md-6 col-sm-12 col-xs-12">
                <div class="text">
                    <?php echo $this->lang->line('unique_text') ?>
                </div>
            </div>
            <div class="column col-md-3 col-sm-6 col-xs-12">
                <h3><?php echo $this->lang->line('facts') ?></h3>
                <div class="fact-text">17 months of surveying
                    <br />120 days of construction</div>
            </div>
        </div>
    </div>
</section>
<section class="place-section" style="background-image:url('<?php echo site_url('assets/public/img/background/7.jpg')?>');">
    <div class="auto-container">
        <div class="row clearfix">
            <div class="column col-md-6 col-sm-12 col-xs-12"></div>
            <div class="content-column col-md-6 col-sm-12 col-xs-12">
                <div class="content-inner">
                    <h2><?php echo $this->lang->line('the_place') ?></h2>
                    <div class="text">
                        <?php echo $this->lang->line('the_place_text') ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="team-section">
    <div class="auto-container">
        <div class="sec-title centered">
            <div class="title"><?php echo $this->lang->line('magical_experience') ?></div>
            <h2><?php echo $this->lang->line('the_team') ?></h2> </div>
        <div class="row clearfix">
            <?php if ($abouts): ?>
            <?php foreach ($abouts as $key => $value): ?>
                <div class="team-block col-md-4 col-sm-6 col-xs-12">
                    <div class="inner-box">
                        <div class="image">
                            <a href="#"><img src="<?php echo site_url('assets/upload/about/'.$value['image'])?>" alt="" /></a>
                        </div>
                        <div class="lower-content">
                            <h3><a href=""><?php echo $value['name'] ?></a></h3>
                            <div class="designation"><?php echo $value['position'] ?></div>
                            <div class="text">"<?php echo $value['description'] ?>"</div>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
            <?php endif ?>
        </div>
    </div>
</section>