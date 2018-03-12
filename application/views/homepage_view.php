

<section class="page-title" style="background-image:url(<?php echo site_url('assets/public/img/background/homepage.jpg')?>);">
    <div class="auto-container">
        <div class="title"><?php echo $this->lang->line('discover_our') ?></div>
        <h2>Hanoi Xua</h2>
        <div class="title"><?php echo $this->lang->line('restaurant') ?></div>
    </div>
</section>

<section class="title-section">
    <div class="auto-container">
        <div class="sec-title centered">
            <h2><?php echo $this->lang->line('unique_story') ?> <br /><?php echo $this->lang->line('since') ?> 2016</h2> </div>
        <div class="content">
            <div class="text">
                <?php echo $this->lang->line('alen_remsi') ?>
            </div>
            <div class="signature">Alen Remsi</div>
        </div>
    </div>
</section>
<section class="gallery-section">
    <div class="outer-container">
        <div class="row clearfix">
            <div class="column col-md-8 col-sm-8 col-xs-12">
                <div class="gallery-block">
                    <div class="inner-box">
                        <div class="image">
                        	<?php if ($menu_last['image']): ?>
                        		<img src="<?php echo site_url('assets/upload/menu/'.$menu_last['slug'].'/'.$menu_last['image'])?>" alt="" />
                        	<?php else: ?>
                        		<img src="<?php echo site_url('assets/public/img/gallery/1.jpg') ?>" alt="" />
                        	<?php endif ?>
                            <a href="./shop-single.html" class="overlay-layer"></a>
                            <div class="content">
                                <div class="text"><a href="./shop-single.html"><?php echo $menu_last['name'] ?></a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="column col-md-4 col-sm-4 col-xs-12">
            	<?php foreach ($menu_image_icon as $key => $value): ?>
	                <div class="gallery-block">
	                    <div class="inner-box">
	                        <div class="image">
	                        	<?php if ($value['image']): ?>
	                        		<img src="<?php echo site_url('assets/upload/menu/'.$value['slug'].'/'.$value['image'])?>" alt="" />
	                        	<?php else: ?>
                        			<img src="<?php echo site_url('assets/public/img/gallery/1.jpg') ?>" alt="" />
	                        	<?php endif ?>
	                        	
	                            <a href="./shop-single.html" class="overlay-layer"></a>
	                            <div class="content">
	                                <div class="text"><a href="./shop-single.html"><?php echo $value['name'] ?></a></div>
	                            </div>
	                        </div>
	                    </div>
	                </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>
</section>

<section class="menu-section">
    <div class="auto-container">
        <div class="sec-title centered">
            <div class="title"><?php echo $this->lang->line('always_delicious') ?></div>
            <h2><?php echo $this->lang->line('main_menu') ?></h2> </div>
        <div class="row clearfix">
        	<?php foreach ($main_menu as $key => $value): ?>
	            <div class="menu-block col-md-4 col-sm-6 col-xs-12">
	                <div class="inner-box">
	                    <div class="info clearfix">
	                        <div class="pull-left">
	                            <h3><a href="javascript:void(0);"><?php echo $value['name'] ?></a></h3> </div>
	                        <div class="pull-right">
	                            <div class="price">$<?php echo $value['price'] ?></div>
	                        </div>
	                    </div>
	                    <div class="text"><?php echo $value['description'] ?></div>
	                </div>
	            </div>
	        <?php endforeach ?>
        </div>
    </div>
</section>

<!--

HIDE THIS SECTION

<section class="call-to-action" style="background-image:url('<?php echo site_url('assets/public/img/background/2.jpg')?>');">
    <div class="auto-container">
        <h2><?php echo $this->lang->line('enjoy_together') ?></h2>
    </div>
</section>
-->

<!--

HIDE THIS SECTION

