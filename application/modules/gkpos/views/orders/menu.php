<div class="order-menu-list">
    <?php if (1 == 2): ?>
        <div class="menu guest-table">
            <div class="iteammenubg">
                <h2><?php echo $this->lang->line('gkpos_table_information') ?></h2>
                <table>
                    <tr>
                        <td><?php echo $this->lang->line('gkpos_table_number') ?></td>
                        <td>01</td>
                    </tr>
                    <tr>
                        <td><?php echo $this->lang->line('gkpos_table_guest_quantity') ?></td>
                        <td>02</td>
                    </tr>
                    <tr>
                        <td><?php echo $this->lang->line('gkpos_table_guest_seated_time') ?></td>
                        <td>02.50 PM</td>
                    </tr>
                    <tr>
                        <td><?php echo $this->lang->line('gkpos_table_first_order_taken') ?></td>
                        <td><?php echo $this->lang->line('gkpos_n_a') ?></td>
                    </tr>
                    <tr>
                        <td><?php echo $this->lang->line('gkpos_table_last_order_taken') ?></td>
                        <td><?php echo $this->lang->line('gkpos_n_a') ?></td>
                    </tr>
                </table>
            </div>
        </div>
    <?php endif; ?>
    <div class="menupage-category-info">
        <div id="categoryTitle"><p class="sidebar-heading text-uppercase">Please click on the menu category</p></div>
        <div id="categoryDescription"></div>
    </div>
    <div id="menuListArea"></div>
</div>
<script>
    function getMenuByCategory(category) {
        $.ajax({
            url: "<?php echo site_url('gkpos/orders/get_menus_by_category') ?>",
            data: {
                category: category
            },
            type: "POST",
            dataType: "json",
            beforeSend: function () {

            },
            success: function (output) {
                if (true === output.status) {
                    $('#menuListArea').html('');
                    var menuIndex = 1;
                    $.each(output.menus, function () {
                        if (menuIndex == 1) {
                            $('#categoryTitle').html('');
                            $('#categoryDescription').html('');
                            $('#categoryTitle').append(' <p class="sidebar-heading text-uppercase">' + this.categoryTitle + '</p>');
                            var description = this.categoryContent;
                            if (description) {
                                $('#categoryDescription').append(' <p class="info">' + this.categoryContent + '</p>');
                            }
                            btnColorClass = "btn-devide-by-one ";
                        } else if (menuIndex % 2 == 0) {
                            btnColorClass = "btn-devide-by-two ";
                        } else if (menuIndex % 3 == 0 && menuIndex % 2 != 0) {
                            btnColorClass = "btn-devide-by-three ";
                        } else if (menuIndex % 7 == 0 && menuIndex % 2 != 0 && menuIndex % 3 != 0) {
                            btnColorClass = "btn-devide-by-seven ";
                        } else if (menuIndex % 5 == 0 && menuIndex % 2 != 0 && menuIndex % 3 != 0 && menuIndex % 4 != 0) {
                            btnColorClass = "btn-devide-by-five ";
                        } else {
                            btnColorClass = "btn-devide-by-one ";
                        }
                        $('#menuListArea').append('<div id="' + this.category + this.id + '" class="' + btnColorClass + 'col-lg-4 col-md-4 col-sm-4 col-xs-4 menu-item" title="' + this.content + '" onclick=getMenuByCategory("' + this.id + '")>' + this.title + '</div>');
                        menuIndex++;
                    });
                } else {
                    $('#menuListArea').html('');
                    $('#categoryDescription').html('');
                    $('#categoryDescription').append(' <p class="info text-uppercase">No Menus found on this category</p>');
                }
            },
            error: function (xhr, status, errorThrown) {
                console.log("Sorry, there was a problem!");
                console.log("Error: " + errorThrown);
                console.log("Status: " + status);
                console.dir(xhr);
            },
            // Code to run regardless of success or failure
            complete: function (xhr, status) {
                console.log("The request is complete!");
            }

        });

    }
</script>