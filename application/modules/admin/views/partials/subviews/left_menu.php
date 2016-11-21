<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="clearfix"></div>
        <div class="profile">
            <a href="<?php echo site_url('admin')?>">
            <div class="profile_pic">
                <img src="<?php echo UPLOAD_PATH . $this->config->item('company_logo') ?>" alt="<?php echo $this->config->item('company') ?>" class="img-circle profile_img">
            </div>
            </a>
        </div>
        <div class="clearfix"></div>
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <ul class="nav side-menu">
                    <li><a href="<?php echo site_url('admin'); ?>"><i class="fa fa-dashboard"></i><?php echo $this->lang->line('common_dahsboard') ?></a></li>
                    <li><a href="<?php echo site_url('admin/config'); ?>"><i class="fa fa-wrench"></i><?php echo $this->lang->line('setting_menu') ?></a></li>
                    <li><a href="<?php echo site_url('admin/slider') ?>"><i class="fa fa-desktop"></i><?php echo $this->lang->line('config_homepage_slider') ?></a> </li>
                    <li><a href="<?php echo site_url('admin/showcase') ?>"><i class="fa fa-desktop"></i><?php echo $this->lang->line('config_gallery') ?></a></li>
                    <li><a href="<?php echo site_url('admin/inbox') ?>"> <i class="fa fa-envelope-o"></i><?php echo $this->lang->line('config_inbox') ?></a></li>
                    <li><a><i class="fa fa-desktop"></i><?php echo $this->lang->line('common_cms') ?><span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu" style="display: none">
                            <!--<li>
                                <a href="<?php echo site_url('admin/post') ?>"><?php echo $this->lang->line('common_post') ?></a>
                                <ul class="nav child_menu">
                                    <li><a href="<?php echo site_url('admin/category') ?>"><?php echo $this->lang->line('common_category') ?></a></li>
                                </ul>
                            </li>-->
                            <li><a href="<?php echo site_url('admin/page') ?>"><?php echo $this->lang->line('common_page') ?></a></li>
                            <!--<li><a href="<?php echo site_url('admin') ?>"><?php echo $this->lang->line('commom_menu') ?></a></li>-->
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <!-- sidebar menu -->
    </div>
</div>