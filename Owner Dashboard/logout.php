<?php
if(isset($_COOKIE['owner_id'])) {
    setcookie("owner_id", "", time() - 3600,'/');
}
 if(isset($_COOKIE['prop_id'])) {
    setcookie("prop_id", "", time() - 3600, '/');
 }
 if(isset($_COOKIE['prop_index'])) {
    setcookie("prop_index", "", time() - 3600 ,'/');
 }
 echo "<script>
 window.localStorage.clear()
 location.href='../index.php'</script>";
?>