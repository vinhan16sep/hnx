<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="content-wrapper" style="min-height: 916px;">
    <section class="row">
        <div class="container col-md-12">
            <div class="modified-mode">
                <div class="col-lg-10 col-lg-offset-0 row" style="margin-left: 15px;">
                    <h1>ADD</h1>
                    <?php
                    echo form_open_multipart('', array('class' => 'form-horizontal'));
                    ?>
                    
                    <div class="lang-eng col-md-6">
                        <div class="form-group"><b class="btn btn-success">English</b></div>
                        <div class="form-group">
                            <?php
                            echo form_label('Name', 'name-en');
                            echo form_error('name-en');
                            echo form_input('name-en', set_value('name-en'), 'class="form-control" id="title-en"');
                            ?>
                        </div>

                        <div class="form-group">
                            <?php
                            echo form_label('Slug', 'slug-en');
                            echo form_error('slug-en');
                            echo form_input('slug-en', set_value('slug-en'), 'class="form-control" id="slug-en" readonly');
                            ?>
                        </div>

                        <div class="form-group">
                            <?php
                            echo form_label('Description', 'description-en');
                            echo form_error('description-en');
                            echo form_textarea('description-en', set_value('description-en', '', false), 'class="form-control"');
                            ?>
                        </div>
                    </div>
                    <div class="lang-hun col-md-6">
                        <div class="form-group"><b class="btn btn-success">Hungary</b></div>
                        <div class="form-group">
                            <?php
                            echo form_label('Név', 'name-hu');
                            echo form_error('name-hu');
                            echo form_input('name-hu', set_value('name-hu'), 'class="form-control" id="title-hu"');
                            ?>
                        </div>

                        <div class="form-group">
                            <?php
                            echo form_label('Meztelen csiga', 'slug-hu');
                            echo form_error('slug-hu');
                            echo form_input('slug-hu', set_value('slug-hu'), 'class="form-control" id="slug-hu" readonly');
                            ?>
                        </div>

                        <div class="form-group">
                            <?php
                            echo form_label('Leírás', 'description-hu');
                            echo form_error('description-hu');
                            echo form_textarea('description-hu', set_value('description-hu', '', false), 'class="form-control"');
                            ?>
                        </div>
                    </div>

                    <div class="form-group col-md-12 picture">
                        <?php
                        echo form_label('Image (Kép)', 'image');
                        echo form_error('image');
                        echo form_upload('image_list[]','','multiple');
                        ?>
                    </div>

                    <div class="form-group col-md-12">
                        <?php
                        echo form_label('Price (Ár)', 'price');
                        echo form_error('price');
                        echo form_input('price', set_value('price', '', false), 'class="form-control" rows="5" ')
                        ?>
                    </div>

                    <div class="form-group col-md-12">
                        <?php
                        echo form_label('Type', 'type');
                        echo form_error('type');
                        echo form_dropdown('type', set_value('type', array(0 => 'Food (Élelmiszer)', 1 => 'Drink (Ital)'), false), 0, 'class="form-control"')
                        ?>
                    </div>
                    <br>
                    <div class="form-group col-sm-12 text-right">
                        <input type="hidden" name="url" value="<?php echo $this->uri->segment(4); ?>">
                        <?php
                        echo form_submit('submit', 'OK', 'class="btn btn-primary"');
                        echo form_close();
                        ?>
                        <a class="btn btn-default cancel" href="javascript:window.history.go(-1);">Go back</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script type="text/javascript" src="<?php echo site_url('tinymce/tinymce.min.js'); ?>"></script>
<script>
    tinymce.init({
        selector: ".content",
        theme: "modern",
        height: 200,
        relative_urls: false,
        remove_script_host: false,
        plugins: [
            "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
            "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
            "save table contextmenu directionality emoticons template paste textcolor responsivefilemanager"
        ],
        content_css: "css/content.css",
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | responsivefilemanager | print preview media fullpage | forecolor backcolor emoticons",
        style_formats: [
            {title: "Bold text", inline: "b"},
            {title: "Red text", inline: "span", styles: {color: "#ff0000"}},
            {title: "Red header", block: "h1", styles: {color: "#ff0000"}},
            {title: "Example 1", inline: "span", classes: "example1"},
            {title: "Example 2", inline: "span", classes: "example2"},
            {title: "Table styles"},
            {title: "Table row 1", selector: "tr", classes: "tablerow1"}
        ],
        external_filemanager_path: "<?php echo site_url('filemanager/'); ?>",
        filemanager_title: "Responsive Filemanager",
        external_plugins: {"filemanager": "<?php echo site_url('filemanager/plugin.min.js'); ?>"}
    });

    $('.btn-eng').click(function(){
        $('.lang-eng').slideToggle();
    });
</script>