<script language="javascript">
    function IsNumeric(sText)
    {
        var ValidChars = "0123456789";
        var IsNumber = true;
        var Char;
        for (i = 0; i < sText.length; i++)
        {

            Char = sText.charAt(i);
            if (ValidChars.indexOf(Char) == -1)
            {
                IsNumber = false;
                break;
            }
        }
        return IsNumber;
    }
    function validation()
    {

        if (document.edit.customers_firstname.value == "")
        {
            alert( "First Name is a required Field");
            document.edit.customers_firstname.focus();
            return false;
        }

        if (document.edit.customers_lastname.value == "")
        {
            alert( "Customer Last Name is a required field");
            document.edit.customers_lastname.focus();
            return false;
        }


        if (document.edit.customers_email_address.value.indexOf("@") == -1 || document.edit.customers_email_address.value == "")
        {
            alert("Email Address is required Field");
            document.edit.customers_email_address.focus();
            return false;
        }


        if (document.edit.customers_telephone.value == "")
        {
            alert( "Phone is a required field.");
            document.edit.customers_telephone.focus();
            return false;
        }
        if (document.edit.customers_address1.value == "")
        {
            alert("Address is required field");
            document.edit.customers_address1.focus();
            return false;
        }

        if (document.edit.customers_town.value == 'Select your town or city' || document.edit.customers_town.value == '')
        {
            alert( "City is required field");
            document.edit.customers_town.focus();
            return false;
        }
        if (document.edit.cust_area.value == 'Select your area' || document.edit.cust_area.value == '')
        {
            alert("Select an area");
            document.edit.cust_area.focus();
            return false;
        }

        if (document.edit.customers_postcode.value == "")
        {
            alert("Post Code is a required field.");
            document.edit.customers_postcode.focus();
            return false;
        }

        if (document.edit.customers_postcode2.value == "")
        {
            alert("Post Code is a required field.");
            document.edit.customers_postcode2.focus();
            return false;
        }

        if (document.edit.customers_postcode.value != '' && document.edit.customers_postcode.value.length < 3)
        {
            alert("Please enter first 3 digits of your postal code");
            document.edit.customers_postcode.focus();
            return false;
        }
        if (document.edit.customers_postcode2.value != '' && document.edit.customers_postcode2.value.length < 3)
        {
            alert("Please enter last 3 digits of your postal code");
            document.edit.customers_postcode2.focus();
            return false;
        }
        return true;
    }
    jQuery(document).ready(function() {

                jQuery("#customers_postcode").keypress(function(e) {
                            //if the letter is not digit then display error and don't type anything
                            jQuery("#customers_postcode").focus();
                            if (jQuery("#customers_postcode").val().length == 3 && e.which != 8)
                            {
                                jQuery("#customers_postcode2").focus();
                                return false;
                            }
                        });

                jQuery("#customers_mobile").keypress(function(e){
                            if (((e.which != 8 && e.which != 0 && e.which != 43 && e.which != 13) && (e.which < 48 || e.which > 57)))
                            {
                                jQuery("#mobmsg").html( "Digit Onlu Please").show().fadeOut(1500);
                                return false;
                            }

                        });

                jQuery("#customers_telephone").keypress(function(e){
                            //if the letter is not digit then display error and don't type anything
                            if (((e.which != 8 && e.which != 0 && e.which != 43 && e.which != 13) && (e.which < 48 || e.which > 57)))
                            {
                                //display error message
                                jQuery( "#phonemsg").html( "Digit Only Please").show().fadeOut(1500);
                                return false;
                            }

                        });

            });

</script>

<script type="text/javascript">
    function format(input)
    {
        var nStr = input.value + '';
        if (input.value.length < 12)
        {
            nStr = nStr.replace(
                    /\s/g,
                    "");
            x = nStr.split(
                    '.');
            x1 = x[0];

            x2 = x.length > 1 ? '.' + x[1] : '';
            var rgx = /(\d+)(\d{3})/;
            while (rgx.test(
                    x1)) {
                x1 = x1.replace(
                        rgx,
                        '$1' + ' ' + '$2');
            }
            input.value = x1 + x2;
        }
    }
</script>

