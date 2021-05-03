<?php
include ('../db.php');
include ('../config.php');

/* catch data from the form using Post and encoding password*/
$name = trim(pg_escape_string($_POST['username1']));
$pwd = trim(md5($_POST['password1']));

$sql = "SELECT password from tenant_login where tenant_id='$name';";
$stmt = $pod->prepare($sql);
$stmt->execute();
$loginpwd = $stmt->fetchColumn();

if($loginpwd!=NULL)
{
    if(!strcmp($pwd,$loginpwd))
    {
     /* link to home page */
     if(isset($_COOKIE['tenant_id'])) {
        setcookie("tenant_id", "", time() - 3600,'/');
    }
    if(isset($_POST['rme'])){
        setcookie("tenant_id", $name, time() + (86400 * 30) ,'/');
    }
    else{
        setcookie("tenant_id", $name, NULL ,'/');
    }
     echo "<script>
     location.href='../Tenant/tenant_dashboard/tenant_dashboard.php'</script>";
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