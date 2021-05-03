<?php
include ('../../db.php');  
include ('../../config.php');


$prop_name = pg_escape_string($_POST['prop_name']);
$prop_address = pg_escape_string($_POST['prop_address']);
$room_price = pg_escape_string($_POST['room_price']);
$landmark = pg_escape_string($_POST['landmark']);
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

if(isset($_COOKIE['prop_id'])) {
    $prop_id = $_COOKIE['prop_id'];
    $query = "Update property_details set (prop_name,prop_address,prop_type,landmark,room_price) = ('$prop_name','$prop_address','Flat','$landmark','$room_price') where prop_id='$prop_id';";
    try{
        $stmt1 = $pod->prepare($query);
        $stmt1->execute();

        /* link to home page */
        try{
            $query = "Update flat_facilities set (wifi,drinking_water,furnished,lift,housekeeping,bhk,description,nof) = ('$wifi','$dwater','$furnished','$lift','$housekeeping','$bhk','$description','$nof') where prop_id='$prop_id';";
            $stmt2 = $pod->prepare($query);
            $stmt2->execute();
            if(isset($_COOKIE['prop_index'])) {
                setcookie("prop_index", "", time() - 3600,'/');
            }
            setcookie("prop_index", "0", NULL ,'/');
            echo "<script>
            location.href='../owner_dashboard.php'</script>";
            //navigate to owner dashboard
        }
        catch(Exception $e){
            echo "<script>
            alert('An error occured')
            location.href='../owner_dashboard.php'</script>";
            echo $e->getMessage();
        }
    }
    catch(Exception $e){
        /* link to sign up page */
        echo $e->getMessage();
        echo "<script>
        alert('An error occured')
        location.href='../owner_dashboard.php'</script>";
    }
}
else{
        echo "<script>
        alert('An error occured4')
        location.href='../owner_dashboard.php'</script>";
}
?>