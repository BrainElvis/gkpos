
<div class="modal-header">
    <div class="phone-call col-md-12"><img src="<?php echo ASSETS_GKPOS_PATH ?>images/phoneicon.png" width="33" height="33" /> <?php echo $this->lang->line('gkpos_no_call') ?></div>
</div>
<div class="formpartbg">
    <fieldset>
        <form class="form-horizontal" action=" " method="post"  id="contact_form">
            <legend><?php echo $this->lang->line('gkpos_customer') . " " . $this->lang->line('gkpos_information') ?></legend>
            <div class="form-group">
                <label class="col-md-4 control-label"><?php echo $this->lang->line('gkpos_name') ?></label>  
                <div class="col-md-8 inputGroupContainer">
                    <div class="input-group">
                        <input  name="name" placeholder="<?php echo $this->lang->line('gkpos_name') ?>" class="form-control"  type="text">
                        <span class="input-group-addon"><a href="#"><i class="fa fa-search" aria-hidden="true"></i></a></span>
                    </div>
                </div>
            </div>
            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" ><?php echo $this->lang->line('gkpos_phone') ?></label> 
                <div class="col-md-8 inputGroupContainer">
                    <div class="input-group">
                        <input name="phone" placeholder="<?php echo $this->lang->line('gkpos_phone') ?>" class="form-control" id="phone"  type="text">
                        <span class="input-group-addon"><a href="#"><i class="fa fa-search" aria-hidden="true"></i></a></span>
                    </div>
                </div>
            </div>
        </form>
    </fieldset>
</div>
<div class="phone-pad-heading text-center text-uppercase"><?php echo $this->lang->line('gkpos_type_phone_number') ?></div>
<div class="numpad collection-numpad">
    <div class="pin-calculatorbg collection-pin-calculatorbg">
        <ul>
            <li class="numkey"><?php echo $this->lang->line('gkpos_numpad_key1') ?></li>
            <li class="numkey"><?php echo $this->lang->line('gkpos_numpad_key2') ?></li>
            <li class="numkey"><?php echo $this->lang->line('gkpos_numpad_key3') ?></li>
        </ul>
        <ul>
            <li class="numkey"><?php echo $this->lang->line('gkpos_numpad_key4') ?></li>
            <li class="numkey"><?php echo $this->lang->line('gkpos_numpad_key5') ?></li>
            <li class="numkey"><?php echo $this->lang->line('gkpos_numpad_key6') ?></li>
        </ul>
        <ul>
            <li class="numkey"><?php echo $this->lang->line('gkpos_numpad_key7') ?></li>
            <li class="numkey"><?php echo $this->lang->line('gkpos_numpad_key8') ?></li>
            <li class="numkey"><?php echo $this->lang->line('gkpos_numpad_key9') ?></li>
        </ul>
        <ul>
            <li class="btnPin"><?php echo $this->lang->line('gkpos_numpad_key_del') ?></li>
            <li class="numkey"><?php echo $this->lang->line('gkpos_numpad_key0') ?></li>
            <li class="btnPin"><?php echo $this->lang->line('gkpos_numpad_key_clr') ?></li>
        </ul>
    </div>

    <div class="last-calculatorbg collection-last-calculatorbg">
        <ul>
            <li onclick="submit_form();"><?php echo $this->lang->line('gkpos_numpad_key_enter') ?></li>
        </ul>
    </div>
</div>
<script type="text/javascript">
    jQuery(document).ready(function () {
        manageWindowHeight();
        setnumkeys('phone');
    });
</script>