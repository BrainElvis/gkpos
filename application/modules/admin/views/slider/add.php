<div class="page-content">
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2><?php echo $current_section ?></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a href="<?php echo site_url('admin/slider') ?>" class="btn btn-success"><?php echo $this->lang->line('common_back') ?></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="content">
                    <div id="required_fields_message"><?php echo $this->lang->line('common_fields_required_message'); ?></div>
                    <ul id="award_slider_error_message_box" class="error_message_box"></ul>
                    <!-- Session Flash Message!-->
                    <?php echo $template['partials']['flash_messages'] ?>
                    <?php $action = $this->uri->segment(4) ? 'admin/slider/add/' . $this->uri->segment(4) : 'admin/slider/add' ?>
                    <?php echo form_open($action, array('id' => 'sliderForm', 'enctype' => 'multipart/form-data', 'class' => 'form-horizontal')); ?>
                    <div class="form-group">
                        <?php echo form_label($this->lang->line('common_title'), 'title', array('class' => 'col-sm-2 control-label required')); ?>
                        <div class="col-sm-6">
                            <?php echo form_input(array('name' => 'title', 'id' => 'title', 'class' => 'form-control input-sm required', 'value' => isset($title) ? $title : '')) ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <?php echo form_label($this->lang->line('common_image'), 'image', array('class' => 'col-sm-2 control-label required')); ?>
                        <div class="col-sm-6">
                            <div class="fileinput <?php echo isset($image) ? 'fileinput-exists' : 'fileinput-new'; ?>" data-provides="fileinput">
                                <div class="fileinput-new thumbnail" style="min-width: 200px"></div>
                                <div class="fileinput-preview fileinput-exists thumbnail" style="min-width: 200px">
                                    <img data-src="holder.js/100%x100%" alt="<?php echo $this->lang->line('config_award_category_image'); ?>"
                                         src="<?php
                                         if (!isset($image))
                                             echo '';
                                         else
                                             echo UPLOAD_PATH . 'slider/' . $image;
                                         ?>"
                                         style="max-height: 100%; max-width: 100%;">
                                </div>
                                <p><?php echo $this->lang->line('common_max_size') ?> &nbsp;(2024&times;750)</p>
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
                        <?php echo form_label($this->lang->line('common_publish') . '?', 'is_published', array('class' => 'col-sm-2 radio control-label')); ?>
                        <div class="col-sm-6">
                            <?php echo form_checkbox(array('name' => 'is_published', 'value' => '1', 'class' => 'radio control-label', 'checked' => isset($is_published) ? $is_published : '')) ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <?php echo form_label($this->lang->line('if_hook') . '?', 'is_hook', array('class' => 'col-sm-2 radio control-label')); ?>
                        <div class="col-sm-6">
                            <?php echo form_checkbox(array('name' => 'is_hook', 'value' => '1', 'class' => 'radio control-label', 'id' => 'is_hook', 'checked' => isset($is_hook) ? $is_hook : '')) ?>
                        </div>
                    </div>
                    <div id="hookPart"  style="display: none">
                        <div class="form-group">
                            <?php echo form_label($this->lang->line('common_description'), 'content', array('class' => 'col-sm-2 control-label')) ?>
                            <div class="col-sm-6">
                                <?php echo form_textarea(array('name' => 'content', 'rows' => 3, 'id' => 'desc', 'class' => 'form-control input-sm'), isset($content) ? $content : '') ?>
                            </div>
                        </div>  
                        <div class="form-inline col-sm-offset-2">
                            <div class="form-group">
                                <label for="hook"><?php echo $this->lang->line('common_link_text') ?></label>
                                <?php echo form_input(array('name' => 'hook', 'id' => 'hook', 'class' => 'form-control', 'placeholder' => $this->lang->line('common_action_btn_text'), 'value' => isset($hook) ? $hook : '')) ?>
                            </div>
                            <div class="form-group">
                                <label for=""><?php echo $this->lang->line('common_url') ?></label>
                                <?php echo form_input(array('name' => 'hook_url', 'id' => 'hook_url', 'class' => 'form-control', 'placeholder' => $this->lang->line('common_action_btn_link'), 'value' => isset($hook_url) ? $hook_url : '')) ?>
                            </div>
                        </div>
                    </div>
                    <hr/>
                    <div class="form-group">
                        <?php echo form_label($this->lang->line('config_award_category_meta_key'), 'meta_keys', array('class' => 'col-sm-2 control-label')) ?>
                        <div class="col-sm-6">
                            <?php echo form_input(array('name' => 'meta_keys', 'id' => 'meta_keys', 'class' => 'form-control input-sm', 'value' => isset($meta_keys) ? $meta_keys : '')) ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <?php echo form_label($this->lang->line('config_award_category_meta_desc'), 'meta_desc', array('class' => 'col-sm-2 control-label')) ?>
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
    $(document).ready(function ()
    {
        var ckbox = $('#is_hook');
        $('input').on('click', function () {
            if (ckbox.is(':checked')) {
                $('#hookPart').show();
            } else {
                $('#hookPart').hide();
            }
        });

        $("a.fileinput-exists").click(function () {
            $.ajax({
                type: "POST",
                url: "<?php echo site_url("admin/slider/deleteimage"); ?>",
                dataType: "json",
                data: {
                    id:<?php echo isset($id) ? $id : '0' ?>,
                    image: '<?php echo isset($image) ? $image : '0' ?>'
                }
            });
        });
        $('#sliderForm').validate({
            errorClass: "has-error",
            errorLabelContainer: "#award_slider_error_message_box",
            wrapper: "li",
            highlight: function (e) {
                $(e).closest('.form-group').addClass('has-error');
            },
            unhighlight: function (e) {
                $(e).closest('.form-group').removeClass('has-error');
            },
            rules:
                    {
                        title: "required",
                    },
            messages:
                    {
                        title: "<?php echo $this->lang->line('common_title_required'); ?>"
                    }
        });
    });
</script>