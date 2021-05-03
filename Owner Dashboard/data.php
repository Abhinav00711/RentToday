<?php
include ('../db.php');  
include ('../config.php');

if(isset($_COOKIE['owner_id'])) {
    $username = $_COOKIE['owner_id'];
    try {
        $sql = "SELECT * FROM owner_details WHERE owner_id = ('$username');";
        
        $q = $pod->query($sql);
        $q->setFetchMode(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die("Could not connect to the database $dbname :" . $e->getMessage());
    }
} else {
    echo "<script>
        location.href='../Login/login.php'</script>";
}
?>