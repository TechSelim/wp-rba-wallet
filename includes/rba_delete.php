<?php
//echo "employee delete";
function delete_rba_wallet(){

    if(isset($_GET['id'])){
        global $wpdb;
        $table_name=$wpdb->prefix.'rba_currencies';
        $i=$_GET['id'];
        $wpdb->delete(
            $table_name,
            array('id'=>$i)
        );
    }
    echo get_site_url() .'/wp-admin/admin.php?page=Employee_List';

    $url=admin_url('admin.php?page=rba_wallet');
    header("location:".$url);

}