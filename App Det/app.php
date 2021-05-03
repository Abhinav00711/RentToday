<?php
include ('../db.php');  
include ('../config.php');

$app_date = $_POST['date'];
$app_time = $_POST['time'];

if(isset($_COOKIE['app_id'])){
    $app_id = $_COOKIE['app_id'];

    $query= "Update appointment set (app_date,app_time) = ('$app_date','$app_time') where app_id='$app_id';";
    try{
        $stmt1 = $pod->prepare($query);
        $stmt1->execute();
        echo "<script>location.href='app_details.php'</script>";
    }
    catch(Exception $e){
        echo "<script>
        alert('An error occured')
        location.href='app_details.php'</script>";
    }
} else {
    echo "<script>
        location.href='../Appointments/owner_app.php'</script>";
}
?>