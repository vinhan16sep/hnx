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
                <form action="<?php echo base_url('admin/category/index/') ?>" class="form-horizontal col-md-12 col-sm-12 col-xs-12" method="get" style="margin-bottom: 30px;">

                    <input type="text" name="search" value="" placeholder="search..." class="form-control" style=" width: 40%; float: left;margin-right: 5px;">
                    <input type="submit" name="btn-search" value="Search" class="btn btn-primary" style="float: left">
                </form>
            </div>

            <div >
                <a type="button" href="<?php echo site_url('admin/category/create'); ?>" class="btn btn-primary">ADD NEW</a>
            </div>
            <div >
                <div style="margin-top: 10px;">
                    <?php if ($category): ?>
                        <table class="table table-hover table-bordered table-condensed">
                            <tr>
                                <td width="70%"><b><a href="#">Name</a></b></td>
                                <td width="30%"><b>Operations</b></td>
                            </tr>
                            <?php foreach ($category as $key => $value): ?>
                                <tr>
                                    <td><?php echo $value['data']['category_name'] ?></td>
                                    <td>
                                        <a href="<?php echo base_url('admin/category/edit/'.$value['id']) ?>" title="Edit" class="btn-edit" data-id="<?php echo $value['id'] ?>" >
                                            <i class="fa fa-edit" aria-hidden="true"></i>
                                        </a>
                                        &nbsp&nbsp&nbsp&nbsp
                                        <a href="<?php echo base_url('admin/category/remove') ?>" title="Remove" class="btn-remove" data-id="<?php echo $value['id'] ?>" >
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
