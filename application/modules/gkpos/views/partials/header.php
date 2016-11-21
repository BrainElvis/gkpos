
<header>
    <script type="text/javascript">
        // live clock

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
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 navbar-left">
                    <div id="liveclock" class="liveclock text-vertical-center"><?php echo date($this->config->item('dateformat') . ' ' . $this->config->item('timeformat')) ?></div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <div class="text-capitalize text-center user-profile text-vertical-center">justin freeman</div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <div class="navbar-right">
                        <div id="logout" class="logout text-vertical-center"><a href="#"><?php echo $this->lang->line('gkpos_logoff')?></a></div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>