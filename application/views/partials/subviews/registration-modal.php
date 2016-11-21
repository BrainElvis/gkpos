
<style>
    .select2-container {
        width: 200px;
    }

    .select2-drop-active{
        margin-top: -25px;
    }
</style>
<div class="modal fade" id="registration" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header2">
                <button type="button" class="close2" data-dismiss="modal">&times;</button>
                <h4 class="modal-title2"><?php echo $this->lang->line('registration_header_title') ?></h4>
            </div>
            <ul id="form-section1">
                <p><span class="register-numbering-text"><?php echo $this->lang->line('registration_basic_info') ?></span></p>
                <li>
                    <span style="display:none; color:#0C0" class="success"><?php echo $this->lang->line('registration_success') ?></span>
                </li>
                <li>
                    <span style="display:none; color:#ff0000" id="registrationFormErrors"></span>
                </li>
                <li>
                    <label class="left-column">
                        <span><?php echo $this->lang->line('common_first_name') ?><font class="required">*</font></span>
                        <input type="text" title="It must contain only letters and a length of minimum 2 characters!" autofocus="" required="" placeholder="Enter your first name" pattern="[a-zA-Z ]{2,}" tabindex="1" id="CustFirstName" name="CustFirstName">
                    </label>
                    <label class="right-column">
                        <span><?php echo $this->lang->line('common_last_name') ?><font class="required">*</font></span>
                        <input type="text" required="" title="It must contain only letters and a length of minimum 2 characters!" placeholder="Enter your last name" pattern="[a-zA-Z ]{2,}" tabindex="2" id="CustLastName" name="CustLastName">
                    </label>
                </li>
                <div style="clear: both;"></div>
                <li>
                    <label class="single-line">
                        <span><?php echo $this->lang->line('common_contact_no') ?><font class="required">*</font></span>
                        <input type="tel" required="" title="It must contain a valid phone number formed only by numerical values and a length between 7 and 13 characters !" placeholder="Enter your contact no" tabindex="3" pattern="(\+?\d[- .]*){7,13}" id="CustTelephone" name="CustTelephone">
                    </label>
                </li>
                <p><span class="register-numbering-text"><?php echo $this->lang->line('registration_location_details') ?></span></p>
                <li>
                    <label class="single-line">
                        <span><?php echo $this->lang->line('common_address') ?><font class="required">*</font></span>
                        <input type="text" required="" title="It must contain letters and/or separators and a length of minimum 10 characters !" placeholder="Enter your street address" pattern="[a-zA-Z0-9. - , ]{10,}" tabindex="4" id="CustAdd1" name="CustAdd1">
                    </label>
                </li>
                <li>
                    <?php
                    $cities = array();
                    if ($this->session->userdata('cities')) {
                        $cities = $this->session->userdata('cities');
                    }
                    ?>
                    <label class="left-column"> 
                        <span><?php echo $this->lang->line('common_city') ?><font class="required">*</font></span>
                        <div class="selectRow">
                            <select id="CustTown" name="CustTown" tabindex="5">
                                <option></option>
                                <?php if (!empty($cities)): ?>
                                    <?php foreach ($cities AS $obj): ?>
                                        <option value="<?= $obj->CityId ?>"> <?= $obj->CityName ?> </option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                        </div>
                    </label>
                </li>
                <script>
                    jQuery(document).ready(function () {
                        jQuery('#CustTown').select2({
                            placeholder: 'Select your city...',
                            allowClear: true,
                            width: '192px'
                        });
                    });
                </script>
                <li>
                    <label class="right-column">
                        <span><?php echo $this->lang->line('common_postcode') ?><font class="required">*</font></span>
                        <input type="text" required="" title="It must contain only numbers and a length of minimum 3 characters !" placeholder="Enter your Postcode" onkeyup="jQuery(this).val(jQuery(this).val().toUpperCase());" maxlength="9" tabindex="6" id="CustPostcode" name="CustPostcode">
                    </label>
                </li>
                <div style="clear: both;"></div>
                <p><span class="register-numbering-text"><?php echo $this->lang->line('registration_account_credential') ?></span></p>
                <li>
                    <label class="single-line">
                        <span><?php echo $this->lang->line('common_email') ?><font class="required">*</font></span>
                        <input type="email" required="" title="It must contain a valid email address e.g. 'someone@provider.com' !" placeholder="Enter a valid email address" tabindex="7" id="CustEmail" name="CustEmail">
                    </label>
                </li>
                <li>
                    <label class="left-column">
                        <span><?php echo $this->lang->line('common_password') ?><font class="required">*</font></span>
                        <input type="password" required="" title="It can contain all types of characters and a length of minimum 6 characters!" placeholder="Enter password" pattern=".{6,}" tabindex="8" id="CustPassword" name="CustPassword">
                    </label>
                    <label class="right-column">
                        <span><?php echo $this->lang->line('common_confirm_password') ?><font class="required">*</font></span>
                        <input type="password" required="" title="It can contain all types of characters and a length of minimum 6 characters!" placeholder="Confirm password" pattern=".{6,}" tabindex="9" id="confirmPassword" name="confirmPassword">
                    </label>
                </li>
                <div style="clear: both;"></div>
                <li>
                    <label>
                        <span>
                            <input type="checkbox" style="margin-right: 1%;" id="agree_chk" name="agree_chk" tabindex="10">I Agree to
                            <a target="_blank" href="<?php echo site_url('pages/policy') ?>">Privacy Policy</a>
                            and
                            <a target="_blank" href="<?php echo site_url('pages/acceptofcondition') ?>">Terms and Conditions</a>
                        </span>
                    </label>
                </li>
                <div style="clear: both;"></div>
                <li>
                    <input type="hidden" name="RestId" id="RestId" value="<?php echo $this->config->item('api_id') ?>">
                    <button id="create-account-submit" class="btn btn-success" type="submit" tabindex="11" name="submit_form">Create Account</button>
                </li>
            </ul>
        </div>
    </div>
</div>