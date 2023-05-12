<?php

function rba_wallet_list() {
    ?>
    <style>
        table {
            border-collapse: collapse;


        }

        table, td, th {
            border: 1px solid black;
            padding: 20px;
            text-align: center;
        }
        table th{
            text-align: center !important;
            font-weight: bold;
        }
    </style>
    <div class="wrap">
        <h2 class="">Currency list</h2>
        <table class="wp-list-table widefat fixed striped table-view-list posts">
            <thead>
            <tr>
                <th class="manage-column column-name column-primary">SL</th>
                <th class="manage-column column-name column-primary">Name</th>
                <th class="manage-column column-name column-primary">Address</th>
                <th class="manage-column column-name column-primary">Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php
            global $wpdb;
            $table_name = $wpdb->prefix . 'rba_currencies';
            $currencies = $wpdb->get_results("SELECT id,name,address from $table_name");
            $sl = 1;
            foreach ($currencies as $currency) {
                ?>
                <tr>
                    <td><?= $sl++; ?></td>
                    <td><?= $currency->name; ?></td>
                    <td><?= $currency->address; ?></td>
                    <td style="vertical-align: middle;">
                        <a class="page-title-action" style="display: inline-block;margin: 2px;" href="<?php echo admin_url('admin.php?page=update_rba_wallet&id=' . $currency->id); ?>">Edit</a>
                        <a onclick="confirm('Are you sure want to delete this data?');" class="page-title-action" style="display: inline-block;margin: 2px;" href="<?php echo admin_url('admin.php?page=delete_rba_wallet&id=' . $currency->id); ?>"> Delete</a>
                    </td>
                </tr>
            <?php } ?>

            </tbody>
            
        </table>
    </div>
    <?php

}
