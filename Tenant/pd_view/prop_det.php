<?php
    include ('../../db.php');  
    include ('../../config.php');
    date_default_timezone_set("Asia/Kolkata");
    if(isset($_COOKIE['prop_id'])) {
        $id = $_COOKIE['prop_id'];
        try {
            $sql = "SELECT * FROM property_details WHERE prop_id = ('$id');";
            $q = $pod->query($sql);
            $q->setFetchMode(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Could not connect to the database $dbname :" . $e->getMessage());
        }
    } else {
        echo "<script>
            location.href='../tenant_dashboard/tenant_dashboard.php'</script>";
    }
?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
      <title>RentToday</title>
      <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
      <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
      <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
      <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
      <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/css/swiper.min.css">
      <link rel="stylesheet" href="assets/css/styles.min.css">
      <script>
        function togglefav(act){
            var form = document.getElementById("ToggleFav");
            var a = document.getElementById("act");
            a.value = act;
            form.submit();
        }
      </script>
   </head>
   <body id="page-top">
        <?php 
            while ($row = $q->fetch()){
                $urls = explode(",",$row['files']);
                $isFavorite = FALSE;
                if(isset($_COOKIE['tenant_id']) && isset($_COOKIE['prop_id'])){
                    $pid = $_COOKIE['prop_id'];
                    $tid = $_COOKIE['tenant_id'];
                    try {
                        $sql1 = "SELECT * FROM favorite WHERE tenant_id = ('$tid') AND prop_id = ('$pid');";
                        $q1 = $pod->query($sql1);
                        $q1->setFetchMode(PDO::FETCH_ASSOC);
                        while ($row1 = $q1->fetch()){
                            if(count($row1) > 0){
                                $isFavorite = TRUE;
                            }
                        }
                    } catch (PDOException $e) {
                        die("Could not connect to the database $dbname :" . $e->getMessage());
                    }
                } else {
                    echo "<script>
                        location.href='../../Login/login.php'</script>";
                }
        ?>
      <div id="wrapper">
         <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
               <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                  <div class="container-fluid">
                        <a href="../tenant_dashboard/tenant_dashboard.php">
                            <i class="fa fa-arrow-left" style="color: var(--indigo);font-size: 24px;"></i>
                        </a>
                     <form method="post" action="../logout.php">
                        <input type="submit" class="btn btn-primary" style="background: #7d30bc;" value="Logout"></input>
                    </form>
                  </div>
               </nav>
               <div class="container-fluid">
                  <div class="row">
                     <div class="col-lg-7 col-xl-8">
                        <div class="card shadow mb-4">
                           <div class="card-body">
                              <div class="simple-slider">
                                 <div class="swiper-container">
                                    <div class="swiper-wrapper">
                                        <?php
                                           for ($i = 0; $i < count($urls); $i++)
                                           {
                                        ?>
                                            <div class="swiper-slide" style="background: url(&quot;<?php echo $urls[$i] ?>&quot;) center center / contain no-repeat;"></div>
                                        <?php
                                           }
                                        ?>
                                    </div>
                                    <div class="swiper-pagination"></div>
                                    <div class="swiper-button-prev"></div>
                                    <div class="swiper-button-next"></div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <form method="post" action="fav.php" name="ToggleFav" id="ToggleFav">
                        <input type="hidden" name="act" id="act"/>
                     </form>
                     <div class="col-lg-5 col-xl-4">
                        <div class="card shadow mb-4">
                            <?php
                                if(strcmp($row['prop_type'],"Flat")==0){
                                    $p1 = $row['prop_id'];
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
                                <h6 class="text-primary font-weight-bold m-0" style="float: left;">Flat</h6>
                                <span style="color: #000000;font-weight:bold;float: right;">₹ <?php echo $row['room_price']?></span>
                           </div>
                           <div class="card-body">
                                <div class="row">
                                    <div class="col-10">
                                        <h3 class="text-dark mb-0"><?php echo $row['prop_name']?></h3>
                                    </div>
                                    <div class="col-2">
                                        <?php
                                            if(!$isFavorite){
                                        ?>
                                        <a class="nav-link">
                                            <i class="far fa-heart tada animated" onclick="togglefav('yes');" style="color: var(--indigo);"></i>
                                        </a>
                                        <?php
                                            } else {
                                        ?>
                                        <a class="nav-link">
                                            <i class="fas fa-heart tada animated" onclick="togglefav('no');" style="color: var(--indigo);"></i>
                                        </a>
                                        <?php
                                            }
                                        ?>
                                    </div>
                                </div>
                                <h6 class="mb-0" style="margin: 10px 0px;">
                                    <strong><?php echo $row['description']?></strong>
                                </h6>
                                <h6 class="mb-0">
                                    <strong><?php echo $row['prop_address']?></strong>
                                </h6>
                                <h6 class="mb-0" style="margin: 10px 0px;">
                                    <strong><?php echo $row['landmark']?></strong>
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
                                        <a class="nav-link" data-bss-hover-animate="pulse">
                                            <i class="fa fa-wifi" style="color: #7d30bc;"></i>
                                            <span style="color: #7d30bc;">&nbsp; Wifi</span>
                                        </a>
                                    </li>
                                    <?php
                                        }
                                        if(strcmp($row2['drinking_water'],'yes')==0){
                                    ?>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bss-hover-animate="pulse">
                                            <i class="fas fa-water" style="color: #7d30bc;"></i>
                                            <span style="color: #7d30bc;">&nbsp; Drinking Water</span>
                                        </a>
                                    </li>
                                    <?php
                                        }
                                        if(strcmp($row2['furnished'],'yes')==0){
                                    ?>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bss-hover-animate="pulse">
                                            <i class="fas fa-chair" style="color: #7d30bc;"></i>
                                            <span style="color: #7d30bc;">&nbsp; Furnished</span>
                                        </a>
                                    </li>
                                    <?php
                                        }
                                        if(strcmp($row2['lift'],'yes')==0){
                                    ?>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bss-hover-animate="pulse">
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
                                        <a class="nav-link" data-bss-hover-animate="pulse">
                                            <i class="fas fa-bath" style="color: #7d30bc;"></i>
                                            <span style="color: #7d30bc;">&nbsp; Housekeeping</span>
                                        </a>
                                    </li>
                                    <?php
                                        }
                                    ?>
                              </ul>
                              <br>
                              <ul class="nav text-light" id="accordionSidebar-2">
                                 <li class="nav-item">
                                    <?php
                                        date_default_timezone_set("Asia/Kolkata");
                                    ?>
                                        <form method="post" action="app.php">
                                        <a class="nav-link">
                                            <span style="color: var(--indigo);">
                                                &nbsp;Book an appointment&nbsp; &nbsp;
                                                <br>
                                                <input type="date" name="date" min="<?php echo date("Y-m-d")?>" value="<?php echo date("Y-m-d")?>"/>
                                                <input type="time" name="time" value='<?php echo date("H:i")?>'/>
                                                <input type="hidden" name="owner_id" value="<?php echo $row['owner_id']?>"/>
                                            </span>
                                        </a>
                                        <a class="nav-link" style="margin: 0px 20px;text-align: center;">
                                            <input type="submit" class="btn btn-primary btn-sm text-center d-sm-inline-block" style="color: var(--white);background: var(--purple);"></input>
                                        </a>
                                        </form>
                                    </li>
                                </ul>
                           </div>
                           <?php
                                }
                                elseif(strcmp($row['prop_type'],"PG")==0){
                                    $p1 = $row['prop_id'];
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
                                <h6 class="text-primary font-weight-bold m-0" style="float: left;">Paying Guest</h6>
                                <span style="color: #000000;font-weight:bold;float: right;">₹ <?php echo $row['room_price']?></span>
                           </div>
                           <div class="card-body">
                                <div class="row">
                                <div class="col-10">
                                        <h3 class="text-dark mb-0"><?php echo $row['prop_name']?></h3>
                                    </div>
                                    <div class="col-2">
                                        <?php
                                            if(!$isFavorite){
                                        ?>
                                        <a class="nav-link">
                                            <i class="far fa-heart tada animated" onclick="togglefav('yes');" style="color: var(--indigo);"></i>
                                        </a>
                                        <?php
                                            } else {
                                        ?>
                                        <a class="nav-link">
                                            <i class="fas fa-heart tada animated" onclick="togglefav('no');" style="color: var(--indigo);"></i>
                                        </a>
                                        <?php
                                            }
                                        ?>
                                    </div>
                                </div>
                                <h6 class="mb-0" style="margin: 10px 0px;">
                                    <strong><?php echo $row['description']?></strong>
                                </h6>
                                <h6 class="mb-0">
                                    <strong><?php echo $row['prop_address']?></strong>
                                </h6>
                                <h6 class="mb-0" style="margin: 10px 0px;">
                                    <strong><?php echo $row['landmark']?></strong>
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
                              <ul class="nav text-light" id="accordionSidebar-1">
                                    <?php
                                        if(strcmp($row2['wifi'],'yes')==0){
                                    ?>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bss-hover-animate="pulse">
                                            <i class="fa fa-wifi" style="color: #7d30bc;"></i>
                                            <span style="color: #7d30bc;">&nbsp; Wifi</span>
                                        </a>
                                    </li>
                                    <?php
                                        }
                                        if(strcmp($row2['hot_water'],'yes')==0){
                                    ?>
                                    <li class="nav-item" data-bss-hover-animate="pulse">
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
                                        <a class="nav-link" data-bss-hover-animate="pulse">
                                            <i class="fas fa-tshirt" style="color: #7d30bc;"></i>
                                            <span style="color: #7d30bc;">&nbsp; Laundary</span>
                                        </a>
                                    </li>
                                    <?php
                                        }
                                        if(strcmp($row2['study_table'],'yes')==0){
                                    ?>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bss-hover-animate="pulse">
                                            <i class="fas fa-chair" style="color: #7d30bc;"></i>
                                            <span style="color: #7d30bc;">&nbsp; Study Table</span>
                                        </a>
                                    </li>
                                    <?php
                                        }
                                        if(strcmp($row2['lift'],'yes')==0){
                                    ?>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bss-hover-animate="pulse">
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
                                        <a class="nav-link" data-bss-hover-animate="pulse">
                                            <i class="fas fa-bath" style="color: #7d30bc;"></i>
                                            <span style="color: #7d30bc;">&nbsp; Housekeeping</span>
                                        </a>
                                    </li>
                                    <?php
                                        }
                                        if(strcmp($row2['ac'],'yes')==0){
                                    ?>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bss-hover-animate="pulse">
                                            <i class="fas fa-wind" style="color: #7d30bc;"></i>
                                            <span style="color: #7d30bc;">&nbsp; Air Conditioner</span>
                                        </a>
                                    </li>
                                    <?php
                                        }
                                        if(strcmp($row2['meals'],'yes')==0){
                                    ?>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bss-hover-animate="pulse">
                                            <i class="fas fa-hamburger" style="color: #7d30bc;"></i>
                                            <span style="color: #7d30bc;">&nbsp; Meals</span>
                                        </a>
                                    </li>
                                    <?php
                                        }
                                        if(strcmp($row2['security'],'yes')==0){
                                    ?>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bss-hover-animate="pulse">
                                            <i class="fa fa-map-signs" style="color: #7d30bc;"></i>
                                            <span style="color: #7d30bc;">&nbsp; Security</span>
                                        </a>
                                    </li>
                                    <?php
                                        }
                                    ?>
                              </ul>
                              <ul class="nav text-light" id="accordionSidebar-2">
                                 <li class="nav-item">
                                        <form method="post" action="app.php">
                                        <a class="nav-link">
                                            <span style="color: var(--indigo);">
                                                &nbsp;Book an appointment&nbsp; &nbsp;
                                                <br>
                                                <input type="date" name="date" min="<?php echo date("Y-m-d")?>" value="<?php echo date("Y-m-d")?>"/>
                                                <input type="time" name="time" value='<?php echo date("H:i")?>'/>
                                                <input type="hidden" name="owner_id" value="<?php echo $row['owner_id']?>"/>
                                            </span>
                                        </a>
                                        <a class="nav-link" style="margin: 0px 20px;text-align: center;">
                                            <input type="submit" class="btn btn-primary btn-sm text-center d-sm-inline-block" style="color: var(--white);background: var(--purple);"></input>
                                        </a>
                                        </form>
                                    </li>
                              </ul>
                           </div>
                           <?php
                                }
                            ?>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <footer class="bg-white sticky-footer"></footer>
         </div>
         <a class="border rounded d-inline scroll-to-top" href="#page-top">
             <i class="fas fa-angle-up"></i>
        </a>
      </div>
      <script src="assets/js/jquery.min.js"></script>
      <script src="assets/bootstrap/js/bootstrap.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/js/swiper.jquery.min.js"></script>
      <script src="assets/js/script.min.js"></script>
      <?php
            }
        ?>
   </body>
</html>