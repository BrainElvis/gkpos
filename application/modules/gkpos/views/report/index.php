<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
    <fieldset style="margin-bottom: 0px; padding-bottom: 0px; border-radius: 10px 10px 0px 0px ">
        <div class="row">
            <div class="report-button pull-right">
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 text-center text-uppercase btn btn-large btn-info">Print</div>
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 text-center text-uppercase btn btn-large btn-warning">import</div>
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 text-center text-uppercase btn btn-large btn-success">export</div>
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 text-center text-uppercase btn btn-large btn-danger">Delete</div>
            </div>
        </div>
        <div class="clearfix" style="margin: 5px 0px 5px 0px"></div>
        <div class="row">
            <form action="<?php echo site_url('gkpos/report/filter') ?>" method="post"  id="reportFilterForm">
                <table class="table table-bg-color table-responsive">
                    <tr>
                        <th>Date Range From</th>
                        <th>To </th>
                        <th>Order Type</th>
                        <th>Payment Method</th>
                        <th class="text-left"><input type="checkbox" name="is_by_closing" value="yes" class="checkbox-inline" id="byClosingDay" style="margin-top: -3px;">By Closing Day</th>
                    </tr>
                    <tr>
                        <td><?php echo form_input(array('name' => 'start_date', 'value' => $start_date, 'class' => 'date_filter form-control input-sm', 'id' => 'filterStartDate')); ?></td>
                        <td><?php echo form_input(array('name' => 'end_date', 'value' => $end_date, 'class' => 'date_filter form-control input-sm', 'id' => 'filterEndDate')); ?></td>
                        <td>
                            <select class="form-control input-sm" id="filterOrderType" name="order_type">
                                <option value="">Select Order Type</option>
                                <?php foreach ($ordertype_options as $key => $value): ?>
                                    <option value="<?php echo $key ?>"><?php echo $value ?></option>
                                <?php endforeach; ?>
                            </select>
                        </td>
                        <td id="posPayment">
                            <select class="form-control input-sm" name="pos_method" id="filterPosMethod">
                                <option value="">Select Payment Type</option>
                                <?php foreach ($payment_options as $key => $value): ?>
                                    <option value="<?php echo $key ?>"><?php echo $value ?></option>
                                <?php endforeach; ?>
                            </select>
                        </td>
                        <td id="onlinePayment" style="display: none">
                            <select class="form-control input-sm" name="online_method" id="filterOnlineMethod">
                                <option value="">Select Payment Type</option>
                                <option value="cod">COD</option>
                                <option value="online">Online</option>
                            </select>
                        </td>
                        <td class="text-center"><button class="btn btn-success btn-large" type="submit" onclick="filterReport()"><?php echo "Submit" ?></button></td>
                    </tr>
                </table>
            </form>
        </div>
    </fieldset>
    <div id="filterContent">
        <?php echo $this->load->view('gkpos/report/filtered'); ?>
    </div>    
    <div class="row report-button-operations">
        <div class="report-button">
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 text-center text-uppercase btn btn-large btn-info">Print Detail</div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 text-center text-uppercase btn btn-large btn-info">Print Summary</div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 text-center text-uppercase btn btn-large btn-info">Weekly Report</div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 text-center text-uppercase btn btn-large btn-warning">Monthly Report</div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 text-center text-uppercase btn btn-large btn-success">Excel Report</div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 text-center text-uppercase btn btn-large btn-danger">CSV Report</div>
        </div>
    </div>
</div>
