<div class="page-content">
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2><?php echo $current_section ?></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a href="<?php echo site_url('admin/page') ?>" class="btn btn-success"><?php echo $this->lang->line('common_back') ?></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="content">
                    <div id="required_fields_message"><?php echo $this->lang->line('common_fields_required_message'); ?></div>
                    <ul id="page_error_message_box" class="error_message_box"></ul>
                    <!-- Session Flash Message!-->
                    <?php echo $template['partials']['flash_messages'] ?>
                    <?php $action = $this->uri->segment(4) ? 'admin/page/add/' . $this->uri->segment(4) : 'admin/page/add' ?>
                    <?php echo form_open($action, array('id' => 'pageForm', 'enctype' => 'multipart/form-data', 'class' => 'form-horizontal')); ?>
                    <div class="form-group">
                        <?php echo form_label($this->lang->line('common_title'), 'title', array('class' => 'col-sm-2 control-label required')); ?>
                        <div class="col-sm-6">
                            <?php echo form_input(array('name' => 'title', 'id' => 'title', 'class' => 'form-control input-sm required', 'value' => isset($title) ? $title : '')) ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <?php echo form_label($this->lang->line('common_image'), 'image', array('class' => 'col-sm-2 control-label')); ?>
                        <div class="col-sm-6">
                            <div class="fileinput <?php echo isset($image) ? 'fileinput-exists' : 'fileinput-new'; ?>" data-provides="fileinput">
                                <div class="fileinput-new thumbnail" style="width: 95px; height: 75px;"></div>
                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 95px; max-height: 75px;">
                                    <img data-src="holder.js/100%x100%" alt="<?php echo $this->lang->line('common_image'); ?>"
                                         src="<?php
                                         if (!isset($image))
                                             echo '';
                                         else
                                             echo UPLOAD_PATH . 'page/' . $image;
                                         ?>"
                                         style="max-height: 100%; max-width: 100%;">
                                </div>
                                <div>
                                    <span class="btn btn-default btn-sm btn-file">
                                        <span class="fileinput-new"><?php echo $this->lang->line("config_company_select_image"); ?></span>
                                        <span class="fileinput-exists"><?php echo $this->lang->line("config_company_change_image"); ?></span>
                                        <input type="file" name="image">
                                    </span>
                                    <a href="#" class="btn btn-default btn-sm fileinput-exists" data-dismiss="fileinput"><?php echo $this->lang->line("config_company_remove_image"); ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <?php echo form_label($this->lang->line('common_description'), 'content', array('class' => 'col-sm-2 control-label')) ?>
                        <div class="col-sm-6">
                            <?php echo form_textarea(array('name' => 'content', 'rows' => 3, 'id' => 'desc', 'class' => 'form-control input-sm required'), isset($content) ? $content : '') ?>
                        </div>
                    </div>  

                    <div class="form-group">
                        <?php echo form_label($this->lang->line('common_publish') . '?', 'is_published', array('class' => 'col-sm-2 radio control-label')); ?>
                        <div class="col-sm-6">
                            <?php echo form_checkbox(array('name' => 'is_published', 'value' => '1', 'class' => 'radio control-label', 'checked' => isset($is_published) ? $is_published : '')) ?>
                        </div>
                    </div>
                    <hr/>
                    <div class="form-group">
                        <?php echo form_label($this->lang->line('common_meta_key'), 'meta_keys', array('class' => 'col-sm-2 control-label')) ?>
                        <div class="col-sm-6">
                            <?php echo form_input(array('name' => 'meta_keys', 'id' => 'meta_desc', 'class' => 'form-control input-sm', 'value' => isset($meta_keys) ? $meta_keys : '')) ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <?php echo form_label($this->lang->line('common_meta_desc'), 'meta_keys', array('class' => 'col-sm-2 control-label')) ?>
                        <div class="col-sm-6">
                            <?php echo form_textarea(array('name' => 'meta_desc', 'rows' => 3, 'id' => 'meta_desc', 'class' => 'form-control input-sm'), isset($meta_desc) ? ($meta_desc) : '') ?>
                        </div>
                    </div>  
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <?php echo form_submit(array('name' => 'submit_form', 'id' => 'submit_form', 'value' => $this->lang->line('common_submit'), 'class' => 'btn btn-primary btn-sm')) ?>
                        </div>
                    </div>
                    <?php echo form_close(); ?>  
                </div>
            </div>
        </div>
    </div>
</div>
<script type='text/javascript'>
//validation and submit handling
    $(document).ready(function()
    {
        $("a.fileinput-exists").click(function() {
            $.ajax({
                type: "POST",
                url: "<?php echo site_url("admin/page/deleteimage"); ?>",
                dataType: "json",
                data: {
                    id:<?php echo isset($id) ? $id : '0' ?>,
                    image: '<?php echo isset($image) ? $image : '0' ?>'
                }
            });
        });
        $('#pageForm').validate({
            errorClass: "has-error",
            errorLabelContainer: "#page_error_message_box",
            wrapper: "li",
            highlight: function(e) {
                $(e).closest('.form-group').addClass('has-error');
            },
            unhighlight: function(e) {
                $(e).closest('.form-group').removeClass('has-error');
            },
            rules:
                    {
                        title: "required",
                        content:"required"
                    },
            messages:
                    {
                        title: "Page Title is required field",
                        content:"Page Description is required field"
                    }
        });
    });
</script>