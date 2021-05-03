<?php
include ('../db.php');  
include ('../config.php');

$app_id=$_POST['hidecomp'];

    try {
        $query = "UPDATE appointment SET completed = 'yes' WHERE app_id = ('$app_id');";
        $stmt = $pod->prepare($query);
        $stmt->execute();
        echo "<script>location.href='owner_app.php'</script>";
    } catch (PDOException $e) {
        die("Could not connect to the database $dbname :" . $e->getMessage());
        echo "<script>alert('An error occoured')
        location.href='owner_app.php'</script>";
    }

?>