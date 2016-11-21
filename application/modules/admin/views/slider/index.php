<div class="page-content">
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2><?php echo $current_section ?></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a href="<?php echo site_url('admin/slider/add') ?>" class="btn btn-success"><?php echo $this->lang->line('common_add_new') . ' ' . $this->lang->line('common_slider') ?></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="content">
                    <?php echo $template['partials']['flash_messages'] ?>
                    <div class="pull-right">
                        <?php echo form_open('admin/slider', array('class' => 'form-inline')); ?>
                        <div class="form-group">
                            <input type="text" class="form-control" id="slider_title" name="slider_title" placeholder="<?php isset($slider_title) ? print $slider_title : print $this->lang->line('common_title') ?>">
                        </div>
                        <button type="submit" name="submit_form" class="btn btn-primary"><?php echo $this->lang->line('common_search') ?></button>
                        <?php echo form_close() ?>
                    </div>
                    <div class="content bulk_action input">
                        <table class="table table-striped responsive-utilities jambo_table bulk_action">
                            <thead>
                                <tr class="headings">
                                    <th><input type="checkbox" id="check-all" class="flat"></th>
                                    <th class="column-title"><?php echo $this->lang->line('common_title') ?></th>
                                    <th class="column-title"><?php echo $this->lang->line('common_image') ?></th>
                                    <th class="column-title"><?php echo $this->lang->line('common_description') ?></th>
                                    <th class="column-title"><?php echo $this->lang->line('common_created_at') ?></th>
                                    <th class="column-title no-link last text-center"><span class="nobr"><?php echo $this->lang->line('common_action') ?></span></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($slider)): ?>
                                    <?php $count = 1; //debugPrint($slider) ?>
                                    <?php foreach ($slider as $slide): ?> 
                                        <tr class="pointer <?php $count % 2 == 0 ? print'even' : print'odd' ?>">
                                            <td class="a-center "><input type="checkbox" class="flat" name="id" value="<?php echo $slide->id; ?>"></td>
                                            <td class=""><?php isset($slide->title) ? print $slide->title : '' ?></td>
                                            <td class="thumbnail" style="max-width: 50px; max-height: 40px;">
                                                <img src="<?php isset($slide->image) ? print UPLOAD_PATH . 'slider/' . $slide->image : print UPLOAD_PATH . 'no_image.jpg'; ?>"/>
                                            </td>
                                            <td class=""><?php echo substr(strip_tags($slide->content), 0, 30) ?></td>
                                            <td class=""><?php echo date('F j, Y H:i:a', strtotime($slide->created_at)) ?></td>
                                            <td class="last">
                                                <ul class="nav navbar-nav navbar-right">
                                                    <li class="">
                                                        <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                            <?php echo $this->lang->line('common_action') ?><span class=" fa fa-angle-down"></span>
                                                        </a>
                                                        <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                                                            <li><a href="<?php echo site_url('admin/slider/add/' . $slide->id) ?>"><?php echo $this->lang->line('common_edit') ?></a></li>
                                                            <li><a href="<?php echo site_url('admin/slider/view/' . $slide->id) ?>"><?php echo $this->lang->line('common_view') ?></a></li>
                                                            <li><a href="<?php echo site_url('admin/slider/delete/' . $slide->id) ?>"><?php echo $this->lang->line('common_delete') ?></a></li>
                                                            <?php if (isset($slide->is_published) && $slide->is_published == 1): ?>
                                                                <li><a href="<?php echo site_url('admin/slider/unpublish/' . $slide->id) ?>"><?php echo $this->lang->line('common_unpublish') ?></a></li>
                                                            <?php else: ?>
                                                                <li><a href="<?php echo site_url('admin/slider/publish/' . $slide->id) ?>"><?php echo $this->lang->line('common_publish') ?></a></li>
                                                            <?php endif; ?>
                                                            <?php if (isset($slide->is_featured) && $slide->is_featured == 1): ?>
                                                                <li><a  href="<?php echo site_url('admin/slider/unfeature/' . $slide->id) ?>"><?php echo $this->lang->line('common_unfeatured') ?></a></li>
                                                            <?php else: ?>
                                                                <li><a  href="<?php echo site_url('admin/slider/feature/' . $slide->id) ?>"><?php echo $this->lang->line('common_featured') ?></a></li>
                                                            <?php endif; ?>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <?php $count++; ?>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                                <tr>
                                    <td colspan="6"><?php echo $this->lang->line('common_not_found') ?></td>
                                </tr>
                            </tbody>
                        </table>
                        <?php if (isset($pagination)): ?>
                            <ul class="pagination pagination-sm">
                                <?php echo $pagination; ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>