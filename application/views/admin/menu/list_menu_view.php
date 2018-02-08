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

                    <input type="text" name="search" value="" placeholder="search..." class="form-control" style=" width: 40%; float: left;margin-right: 5px;">
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
                                <td><b>Operations</b></td>
                            </tr>
                            <?php foreach ($menu as $key => $value): ?>
                                <tr>
                                    <td><img src="<?php echo base_url('assets/upload/menu/'.$value['slug_en'].'/'.$value['data']['image']) ?>"></td>
                                    <td><?php echo $value['data']['menu_name'] ?></td>
                                    <td><?php echo $value['data']['price'] ?> $</td>
                                    <td><?php echo  ($value['data']['type'] == 0)? 'Food' : 'Drink' ?></td>
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
                        <!-- <?php echo $page_links ?> -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
