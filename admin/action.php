<?php
include_once("inc/body.php");
if ($_POST["submit"] == "category") {
    $id = $_POST['id'];
    ?>
    <div class="grid-box-header">
        <span class="date"><label>Select</label><input type="checkbox" name="selectall" id="selectall" /></span>
        <span class="block" style="width:160px;">List Name</span> <span class="block" style="width:160px;">Description</span> <span class="block" style="width:160px;">Image</span><span class="block" style="width:160px;">Status</span> <span class="apply-icons" style="width:2%;">Modify</span> 
    </div>
    <?
    $q = $db->fireQuery("SELECT * FROM " . TBL_LIST . " WHERE `category_id`=" . $id);
    while ($r = mysql_fetch_array($q)) {
        ?>
        <div class="grid-box-data">
            <span class="date"><input type="checkbox" class="checkBox" name="checkAll[]" value="<?php echo $r["id"]; ?>" /></span> 
            <span class="block" style="width:160px;"><?php echo $r["list_name"]; ?></span> <span class="block" style="width:160px;overflow: hidden;"><?php echo $r["description"]; ?></span> 
            <span class="block" style="width:160px;padding-left:5px;"><?php $img = 'uploads/' . $r[image];
        echo"<img src='$img' height=30px,width=30px>"; ?></span> 
            <span class="block" style="width:160px;"><?php echo $r["status"]; ?></span>
            <div class="apply-icons-1">
                <ul>
                    <li><a href="add-edit-list.php?action=edit&&id=<?php echo siteEncrypt($r["id"]); ?>"><img src="images/edit-icon.png" alt="Edit" title="Edit"  /></a></li>
                    <li><a href="list-mgmt.php?action=delete&&id=<?php echo siteEncrypt($r["id"]); ?>"><img src="images/delate-icon.png" alt="Delete" title="Delete" /></a></li>
                </ul>
            </div>
        </div>
        <?
    }

    if ($id) {
        $_SESSION['msg'] = "Records Found";
    } else {
        $_SESSION['msg'] = "No Records Found";
    }
}
?>
