<header id="gkposHeader">
    <script type="text/javascript">
        var base_url = "<?php echo base_url(); ?>";
        function clockTick() {
            setInterval('updateClock();', 1000);
        }
        clockTick();
        var now = new Date(<?php echo time() * 1000 ?>);

        function updateClock() {
            now.setTime(now.getTime() + 1000);
            document.getElementById('liveclock').innerHTML = phpjsDate("<?php echo $this->config->item('dateformat') . ' ' . $this->config->item('timeformat') ?>", now);
        }
    </script>
    <nav class="navbar navbar-default navbar-fixed-top top-borderbg">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <div id="liveclock" class="liveclock text-vertical-center text-center"><?php echo date($this->config->item('dateformat') . ' ' . $this->config->item('timeformat')) ?></div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <div class="text-capitalize text-center user-profile text-vertical-center text-center"><?php echo $admin ?>&nbsp;<span class="glyphicon glyphicon-chevron-right"></span>&nbsp;<?php isset($current_section)? print $current_section:'' ?></div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <div id="logout" class="logout text-vertical-center text-center">
                        <?php if ($this->session->userdata('gkpos_userid')): ?>
                            <a href="<?php echo site_url('gkpos/logoff') ?>"><?php echo $this->lang->line('gkpos_logoff') ?></a>
                        <?php else: ?>
                            <a href="javascript:void(0)"><?php echo $this->lang->line('gkpos_login') ?></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>
<div class="clearfix"></div>