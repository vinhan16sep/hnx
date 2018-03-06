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

                    </div>

                    <div class="lang-hun col-md-12">
                        <div class="form-group">
                            <?php
                            echo form_label('Type', 'type');
                            echo form_error('type');
                            echo form_dropdown('type', set_value('type', array(0 => 'Food (Élelmiszer)', 1 => 'Drink (Ital)'), false), 0, 'class="form-control"');
                            ?>
                        </div>
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