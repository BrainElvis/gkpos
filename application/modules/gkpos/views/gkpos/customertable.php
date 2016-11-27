<section id="body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-sm-8 col-xs-8 bodyitem2">
                <div class="container">
                    <div class="col-xs-3">
                        <h4><img src="<?php echo ASSETS_GKPOS_PATH?>images/phoneicon.png" width="33" height="33" /> There is no call</h4>
                    </div>
                    <div class="col-xs-5">
                        <h2><?php echo $this->lang->line('gkpos_customer').' '.$this->lang->line('gkpos_table')?></h2>
                    </div>
                </div>
                <div class="formpartbg">
                    <form class="jumbotron form-horizontal" action=" " method="post"  id="contact_form">
                        <fieldset>
                            <div class="form-group">
                                <label class="col-md-5 control-label"><?php echo $this->lang->line('gkpos_how_many_customers')?></label>  
                                <div class="col-md-7 inputGroupContainer">
                                    <input  name="number_of_customer" placeholder="<?php echo $this->lang->line('gkpos_how_many_customers')?>" class="form-control"  type="text" id="number_of_customer">
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
        setnumkeys('number_of_customer');
    });
</script>