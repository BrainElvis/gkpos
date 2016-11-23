<section id="body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 bodyitem2">
                <div class="container">
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                        <h4><img src="<?php echo ASSETS_GKPOS_PATH ?>images/phoneicon.png" width="33" height="33" class="img-responsive" /><?php echo $this->lang->line('gkpos_no_call') ?></h4>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <h2><?php isset($current_section) ? print $current_section : 'Collection' ?></h2>
                    </div>
                </div>
                <div class="formpartbg">
                    <form class="well form-horizontal" action=" " method="post"  id="contact_form">
                        <fieldset>
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
                        </fieldset>
                    </form>
                </div>
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