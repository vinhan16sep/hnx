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
                <a type="button" href="<?php echo site_url('admin/blog/create'); ?>" class="btn btn-primary">ADD BLOG</a>
                <a type="button" onclick="delete_all('<?php echo base_url('admin/blog/delete_multiple') ?>');" class="btn btn-danger">DELETE ALL SELECTED ITEMS</a>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <form action="<?php echo base_url('admin/blog/index/') ?>" class="form-horizontal col-md-12 col-sm-12 col-xs-12" method="get" style="margin-bottom: 30px;">
                        <label>Tìm kiếm</label>
                        <div class="input-group">
                            <?php
                            echo form_error('keywords');
                            echo form_input('keywords', set_value('keywords', $keywords), 'class="form-control"');
                            echo '<div class="input-group-btn">';

                            echo '<button class="btn btn-primary" type="submit" name="search" value="search">Search!</button>';
                            echo '</div>';
                            ?>

                        </div>
                    </form>
                </div>
            </div>
            <?php echo form_open_multipart(); ?>
            <div class="row">
                <div class="col-md-12">
                    <?php
                    echo '<table class="table table-hover table-bordered table-condensed">';
                    echo '<tr>';
                    echo '<td><input type="checkbox" class="check-all" id="check-all" /></td>';
                    echo '<td><b><a href="#">Image</a></b></td>';
                    echo '<td><b><a href="#">Title</a></b></td>';
                    echo '<td><b>Operations</b></td>';
                    echo '</tr>';
                    if (!empty($blogs)) {
                        foreach ($blogs as $item):
                            echo '<tr>';
                                echo '<td><input type="checkbox" id="' . $item['id'] . '" class="checkbox" name="checkbox[' . $item['id'] . ']" /></td>';
                                echo '<td><img src="'.base_url('assets/upload/blog/'.$item['data']['description_image']).'" style="width: 150px;"></td>';
                                echo '<td>' . str_replace('|||', ' | ', $item['data']['blog_title']) . '</td>';
                                echo '<td>';
                                echo '<a href="' . base_url('admin/blog/edit/' . $item['id']) . '">';
                                echo '<span class="glyphicon glyphicon-pencil"></span>';
                                echo '</a>';
                                echo '<a href="javascript:void(0);" onclick="deleteItem(' . $item['id'] . ')">';
                                echo '<span class="glyphicon glyphicon-remove"></span>';
                                echo '</a>';
                                echo '</td>';
                            echo '</tr>';
                        endforeach;
                    }else {
                        echo '<tr class="odd"><td colspan="9">No records</td></tr>';
                    }
                    echo '</table>';
                    ?>
                    <div class="col-md-6 col-md-offset-5 page">
                        <?php echo $page_links ?>
                    </div>
                </div>
            </div>
            <?php echo form_close(); ?>
        </div>
    </section>
</div>
<script>
    function deleteItem(id){
        if(confirm('Chắc chắn xoá?')){
            var url = '<?php echo base_url('admin/blog/delete'); ?>';

            $.ajax({
                url: url,
                method: 'get',
                dataType: 'json',
                data: {
                    id: id
                },
                success: function(res){
                    console.log(res);
                    if(res.message == 'Success'){
                        alert('Xoá thành công');
                        location.reload();
                    }else{
                        alert('Xoá thất bại');
                    }
                },
                error: function(){

                }
            });
        }
    }
</script>
