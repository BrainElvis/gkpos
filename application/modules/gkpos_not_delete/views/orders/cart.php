<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 right-top cart">
    <div class="sidebar-heading text-center text-uppercase"><?php echo $this->lang->line('gkpos_food') ?></div>
    <div class="tablebackgroundbg">
        <table class="table table-responsive item-table-header cart-table">
            <tr>
                <th class="text-uppercase text-center" style="width: 60%;"><?php echo $this->lang->line('gkpos_item') ?></th>
                <th class="text-uppercase" style="width: 15%;"><?php echo $this->lang->line('gkpos_qnt') ?></td>
                <th class="text-uppercase" style="width: 25%;"><?php echo $this->lang->line('gkpos_price') ?></th>
            </tr>
        </table>
        <div class="item-table">
            <table class="table table-bordered table-responsive cart-table" id="foodCart">
                <tr>
                    <td style="width: 60%;">Burger</td>
                    <td style="width: 15%;">10</td>
                    <td style="width: 25%;">&pound; 100</td>
                </tr>
                <tr>
                    <td style="width: 60%;">Burger</td>
                    <td style="width: 15%;">10</td>
                    <td style="width: 25%;">&pound; 100</td>
                </tr>
                <tr>
                    <td style="width: 60%;">Burger</td>
                    <td style="width: 15%;">10</td>
                    <td style="width: 25%;">&pound; 100</td>
                </tr>
                <tr>
                    <td style="width: 60%;">Burger</td>
                    <td style="width: 15%;">10</td>
                    <td style="width: 25%;">&pound; 100</td>
                </tr>
                <tr>
                    <td style="width: 60%;">Burger</td>
                    <td style="width: 15%;">10</td>
                    <td style="width: 25%;">&pound; 100</td>
                </tr>
                <tr>
                    <td style="width: 60%;">Burger</td>
                    <td style="width: 15%;">10</td>
                    <td style="width: 25%;">&pound; 100</td>
                </tr>
            </table>
        </div>
    </div>

    <div class="sidebar-heading text-center text-uppercase"><?php echo $this->lang->line('gkpos_non_food') ?></div>
    <div class="tablebackgroundbg">
        <table class="table table-responsive cart-table">
            <tr>
                <th class="text-uppercase text-center" style="width: 60%;"><?php echo $this->lang->line('gkpos_item') ?></th>
                <th class="text-uppercase" style="width: 15%;"><?php echo $this->lang->line('gkpos_qnt') ?></td>
                <th class="text-uppercase" style="width: 25%;"><?php echo $this->lang->line('gkpos_price') ?></th>
            </tr>
        </table>
        <div class="item-table">
            <table class="table table-bordered table-responsive cart-table" id="nonFoodCart">
                <tr>
                    <td style="width: 60%;">Burger</td>
                    <td style="width: 15%;">10</td>
                    <td style="width: 25%;">&pound; 100</td>
                </tr>
                <tr>
                    <td style="width: 60%;">Burger</td>
                    <td style="width: 15%;">10</td>
                    <td style="width: 25%;">&pound; 100</td>
                </tr>
                <tr>
                    <td style="width: 60%;">Burger</td>
                    <td style="width: 15%;">10</td>
                    <td style="width: 25%;">&pound; 100</td>
                </tr>
                <tr>
                    <td style="width: 60%;">Burger</td>
                    <td style="width: 15%;">10</td>
                    <td style="width: 25%;">&pound; 100</td>
                </tr>
                <tr>
                    <td style="width: 60%;">Burger</td>
                    <td style="width: 15%;">10</td>
                    <td style="width: 25%;">&pound; 100</td>
                </tr>
                <tr>
                    <td style="width: 60%;">Burger</td>
                    <td style="width: 15%;">10</td>
                    <td style="width: 25%;">&pound; 100</td>
                </tr>
            </table>
        </div>
    </div>

    <div class="tablebackgroundbg">
        <table class="table table-responsive calculation-table">
            <tr>
                <th>Discount</th>
                <td><?php echo to_currency(0.0) ?></td>
            </tr>
            <tr>
                <th>Service Charge</th>
                <td><?php echo to_currency(0.0) ?></td>
            </tr>
            <tr>
                <th>Total</th>
                <td><?php echo to_currency(0.0) ?></td>
            </tr>
        </table>
    </div>
    <div class="sendbg col-lg-3 col-md-3 col-sm-3 col-xs-3"><?php echo $this->lang->line('gkpos_send') ?></div>
    <div class="ktcbg col-lg-3 col-md-3 col-sm-3 col-xs-3"><?php echo $this->lang->line('gkpos_ktc') ?></div>
    <div class="minusbg col-lg-3 col-md-3 col-sm-3 col-xs-3"><span class="minustextbg"> <?php echo $this->lang->line('gkpos_minus') ?> </span></div>
    <div class="plusbg col-lg-3 col-md-3 col-sm-3 col-xs-3"><span class="plustextbg"> <?php echo $this->lang->line('gkpos_plus') ?> </span></div>
</div>
<script>
    $(document).ready(function () {
        $(".alert-dismissable").fadeTo(2000, 500).slideUp(5000, function () {
            $(".alert-dismissable").alert('close');
        });
    });

</script>