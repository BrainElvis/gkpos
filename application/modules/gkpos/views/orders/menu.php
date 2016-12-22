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
        <div id="categoryTitle"><p class="sidebar-heading text-uppercase"><?php echo $this->lang->line('gkpos_click_category_mesage') ?></p></div>
        <div id="categoryDescription"></div>
    </div>
    <div id="menuListArea"></div>
</div>