<section class="reservation-section">
    <div class="auto-container">
         <div class="sec-title centered">
            <div class="title">Magical Experience</div>
            <h2>Reservation</h2> </div>
        <div class="reserve-form">
            <form method="post" action="contact.html" />
            <div class="row clearfix">
                <div class="column col-md-4 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label class="icon_calendar"></label>
                        <select class="custom-select-box">
                            <option />15/10/2017
                            <option />16/10/2017
                            <option />17/10/2017
                            <option />18/10/2017
                            <option />19/10/2017
                            <option />20/10/2017 </select>
                    </div>
                </div>
                <div class="column col-md-4 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label class="ion-ios-clock-outline"></label>
                        <select class="custom-select-box">
                            <option />5:00 PM
                            <option />6:00 PM
                            <option />7:00 PM
                            <option />8:00 PM
                            <option />9:00 PM
                            <option />10:00 PM </select>
                    </div>
                </div>
                <div class="column col-md-4 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label class="ion-android-person"></label>
                        <select class="custom-select-box">
                            <option />1 Guests
                            <option />2 Guests
                            <option />3 Guests
                            <option />4 Guests
                            <option />5 Guests
                            <option />6 Guests </select>
                    </div>
                </div>
                <div class="column text-center col-md-12 col-sm-12 col-xs-12">
                    <button class="theme-btn btn-style-one">Find A Table</button>
                </div>
            </div>
            </form>
        </div>
    </div>
</section>
-->

<section class="testimonial-section" style="background-image:url('<?php echo site_url('assets/public/img/background/3.jpg')?>');">
    <div class="auto-container">
        <h2><?php echo $this->lang->line('enjoy_together') ?></h2>

        <div class="single-item-carousel owl-carousel owl-theme">
            <div class="testimonial-block">
                <div class="inner-box">
                    <div class="text">“An experience at the heart of the New York, that give you all the magic that you can imagin. Curab euismod elit ipsum, eu pellen tesque turpis commodo sit amet. Aliquam lacinia, felis ege.”</div>
                    <div class="author">Michelin Magazine</div>
                </div>
            </div>
            <div class="testimonial-block">
                <div class="inner-box">
                    <div class="text">“An experience at the heart of the New York, that give you all the magic that you can imagin. Curab euismod elit ipsum, eu pellen tesque turpis commodo sit amet. Aliquam lacinia, felis ege.”</div>
                    <div class="author">Michelin Magazine</div>
                </div>
            </div>
            <div class="testimonial-block">
                <div class="inner-box">
                    <div class="text">“An experience at the heart of the New York, that give you all the magic that you can imagin. Curab euismod elit ipsum, eu pellen tesque turpis commodo sit amet. Aliquam lacinia, felis ege.”</div>
                    <div class="author">Michelin Magazine</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--
<section class="information-section">
    <div class="auto-container">

        <div class="row clearfix">
            <h2><?php echo $this->lang->line('useful_information') ?></h2>
            <div class="info-column col-md-6 col-sm-12 col-xs-12">
                <h3>Hànội Xưa Nagyvárad tér</h3>
                <div class="text">
                    +36 1 314 6736
                    <br />Budapest, Ernő u. 30-34., 1096 Hungary
                </div>

                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d86288.88107307177!2d19.0154827!3d47.4796357!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4741dce4f118fd69%3A0xadecd2e5acb4066!2zSMOgbuG7mWkgWMawYSBWaWV0bmFtZXNlIFJlc3RhdXJhbnQ!5e0!3m2!1sen!2s!4v1519399262391" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
            <div class="info-column col-md-6 col-sm-12 col-xs-12">
                <h3>Hànội Xưa Kálvin</h3>
                <div class="text">
                    +36 30 364 3699
                    <br />Budapest, Üllői út 2-4, 1085 Hungary
                </div>

                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2696.0333856969473!2d19.06063441562648!3d47.489262979177084!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4741dc5afeef106d%3A0x8363c708108d48b8!2zSMOgbuG7mWkgWMawYSBLw6Fsdmlu!5e0!3m2!1sen!2s!4v1519404395848" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
        </div>
    </div>
</section>
-->