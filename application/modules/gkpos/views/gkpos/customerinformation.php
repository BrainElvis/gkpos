
<section id="body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-sm-8 col-xs-8 bodyitem2">
                <div class="container">
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                        <h4><img src="<?php echo ASSETS_GKPOS_PATH ?>images/phoneicon.png" width="33" height="33" /> There is no call</h4>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <h2><?php echo $this->lang->line('gkpos_customer') . " " . $this->lang->line('gkpos_information') ?></h2>
                    </div>
                </div>
                <div class="formpartbg">
                    <form class="well form-horizontal" action=" " method="post"  id="contact_form">
                        <fieldset>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Name</label>  
                                <div class="col-md-6 inputGroupContainer">
                                    <div class="input-group">
                                        <input  type="text" name="name" id="name" placeholder="<?php echo $this->lang->line('gkpos_name')?>" class="form-control">
                                        <span class="input-group-addon"><a href="#"><i class="fa fa-search" aria-hidden="true"></i></a></span>
                                    </div>
                                </div>
                            </div>
                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" ><?php echo $this->lang->line('gkpos_phone')?></label> 
                                <div class="col-md-6 inputGroupContainer">
                                    <div class="input-group">
                                        <input name="phone" placeholder="<?php echo $this->lang->line('gkpos_phone')?>" class="form-control"  type="text" id="phone">
                                        <span class="input-group-addon"><a href="#"><i class="fa fa-search" aria-hidden="true"></i></a></span>
                                    </div>
                                </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label"><?php echo $this->lang->line('gkpos_floor_or_apt_no')?></label>  
                                <div class="col-md-6 inputGroupContainer">
                                    <div class="input-group">
                                        <input name="floor" placeholder="<?php echo $this->lang->line('gkpos_floor_or_apt_no')?>" class="form-control" id="floor"  type="text">
                                    </div>
                                </div>
                            </div>

                            <!-- Text input-->

                            <div class="form-group">
                                <label class="col-md-4 control-label"><?php echo $this->lang->line('gkpos_building').' ',$this->lang->line('gkpos_name') ?></label>  
                                <div class="col-md-6 inputGroupContainer">
                                    <div class="input-group">
                                        <input name="building" placeholder="<?php echo $this->lang->line('gkpos_building').' ',$this->lang->line('gkpos_name') ?>" class="form-control" type="text">
                                    </div>
                                </div>
                            </div>

                            <!-- Text input-->

                            <div class="form-group">
                                <label class="col-md-4 control-label"><?php echo $this->lang->line('gkpos_house').' ',$this->lang->line('gkpos_number') ?></label>  
                                <div class="col-md-6 inputGroupContainer">
                                    <div class="input-group">
                                        <input name="house" placeholder="<?php echo $this->lang->line('gkpos_house').' ',$this->lang->line('gkpos_number') ?>" class="form-control" type="text">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label"><?php echo $this->lang->line('gkpos_street').' ',$this->lang->line('gkpos_name') ?></label>  
                                <div class="col-md-6 inputGroupContainer">
                                    <div class="input-group">
                                        <input name="street" placeholder="<?php echo $this->lang->line('gkpos_street').' ',$this->lang->line('gkpos_name') ?>" class="form-control" type="text">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label"><?php echo $this->lang->line('gkpos_postal_code')?></label>  
                                <div class="col-md-6 inputGroupContainer formbtn">
                                    <p><input name="address" placeholder="<?php echo $this->lang->line('gkpos_postal_code')?>" class="form-control" type="text"></p>
                                    <p><div class="btngpart1"><a href="#">Your Text here</a></div></p>
                                    <p><div class="btngpart2"><a href="#">Your Text here</a></div></p>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label"><?php echo $this->lang->line('gkpos_country')?></label>  
                                <div class="col-md-6 inputGroupContainer">
                                    <div class="input-group formbtn">
                                        <p><select><option>Country</option><option>Name 1</option><option>Name 2</option></select></p>
                                        <p><select><option>Hour</option><option>Time 1</option><option>Time 2</option></select></p>
                                        <p><select><option>Minute</option><option>Minute 1</option><option>Minute 1</option></select></p>
                                        <p><select><option>Maridien</option><option>Name1</option><option>Name2</option></select></p>
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