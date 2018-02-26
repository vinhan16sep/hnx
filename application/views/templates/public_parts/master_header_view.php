<!doctype html>
<html><!-- InstanceBegin template="/Templates/temp.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="resource-type" content="document" />

    <meta name="description" content="<?php echo (isset($meta['description']))? $meta['description'] : 'mam non,tuoi than tien ,mam non ha noi,mam non ha dong,mam non tuoi than tien,mam non chuan quoc gia,mam non chat luong cao,mamnon,mamnontuoithantien,mamnontuoithantienhanoi,mamnonhadong' ?>" />

    <meta name="keywords" content="mam non,tuoi than tien ,mam non ha noi,mam non ha dong,mam non tuoi than tien,mam non chuan quoc gia,mam non chat luong cao,mamnon,mamnontuoithantien,mamnontuoithantienhanoi,mamnonhadong" />

    <meta name='revisit-after' content='1 days' />
    <meta name="robots" content="index,follow" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- InstanceBeginEditable name="doctitle" -->
    <title>Hanoi Xua Restaurant</title>

    <!-- CSS -->

    <link href="<?php echo site_url('assets/public/lib/css/bootstrap.css')?>" rel="stylesheet" />
    <link href="<?php echo site_url('assets/public/lib/revolution/css/settings.css')?>" rel="stylesheet" />
    <link href="<?php echo site_url('assets/public/lib/revolution/css/layers.css')?>" rel="stylesheet" />
    <link href="<?php echo site_url('assets/public/lib/revolution/css/navigation.css')?>" rel="stylesheet" />

    <link href="<?php echo site_url('assets/public/lib/css/font-awesome.css')?>" rel="stylesheet" />
    <link href="<?php echo site_url('assets/public/lib/css/animate.css')?>" rel="stylesheet" />
    <link href="<?php echo site_url('assets/public/lib/css/jquery-ui.css')?>" rel="stylesheet" />
    <link href="<?php echo site_url('assets/public/lib/css/owl.css')?>" rel="stylesheet" />
    <link href="<?php echo site_url('assets/public/lib/css/ionicons.css')?>" rel="stylesheet" />
    <link href="<?php echo site_url('assets/public/lib/css/elegend-icons-style.css')?>" rel="stylesheet" />
    <link href="<?php echo site_url('assets/public/lib/css/jquery.fancybox.css')?>" rel="stylesheet" />

    <link href="<?php echo site_url('assets/public/css/style.css')?>" rel="stylesheet" />
    <link href="<?php echo site_url('assets/public/css/responsive.css')?>" rel="stylesheet" />

    <!--Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Patua+One" rel="stylesheet">

</head>

<body>

