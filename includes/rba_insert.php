<?php

function add_rba_currency(){ ?>
    <div class="wrap">
        <h2 class="">Add Currency</h2>
        <form name="frm" action="#" method="post">
        <table class="form-table">
            <tbody>
                    <tr>
                        <th>Name:</th>
                        <td>
                            <input require type="text" name="nm">
                        </td>
                    </tr>
                    <tr>
                        <th>Address:</th>
                        <td>
                            <input require type="text" name="adrs" >
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" class="button-primary" value="Add" name="ins"></td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
<?php
    if( isset( $_POST['ins'] ) ){
        global $wpdb;
        $nm=$_POST['nm'];
        $ad=$_POST['adrs'];

        $table_name = $wpdb->prefix . 'rba_currencies';

        $wpdb->insert(
            $table_name,
            array(
                'name' => $nm,
                'address' => $ad
            )
        );
    
        $url=admin_url('admin.php?page=rba_wallet');
        header("location:".$url);
    }
}
