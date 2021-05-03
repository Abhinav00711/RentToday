<?php
include ('../../db.php');  
include ('../../config.php');

$app_date = $_POST['date'];
$app_time = $_POST['time'];
$owner_id = $_POST['owner_id'];
if(isset($_COOKIE['tenant_id']) && isset($_COOKIE['prop_id'])){
    $tenant_id = $_COOKIE['tenant_id'];
    $prop_id = $_COOKIE['prop_id'];

    $query= "Insert into appointment(tenant_id,prop_id,owner_id,app_date,app_time,completed) values ('$tenant_id','$prop_id','$owner_id','$app_date','$app_time','no');";
    try{
        $stmt1 = $pod->prepare($query);
        $stmt1->execute();
        echo "<script>location.href='../tenant_dashboard/tenant_dashboard.php'</script>";
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