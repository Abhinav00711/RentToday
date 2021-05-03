<?php
    include ('../../db.php');  
    include ('../../config.php');
    
    if(isset($_COOKIE['tenant_id'])) {
        $username = $_COOKIE['tenant_id'];
        try {
            $sql = "SELECT * FROM tenant_details WHERE tenant_id = ('$username');";
            $q = $pod->query($sql);
            $q->setFetchMode(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Could not connect to the database $dbname :" . $e->getMessage());
        }
    } else {
        echo "<script>
            location.href='../../Login/login.php'</script>";
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <title>RentTodat</title>
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
        <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
        <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
        <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
        <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
        <link rel="stylesheet" href="assets/css/Projects-Horizontal.css">
        <script type="application/javascript"> 
            function setcookie(id){
                document.cookie = "prop_id=" + id +"; path=/;";
                location.href='../pd_view/prop_det.php';
            }
        </script>
    </head>
<body id="page-top">
    <?php 
        while ($row = $q->fetch()){
    ?>
    <?php 
        $properties = array();
        $no_of_prop = 0;
        $urls = array();
        try {
           $sql1 = "SELECT * FROM property_details WHERE prop_id IN (SELECT prop_id FROM favorite WHERE tenant_id = ('$username'));";
           $q1 = $pod->query($sql1);
           $q1->setFetchMode(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
           die("Could not connect to the database $dbname :" . $e->getMessage());
        }
        while($row1 = $q1->fetch()){
          $properties[]=$row1;
          $urls[] = explode(",",$row1['files']);
          $no_of_prop++;
        }
    ?>
    <div id="wrapper">
    <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0" style="color: var(--indigo);background: #7d30bc;">
                <div class="container-fluid d-flex flex-column p-0">
                    <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0">
                        <div class="sidebar-brand-text mx-3">
                            <span><?php echo $row['name']?></span>
                        </div>
                    </a>
                    <hr class="sidebar-divider my-0">
                    <ul class="navbar-nav text-light" id="accordionSidebar">
                        <li class="nav-item">
                            <a class="nav-link">
                                <i class="fa fa-phone"></i>
                                <span><?php echo $row['contact']?></span>
                            </a>
                            <a class="nav-link">
                                <i class="fa fa-envelope"></i>
                                <span><?php echo $row['email']?></span>
                            </a>
                            <a class="nav-link">
                                <i class="fas fa-birthday-cake"></i>
                                <span><?php echo $row['age']?></span>
                            </a>
                            
                        </li>
                    </ul>
                    <h6 class="mb-0" style="color: var(--white);">
                        <strong>Basic Information</strong>
                    </h6>
                    <ul class="navbar-nav text-light" id="accordionSidebar-1">
                        <li class="nav-item">
                            <a class="nav-link">
                                <i class="icon ion-location"></i>
                                <span><?php echo $row['city']?></span>
                            </a>
                            <a class="nav-link">
                                <i class="fas fa-transgender"></i>
                                <span><?php echo $row['gender']?></span>
                            </a>
                            <a class="nav-link">
                                <i class="fas fa-briefcase"></i>
                                <span><?php echo $row['role']?></span>
                            </a>
                        </li>
                    </ul>
                    <h6 class="mb-0" style="color: var(--white);">
                        <strong>Guardian Details</strong>
                    </h6>
                    <ul class="navbar-nav text-light" id="accordionSidebar-2">
                        <li class="nav-item">
                            <a class="nav-link">
                                <i class="fas fa-user-check"></i>
                                <span><?php echo $row['guardian_name']?></span>
                            </a>
                            <a class="nav-link">
                                <i class="fas fa-phone-alt"></i>
                                <span><?php echo $row['guardian_contact']?></span>
                            </a>
                        </li>
                    </ul>
                    <button class="btn btn-primary" type="button">Edit</button>
                </div>
            </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid">
                        <ul class="navbar-nav flex-nowrap ml-auto">
                            <li class="nav-item dropdown no-arrow mx-1">
                                <div class="nav-item dropdown no-arrow">
                                    <a class="dropdown-toggle nav-link" href="../tenant_dashboard/tenant_dashboard.php">
                                        <i class="fab fa-wpexplorer fa-fw"></i>
                                    </a>
                                </div>
                            </li>
                            <li class="nav-item dropdown no-arrow mx-1">
                                <div class="nav-item dropdown no-arrow">
                                    <a class="dropdown-toggle nav-link" href="../../Appointments/tenant_app.php">
                                        <i class="fas fa-calendar-check fa-fw"></i>
                                    </a>
                                </div>
                            </li>
                            <li class="nav-item dropdown no-arrow">
                                <div class="nav-item dropdown no-arrow">
                                    <a class="dropdown-toggle nav-link">
                                        <form method="post" action="../logout.php">
                                            <input type="submit" class="btn btn-primary" style="background: #7d30bc;" value="Logout"></input>
                                        </form>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
                <div class="container-fluid">
                    <div class="d-sm-flex justify-content-between align-items-center mb-4"></div>
                    <?php
                        for ($i = 0; $i < $no_of_prop; $i=$i+4)
                        { $j = $i;
                    ?>
                        <div class="row">
                            <?php
                                do{
                            ?>
                                <div class="col-md-6 col-xl-3 mb-4">
                                    <div class="card shadow border-left-primary py-2" style="color: var(--indigo);" onclick="setcookie('<?php echo $properties[$j]['prop_id']?>');">
                                        <picture>
                                            <img style="width: 200px;height: 160px;" src="<?php echo $urls[$j][0]?>">
                                        </picture>
                                        <div class="card-body">
                                            <div class="row align-items-center no-gutters">
                                                <div class="col mr-2">
                                                    <div class="text-uppercase text-primary font-weight-bold text-xs mb-1">
                                                        <span style="color: var(--blue);"><?php echo $properties[$j]['prop_name']?></span>
                                                    </div>
                                                    <div class="text-dark font-weight-bold h5 mb-0">
                                                        <span>₹ <?php echo $properties[$j]['room_price']?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                                $j++;
                                }while($j%4!=0 && $j<$no_of_prop); 
                            ?>
                        </div>
                    <?php
                        }
                    ?>
                </div>
            </div>
            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span>Copyright © RentToday 2021</span></div>
                </div>
            </footer>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="assets/js/theme.js"></script>
    <?php
        }
    ?>
</body>

</html>