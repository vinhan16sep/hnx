
<section class="page-title" style="background-image:url(<?php echo site_url('assets/public/img/background/contact.jpg')?>);">
    <div class="auto-container">
        <div class="title"><?php echo $this->lang->line('get_in_touch') ?></div>
        <h2><?php echo $this->lang->line('contact') ?></h2> </div>
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
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d86288.88107307177!2d19.0154827!3d47.4796357!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4741dce4f118fd69%3A0xadecd2e5acb4066!2zSMOgbuG7mWkgWMawYSBWaWV0bmFtZXNlIFJlc3RhdXJhbnQ!5e0!3m2!1sen!2s!4v1519405213351" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2696.0333856969473!2d19.06063441562648!3d47.489262979177084!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4741dc5afeef106d%3A0x8363c708108d48b8!2zSMOgbuG7mWkgWMawYSBLw6Fsdmlu!5e0!3m2!1sen!2s!4v1519405252585" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
        </div>
        <div class="form-column">
            <div class="inner-column">
                <h2><?php echo $this->lang->line('get_in_touch') ?></h2>
                <div class="contact-form alternate">
                    <?php
                        echo form_open_multipart('', array('class' => 'form-group'));

                            echo form_label($this->lang->line('email_address').'*', 'email');
                            echo form_error('email', 'class="email_error');
                            echo '<span class="email_error" style="color: red"></span>';
                            echo form_input('email', set_value('email'), 'class="form-group email"');
                            

                            echo form_label($this->lang->line('name').'*', 'name');
                            echo form_error('name');
                            echo '<span class="name_error" style="color: red"></span>';
                            echo form_input('name', set_value('name'), 'class="form-group name"');
                            

                            echo form_label($this->lang->line('your_message').'*', 'message');
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

<!--
HIDE THIS SECTION

<section class="telephone-reserve">
    <div class="auto-container">
        <h3><?php echo $this->lang->line('telephone_reservation') ?></h3>
        <div class="text"><?php echo $this->lang->line('please_call') ?> 765-879-1077</div>
    </div>
</section>
-->


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