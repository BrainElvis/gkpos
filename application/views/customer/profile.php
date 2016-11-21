<div class="container">
    <div class="row accountbg">
        <?php $this->load->view('customer/subviews/nav')?>
        <div class="col-md-9">
            <div class="content-innerspan2">
                <div class="innercommon-right">
                    <h1><?php echo $current_section?></h1>
                    <div class="my_account_fullwidth">
                        <table class="payment-table" width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tbody>
                                <tr class="even">
                                    <td><b>Name</b> : <?php echo $CustFirstName.' '. $CustLastName?></td>
                                </tr>
                                <tr class="odd">
                                    <td><b>Email</b> : <?php echo $CustEmail ?></td>
                                </tr>
                                <tr class="even">
                                    <td><b><?php echo $this->lang->line('common_contact_no') ?></b> : <?php isset($CustTelephone)?print $CustTelephone:print $CustMobile ?></td>
                                </tr>
                                <tr class="odd">
                                    <td><b>Address</b> : <?php echo $CustAdd1.' '.$CustAdd2 ?></td>
                                </tr>
                                <tr class="even">
                                    <td><b>Town or City</b> : <?php echo get_city_name($CustTown) ?></td>
                                </tr>
                                <!--
                                <tr class="even">
                                    <td><b>Area</b> :<?php echo get_area_name($CustArea) ?></td>
                                </tr>
                                -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
