<?php
    include ('../db.php');  
    include ('../config.php');
    
    if(isset($_COOKIE['owner_id'])) {
        $username = $_COOKIE['owner_id'];
        try {
            $sql = "SELECT * FROM owner_details WHERE owner_id = ('$username');";
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
<html style="background-color: #6F42C1;">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap1.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/bootstrap/js/bootstrap.min.js">
       <link rel="stylesheet" href="assets/css/Navigation-Clean.css">
</head>
<body class="text-muted bg-gradient-primary" style="background-image: url(&quot;none&quot;);background-color: #6F42C1;">
    <?php 
        while ($row = $q->fetch()){
    ?>
    <div style="margin-top: 150px;" class="container">
        <div class="card shadow-lg o-hidden border-0 my-5">
            <div class="card-body p-0" style="font-family: Montserrat, sans-serif;color: rgb(0,0,0);">
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-flex" style="padding: 0px ;">
                        <?php
                            if(strcasecmp(trim($row['gender']),'Male')==0){
                        ?>
                        <div class="flex-grow-1 bg-register-image" style="background-image: url(&quot;assets/img/man.png&quot;);background-repeat:no-repeat;background-color: white;margin:50px;background-size:contain;"></div>
                        <?php
                            }
                            elseif(strcasecmp(trim($row['gender']),'Female')==0){
                        ?>
                        <div class="flex-grow-1 bg-register-image" style="background-image: url(&quot;assets/img/woman.png&quot;);background-repeat:no-repeat;background-color: white;margin:50px;background-size:contain;"></div>
                        <?php    
                            }
                        ?>
                    </div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h4 class="text-dark mb-4" style="color: rgb(0,1,4);">Edit Your Profile&nbsp;</h4>
                            </div>
                            <form class="user" method="post" action="update.php">
                                <div class="form-group">
                                    <input class="form-control form-control-user" type="text" id="name" placeholder="Name *" value="<?php echo trim($row['name'])?>" name="name" style="color: rgb(11,11,11);" required>
                                </div>
                                <div class="form-group">
                                    <input class="form-control form-control-user" type="email" id="email" placeholder="Email Address *" value="<?php echo trim($row['email'])?>" name="email" style="color: rgb(11,11,11);" required>
                                </div>
                                <div class="form-group">
                                    <input class="form-control form-control-user" type="tel" id="phone" placeholder="Phone Number *" maxlength="10" minlength="10" pattern="[0-9]{10}" value="<?php echo trim($row['contact'])?>" name="phone" style="color: rgb(11,11,11);" required>
                                </div>
                                <a href="owner_dashboard.php" class="btn btn-primary text-white btn-facebook btn-user" role="button" style="width:30%;margin-left:40px;margin-right:40px;background-color: #6F42C1;font-family: Ubuntu, sans-serif;">
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
