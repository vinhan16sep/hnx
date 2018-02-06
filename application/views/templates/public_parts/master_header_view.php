<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!doctype html>
<html><!-- InstanceBegin template="/Templates/temp.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- InstanceBeginEditable name="doctitle" -->
    <title>Hanoi Xua</title>
    <!-- InstanceEndEditable -->
    <link rel="shortcut icon" type="image/png" href="<?php echo site_url('assets/public/img/favicon16.png'); ?>"/>

    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:900" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/public/css/bootstrap.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/public/css/font-awesome.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/public/css/hover.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/public/style.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/public/css/responsive.css'); ?>">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="<?php echo site_url('assets/public/js/bootstrap.js'); ?>"></script>
</head>

<body>
<header class="header">
    <section class="navigator_top brand_bg">
        <div class="container center-block">
            <ul class="col-lg-11">
                <!--<li><a href="#">Tuyển dụng</a></li>
                <li>|</li>
                <li><a href="#">Khỏe từ thiên nhiên</a></li>
                <li>|</li>
                <li><a href="#">Điều khoản sử dụng</a></li>
                <li>|</li>
                <li><a href="#">Liên hệ</a></li>
                <li>|</li>
                <li><a href="#"><i class="fa fa-envelope"></i> Email</a></li>-->
            </ul>
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
                        $url_en = base_url() . 'en/' . 'blog/detail/' . $type . '/' . $blog_id;
                        $url_hu = base_url() . 'hu/' . 'blog/detail/' . $type . '/' . $blog_id;
                        break;
                    default:
                        $url_en = base_url() . 'en';
                        $url_hu = base_url() . 'hu';
                        break;
                }
            ?>
            <ul class="col-lg-12">
                <li><a href="<?php echo $url_en; ?>"><img src="<?php echo base_url('assets/public/img/en.png'); ?>" alt=""></a></li>
                <li>|</li>
                <li><a href="<?php echo $url_hu; ?>"><img src="<?php echo base_url('assets/public/img/hu.png'); ?>" alt=""></a></li>
            </ul>
        </div>
    </section>
</header>