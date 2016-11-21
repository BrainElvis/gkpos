<section id="body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 col-sm-3 col-xs-3 left-item">
                <div class="userlogingbg">
                    <div class="user-part">
                        <h2><?php echo $this->lang->line('gkpos_users') ?></h2>
                        <h1 width="91" height="15"></h1>
                        <ul>
                            <li><a href="#"><img src="<?php echo ASSETS_GKPOS_PATH ?>images/user1.png" class="img-responsive"/></a>
                                <span class="usernamebg">John</span>
                            </li>
                            <li><a href="#"><img src="<?php echo ASSETS_GKPOS_PATH ?>images/user2.png" class="img-responsive"/></a>
                                <span class="usernamebg">Mark</span>
                            </li>
                        </ul>
                    </div>
                    <div class="user-part">
                        <ul>
                            <li><a href="#"><img src="<?php echo ASSETS_GKPOS_PATH ?>images/user1.png" class="img-responsive"/></a>
                                <span class="usernamebg">Stafen</span>
                            </li>
                            <li><a href="#"><img src="<?php echo ASSETS_GKPOS_PATH ?>images/user2.png" class="img-responsive"/></a>
                                <span class="usernamebg">Clark</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-6 bodyitem">
                <div class="pin-calculatorbg">
                    <h2><?php echo $this->lang->line('gkpos_pin') ?></h2>

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

                <div class="last-calculatorbg">
                    <ul>
                        <input type="hidden" name="pincode" id="pincode"/>
                        <li><a href="<?php echo site_url('gkpos/mainboard') ?>"><?php echo $this->lang->line('gkpos_numpad_key_enter') ?></a></li>
                    </ul>
                </div>
                <div class="clockdiv">
                   <p><?php echo date($this->config->item('timeformat')) ?></p>
                </div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-3 right-item">
                <div class="paginationbg">
                    <div class="logobg">
                        <img src="<?php echo UPLOAD_PATH.$this->config->item('company_logo') ?>" width="196" height="152" class="img-responsive" style="display:inline" />
                        <p><?php echo date($this->config->item('dateformat')) ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">
    jQuery(document).ready(function () {
        setnumkeys('pincode');
    });
</script>