<div class="page-wrapper">
    <div class="preloader"></div>

    <header class="main-header">
        <div class="header-upper">
            <div class="auto-container">
                <div class="inner-container clearfix">
                    <div class="logo-outer">
                        <div class="logo">
                            <a href="<?php echo base_url('homepage') ?>">
                                <img src="<?php echo site_url('assets/public/img/logo.png')?>" alt="" />
                            </a>
                        </div>
                    </div>
                    <div class="upper-right clearfix">
                        <div class="nav-outer clearfix">
                            <nav class="main-menu">
                                <div class="navbar-header">
                                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                </div>

                                <div class="navbar-collapse collapse clearfix">
                                    <ul class="navigation clearfix">
                                        <li class="<?php echo ($current_link == 'homepage') ? 'current' : '' ; ?>">
                                            <a href="<?php echo base_url('homepage') ?>"><?php echo $this->lang->line('homepage') ?></a>
                                        </li>
                                        <li class="<?php echo ($current_link == 'about')? 'current' : '' ; ?>">
                                            <a href="<?php echo base_url('about') ?>"><?php echo $this->lang->line('about_us') ?></a>
                                        </li>
                                        <!-- <li>
                                            <a href="<?php echo base_url('reservation') ?>"><?php echo $this->lang->line('reservation') ?></a>
                                        </li> -->
                                        <li class="<?php echo ($current_link == 'menu')? 'current' : '' ; ?>">
                                            <a href="<?php echo base_url('menu') ?>"><?php echo $this->lang->line('menu') ?></a>
                                        </li>
                                        <li class="<?php echo ($current_link == 'list_information')? 'current' : '' ; ?>">
                                            <a href="<?php echo base_url('blog/list_information') ?>"><?php echo $this->lang->line('blog') ?></a>
                                        </li>
                                        <li class="<?php echo ($current_link == 'contact')? 'current' : '' ; ?>"><a href="<?php echo base_url('contact') ?>"><?php echo $this->lang->line('contact') ?></a></li>
                                    </ul>
                                </div>
                            </nav>
                            <div class="more-options">
                                <?php
                                    $url_en = '';
                                    $url_hu = '';
                                    switch($current_link){
                                        case 'list_information':
                                            $url_en = base_url() . 'en/' . 'blog/list_information';
                                            $url_hu = base_url() . 'hu/' . 'blog/list_information';
                                            break;
                                        case 'list_medicine':
                                            $url_en = base_url() . 'en/' . 'blog/list_medicine';
                                            $url_hu = base_url() . 'hu/' . 'blog/list_medicine';
                                            break;
                                        case 'blog_detail':
                                            $url_en = base_url() . 'en/' . 'blog/detail/' . $slug;
                                            $url_hu = base_url() . 'hu/' . 'blog/detail/' . $slug;
                                            break;
                                        case 'about':
                                            $url_en = base_url() . 'en/' . 'about';
                                            $url_hu = base_url() . 'hu/' . 'about';
                                            break;
                                        case 'menu':
                                            $url_en = base_url() . 'en/' . 'menu';
                                            $url_hu = base_url() . 'hu/' . 'menu';
                                            break;
                                        case 'store_2':
                                            $url_en = base_url() . 'en/' . 'menu/store_2';
                                            $url_hu = base_url() . 'hu/' . 'menu/store_2';
                                            break;
                                        case 'contact':
                                        $url_en = base_url() . 'en/' . 'contact';
                                        $url_hu = base_url() . 'hu/' . 'contact';
                                            break;
                                        default:
                                            $url_en = base_url() . 'en';
                                            $url_hu = base_url() . 'hu';
                                            break;
                                    }
                                ?>

                                <ul class="social-icon-one">
                                    <li>
                                        <a href="http://facebook.com/hanoixuarestaurant" target="_blank">
                                            <span class="fa fa-facebook-square"></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="http://instagram.com/hanoixuarestaurant" target="_blank">
                                            <span class="fa fa-instagram"></span>
                                        </a>
                                    </li>
                                    <li> | </li>
                                    <li class="current"><a href="<?php echo $url_en; ?>">En</a></li>
                                    <li><a href="<?php echo $url_hu; ?>">Hu</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="sticky-header">
            <div class="auto-container clearfix">
                <div class="logo pull-left">
                    <a href="<?php echo base_url('homepage') ?>" class="img-responsive" title="Tali">
                        <img src="<?php echo site_url('assets/public/img/logo-small.png')?>" alt="Tali" title="Tali" />
                    </a>
                </div>
                <div class="right-col pull-right">
                    <nav class="main-menu">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="navbar-collapse collapse clearfix">
                            <ul class="navigation clearfix">
                                <li class="current">
                                    <a href="<?php echo base_url('homepage') ?>"><?php echo $this->lang->line('homepage') ?></a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('about') ?>"><?php echo $this->lang->line('about_us') ?></a>
                                </li>
                                <!-- <li>
                                    <a href="<?php echo base_url('reservation') ?>"><?php echo $this->lang->line('reservation') ?></a>
                                    <ul>
                                        <li><a href="./reservation.html">Reservation</a></li>
                                        <li><a href="./reservation-standard.html">Reservation Standard</a></li>
                                    </ul>
                                </li> -->
                                <li>
                                    <a href="<?php echo base_url('menu') ?>"><?php echo $this->lang->line('menu') ?></a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('blog/list_information') ?>"><?php echo $this->lang->line('blog') ?></a>
                                </li>
                                <li><a href="<?php echo base_url('contact') ?>"><?php echo $this->lang->line('contact') ?></a></li>
                            </ul>

                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>

