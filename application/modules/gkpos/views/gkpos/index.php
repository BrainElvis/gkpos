<?php if ($this->config->item('is_touch') == 'disable'): ?>
    <style>
        .ui-autocomplete {
            border: none !important ;
        }
        .ui-autocomplete .ui-menu-item {
            padding: 7px;
        }
    </style>
<?php else: ?>
    <style>
        .ui-autocomplete {
            left: 5% !important;
            border: none !important ;
        }
        .ui-autocomplete .ui-menu-item {
            padding: 10px 7px 10px 7px;
        }
    </style>
<?php endif; ?>


<section id="body">
    <div class="container-fluid">
        <div class="row">
            <?php echo $template['partials']['left_sidebar'] ?>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-8 bodyitem">
                <div id="KeyboardSetting">
                    <?php echo $this->load->view('gkpos/partials/keyboard_setting') ?>
                </div>
                <div id="MiddleContent"></div>
                <div id="customerInformation"></div>
            </div>
            <?php echo $template['partials']['right_sidebar'] ?>
        </div>
    </div>
</section>
<script>
    $(document).ready(function () {
        setPhoneNumKeys('phone');
        manageWindowHeight();
         $( "#caller_order_type").autocomplete({
         delay:0,
         source:["delivery","collection", "table", "waiting"],
         minLength: 0
       });  
    });
    

</script>
