<?php
include ('../db.php');
include ('../config.php');

/* catch data from the form using Post and encoding password*/
$name = trim(pg_escape_string($_POST['username']));
$pwd = trim(md5($_POST['password']));

$sql = "SELECT password from owner_login where owner_id='$name';";
$stmt = $pod->prepare($sql);
$stmt->execute();
$loginpwd = $stmt->fetchColumn();

if($loginpwd!=NULL)
{
    if(!strcmp($pwd,$loginpwd))
    {
     /* link to home page */
     if(isset($_COOKIE['owner_id'])) {
        setcookie("owner_id", "", time() - 3600,'/');
    }
    if(isset($_POST['rme'])){
        setcookie("owner_id", $name, time() + (86400 * 30) ,'/');
    }
    else{
        setcookie("owner_id", $name, NULL ,'/');
    }
    if(isset($_COOKIE['prop_index'])) {
        setcookie("prop_index", "", time() - 3600,'/');
    }
    setcookie("prop_index", "0", NULL ,'/');
     echo "<script>
        location.href='../Owner Dashboard/owner_dashboard.php'</script>";
     }
    else
    {
     /* link to login page */
        echo "<script>
        alert('Wrong Password.')
        location.href='login.php'</script>";
    }
}
else
{
 /* link to login page */
    echo "<script>
    alert('Invalid account.')
    location.href='login.php'</script>";
}
?>