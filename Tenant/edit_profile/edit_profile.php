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
<html style="background-color: #6F42C1;">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Edit Your Profile</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Ubuntu">
</head>
<body class="bg" style="background-color: #6F42C1;">
    <?php 
        while ($row = $q->fetch()){
    ?>
    <div class="container">
        <div class="card shadow-lg o-hidden border-0 my-5">
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-flex">
                        <?php
                            if(strcasecmp(trim($row['gender']),'Male')==0){
                        ?>
                                <div class="flex-grow-1 bg-register-image" style="background-image: url(&quot;assets/img/man.png&quot;);margin: 180px 0px 0px 40px;background-size:contain;width: 1000px;height: 400px;"></div>
                        <?php
                            }
                            elseif(strcasecmp(trim($row['gender']),'Female')==0){
                        ?>
                            <div class="flex-grow-1 bg-register-image" style="background-image: url(&quot;assets/img/woman.png&quot;);margin: 180px 0px 0px 40px;background-size:contain;width: 1000px;height: 400px;"></div>
                        <?php    
                            }
                        ?>
                    </div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h4 class="text-dark mb-4" style="font-family: Ubuntu, sans-serif;">Edit Your Profile !</h4>
                            </div>
                            <form class="user" method="post" action="update.php">
                                <div class="form-group">
                                    <input class="form-control form-control-user" type="text" id="name1" name="name1" placeholder="Name" value="<?php echo trim($row['name'])?>" style="margin: 0px 10px 10px 0px;" required>
                                </div>
                                <div class="form-group">
                                    <input class="form-control form-control-user" type="tel" id="phone1" name="phone1"  maxlength="10" minlength="10" placeholder="Phone *" pattern="[0-9]{10}" value="<?php echo trim($row['contact'])?>" style="margin: 0px 10px 10px 0px;" required>
                                </div>
                                <div class="form-group">
                                    <input class="form-control form-control-user" type="email" id="email1" name="email1" placeholder="Email Address" value="<?php echo trim($row['email'])?>" style="margin: 0px 10px 10px 0px;" required>
                                </div>
                                <div class="form-group">
                                    <input class="form-control form-control-user" type="text" id="guardian_name1" name="guardian_name1" placeholder="Guardian Name" value="<?php echo trim($row['guardian_name'])?>" style="margin: 0px 10px 10px 0px;" required>
                                </div>
                                <div class="form-group">
                                    <input class="form-control form-control-user" type="tel" id="guardian_contact1" name="guardian_contact1" maxlength="10" minlength="10" placeholder="Guardian Contact" pattern="[0-9]{10}" value="<?php echo trim($row['guardian_contact'])?>" style="margin: 0px 10px 10px 0px;" required>
                                </div>
                                <div class="form-group">
                                    <input class="form-control form-control-user" type="text" id="city1" name="city1" placeholder="Residence City" value="<?php echo trim($row['city'])?>" style="margin: 0px 10px 10px 0px;" required>
                                </div>
                                <div class="form-group">
                                    <input class="form-control form-control-user" type="text" id="state1" name="state1" placeholder="Residence State" value="<?php echo trim($row['state'])?>" style="margin: 0px 10px 10px 0px;" required>
                                </div>
                                <div class="form-group">
                                    <select class="form-control" name="role1" id="role1" style="border-radius: 10rem;" required>
                                        <?php
                                            if(strcasecmp(trim($row['role']),'Student')==0){
                                        ?>
                                        <option name="student1" value="Student" selected>Student</option>
                                        <option name="faculty1" value="Faculty">Faculty</option>
                                        <?php
                                            }
                                            elseif(strcasecmp(trim($row['role']),'Faculty')==0){
                                        ?>
                                        <option name="student1" value="Student">Student</option>
                                        <option name="faculty1" value="Faculty" selected>Faculty</option>
                                        <?php    
                                            }
                                        ?>
                                    </select>
                                </div>
                                <a href="../tenant_dashboard/tenant_dashboard.php" class="btn btn-primary text-white btn-facebook btn-user" role="button" style="width:30%;margin-left:40px;margin-right:40px;background-color: #6F42C1;font-family: Ubuntu, sans-serif;">
                                    Cancel
                                </a>
                                <input type="submit" class="btn btn-primary text-white btn-facebook btn-user" value="Save Changes" style="width:30%;margin-left:40px;margin-right:40px;background-color: #6F42C1;font-family: Ubuntu, sans-serif;"></input>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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