
<section class="page-title" style="background-image:url(<?php echo site_url('assets/public/img/background/contact.jpg')?>);">
    <div class="auto-container">
        <div class="title">Get in Touch</div>
        <h2>Contact</h2> </div>
</section>
<section class="contact-page-section">
    <div id="encypted_ppbtn" style="display: none;">
        <div class="beforeSend_bg" style="display: block; width: 100%; height: 100%; position: fixed; top: 0; left: 0; z-index: 999; background-color: rgba(0,0,0,0.65); color: #fff; padding-top: 300px; text-align: center;">
            <i class="fa fa-3x fa-spinner fa-spin" aria-hidden="true"></i>
        </div>
        <!-- <div class="modal fade" role="dialog" style="display: block; opacity: .5; background-color: rgba(0,0,0,.65);">
            <div class="modal-dialog" style="color:#fff; text-align:center; padding-top:300px;">
                <i class="fa fa-2x fa-spinner fa-spin" aria-hidden="true"></i>
            </div>
        </div> -->
    </div>
    <div class="outer-container clearfix">
        <div class="map-column">
            <div class="map-outer">
                <div class="map-canvas" data-zoom="12" data-lat="-37.817085" data-lng="144.955631" data-type="roadmap" data-hue="#ffc400" data-title="Envato" data-icon-path="<?php echo site_url('assets/public/img/icons/map-marker.png')?>" data-content="Melbourne VIC 3000, Australia<br><a href='mailto:info@youremail.com'>info@youremail.com</a>"> </div>
            </div>
        </div>
        <div class="form-column">
            <div class="inner-column">
                <h2>Get In touch</h2>
                <div class="contact-form alternate">
                    <?php
                        echo form_open_multipart('', array('class' => 'form-group'));

                            echo form_label('Email Address*', 'email');
                            echo form_error('email', 'class="email_error');
                            echo '<span class="email_error" style="color: red"></span>';
                            echo form_input('email', set_value('email'), 'class="form-group email"');
                            

                            echo form_label('Name*', 'name');
                            echo form_error('name');
                            echo '<span class="name_error" style="color: red"></span>';
                            echo form_input('name', set_value('name'), 'class="form-group name"');
                            

                            echo form_label('Your Message*', 'message');
                            echo form_error('message');
                            echo form_textarea('message', set_value('message'), 'class="form-group message"');

                            echo form_button('button', 'SEND MESSAGE', 'class="theme-btn btn-style-two" id="btn-contact"');
                    echo form_close();
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="telephone-reserve">
    <div class="auto-container">
        <h3>Telephone Reservation</h3>
        <div class="text">Please Call 765-879-1077</div>
    </div>
</section>



<script type="text/javascript" src="<?php echo base_url('assets/public/js/jquery-3.2.1.js'); ?>"></script>
<script type="text/javascript">
        var base_url = location.protocol + "//" + location.host + (location.port ? ':' + location.port : '');
        var html = '<div class="modal fade" id="myModal" role="dialog">'
                        + '<div class="modal-dialog" style="color:#fff; text-align:center; padding-top:300px;">'
                        + '<i class="fa fa-2x fa-spinner fa-spin" aria-hidden="true"></li>'
                        + '</div>'
                        + '</div>';
        $('#btn-contact').click(function(){
            var email = $('.email').val();
            var name = $('.name').val();
            var message = $('.message').val();
            if(name.length == 0){
            $('.name_error').text('Họ và Tên không được trống!');
            }else{
                $('.name_error').text('');
            }

            if(email.length == 0){
                $('.email_error').text('Email không được trống!');
            }
            if(name.length != 0 && email.length){
                jQuery.ajax({
                    method: "get",
                    url: base_url + "/hnx/contact/create",
                    // url: location.protocol + "//" + location.host + (location.port ? ':' + location.port : '') + "/tuoithantien/comment/create_comment",
                    data: {email : email, name : name, message : message},
                    beforeSend: function() {
                        $("#encypted_ppbtn").show();
                    },
                    success: function(result){
                        $("#encypted_ppbtn").css('display','none');
                        var check = JSON.parse(result).message;
                        if(check == 'Success'){
                            alert('Gửi email thành công');
                        }else{
                            alert('Gửi email thất bại');
                        }
                        
                    }
                });
            }
            
        })
    
</script>