<?php
include ('../db.php');
include ('../config.php');


$name = trim(pg_escape_string($_POST['name']));
$contact = trim(pg_escape_string($_POST['contact']));
$password = trim(md5($_POST['password']));
$gender = trim(pg_escape_string($_POST['gender']));
$username = trim(pg_escape_string($_POST['username']));
$email = trim(pg_escape_string($_POST['email']));
$prop_type = trim(pg_escape_string($_POST['prop_type']));
$address_proof = trim(pg_escape_string($_POST['hidden']));
$query = "Insert into owner_details(owner_id,name,contact,email,property_type,gender,address_proof) values ('$username', '$name', '$contact', '$email', '$prop_type', '$gender', '$address_proof');";
try{
    $stmt1 = $pod->prepare($query);
    $stmt1->execute();
    /* link to home page */
    //echo "<script>alert('Registered Succesfully')</script>";
    try{
        $query = "Insert into owner_login(owner_id,password) values ('$username', '$password');";
        $stmt2 = $pod->prepare($query);
        $stmt2->execute();

        if(isset($_COOKIE['owner_id'])) {
            setcookie("owner_id", "", time() - 3600, '/');
        }
        
        setcookie("owner_id", $username, NULL ,'/'); 
        
        if($prop_type=="Flat"){
            
            echo "<script>location.href='../Flat Registration/flat_registration.php'</script>";
        }
        else if($prop_type=="PG"){
            echo "<script>location.href='../PG Registration/pg_registration.php'</script>";
        }
    }
    catch(Exception $e){
        /* link to sign up page */
        try{
            $query = "Delete from owner_login where owner_id = ('$username');";
            $stmt3 = $pod->prepare($query);
            $stmt3->execute();
        }
        catch(Exception $e){
            echo "<script>
            alert('An error occured1')
            location.href='registration.php'</script>";
            echo $e->getMessage();
        }
        echo "<script>
        alert('An error occured2')
        location.href='registration.php'</script>";
        echo $e->getMessage();
    }
}
catch(Exception $e){
    /* link to sign up page */
    echo "<script>
    alert('An error occured3')
    location.href='registration.php'</script>";
}
?>