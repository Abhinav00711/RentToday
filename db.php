<?php
// TODO: ADD DB Config
$host = "";
$user = "";
$password = "";
$dbname = "";
$port = "";



try{
  //Set DSN data source name
    $dsn = "pgsql:host=" . $host . ";port=" . $port .";dbname=" . $dbname . ";user=" . $user . ";password=" . $password . ";";
    $connStr = "host=$host port=$port dbname=$dbname user=$user password=$password";

  //create a pdo instance
  $pdo = pg_connect($connStr);

  $pod = new PDO($dsn, $user, $password);
  $pod->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
  $pod->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
  $pod->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}
catch (PDOException $e) {
echo 'Connection failed: ' . $e->getMessage();
}
?>