
<section class="page-title" style="background-image:url(<?php echo site_url('assets/public/img/background/menu.jpg')?>);">
    <div class="auto-container">
        <div class="title">Discover Our</div>
        <h2>Menu</h2> </div>
</section>
<section class="menu-section">
    <div class="auto-container">
        <div class="sec-title centered">
            <div class="title">Always Delicious</div>
            <h2>Main Menu</h2> </div>
        <div class="row clearfix">
            <?php if ($main_menu): ?>
            <?php foreach ($main_menu as $key => $value): ?>
                <div class="menu-block col-md-4 col-sm-6 col-xs-12">
                    <div class="inner-box">
                        <div class="info clearfix">
                            <div class="pull-left">
                                <h3><a href=""><?php echo $value['name'] ?></a></h3> </div>
                            <div class="pull-right">
                                <div class="price">$<?php echo $value['price'] ?></div>
                            </div>
                        </div>
                        <div class="text"><?php echo $value['description'] ?></div>
                    </div>
                </div>
            <?php endforeach ?>
            <?php endif ?>
        </div>
    </div>
</section>
<section class="menu-section style-two" style="background-image:url(<?php echo site_url('assets/public/img/background/8.jpg')?>);">
    <div class="auto-container">
        <div class="sec-title light centered">
            <div class="title">Exceptional</div>
            <h2>Cocktail Card</h2> </div>
        <div class="row clearfix">
            <?php if ($cocktail_card): ?>
            <?php foreach ($cocktail_card as $key => $value): ?>
                <div class="menu-block col-md-4 col-sm-6 col-xs-12">
                    <div class="inner-box">
                        <div class="info clearfix">
                            <div class="pull-left">
                                <h3><a href=""><?php echo $value['name'] ?></a></h3> </div>
                            <div class="pull-right">
                                <div class="price">$<?php echo $value['price'] ?></div>
                            </div>
                        </div>
                        <div class="text"><?php echo $value['description'] ?></div>
                    </div>
                </div>
            <?php endforeach ?>
            <?php endif ?>
        </div>
    </div>
</section>
<section class="special-section">
    <div class="auto-container">
        <div class="sec-title centered">
            <div class="title">Chefs Selection</div>
            <h2>Today’s Special</h2> </div>
        <div class="row clearfix">
            <?php if ($special): ?>
            <?php foreach ($special as $key => $value): ?>
                <div class="special-block col-md-4 col-sm-6 col-xs-12">
                    <div class="inner-box">
                        <div class="image">
                            <a href="#"><img src="<?php echo site_url('assets/upload/menu/'.$value['folder'].'/'.$value['image'])?>" alt="" /></a>
                        </div>
                        <div class="lower-box">
                            <div class="info clearfix">
                                <div class="pull-left">
                                    <h3><a href="#"><?php echo $value['name'] ?></a></h3> </div>
                                <div class="pull-right">
                                    <div class="price">$<?php echo $value['price'] ?></div>
                                </div>
                            </div>
                            <div class="text"><?php echo $value['description'] ?></div>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
            <?php endif ?>
        </div>
    </div>
</section>