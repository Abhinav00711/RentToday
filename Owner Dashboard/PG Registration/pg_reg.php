<?php
include ('../../db.php');  
include ('../../config.php');

$prop_name = pg_escape_string($_POST['prop_name']);
$prop_address = pg_escape_string($_POST['prop_address']);
$room_price = pg_escape_string($_POST['room_price']);
$landmark = pg_escape_string($_POST['landmark']);
$wifi = pg_escape_string($_POST['wifi']);
$hot_water = pg_escape_string($_POST['hotwater']);
$lift = pg_escape_string($_POST['Lift']);
$housekeeping = pg_escape_string($_POST['Housekeeping']);
$ac = pg_escape_string($_POST['ac']);
$study_table = pg_escape_string($_POST['study_table']);
$meal = pg_escape_string($_POST['meal']);
$laundry = pg_escape_string($_POST['Laundary']);
$security = pg_escape_string($_POST['Security']);
$description = pg_escape_string($_POST['comments']);

$nof = 0;
if(strcmp($wifi,'yes')==0){
    $nof++;
}
if(strcmp($hot_water,'yes')==0){
    $nof++;
}
if(strcmp($lift,'yes')==0){
    $nof++;
}
if(strcmp($housekeeping,'yes')==0){
    $nof++;
}
if(strcmp($ac,'yes')==0){
    $nof++;
}
if(strcmp($study_table,'yes')==0){
    $nof++;
}
if(strcmp($meal,'yes')==0){
    $nof++;
}
if(strcmp($laundry,'yes')==0){
    $nof++;
}
if(strcmp($security,'yes')==0){
    $nof++;
}

if(isset($_POST['single'])) {
    $single = "yes";
}else{
    $single = "no";
}

if(isset($_POST['double'])) {
    $dbl = "yes";
}else{
    $dbl = "no";
}

if(isset($_POST['triple'])) {
    $triple = "yes";
}else{
    $triple = "no";
}

if(isset($_COOKIE['prop_id'])) {
    $prop_id = $_COOKIE['prop_id'];
    $query = "Update property_details set prop_name=('$prop_name'),prop_address=('$prop_address'),prop_type=('PG'),landmark=('$landmark'),room_price=('$room_price') where prop_id=('$prop_id');";
    try{
        $stmt1 = $pod->prepare($query);
        $stmt1->execute();
        /* link to home page */
        try{
            $query = "Update pg_facilities set (wifi,hot_water,lift,housekeeping,ac,study_table,meals,laundry,security,single_sharing,double_sharing,triple_sharing,description,nof) = ('$wifi','$hot_water','$lift','$housekeeping','$ac','$study_table','$meal','$laundry','$security','$single','$dbl','$triple','$description','$nof') where prop_id=('$prop_id');";
            $stmt2 = $pod->prepare($query);
            $stmt2->execute();
            if(isset($_COOKIE['prop_index'])) {
                setcookie("prop_index", "", time() - 3600,'/');
            }
            setcookie("prop_index", "0", NULL ,'/');
            echo "<script>
            location.href='../owner_dashboard.php'</script>";
            // $_SESSION['owner_id']=$username;

        }
        catch(Exception $e){
            echo "<script>
            alert('An error occured')
            location.href='../owner_dashboard.php'</script>";
        }
    }
    catch(Exception $e){
        /* link to sign up page */
        echo "<script>
        alert('An error occured')
        location.href='../owner_dashboard.php'</script>";
    }
}
?>