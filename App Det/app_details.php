<?php
    include ('../db.php');  
    include ('../config.php');
    date_default_timezone_set("Asia/Kolkata");
    if(isset($_COOKIE['app_id'])) {
        $username = $_COOKIE['app_id'];
        try {
            $sql = "SELECT * FROM appointment WHERE app_id = ('$username');";
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
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <title>Appointment</title>
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
        <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
        <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
        <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    </head>
    <body id="page-top">
        <?php
            while ($row = $q->fetch()){
                $tid = $row['tenant_id'];
                $pid = $row['prop_id'];
                try {
                    $sql1 = "SELECT * FROM tenant_details WHERE tenant_id = ('$tid');";
                    $q1 = $pod->query($sql1);
                    $q1->setFetchMode(PDO::FETCH_ASSOC);
                } catch (PDOException $e) {
                    die("Could not connect to the database $dbname :" . $e->getMessage());
                }
                while ($row1 = $q1->fetch()){
                    try {
                        $sql2 = "SELECT prop_name FROM property_details WHERE prop_id = ('$pid');";
                        $q2 = $pod->query($sql2);
                        $q2->setFetchMode(PDO::FETCH_ASSOC);
                    } catch (PDOException $e) {
                        die("Could not connect to the database $dbname :" . $e->getMessage());
                    }
        ?>
        <div id="wrapper">
            <?php
                if(isset($_COOKIE['owner_id'])) {
                    $username = $_COOKIE['owner_id'];
                    try {
                        $sql3 = "SELECT * FROM owner_details WHERE owner_id = ('$username');";
                        $q3 = $pod->query($sql3);
                        $q3->setFetchMode(PDO::FETCH_ASSOC);
                    } catch (PDOException $e) {
                        die("Could not connect to the database $dbname :" . $e->getMessage());
                    }
                } else {
                    echo "<script>
                        location.href='../Login/login.php'</script>";
                }
            ?>
            <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0" style="background: var(--purple);">
            <?php
                while($row3 = $q3->fetch()){
            ?>
                <div class="container-fluid d-flex flex-column p-0">
                    <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0">
                        <div class="sidebar-brand-text mx-3"><span><?php echo $row3['name']?></span></div>
                    </a>
                    <hr class="sidebar-divider my-0">
                    <ul class="navbar-nav text-light" id="accordionSidebar">
                        <li class="nav-item"><a class="nav-link active"><i class="fas fa-user"></i><span><?php echo $row3['owner_id']?></span></a></li>
                        <li class="nav-item"><a class="nav-link active"><i class="fa fa-envelope"></i><span><?php echo $row3['email']?></span></a></li>
                        <li class="nav-item"><a class="nav-link active"><i class="fa fa-phone"></i><span><?php echo $row3['contact']?></span></a></li>
                    </ul>
                    <div class="text-center d-none d-md-inline">
                        <a class="btn btn-primary btn-sm d-none d-sm-inline-block" role="button" href="../Appointments/owner_app.php" style="margin: 10px;">Back to Appoitnments</a>
                    </div>
                </div>
                <?php
                    }
                ?>
            </nav>
            <div class="d-flex flex-column" id="content-wrapper">
                <div id="content">
                    <div class="container-fluid">
                        <div class="d-sm-flex justify-content-between align-items-center mb-4"></div>
                        <div class="row">
                            <div class="col-lg-7 col-xl-8">
                                <div class="card shadow mb-4">
                                    <div class="card-header d-flex justify-content-between align-items-center" style="color: var(--purple);text-align: center;">
                                        <div class="row">
                                            <div class="col-3"><i class="fa fa-home tada animated infinite"></i></div>
                                            <div class="col-9">
                                                <?php 
                                                    while ($row2 = $q2->fetch()){
                                                ?>
                                                <h6 class="font-weight-bold m-0"><?php echo $row2['prop_name']?></h6>
                                                <?php
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-4 text-center">
                                                <?php
                                                    if(strcasecmp(trim($row1['gender']),'Male')==0){
                                                ?>
                                                <img src="assets/img/man.png" style="width: 200px;">
                                                <?php
                                                    }
                                                    else if(strcasecmp(trim($row1['gender']),'Female')==0){
                                                ?>
                                                <img src="assets/img/woman.png" style="width: 200px;">
                                                <?php
                                                    }
                                                ?>
                                            </div>
                                            <div class="col-8">
                                                <ul class="nav text-light" id="accordionSidebar-1" style="color: var(--purple);">
                                                    <li class="nav-item">
                                                        <a class="nav-link" style="color: var(--purple);">
                                                            <i class="fas fa-user"></i>
                                                            <span>&nbsp;<?php echo $row1['name']?></span>
                                                        </a>
                                                        <a class="nav-link" style="color: var(--purple);">
                                                        <i class="fa fa-phone"></i>
                                                        <span>&nbsp;<?php echo $row1['contact']?></span>
                                                        </a>
                                                        <a class="nav-link" style="color: var(--purple);">
                                                            <i class="fa fa-map-signs"></i>
                                                            <span>&nbsp;<?php echo $row1['state']?></span>
                                                        </a>
                                                        <a class="nav-link" style="color: var(--purple);">
                                                            <i class="fa fa-envelope"></i>
                                                            <span>&nbsp;<?php echo $row1['email']?></span>
                                                        </a>
                                                        <a class="nav-link" style="color: var(--purple);">
                                                            <i class="fa fa-transgender"></i>
                                                            <span>&nbsp;<?php echo $row1['gender']?></span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <span>Appointment Details</span>
                                        <ul class="nav text-light" id="accordionSidebar-2" style="color: var(--purple);">
                                            <li class="nav-item">
                                                <a class="nav-link" style="color: var(--purple);">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" class="bi bi-clock-fill">
                                                        <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z"></path>
                                                    </svg>
                                                    <span>&nbsp;<?php echo $row['app_time']?></span>
                                                </a>
                                                <a class="nav-link" style="color: var(--purple);">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" class="bi bi-calendar-check-fill">
                                                        <path fill-rule="evenodd" d="M4 .5a.5.5 0 0 0-1 0V1H2a2 2 0 0 0-2 2v1h16V3a2 2 0 0 0-2-2h-1V.5a.5.5 0 0 0-1 0V1H4V.5zM16 14V5H0v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2zm-5.146-5.146a.5.5 0 0 0-.708-.708L7.5 10.793 6.354 9.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z"></path>
                                                    </svg>
                                                    <span>&nbsp;<?php echo $row['app_date']?></span>
                                                </a>
                                                <a class="nav-link"></a>
                                            </li>
                                        </ul>
                                        <form method="post" action="app.php">
                                            <a class="nav-link">
                                                <span style="color: var(--indigo);">
                                                    <input type="date" name="date" min="<?php echo date("Y-m-d")?>" required/>
                                                    <input type="time" name="time" required/>
                                                </span>
                                            </a>
                                            <a class="nav-link" style="margin: 0px 20px;text-align: center;">
                                                <input type="submit" value="Reschedule" class="btn btn-primary btn-sm text-center d-sm-inline-block" style="color: var(--white);background: var(--purple);"></input>
                                            </a>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
        <script src="assets/js/script.min.js"></script>
        <?php
                }
            }
        ?>
    </body>
</html>

