<?php
    include ('../db.php');  
    include ('../config.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
		<title>Admin Panel</title>
		<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
		<link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
	</head>
	<body id="page-top">
		<div id="wrapper">
			<div class="d-flex flex-column" id="content-wrapper">
				<div id="content">
					<nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top"></nav>
					<div class="container-fluid">
						<div class="d-sm-flex justify-content-between align-items-center mb-4">
							<h3 class="text-dark mb-0">Dashboard</h3>
							<!-- <button class="btn btn-primary btn-sm d-none d-sm-inline-block" type="button">
                                <i class="fas fa-download fa-sm text-white-50"></i>&nbsp;Generate Report
                            </button> -->
						</div>
						<div class="row">
							<div class="col-6 col-md-6 col-xl-3 mb-4">
								<div class="card shadow border-left-primary py-2">
									<div class="card-body">
										<div class="row align-items-center no-gutters">
											<div class="col mr-2">
												<div class="text-uppercase text-primary font-weight-bold text-xs mb-1">
                                                    <span>Number of Owners</span>
                                                </div>
                                                <?php                                        
                                                    try {
                                                        $sql = "SELECT COUNT(*) FROM owner_details;";
                                                        $q = $pod->query($sql);
                                                        $q->setFetchMode(PDO::FETCH_ASSOC);
                                                    } catch (PDOException $e) {
                                                        die("Could not connect to the database $dbname :" . $e->getMessage());
                                                    }
                                                    while ($row = $q->fetch()){
                                                ?>
												<div class="text-dark font-weight-bold h5 mb-0">
                                                    <span><?php echo $row['count']?></span>
                                                </div>
                                                <?php
                                                    }
                                                ?>
											</div>
											<div class="col-auto">
                                                <i class="fas fa-users fa-2x text-gray-300" style="color: rgb(221, 223, 235);"></i>
                                            </div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-6 col-md-6 col-xl-3 mb-4">
								<div class="card shadow border-left-success py-2">
									<div class="card-body">
										<div class="row align-items-center no-gutters">
											<div class="col mr-2">
												<div class="text-uppercase text-success font-weight-bold text-xs mb-1">
                                                    <span>number of tenants</span>
                                                </div>
												<?php                                        
                                                    try {
                                                        $sql1 = "SELECT COUNT(*) FROM tenant_details;";
                                                        $q1 = $pod->query($sql1);
                                                        $q1->setFetchMode(PDO::FETCH_ASSOC);
                                                    } catch (PDOException $e) {
                                                        die("Could not connect to the database $dbname :" . $e->getMessage());
                                                    }
                                                     while ($row1 = $q1->fetch()){
                                                ?>
												<div class="text-dark font-weight-bold h5 mb-0">
                                                    <span><?php echo $row1['count']?></span>
                                                </div>
                                                <?php
                                                    }
                                                ?>
											</div>
											<div class="col-auto">
                                                <i class="fas fa-users fa-2x text-gray-300"></i>
                                            </div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-4 col-lg-5 col-xl-4">
								<div class="card shadow mb-4">
									<div class="card-header d-flex justify-content-between align-items-center">
										<h6 class="text-primary font-weight-bold m-0">Total Properties</h6>
									</div>
									<div class="card-body">
                                        <?php  
                                            $flat = 0;
                                            $pg = 0;
                                            $i=0;                                  
                                            try {
                                                $sql2 = "SELECT COUNT(*) FROM property_details GROUP BY prop_type;";
                                                $q2 = $pod->query($sql2);
                                                $q2->setFetchMode(PDO::FETCH_ASSOC);
                                            } catch (PDOException $e) {
                                                die("Could not connect to the database $dbname :" . $e->getMessage());
                                            }
                                             while ($row2 = $q2->fetch()){
                                                 if($i==0){
                                                     $flat = $row2['count'];
                                                 } else {
                                                    $pg = $row2['count'];
                                                 }
                                                 $i++;
                                            }
                                        ?>
										<div class="chart-area">
											<canvas data-bss-chart="{&quot;type&quot;:&quot;doughnut&quot;,&quot;data&quot;:{&quot;labels&quot;:[&quot;Flat&quot;,&quot;PG&quot;],&quot;datasets&quot;:[{&quot;label&quot;:&quot;&quot;,&quot;backgroundColor&quot;:[&quot;#4e73df&quot;,&quot;#1cc88a&quot;],&quot;borderColor&quot;:[&quot;#ffffff&quot;,&quot;#ffffff&quot;],&quot;data&quot;:[&quot;<?php echo $flat ?>&quot;,&quot;<?php echo $pg ?>&quot;]}]},&quot;options&quot;:{&quot;maintainAspectRatio&quot;:false,&quot;legend&quot;:{&quot;display&quot;:true,&quot;position&quot;:&quot;top&quot;,&quot;reverse&quot;:false},&quot;title&quot;:{}}}"></canvas>
										</div>
									</div>
								</div>
							</div>
							<div class="col-4 col-lg-5 col-xl-4">
								<div class="card shadow mb-4">
									<div class="card-header d-flex justify-content-between align-items-center">
										<h6 class="text-primary font-weight-bold m-0">Total Appointments</h6>
									</div>
									<div class="card-body">
                                        <?php 
                                            $comp = 0;
                                            $pend = 0;
                                            $j=0;                                       
                                            try {
                                                $sql3 = "SELECT COUNT(*) FROM appointment GROUP BY completed;";
                                                $q3 = $pod->query($sql3);
                                                $q3->setFetchMode(PDO::FETCH_ASSOC);
                                            } catch (PDOException $e) {
                                                die("Could not connect to the database $dbname :" . $e->getMessage());
                                            }
                                             while ($row3 = $q3->fetch()){
                                                if($j==0){
                                                    $comp = $row3['count'];
                                                } else {
                                                   $pend = $row3['count'];
                                                }
                                                $j++;
                                             }
                                        ?>
										<div class="chart-area">
											<canvas data-bss-chart="{&quot;type&quot;:&quot;doughnut&quot;,&quot;data&quot;:{&quot;labels&quot;:[&quot;Pending&quot;,&quot;Completed&quot;],&quot;datasets&quot;:[{&quot;label&quot;:&quot;&quot;,&quot;backgroundColor&quot;:[&quot;#4e73df&quot;,&quot;#1cc88a&quot;],&quot;borderColor&quot;:[&quot;#ffffff&quot;,&quot;#ffffff&quot;],&quot;data&quot;:[&quot;<?php echo $comp ?>&quot;,&quot;<?php echo $pend ?>&quot;]}]},&quot;options&quot;:{&quot;maintainAspectRatio&quot;:false,&quot;legend&quot;:{&quot;display&quot;:true},&quot;title&quot;:{}}}"></canvas>
										</div>
									</div>
								</div>
							</div>
							<div class="col-4 col-lg-5 col-xl-4">
								<div class="card shadow mb-4">
									<div class="card-header d-flex justify-content-between align-items-center">
										<h6 class="text-primary font-weight-bold m-0">Facilities</h6>
									</div>
									<div class="card-body">
										<?php  
                                            $good = 0;
                                            $acceptable = 0;
                                            $poor = 0;                                  
                                            try {
                                                $sql6 = "SELECT nof,COUNT(*) FROM pg_facilities GROUP BY nof;";
                                                $q6 = $pod->query($sql6);
                                                $q6->setFetchMode(PDO::FETCH_ASSOC);
                                            } catch (PDOException $e) {
                                                die("Could not connect to the database $dbname :" . $e->getMessage());
                                            }
                                             while ($row6 = $q6->fetch()){
                                                 if((int) $row6['nof'] > 4){
													 $good += (int) $row6['count'];
												 }
												 elseif((int) $row6['nof'] > 1){
													 $acceptable += (int) $row6['count'];
												 }
												 else {
													$poor += (int) $row6['count'];
												}
                                            }
											try {
                                                $sql7 = "SELECT nof,COUNT(*) FROM flat_facilities GROUP BY nof;";
                                                $q7 = $pod->query($sql7);
                                                $q7->setFetchMode(PDO::FETCH_ASSOC);
                                            } catch (PDOException $e) {
                                                die("Could not connect to the database $dbname :" . $e->getMessage());
                                            }
                                             while ($row7 = $q7->fetch()){
                                                 if((int) $row7['nof'] > 4){
													 $good += (int) $row7['count'];
												 }
												 elseif((int) $row7['nof'] > 1){
													 $acceptable += (int) $row7['count'];
												 }
												 else {
													$poor += (int) $row7['count'];
												}
                                            }
                                        ?>
										<div class="chart-area">
											<canvas data-bss-chart="{&quot;type&quot;:&quot;doughnut&quot;,&quot;data&quot;:{&quot;labels&quot;:[&quot;Good&quot;,&quot;Acceptable&quot;,&quot;Poor&quot;],&quot;datasets&quot;:[{&quot;label&quot;:&quot;&quot;,&quot;backgroundColor&quot;:[&quot;#4e73df&quot;,&quot;#1cc88a&quot;,&quot;#36b9cc&quot;],&quot;borderColor&quot;:[&quot;#ffffff&quot;,&quot;#ffffff&quot;,&quot;#ffffff&quot;],&quot;data&quot;:[&quot;<?php echo $good ?>&quot;,&quot;<?php echo $acceptable ?>&quot;,&quot;<?php echo $poor ?>&quot;]}]},&quot;options&quot;:{&quot;maintainAspectRatio&quot;:false,&quot;legend&quot;:{&quot;display&quot;:true},&quot;title&quot;:{}}}"></canvas>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-6 mb-4">
								<div class="card shadow mb-4">
									<div class="card-header py-3">
										<h6 class="text-primary font-weight-bold m-0">Most Favorites</h6>
									</div>
									<ul class="list-group list-group-flush">
										<li class="list-group-item">
											<div class="row align-items-center no-gutters">
                                            <?php                                        
                                                try {
                                                    $sql4 = "SELECT * FROM fav_report;";
                                                    $q4 = $pod->query($sql4);
                                                    $q4->setFetchMode(PDO::FETCH_ASSOC);
                                                } catch (PDOException $e) {
                                                    die("Could not connect to the database $dbname :" . $e->getMessage());
                                                }
                                                while ($row4 = $q4->fetch()){
                                            ?>
												<div class="col-12 mr-2">
													<h6 class="mb-0">
                                                        <strong><?php echo $row4['prop_name']?></strong>
                                                    </h6>
													<span class="text-xs"><?php echo $row4['owner_id']?></span>
												</div>
                                                <hr>
                                            <?php
                                                }
                                            ?>
											</div>
										</li>
									</ul>
								</div>
							</div>
							<div class="col">
								<div class="card shadow mb-4">
									<div class="card-header py-3">
										<h6 class="text-primary font-weight-bold m-0">Most Appointments</h6>
									</div>
									<ul class="list-group list-group-flush">
										<li class="list-group-item">
											<div class="row align-items-center no-gutters">
                                            <?php                                        
                                                try {
                                                    $sql5 = "SELECT * FROM app_report;";
                                                    $q5 = $pod->query($sql5);
                                                    $q5->setFetchMode(PDO::FETCH_ASSOC);
                                                } catch (PDOException $e) {
                                                    die("Could not connect to the database $dbname :" . $e->getMessage());
                                                }
                                                while ($row5 = $q5->fetch()){
                                            ?>
												<div class="col-12 mr-2">
													<h6 class="mb-0">
                                                        <strong><?php echo $row5['prop_name']?></strong>
                                                    </h6>
													<span class="text-xs"><?php echo $row5['owner_id']?></span>
												</div>
                                                <hr/>
                                            <?php
                                                }
                                            ?>
											</div>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
		</div>
		<script src="assets/js/jquery.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/chart.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
        <script src="assets/js/script.min.js"></script>
	</body>
</html>