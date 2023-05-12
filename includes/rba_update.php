<?php
//echo "update page";
function update_rba_wallet(){
    //echo "update page in";
    $i=$_GET['id'];
    global $wpdb;
    $table_name = $wpdb->prefix . 'rba_currencies';
    $currency = $wpdb->get_results("SELECT id,name,address from $table_name where id=$i");
    ?>
    
    <div class="wrap">
        <h2 class="">Edit Currency</h2>
        <form name="frm" action="#" method="post">
            <table class="form-table">

                <tbody>
                    <input type="hidden" name="id" value="<?= $currency[0]->id; ?>">
                    <tr>
                        <td>Name:</td>
                        <td><input type="text" name="nm" value="<?= $currency[0]->name; ?>"></td>
                    </tr>
                    <tr>
                        <td>Address:</td>
                        <td><input type="text" name="adrs" value="<?= $currency[0]->address; ?>"></td>
                    </tr>
                    
                    <tr>
                        <td></td>
                        <td><input type="submit" class="button-primary" value="Update" name="upd"></td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>

    <?php
}

if(isset($_POST['upd'])){

    global $wpdb;
    $table_name=$wpdb->prefix.'rba_currencies';
    $id=$_POST['id'];
    $nm=$_POST['nm'];
    $ad=$_POST['adrs'];

    $wpdb->update(
        $table_name,
        array(
            'name'=>$nm,
            'address'=>$ad
        ),
        array(
            'id'=>$id
        )
    );
    $url=admin_url('admin.php?page=rba_wallet');
    header("location:".$url);
}