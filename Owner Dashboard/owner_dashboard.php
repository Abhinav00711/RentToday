<?php
   include('data.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Owner Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
        <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
        <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
        <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/css/swiper.min.css">
        <link rel="stylesheet" href="assets/css/Simple-Slider.css">
        <script> 
            function setcookie(index){
                document.cookie = "prop_index=" + index +"; path=/;";
                location.reload();
            }
            function edit(pid,ptype){
                document.cookie = "prop_id=" + pid +"; path=/;";
                if(ptype==1){
                    location.href="PG Registration/pg_registration.php";
                } else if (ptype==0){
                    location.href="Flat Registration/flat_registration.php";
                }
            }
        </script>
    </head>
    <body id="page-top">
        <?php while ($row = $q->fetch()){?>
        <?php 
           include ('../db.php');  
           include ('../config.php');
           $properties = array();
           $no_of_prop = 0;
           $urls = array();
           if(isset($row['owner_id']) && isset($_COOKIE['prop_index'])) {
               $username1 = $row['owner_id'];
               try {
                   $sql1 = "SELECT * FROM property_details WHERE owner_id = ('$username1');";

                   $q1 = $pod->query($sql1);
                   $q1->setFetchMode(PDO::FETCH_ASSOC);
               } catch (PDOException $e) {
                   die("Could not connect to the database $dbname :" . $e->getMessage());
               }
           } else {
               echo "<script>
                   location.href='../Login/login.php'</script>";
           }
           while($row1 = $q1->fetch()){
             $properties[]=$row1;
             $urls[] = explode(",",$row1['files']);
             $no_of_prop++;
           }
           ?>
        <div id="wrapper">
            <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0" style="background: #7d30bc;">
                <div class="container-fluid d-flex flex-column p-0">
                    <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0">
                        <div class="sidebar-brand-text mx-3">
                            <span><?php echo $row['name']?></span>
                        </div>
                    </a>
                    <ul class="navbar-nav text-light" id="accordionSidebar">
                        <li class="nav-item">
                            <a class="nav-link">
                                <i class="fas fa-user"></i>
                                <span><?php echo $row['owner_id']?></span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link">
                                <i class="fa fa-phone"></i>
                                <span><?php echo $row['contact']?></span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link">
                                <i class="fa fa-envelope"></i>
                                <span style="display: inline-block;width: 80%;white-space: nowrap;overflow: hidden;text-overflow: ellipsis;"><?php echo $row['email']?></span>
                            </a>
                        </li>
                    </ul>
                    <div class="text-center d-none d-md-inline">
                        <a class="btn btn-primary btn-sm d-none d-sm-inline-block" role="button" href="edit_profile.php" style="margin: 10px;">EDIT YOUR PROFILE</a>
                    </div>
                    <?php
                        for ($i = 0; $i < $no_of_prop; $i++)
                        {
                            if($i == (int) $_COOKIE['prop_index']){
                     ?>
                     <button class="btn btn-info active" onclick="setcookie(<?php echo $i?>);" data-bss-hover-animate="tada" type="button" style="width: 80%;margin: 10px;overflow: hidden;white-space: nowrap;display: block;text-overflow: ellipsis;"><?php echo $properties[$i]['prop_name']?></button>
                     <?php
                            }
                            else {
                     ?>
                     <button class="btn btn-info" onclick="setcookie(<?php echo $i?>);" data-bss-hover-animate="tada" type="button" style="width: 80%;margin: 10px;overflow: hidden;white-space: nowrap;display: block;text-overflow: ellipsis;"><?php echo $properties[$i]['prop_name']?></button>
                     <?php
                            }
                        }
                    ?>
                    <a href="../Flat Registration/flat_registration.php">
                        <button class="btn btn-info" data-bss-hover-animate="tada" type="button" style="margin: 10px;">Add Flat</button>
                    </a>
                    <a href="../PG Registration/pg_registration.php">
                    <button class="btn btn-info" data-bss-hover-animate="tada" type="button" style="margin: 10px;">Add PG</button>
                    </a>
                </div>
            </nav>
            <div class="d-flex flex-column" id="content-wrapper">
                <div id="content">
                    <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                        <div class="container-fluid">
                            <ul class="navbar-nav flex-nowrap ml-auto">
                                <li class="nav-item dropdown no-arrow mx-1">
                                    <div class="nav-item dropdown no-arrow">
                                        <a class="dropdown-toggle nav-link" href="../Appointments/owner_app.php">
                                            <i class="fas fa-table fa-fw"></i>
                                        </a>
                                    </div>
                                </li>
                                <div class="d-none d-sm-block topbar-divider"></div>
                                <li class="nav-item dropdown no-arrow">
                                    <div class="nav-item dropdown no-arrow">
                                        <a class="dropdown-toggle nav-link">
                                        <form method="post" action="logout.php">
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
                        <div class="row">
                            <?php
                                $prop_index = (int) $_COOKIE['prop_index'];
                            ?>
                            <div class="col-lg-7 col-xl-8">
                                <div class="card shadow mb-4">
                                    <div class="card-body">
                                        <div class="simple-slider">
                                            <div class="swiper-container">
                                                <div class="swiper-wrapper">
                                                    <?php
                                                    for ($i = 0; $i < count($urls[$prop_index]); $i++)
                                                    {
                                                    ?>
                                                        <div class="swiper-slide" style="background: url(&quot;<?php echo $urls[$prop_index][$i] ?>&quot;) center center / contain no-repeat;"></div>
                                                    <?php
                                                    }
                                                    ?>
                                                </div>
                                                <div class="swiper-pagination"></div>
                                                <div class="swiper-button-prev" style="color: #7d30bc;"></div>
                                                <div class="swiper-button-next" style="color: #7d30bc;"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5 col-xl-4">
                                <div class="card shadow mb-4">
                                    <?php
                                        if(strcmp($properties[$prop_index]['prop_type'],"Flat")==0){
                                            $p1 = $properties[$prop_index]['prop_id'];
                                            try {
                                                $sql2 = "SELECT * FROM flat_facilities WHERE prop_id = ('$p1');";
                                
                                                $q2 = $pod->query($sql2);
                                                $q2->setFetchMode(PDO::FETCH_ASSOC);
                                            } catch (PDOException $e) {
                                                die("Could not connect to the database $dbname :" . $e->getMessage());
                                            }
                                            $row2 = $q2->fetch();
                                    ?>
                                    <div class="card-header d-flex justify-content-between align-items-center">
                                        <h6 class="text-primary font-weight-bold m-0" style="color: #7d30bc;">Flat</h6>
                                    </div>
                                    <div class="card-body">
                                        <h3 class="text-dark mb-0"><?php echo $properties[$prop_index]['prop_name']?></h3>
                                        <h6 class="mb-0" style="margin: 10px 0px;">
                                            <strong><?php echo $properties[$prop_index]['description']?></strong>
                                        </h6>
                                        <h6 class="mb-0">
                                            <strong><?php echo $properties[$prop_index]['prop_address']?></strong>
                                        </h6>
                                        <h6 class="mb-0" style="margin: 10px 0px;">
                                            <strong><?php echo $properties[$prop_index]['landmark']?></strong>
                                        </h6>
                                        <div class="text-center small mt-4">
                                            <?php 
                                                if(strcmp($row2['bhk'],'1')==0){
                                            ?>
                                            <span class="mr-2">
                                                <i class="fas fa-circle text-primary" style="color: #7d30bc;"></i>&nbsp;1BHK
                                            </span>
                                            <?php
                                                }
                                                elseif(strcmp($row2['bhk'],'2')==0){
                                            ?>
                                            <span class="mr-2">
                                                <i class="fas fa-circle text-success" style="color: #7d30bc;"></i>&nbsp;2BHK
                                            </span>
                                            <?php
                                                }
                                                elseif(strcmp($row2['bhk'],'3')==0){
                                            ?>
                                            <span class="mr-2">
                                                <i class="fas fa-circle text-info" style="color: #7d30bc;"></i>&nbsp;3BHK
                                            </span>
                                            <?php
                                                }
                                                elseif(strcmp($row2['bhk'],'4')==0){
                                            ?>
                                            <span class="mr-2">
                                                <i class="fas fa-circle text-primary" style="color: #7d30bc;"></i>&nbsp;4BHK
                                            </span>
                                            <?php
                                                }
                                                elseif(strcmp($row2['bhk'],'5')==0){
                                            ?>
                                            <span class="mr-2">
                                                <i class="fas fa-circle text-success" style="color: #7d30bc;"></i>&nbsp;5BHK
                                            </span>
                                            <?php 
                                                }
                                            ?>
                                        </div>
                                        <ul class="nav text-light" id="accordionSidebar-1">
                                            <?php
                                                if(strcmp($row2['wifi'],'yes')==0){
                                            ?>
                                            <li class="nav-item">
                                                <a class="nav-link">
                                                    <i class="fa fa-wifi" style="color: #7d30bc;"></i>
                                                    <span style="color: #7d30bc;">&nbsp; Wifi</span>
                                                </a>
                                            </li>
                                            <?php
                                                }
                                                if(strcmp($row2['drinking_water'],'yes')==0){
                                            ?>
                                            <li class="nav-item">
                                                <a class="nav-link">
                                                    <i class="fas fa-water" style="color: #7d30bc;"></i>
                                                    <span style="color: #7d30bc;">&nbsp; Drinking Water</span>
                                                </a>
                                            </li>
                                            <?php
                                                }
                                                if(strcmp($row2['furnished'],'yes')==0){
                                            ?>
                                            <li class="nav-item">
                                                <a class="nav-link">
                                                    <i class="fas fa-chair" style="color: #7d30bc;"></i>
                                                    <span style="color: #7d30bc;">&nbsp; Furnished</span>
                                                </a>
                                            </li>
                                            <?php
                                                }
                                                if(strcmp($row2['lift'],'yes')==0){
                                            ?>
                                            <li class="nav-item">
                                                <a class="nav-link">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" style="color: #7d30bc;">
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M14 3V3.28988C16.8915 4.15043 19 6.82898 19 10V17H20V19H4V17H5V10C5 6.82898 7.10851 4.15043 10 3.28988V3C10 1.89543 10.8954 1 12 1C13.1046 1 14 1.89543 14 3ZM7 17H17V10C17 7.23858 14.7614 5 12 5C9.23858 5 7 7.23858 7 10V17ZM14 21V20H10V21C10 22.1046 10.8954 23 12 23C13.1046 23 14 22.1046 14 21Z" fill="currentColor"></path>
                                                    </svg>
                                                    <span style="color: #7d30bc;">&nbsp; Lift</span>
                                                </a>
                                            </li>
                                            <?php
                                                }
                                                if(strcmp($row2['housekeeping'],'yes')==0){
                                            ?>
                                            <li class="nav-item">
                                                <a class="nav-link">
                                                    <i class="fas fa-bath" style="color: #7d30bc;"></i>
                                                    <span style="color: #7d30bc;">&nbsp; Housekeeping</span>
                                                </a>
                                            </li>
                                            <?php
                                                }
                                            ?>
                                        </ul>
                                        <span style="color: #000000;font-weight:bold">₹ <?php echo $properties[$prop_index]['room_price']?></span>
                                        <a class="btn btn-primary btn-sm d-none d-sm-inline-block" role="button" onclick="edit('<?php echo $properties[$prop_index]['prop_id']?>',0);" style="margin: 20px;background: #7d30bc;">&nbsp;Edit your Property</a>
                                    </div>
                                    <?php
                                        }
                                        elseif(strcmp($properties[$prop_index]['prop_type'],"PG")==0){
                                            $p1 = $properties[$prop_index]['prop_id'];
                                            try {
                                                $sql2 = "SELECT * FROM pg_facilities WHERE prop_id = ('$p1');";
                                
                                                $q2 = $pod->query($sql2);
                                                $q2->setFetchMode(PDO::FETCH_ASSOC);
                                            } catch (PDOException $e) {
                                                die("Could not connect to the database $dbname :" . $e->getMessage());
                                            }
                                            $row2 = $q2->fetch();
                                    ?>
                                    <div class="card-header d-flex justify-content-between align-items-center">
                                        <h6 class="text-primary font-weight-bold m-0" style="color: var(--indigo);">Paying Guest</h6>
                                    </div>
                                    <div class="card-body">
                                        <h3 class="text-dark mb-0"><?php echo $properties[$prop_index]['prop_name']?></h3>
                                        <h6 class="mb-0" style="margin: 10px 0px;">
                                            <strong><?php echo $properties[$prop_index]['description']?></strong>
                                        </h6>
                                        <h6 class="mb-0">
                                            <strong><?php echo $properties[$prop_index]['prop_address']?></strong>
                                        </h6>
                                        <h6 class="mb-0" style="margin: 10px 0px;">
                                            <strong><?php echo $properties[$prop_index]['landmark']?></strong>
                                        </h6>
                                        <h6 class="mb-0" style="margin: 10px 0px;">
                                            <strong>Beds per Room</strong>
                                        </h6>
                                        <div class="text-center small mt-4">
                                            <?php
                                                if(strcmp($row2['single_sharing'],'yes')==0){
                                            ?>
                                            <span class="mr-2">
                                                <i class="fas fa-circle text-primary" style="color: #7d30bc;"></i>&nbsp;Single&nbsp;
                                            </span>
                                            <?php
                                                }
                                                if(strcmp($row2['double_sharing'],'yes')==0){
                                            ?>
                                            <span class="mr-2">
                                                <i class="fas fa-circle text-success" style="color: #7d30bc;"></i>&nbsp;Double&nbsp;
                                            </span>
                                            <?php
                                                }
                                                if(strcmp($row2['triple_sharing'],'yes')==0){
                                            ?>
                                            <span class="mr-2">
                                                <i class="fas fa-circle text-info" style="color: #7d30bc;"></i>&nbsp;Triple
                                            </span>
                                            <?php
                                                }
                                            ?>
                                        </div>
                                        <ul class="nav text-light" id="accordionSidebar-2">
                                            <?php
                                                if(strcmp($row2['wifi'],'yes')==0){
                                            ?>
                                            <li class="nav-item">
                                                <a class="nav-link">
                                                    <i class="fa fa-wifi" style="color: #7d30bc;"></i>
                                                    <span style="color: #7d30bc;">&nbsp; Wifi</span>
                                                </a>
                                            </li>
                                            <?php
                                                }
                                                if(strcmp($row2['hot_water'],'yes')==0){
                                            ?>
                                            <li class="nav-item">
                                                <a class="nav-link">
                                                    <i class="fas fa-water" style="color: #7d30bc;"></i>
                                                    <span style="color: #7d30bc;">&nbsp; Hot Water</span>
                                                </a>
                                            </li>
                                            <?php
                                                }
                                                if(strcmp($row2['laundry'],'yes')==0){
                                            ?>
                                            <li class="nav-item">
                                                <a class="nav-link">
                                                    <i class="fas fa-tshirt" style="color: #7d30bc;"></i>
                                                    <span style="color: #7d30bc;">&nbsp; Laundary</span>
                                                </a>
                                            </li>
                                            <?php
                                                }
                                                if(strcmp($row2['study_table'],'yes')==0){
                                            ?>
                                            <li class="nav-item">
                                                <a class="nav-link">
                                                    <i class="fas fa-chair" style="color: #7d30bc;"></i>
                                                    <span style="color: #7d30bc;">&nbsp; Study Table</span>
                                                </a>
                                            </li>
                                            <?php
                                                }
                                                if(strcmp($row2['lift'],'yes')==0){
                                            ?>
                                            <li class="nav-item">
                                                <a class="nav-link">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" style="color: #7d30bc;">
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M14 3V3.28988C16.8915 4.15043 19 6.82898 19 10V17H20V19H4V17H5V10C5 6.82898 7.10851 4.15043 10 3.28988V3C10 1.89543 10.8954 1 12 1C13.1046 1 14 1.89543 14 3ZM7 17H17V10C17 7.23858 14.7614 5 12 5C9.23858 5 7 7.23858 7 10V17ZM14 21V20H10V21C10 22.1046 10.8954 23 12 23C13.1046 23 14 22.1046 14 21Z" fill="currentColor"></path>
                                                    </svg>
                                                    <span style="color: #7d30bc;">&nbsp; Lift</span>
                                                </a>
                                            </li>
                                            <?php
                                                }
                                            ?>
                                            <?php
                                                if(strcmp($row2['housekeeping'],'yes')==0){
                                            ?>
                                            <li class="nav-item">
                                                <a class="nav-link">
                                                    <i class="fas fa-bath" style="color: #7d30bc;"></i>
                                                    <span style="color: #7d30bc;">&nbsp; Housekeeping</span>
                                                </a>
                                            </li>
                                            <?php
                                                }
                                                if(strcmp($row2['ac'],'yes')==0){
                                            ?>
                                            <li class="nav-item">
                                                <a class="nav-link">
                                                    <i class="fas fa-wind" style="color: #7d30bc;"></i>
                                                    <span style="color: #7d30bc;">&nbsp; Air Conditioner</span>
                                                </a>
                                            </li>
                                            <?php
                                                }
                                                if(strcmp($row2['meals'],'yes')==0){
                                            ?>
                                            <li class="nav-item">
                                                <a class="nav-link">
                                                    <i class="fas fa-hamburger" style="color: #7d30bc;"></i>
                                                    <span style="color: #7d30bc;">&nbsp; Meals</span>
                                                </a>
                                            </li>
                                            <?php
                                                }
                                                if(strcmp($row2['security'],'yes')==0){
                                            ?>
                                            <li class="nav-item">
                                                <a class="nav-link">
                                                    <i class="fa fa-map-signs" style="color: #7d30bc;"></i>
                                                    <span style="color: #7d30bc;">&nbsp; Security</span>
                                                </a>
                                            </li>
                                            <?php
                                                }
                                            ?>
                                        </ul>
                                        <span style="color: #000000;font-weight:bold">₹ <?php echo $properties[$prop_index]['room_price']?></span>
                                        <a class="btn btn-primary btn-sm d-none d-sm-inline-block" role="button" onclick="edit('<?php echo $properties[$prop_index]['prop_id']?>',1);" style="margin: 20px;background: #7d30bc;">&nbsp;Edit your Property</a>
                                    </div>
                                    <?php
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <footer class="bg-white sticky-footer">
                    <div class="container my-auto">
                        <div class="text-center my-auto copyright">
                            <span>RentToday© Brand 2021</span>
                        </div>
                    </div>
                </footer>
            </div>
            <a class="border rounded d-inline scroll-to-top" href="#page-top">
                <i class="fas fa-angle-up"></i>
            </a>
        </div>
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/bs-init.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/js/swiper.jquery.min.js"></script>
        <script src="assets/js/Simple-Slider.js"></script>
        <script src="assets/js/theme.js"></script>
    </body>
    <?php
        }
    ?>
</html>