<div class="container">
    <div class="row accountbg">
        <?php $this->load->view('customer/subviews/nav') ?>
        <div class="col-md-9">
            <div class="content-innerspan2">
                <div class="innercommon-right">
                    <h1><?php echo $current_section ?></h1>
                    <div class="innercommon-right-content">
                        <span></span>
                        <table class="payment-table" width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tbody>
                            <form onsubmit="return validation();" id="edit" name="edit" enctype="multipart/form-data" method="post" action="<?php echo site_url('customer/editprofile') ?>">
                                <tr class="odd">
                                    <td class="bdr-bottom bdr-right" width="40%">First Name:</td>
                                    <td class="bdr-bottom" width="60%">
                                        <input value="<?php isset($CustFirstName) ? print $CustFirstName : '' ?>" id="customers_firstname" class="textfield input1" name="customers_firstname" type="text">
                                    </td>
                                </tr>
                                <tr class="even">
                                    <td class="bdr-bottom bdr-right" width="40%">Last Name:</td>
                                    <td class="bdr-bottom" width="60%">
                                        <input value="<?php isset($CustLastName) ? print $CustLastName : '' ?>" class="textfield input1" id="customers_lastname" name="customers_lastname" type="text">
                                    </td>
                                </tr>
                                <tr class="odd">
                                    <td class="bdr-bottom bdr-right" width="40%">E-mail Address:</td>
                                    <td class="bdr-bottom" width="60%">
                                        <input onblur="check_availablity(this.value);" value="<?php isset($CustEmail) ? print $CustEmail : '' ?>" class="textfield  input1" id="customers_email_address" name="customers_email_address" type="text">
                                    </td>
                                </tr>
                                <tr class="even">
                                    <td class="bdr-bottom bdr-right" width="40%"><?php echo $this->lang->line('common_contact_no')?>:</td>
                                    <td class="bdr-bottom" width="60%">
                                        <input onkeyup="format(this)" class="textfield  input1" id="customers_telephone" onblur="if (value == '') {
                                                    this.value = 'e.g 902 717 0461';
                                                    this.style.color = '#CCCCCC';
                                                }" onfocus="if (value == 'e.g 902 717 0461') {
                                                            this.value = '';
                                                            this.style.color = '#3E3E3E';
                                                        }" value="<?php isset($CustTelephone) ? print $CustTelephone : '' ?>" name="customers_telephone" style="color:#3E3E3E;" type="text">
                                    </td>
                                </tr>
                                <tr class="odd">
                                    <td class="bdr-bottom bdr-right" width="40%">Address:</td>
                                    <td class="bdr-bottom" width="60%">
                                        <input value="<?php isset($CustAdd1) ? print $CustAdd1 : print'' ?>" class="textfield input1" id="customers_address1" name="customers_address1" type="text">
                                    </td>
                                </tr>
                                <tr class="even">
                                    <td width="40%" class="bdr-bottom bdr-right">City / Town :</td>
                                    <td width="60%" class="bdr-bottom">
                                        <select name="customers_town"  id="customers_town" class="dropdown  input1"  onchange="get_dist_by_city(this.value)">
                                            <option style="margin-left:5px; font-weight:bold;" value="">Select City</option>
                                            <?php
                                            $provinces = $this->session->userdata('cities');
                                            $selectedcity = 0;
                                            foreach ($provinces as $province) {
                                                ?>
                                                <option  value="<?php echo $province->CityId ?>" <?php
                                                if (($CustTown == $province->CityId) || (isset($_POST['customers_province']) &&  $_POST['customers_province'] == $province->CityId)) {
                                                    echo 'selected="selected"';
                                                }
                                                ?>><?php echo $province->CityName ?></option>
                                                     <?php } ?>
                                        </select>
                                    </td>
                                </tr>
                               <!-- <?php   $arealist = $this->User_Model->get_area_list($CustTown);?>
                                <tr class="odd">
                                    <td width="40%" class="bdr-bottom bdr-right">Area:</td>
                                    <td width="60%" class="bdr-bottom">
                                        <div id="address_book_area_container">
                                            <select name="cust_area" id="cust_area" class="dropdown input1" >
                                                <option  value="">Select Area</option>
                                                <?php foreach ($arealist as $obj) { ?>
                                                    <option value="<?php echo $obj->AreaId ?>" <?php
                                                    if (($CustArea == $obj->AreaId) || (isset($_POST['cust_area']) && $_POST['cust_area'] == $obj->AreaId)) {
                                                        echo 'selected="selected"';
                                                    }
                                                    ?>><?php echo $obj->AreaName ?></option>
                                                        <?php } ?>
                                            </select>
                                        </div>
                                    </td>
                                </tr>-->
                                <tr class="odd">
                                    <td class="bdr-bottom bdr-right" width="40%">Postcode:</td>
                                    <td class="bdr-bottom" width="60%">
                                        <?php $postcode = explode(' ', $CustPostcode); ?>
                                        <input class="textfield-small" style="text-transform: uppercase" name="customers_postcode" type="text" size="3" maxlength="3" onkeyup="jQuery(this).val(jQuery(this).val().toUpperCase());" value="<?php isset ($postcode[0])? print $postcode[0]: print'' ; ?>"/>
                                        <input class="textfield-small" style="text-transform: uppercase" name="customers_postcode2" type="text" size="3" maxlength="3" onkeyup="jQuery(this).val(jQuery(this).val().toUpperCase());" value="<?php isset ($postcode[1])? print $postcode[1]: print'' ;?>"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="bdr-bottom bdr-right" width="40%"></td>
                                    <td class="bdr-bottom bdr-right" width="40%">
                                        <input type="hidden" name="cust_email_address" value="<?php echo $CustEmail?>">
                                        <input class="common-btn" value="Save" name="Submit" type="submit">
                                    </td>
                                </tr>
                            </form>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">

    function get_dist_by_city(cid) {
        jQuery.post( "<?= site_url('user/get_dist_by_city') ?>",
                {cityid: cid},
        function(response) {
            jQuery('#address_book_area_container').html(response);

        });
    }
</script>