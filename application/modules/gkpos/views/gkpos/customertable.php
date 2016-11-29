<section id="body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-sm-8 col-xs-8 bodyitem2">
                <div class="modal-header">
                    <div class="phone-call col-md-4"><img src="<?php echo ASSETS_GKPOS_PATH ?>images/phoneicon.png" width="33" height="33" /> <?php echo $this->lang->line('gkpos_no_call') ?></div>
                    <div class="page-title col-md-8"><?php isset($current_section) ? print $current_section : print 'Delivery' ?></div>
                </div>
                <div class="formpartbg">
                    <fieldset>
                        <form class="form-horizontal" action=" " method="post"  id="contact_form">
                            <div class="form-group">
                                <label class="col-md-5 control-label"><?php echo $this->lang->line('gkpos_how_many_customers') ?></label>  
                                <div class="col-md-7 inputGroupContainer">
                                    <input  name="number_of_customer" placeholder="<?php echo $this->lang->line('gkpos_how_many_customers') ?>" class="form-control"  type="text" id="number_of_customer">
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
        setnumkeys('number_of_customer');
    });
</script>