<?php
include ('../../db.php');  
include ('../../config.php');

$act = $_POST['act'];

if(isset($_COOKIE['tenant_id']) && isset($_COOKIE['prop_id'])){
    $tenant_id = $_COOKIE['tenant_id'];
    $prop_id = $_COOKIE['prop_id'];
    if(strcmp($act,'yes') == 0){
        $query= "Insert into favorite(tenant_id,prop_id) values ('$tenant_id','$prop_id');";
    } elseif (strcmp($act,'no') == 0){
        $query= "Delete from favorite where tenant_id = ('$tenant_id') AND prop_id = ('$prop_id');";
    }
    try{
        $stmt1 = $pod->prepare($query);
        $stmt1->execute();
        echo "<script>location.href='prop_det.php'</script>";
    }
    catch(Exception $e){
        echo "<script>
        alert('An error occured')
        location.href='prop_det.php'</script>";
    }
} else {
    echo "<script>
        location.href='../../Login/login.php'</script>";
}
?>