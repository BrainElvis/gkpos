<section id="body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 left-item">
                <div class="userlogingbg sidebar-vertical-align-center">
                    <h2 class="text-center text-uppercase"><?php echo $this->lang->line('gkpos_users') ?></h2>
                    <?php if (!empty($female_users)): ?>
                        <div class="user-part female">
                            <ul>
                                <?php foreach ($female_users as $fuser): ?>
                                    <li onclick="get_user(<?php echo $fuser->id ?>);">
                                        <a href="javascript:void(0)"><img src="<?php echo ASSETS_GKPOS_PATH ?>images/user1.png" class="img-responsive"/><span class="usernamebg"><?php echo $fuser->first_name . ' ' . $fuser->last_name ?></span></a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                    <?php if (!empty($male_users)): ?>
                        <div class="user-part male">
                            <ul>
                                <?php foreach ($male_users as $muser): ?>
                                    <li onclick="get_user(<?php echo $muser->id ?>);">
                                        <a href="javascript:void(0)"><img src="<?php echo ASSETS_GKPOS_PATH ?>images/user2.png" class="img-responsive"/> <span class="usernamebg"><?php echo $muser->first_name . ' ' . $muser->last_name ?></span></a> 
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 bodyitem">
                <div class="body-vertical-align-center">
                    <div class="user-label text-uppercase"><span id="userinfo"><?php echo $this->lang->line('gkpos_who_are_you') ?></span></div>
                    <div class="numpad" style="display: none">
                        <div class="pin-calculatorbg">
                            <div class="pin-code text-center text-uppercase"><?php echo $this->lang->line('gkpos_enter_pin_code') ?></div>
                            <p class="text-center"> <input type="password" name="password" id="password" class="password-input"/></p>
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
                            <form id="loginForm" name="loginForm">
                                <input type="hidden" name="email" id="email"/>
                                <input type="hidden" name="username" id="username"/>
                                <ul>
                                    <li onclick="submit_form();"><?php echo $this->lang->line('gkpos_numpad_key_enter') ?></li>
                                </ul>
                            </form> 

                        </div>
                    </div>
                    <div class="clockdiv">
                        <p><?php echo date($this->config->item('timeformat')) ?></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 right-item">
                <div class="paginationbg sidebar-vertical-align-center ">
                    <div class="logobg">
                        <img src="<?php echo UPLOAD_PATH . $this->config->item('company_logo') ?>" width="196" height="152" class="img-responsive" style="display:inline" />
                        <p><?php echo date($this->config->item('dateformat')) ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">
    function get_user(id) {
        jQuery('#email').val('');
        jQuery('#username').val('');
        jQuery('#password').val('');
        jQuery.ajax({
            type: "POST",
            url: base_url + 'gkpos/entry/get_user',
            data: {
                'id': id
            },
            success: function (response) {
                jQuery('.numpad').show();
                jQuery('#email').val(response.email);
                jQuery('#username').val(response.username);
                jQuery('#userinfo').text(response.first_name + " " + response.last_name);
            },
            dataType: 'json'
        });
    }
    function submit_form() {
        var username = jQuery("#username").val();
        var email = jQuery("#email").val();
        var password = jQuery("#password").val();
        if (username === '' || email === '') {
            alert("<?php echo $this->lang->line('gkpos_who_are_you') ?>");
            return false;
        } else if (password == '') {
            alert("<?php echo $this->lang->line('gkpos_pin_empty_warning') ?>");
            return false;
        } else {
            jQuery.ajax({
                type: "POST",
                url: base_url + 'gkpos/entry/validate',
                data: {
                    'username': username,
                    'email': email,
                    'password': password
                },
                success: function (response) {
                    if (response.status) {
                        window.location.replace(base_url + "gkpos");
                    } else {
                        jQuery("#password").val('');
                        jQuery("#warningPopupHeader").text("Login Error");
                        jQuery("#warningPopupContent").text("<?php echo $this->lang->line('gkpos_pin_invalid_warning') ?>");
                        jQuery(".warningPopup").colorbox({
                            inline: true,
                            slideshow: false,
                            scrolling: false,
                            height: "250px",
                            open: true,
                            width: '100%',
                            maxWidth: '400px'
                        });
                    }
                },
                dataType: 'json'
            });
        }
    }
    jQuery(document).ready(function () {
        jQuery('#email').val('');
        jQuery('#username').val('');
        jQuery('#password').val('');
        setnumkeys('password');
    });
</script>