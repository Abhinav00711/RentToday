<?php
include ('../../db.php');
include ('../../config.php');

$name = pg_escape_string($_POST['name1']);
$contact = pg_escape_string($_POST['phone1']);
$email = pg_escape_string($_POST['email1']);
$guardian_name = pg_escape_string($_POST['guardian_name1']);
$guardian_contact = $_POST['guardian_contact1'];
$role = pg_escape_string($_POST['role1']);
$city = pg_escape_string($_POST['city1']);
$state = pg_escape_string($_POST['state1']);

if(isset($_COOKIE['tenant_id'])){
    $username = $_COOKIE['tenant_id'];
    $query = "Update tenant_details Set (name,contact,email,guardian_name,guardian_contact,city,state,role) = ('$name','$contact','$email','$guardian_name','$guardian_contact','$city','$state','$role') Where tenant_id='$username';";
    try{
        $stmt1 = $pod->prepare($query);
        $stmt1->execute();
            echo "<script>
            location.href='../tenant_dashboard/tenant_dashboard.php'</script>";
    }
    catch(Exception $e){
        /* link to sign up page */
        echo "<script>
        alert('An error occured')
        location.href='../tenant_dashboard/tenant_dashboard.php'</script>";
    }
}
else{
    echo "<script>
    alert('An error occured')
    location.href='../../Login/login.php'</script>";
}
?>