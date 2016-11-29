<section id="body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 bodyitem2">
                <div class="modal-header">
                    <div class="phone-call col-md-12"><img src="<?php echo ASSETS_GKPOS_PATH ?>images/phoneicon.png" width="33" height="33" /> <?php echo $this->lang->line('gkpos_no_call') ?></div>
                </div>
                <div class="formpartbg">
                    <fieldset>
                        <form class="form-horizontal" action=" " method="post"  id="contact_form">
                            <legend><?php echo $this->lang->line('gkpos_customer') . " " . $this->lang->line('gkpos_information') ?></legend>
                            <div class="form-group">
                                <label class="col-md-4 control-label"><?php echo $this->lang->line('gkpos_name') ?></label>  
                                <div class="col-md-6 inputGroupContainer">
                                    <div class="input-group">
                                        <input  name="name" placeholder="<?php echo $this->lang->line('gkpos_name') ?>" class="form-control"  type="text">
                                        <span class="input-group-addon"><a href="#"><i class="fa fa-search" aria-hidden="true"></i></a></span>
                                    </div>
                                </div>
                            </div>
                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" ><?php echo $this->lang->line('gkpos_phone') ?></label> 
                                <div class="col-md-6 inputGroupContainer">
                                    <div class="input-group">
                                        <input name="phone" placeholder="<?php echo $this->lang->line('gkpos_phone') ?>" class="form-control" id="phone"  type="text">
                                        <span class="input-group-addon"><a href="#"><i class="fa fa-search" aria-hidden="true"></i></a></span>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </fieldset>
                </div>
                <div class="clearfix pages-height"></div>
                <div class="main-keyboardbg">
                    <div id="virtualKeyboard"></div>
                </div>
            </div>
            <?php echo $template['partials']['right_sidebar_order'] ?>
        </div>
    </div>
</section>
<script type="text/javascript">
    jQuery(document).ready(function () {
        setnumkeys('phone');
    });
</script>