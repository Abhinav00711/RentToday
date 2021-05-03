<?php
include ('../db.php');
include ('../config.php');


$name = trim(pg_escape_string($_POST['name1']));
$username = trim(pg_escape_string($_POST['username1']));
$contact = trim(pg_escape_string($_POST['contact1']));
$email = trim(pg_escape_string($_POST['email1']));
$age = trim($_POST['age1']);
$guardian_name = trim(pg_escape_string($_POST['guardian_name1']));
$guardian_contact = trim($_POST['guardian_contact1']);
$gender = trim(pg_escape_string($_POST['gender1']));
$password = trim(md5($_POST['password1'])); 
$role = trim(pg_escape_string($_POST['role1']));
$city = trim(pg_escape_string($_POST['city1']));
$state = trim(pg_escape_string($_POST['state1']));
$id_proof = trim(pg_escape_string($_POST['hidden1']));
$query = "Insert into tenant_details(tenant_id,name,contact,city,state,email,age,guardian_name,guardian_contact,gender,id_proof,role) values ('$username','$name','$contact','$city','$state','$email','$age','$guardian_name','$guardian_contact','$gender','$id_proof','$role');";
try{
    $stmt1 = $pod->prepare($query);
    $stmt1->execute();
    /* link to home page */
    //echo "<script>alert('Registered Succesfully')</script>";
    $query = "Insert into tenant_login(tenant_id,password) values ('$username', '$password');";
    try{
        $stmt2 = $pod->prepare($query);
        $stmt2->execute();

        if(isset($_COOKIE['tenant_id'])) {
            setcookie("tenant_id", "", time() - 3600, '/');
        }
        setcookie("tenant_id", $username, NULL ,'/'); 

        echo "<script>
        location.href='../Tenant/tenant_dashboard/tenant_dashboard.php'</script>";
    }
    catch(Exception $e){
        /* link to sign up page */
        try{
            $query = "Delete from tenant_login where tenant_id = ('$username');";
            $stmt3 = $pod->prepare($query);
            $stmt3->execute();
        }
        catch(Exception $e){
            echo "<script>
            alert('An error occured')
            location.href='registration.php'</script>";
            //echo $e->getMessage();
        }
        echo "<script>
        alert('An error occured')
        location.href='registration.php'</script>";
        //echo $e->getMessage();
    }
}
catch(Exception $e){
    /* link to sign up page */
    echo "<script>
    alert('An error occured')
    location.href='registration.php'</script>";
}
?>