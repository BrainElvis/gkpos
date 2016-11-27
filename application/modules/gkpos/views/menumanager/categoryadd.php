<section id="body">
    <div class="container-fluid">
        <div class="row">
            <?php echo $this->load->view('gkpos/menumanager/left_sidebar') ?>
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 bodyitem">
                <div class="row content">
                    <fieldset>
                        <form class="form-horizontal" action="" method="post"  id="categoryForm">
                            <legend>Mandatory</legend>
                            <div class="fieldset">
                                <div class="form-group">
                                    <label for="title" class="col-sm-2 control-label">Title</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="title">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="content" class="col-sm-2 control-label">Description</label>
                                    <div class="col-sm-10">
                                        <textarea type="text" class="form-control" name="content" id="content"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="fieldset">
                                <legend>Discount on category if required</legend>
                                <div class="form-group">
                                    <label for="discount" class="col-sm-2 control-label">Amount</label>
                                    <div class="col-sm-3 input-group">
                                        <div class="input-group-addon"><?php echo $this->config->item('currency_symbol') ?></div>
                                        <input type="text" class="form-control" id="title">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="discount" class="col-sm-2 control-label">Function</label>
                                    <div class="col-sm-3">
                                        <label class="radio-inline">
                                            <input type="radio" name="function" id="function1" value="fixed"> Fixed
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="function" id="function2" value="percent" checked> Percentage
                                        </label>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </fieldset>
                </div>
                <div class="clearfix"></div>
                <div class="row main-keyboardbg">
                    <div id="virtualKeyboard"></div>
                </div>
            </div>
            <?php echo $this->load->view('gkpos/menumanager/right_sidebar') ?>
        </div>
    </div>
</section>
