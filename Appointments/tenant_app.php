<?php
    include ('../db.php');  
    include ('../config.php');
    
    if(isset($_COOKIE['tenant_id'])) {
        $username = $_COOKIE['tenant_id'];
        try {
            $sql = "SELECT * FROM appointment WHERE tenant_id = ('$username');";
            $q = $pod->query($sql);
            $q->setFetchMode(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Could not connect to the database $dbname :" . $e->getMessage());
        }
    } else {
        echo "<script>
            location.href='../Login/login.php'</script>";
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Appointment</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/Navigation-Clean.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Ubuntu" rel="stylesheet">
    <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
    <script>
        function cancelapp(appid){
            var myForm = document.getElementById('cancelform');
            document.getElementById('hidecancel').value = appid;
            myForm.submit();
        }
    </script>
</head>

<body>
    <?php
        $app = array();
        $no_of_app = 0;
        while ($row = $q->fetch()){
            $app[] = $row;
            $no_of_app++;
        }
    ?>
    <nav class="navbar navbar-light navbar-expand-md fixed-top navigation-clean">
        <div class="container"><span></span>
            <div style="width: 100;height: 80;">
                <img class="img-fluid" src="assets/img/Untitled%20design.png" style="width: 80;height: 100;" width="80" height="60">
            </div>
            <a class="navbar-brand" href="#" style="font-size: 28px;">
                Rent<span style="color: var(--purple);font-size: 28px;">Today</span>
            </a>
            <div class="container-fluid" id="navcol-1">
                <ul class="navbar-nav flex-nowrap ml-auto">
                    <li class="nav-item ">
                        <div class="nav-item no-arrow">
                            <a style="margin-top: 5px;" class="nav-link" href="../Tenant/tenant_favorites/index.php">
                                <i class="fas fa-heart fa-fw"></i>
                            </a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <div class="nav-item">
                            <a style="margin-top: 5px;" class="nav-link" href="../Tenant/tenant_dashboard/tenant_dashboard.php">
                                <i class="fab fa-wpexplorer fa-fw"></i>
                            </a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <div class="nav-item">
                            <a class="nav-link">
                                <form method="post" action="../Tenant/logout.php">
                                    <input type="submit" class="btn btn-primary" style="background: #7d30bc;" value="Logout"></input>
                                </form>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <br><br><br><br><br>
    <form method="post" action="cancel1.php" id="cancelform" name="cancelform">
        <input type="hidden" id="hidecancel" name="hidecancel"/>
    </form>
    <div class="card">
        <center>
        <div class="card-header"> 
            <ul class="nav nav-tabs card-header-tabs pull-right"  id="myTab" role="tablist">
                <li class="navitem">
                    <a class="nav-link active" id="pa-tab" data-toggle="tab" href="#pending" role="tab" aria-controls="pending" aria-selected="true">Pending Appointments</a>
                </li>
                <li class="navitem">
                    <a class="nav-link" id="ca-tab" data-toggle="tab" href="#completed" role="tab" aria-controls="completed" aria-selected="false">Completed Appointments</a>
                </li>
            </ul>
        </div>
    </center>
        <center>
        <div class="card-body">
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="pending" role="tabpanel" aria-labelledby="pa-tab">
                    <table>
                        <tr>
                            <th class="tname">Owner Username</th>
                            <th class="date">Appointment Date</th>
                            <th class="time">Appointment Time</th>
                            <th class="res">Cancel</th>
                        </tr>
                        <?php
                                for ($i = 0; $i < $no_of_app; $i++){
                                    if(strcmp($app[$i]['completed'],'no')==0){
                            ?>
                            <tr class="t1">
                                <td class="tname"><?php echo $app[$i]['owner_id']?></td>
                                <td class="date"><?php echo $app[$i]['app_date']?></td>
                                <td class="time"><?php echo $app[$i]['app_time']?></td>
                                <td>
                                    <img src="assets/img/remove.png" onclick="cancelapp(<?php echo $app[$i]['app_id']?>);">
                                </td>
                            </tr>
                            <?php
                                    }
                                }
                            ?>
                    </table>
                </div>
                <div class="tab-pane fade" id="completed" role="tabpanel" aria-labelledby="ca-tab">
                    <table>
                        <tr>
                            <th class="tname">Owner Username</th>
                            <th class="date">Appointment Date</th>
                            <th class="time">Appointment Time</th>
                        </tr>
                        <?php
                            for ($i = 0; $i < $no_of_app; $i++){
                                if(strcmp($app[$i]['completed'],'yes')==0){
                        ?>
                        <tr class="t2">
                            <td class="tname"><?php echo $app[$i]['owner_id']?></td>
                            <td class="date"><?php echo $app[$i]['app_date']?></td>
                            <td class="time"><?php echo $app[$i]['app_time']?></td>
                        </tr>
                        <?php
                                }
                            }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </center>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>