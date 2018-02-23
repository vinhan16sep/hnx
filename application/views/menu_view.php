
<section class="page-title" style="background-image:url(<?php echo site_url('assets/public/img/background/menu.jpg')?>);">
    <div class="auto-container">
        <div class="title"><?php echo $this->lang->line('discover_our') ?></div>
        <h2><?php echo $this->lang->line('menu') ?></h2> </div>
</section>
<section class="menu-section">

    <div class="auto-container">

        <div class="sec-title centered">
            <h2><?php echo $this->lang->line('menu') ?></h2>
            <ul class="list-inline">
                <li>
                    <a href="#">Hànội Xưa Nagyvárad tér</a>
                </li>
                <li> | </li>
                <li>
                    <a href="#">Hànội Xưa Kálvin</a>
                </li>
            </ul>
        </div>

        <div class="sec-title centered">
            <div class="title"><?php echo $this->lang->line('always_delicious') ?></div>
            <h2><?php echo $this->lang->line('main_menu') ?></h2>
        </div>
        <div class="row clearfix">
            <div class="container-fluid">
                <h3 style="padding: 15px; background: #902d2e; color: #fff; margin-bottom: 30px;">Phan loai do an</h3>
            </div>
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
            <div class="title"><?php echo $this->lang->line('exceptional') ?></div>
            <h2><?php echo $this->lang->line('cocktail_card') ?></h2> </div>
        <div class="row clearfix">
            <div class="container-fluid">
                <h3 style="padding: 15px; background: #fff; color: #902d2e; margin-bottom: 30px;">Phan loai do an</h3>
            </div>
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
            <div class="title"><?php echo $this->lang->line('chefs_selection') ?></div>
            <h2><?php echo $this->lang->line('today’s_special') ?></h2> </div>
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