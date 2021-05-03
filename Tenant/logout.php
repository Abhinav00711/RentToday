<?php
if(isset($_COOKIE['tenant_id'])) {
    setcookie("tenant_id", "", time() - 3600,'/');
}
if(isset($_COOKIE['prop_id'])) {
    setcookie("prop_id", "", time() - 3600,'/');
}
 echo "<script>
 window.localStorage.clear()
 location.href='../index.php'</script>";
?>