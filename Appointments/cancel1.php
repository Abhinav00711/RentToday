<?php
include ('../db.php');  
include ('../config.php');

$app_id=$_POST['hidecancel'];

    try {
        $query = "DELETE from appointment WHERE app_id = ('$app_id');";
        $stmt = $pod->prepare($query);
        $stmt->execute();
        echo "<script>location.href='tenant_app.php'</script>";
    } catch (PDOException $e) {
        die("Could not connect to the database $dbname :" . $e->getMessage());
        echo "<script>alert('An error occoured')
        location.href='tenant_app.php'</script>";
    }

?>