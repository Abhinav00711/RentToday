<?php
include ('../db.php');  
include ('../config.php');


$prop_name = pg_escape_string($_POST['prop_name']);
$prop_address = pg_escape_string($_POST['prop_address']);
$room_price = pg_escape_string($_POST['room_price']);
$landmark = pg_escape_string($_POST['landmark']);
$images = pg_escape_string($_POST['images']);
$files = pg_escape_string($_POST['images1']);
$wifi = pg_escape_string($_POST['wifi']);
$dwater = pg_escape_string($_POST['drinkingwater']);
$lift = pg_escape_string($_POST['Lift']);
$housekeeping = pg_escape_string($_POST['Housekeeping']);
$furnished = pg_escape_string($_POST['furnished']);
$bhk = $_POST['level'];
$description = pg_escape_string($_POST['comments']);

$nof = 0;
if(strcmp($wifi,'yes')==0){
    $nof++;
}
if(strcmp($dwater,'yes')==0){
    $nof++;
}
if(strcmp($lift,'yes')==0){
    $nof++;
}
if(strcmp($housekeeping,'yes')==0){
    $nof++;
}
if(strcmp($furnished,'yes')==0){
    $nof++;
}

if(isset($_COOKIE['owner_id']) && isset($_COOKIE['prop_id'])) {
    $owner_id = $_COOKIE['owner_id'];
    $prop_id = $_COOKIE['prop_id'];
    $query = "Insert into property_details(prop_id,owner_id,prop_name,prop_address,prop_type,landmark,room_price,images,files) values ('$prop_id','$owner_id','$prop_name','$prop_address','Flat','$landmark','$room_price','$images','$files');";
    try{
        $stmt1 = $pod->prepare($query);
        $stmt1->execute();

        /* link to home page */
        try{
            $query = "Insert into flat_facilities(prop_id,wifi,drinking_water,furnished,lift,housekeeping,bhk,description,nof) values ('$prop_id','$wifi','$dwater','$furnished','$lift','$housekeeping','$bhk','$description','$nof');";
            $stmt2 = $pod->prepare($query);
            $stmt2->execute();
            if(isset($_COOKIE['prop_index'])) {
                setcookie("prop_index", "", time() - 3600,'/');
            }
            setcookie("prop_index", "0", NULL ,'/');
            echo "<script>
            location.href='../Owner Dashboard/owner_dashboard.php'</script>";
            //navigate to owner dashboard
        }
        catch(Exception $e){
            
            try{
                $query = "Delete from property_details where prop_id = ('$prop_id');";
                $stmt3 = $pod->prepare($query);
                $stmt3->execute();
            }
            catch(Exception $e){
                echo "<script>
                alert('An error occured1')
                location.href='flat_registration.php'</script>";
                echo $e->getMessage();
            }
            echo "<script>
            alert('An error occured1')
            location.href='flat_registration.php'</script>";
            echo $e->getMessage();
        }
    }
    catch(Exception $e){
        /* link to sign up page */
        echo $e->getMessage();
        echo "<script>
        alert('An error occured3')
        location.href='flat_registration.php'</script>";
    }
}
else{
        echo "<script>
        alert('An error occured4')
        location.href='flat_registration.php'</script>";
}
?>