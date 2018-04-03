<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="content-wrapper" style="min-height: 916px;">
    <section class="content row">
        <div class="container col-md-12">
            <?php if ($this->session->flashdata('message')): ?>
                <div class="alert alert-warning alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i> Alert!</h4>
                    <span><?php echo $this->session->flashdata('message'); ?></span>
                </div>
            <?php endif ?>

            <div class="row">
                <form action="<?php echo base_url('admin/menu/index/') ?>" class="form-horizontal col-md-12 col-sm-12 col-xs-12" method="get" style="margin-bottom: 30px;">

                    <input type="text" name="search" value="<?php echo $keywords ?>" placeholder="search..." class="form-control" style=" width: 40%; float: left;margin-right: 5px;">
                    <?php
                    echo form_dropdown('search_store', set_value('store', array('' => 'Select one store', 1 => 'Hànội Xưa Nagyvárad tér', 2 => 'Hànội Xưa Kálvin'), true), $store, 'class="form-control" style=" width: 40%; float: left;margin-right: 5px;"')
                    ?>
                    <input type="submit" name="btn-search" value="Search" class="btn btn-primary" style="float: left">
                </form>
            </div>

            <div >
                <a type="button" href="<?php echo site_url('admin/menu/create'); ?>" class="btn btn-primary">ADD NEW</a>
            </div>
            <div >
                <div style="margin-top: 10px;">
                    <?php if ($menu): ?>
                        <table class="table table-hover table-bordered table-condensed">
                            <tr>
                                <td><b><a href="#">Image</a></b></td>
                                <td><b><a href="#">Name</a></b></td>
                                <td><b><a href="#">Price</a></b></td>
                                <td><b><a href="#">Type</a></b></td>
                                <td><b><a href="#">Special</a></b></td>
                                <td style="width: 20%"><b><a href="#">Store</a></b></td>
                                <td><b>Operations</b></td>
                            </tr>
                            <?php foreach ($menu as $key => $value): ?>
                                <tr>
                                    <td><img src="<?php echo base_url('assets/upload/menu/'.$value['slug_en'].'/'.$value['data']['image']) ?>"></td>
                                    <td><?php echo $value['data']['menu_name'] ?></td>
                                    <td><?php echo $value['data']['price'] ?> $</td>
                                    <td><?php echo  ($value['data']['type'] == 0)? 'Food' : 'Drink' ?></td>
                                    <?php if ($value['data']['status'] == 1): ?>
                                        <td><button class="btn btn-success btn-is-active" data-id="<?php echo $value['id'] ?>"  title="Unspecialized"><i class="fa fa-check" aria-hidden="true"></i></button></td>
                                    <?php else: ?>
                                        <td><button class="btn btn-danger btn-not-active" data-id="<?php echo $value['id'] ?>"  title="Special"><i class="fa fa-times" aria-hidden="true"></i></button></td>
                                    <?php endif ?>
                                    <td>
                                        <?php
                                        echo form_dropdown('store', set_value('store', array(1 => 'Hànội Xưa Nagyvárad tér', 2 => 'Hànội Xưa Kálvin', 3 => 'Both Stores (Mindkét üzlet)'), false),$value['data']['store'], 'class="form-control store_update" data-id="'.$value['id'].'"') 
                                        ?>
                                    </td>
                                    <td>
                                        <a href="<?php echo base_url('admin/menu/edit/'.$value['id']) ?>" title="Edit" class="btn-edit" data-id="<?php echo $value['id'] ?>" >
                                            <i class="fa fa-edit" aria-hidden="true"></i>
                                        </a>
                                        &nbsp&nbsp&nbsp&nbsp
                                        <a href="<?php echo base_url('admin/menu/remove') ?>" title="Remove" class="btn-remove" data-id="<?php echo $value['id'] ?>" data-slug="<?php echo $value['slug_en'] ?>">
                                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    <?php else: ?>
                        <table class="table table-hover table-bordered table-condensed">
                            <tr>
                                Không có dịch vụ tồn tại
                            </tr>
                        </table>
                    <?php endif; ?>
                    <div class="col-md-6 col-md-offset-5 page">
                        <?php echo $page_links ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script type="text/javascript">
    /**
 *
 * not active banner
 *
 */
var base_url = location.protocol + "//" + location.host + (location.port ? ':' + location.port : '');
$('.btn-not-active').click(function(){
    var btn_check = $(this);
    var id = $(this).attr('data-id');
    if(confirm('Active special?')){
        jQuery.ajax({
            method: "get",
            url: base_url + '/hnx/admin/menu/special',
            // url: location.protocol + "//" + location.host + (location.port ? ':' + location.port : '') + "/tuoithantien/comment/create_comment",
            data: {id : id},
            success: function(result){
                if(JSON.parse(result).isExists == false){
                    alert('false');
                }else{
                    window.location.reload();
                }
            }
        });
    };
});
/* end not active banner */

/**
 *
 * active banner
 *
 */
$('.btn-is-active').click(function(){
    var btn_check = $(this);
    var id = $(this).attr('data-id');
    if(confirm('Unspecialized?')){
        jQuery.ajax({
            method: "get",
            url: base_url + '/hnx/admin/menu/unspecialized',
            // url: location.protocol + "//" + location.host + (location.port ? ':' + location.port : '') + "/tuoithantien/comment/create_comment",
            data: {id : id},
            success: function(result){
                if(JSON.parse(result).isExists == false){
                    alert('false');
                }else{
                    window.location.reload();
                }
            }
        });
    };
    
});

$('.store_update').change(function(){
    var id = $(this).attr('data-id');
    var store = $(this).val();
    if(confirm('Change?')){
        jQuery.ajax({
            method: "get",
            url: base_url + '/hnx/admin/menu/update_store',
            // url: location.protocol + "//" + location.host + (location.port ? ':' + location.port : '') + "/tuoithantien/comment/create_comment",
            data: {id : id, store:store},
            success: function(result){
                if(JSON.parse(result).isExists == true){
                    alert('success!');
                }else{
                    alert('false!');
                }
            }
        });
    };
})
/* end active banner */
</script>
