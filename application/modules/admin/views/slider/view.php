<div class="page-content">
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2><?php echo $current_section ?></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a href="<?php echo site_url('admin/slider') ?>" class="btn  btn-success"><?php echo $this->lang->line('common_slider')?></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="content">
                    <div class="content bulk_action input">
                        <table class="table table-striped responsive-utilities jambo_table bulk_action">
                            <tbody>
                                <tr>
                                    <td><?php echo $this->lang->line('common_title') ?></td>
                                    <td><?php isset($title) ? print $title : print'' ?></td>
                                </tr>
                                <tr>
                                    <td><?php echo $this->lang->line('common_image') ?></td>
                                    <td><img src="<?php isset($image) ? print UPLOAD_PATH . 'slider/' . $image : '' ?>"/></td>
                                </tr>
                                <tr>
                                    <td><?php echo $this->lang->line('common_description') ?></td>
                                    <td><?php isset($content) ? print strip_tags($content) : print'' ?></td>
                                </tr>
                                <tr>
                                    <td><?php echo $this->lang->line('common_publish') ?></td>
                                    <td><?php isset($is_published) && $is_published == 1 ? print $this->lang->line('common_yes') : print $this->lang->line('common_no') ?></td>
                                </tr>
                                <tr>
                                    <td><?php echo $this->lang->line('common_featured') ?></td>
                                    <td><?php isset($is_featured) && $is_featured == 1 ? print $this->lang->line('common_yes') : print $this->lang->line('common_no') ?></td>
                                </tr>
                            </tbody>
                        </table>
                        <a href="<?php echo site_url('admin/slider') ?>" class="btn  btn-success"><?php echo $this->lang->line('common_back') ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>