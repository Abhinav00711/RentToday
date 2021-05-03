<?php
include ('../db.php');
include ('../config.php');

$name = pg_escape_string($_POST['name']);
$contact = pg_escape_string($_POST['phone']);
$email = pg_escape_string($_POST['email']);

if(isset($_COOKIE['owner_id'])){
    $username = $_COOKIE['owner_id'];
    $query = "Update owner_details Set (name,contact,email) = ('$name','$contact','$email') Where owner_id='$username';";
    try{
        $stmt1 = $pod->prepare($query);
        $stmt1->execute();
            echo "<script>
            location.href='owner_dashboard.php'</script>";
    }
    catch(Exception $e){
        /* link to sign up page */
        echo "<script>
        alert('An error occured')
        location.href='owner_dashboard.php'</script>";
    }
}
else{
    echo "<script>
    alert('An error occured')
    location.href='../Login/login.php'</script>";
}
?>