<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Login</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Navigation-Clean.css">
    <link rel="stylesheet" href="assets/css/login.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Ubuntu" rel="stylesheet">
    <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
    <script src="log.js"></script>
    <script>
        function disableInput()
        {
            document.getElementById("navhome").href="#";
            document.getElementById("navabout").href="#";
            var spin = document.getElementById("spinner");
            spin.style.visibility="visible";
            var btn = document.getElementById("btn");
            btn.value="Logging In...";
            btn.disabled=true;
            btn.style.opacity="0.5";
        }
        function enableInput()
        {
            document.getElementById("navhome").href="../index.php";
            document.getElementById("navabout").href="../About/index.html";
            var spin = document.getElementById("spinner");
            spin.style.visibility="hidden";
            var btn = document.getElementById("btn");
            btn.value="Login";
            btn.disabled=false;
            btn.style.opacity="1";
        }
        function disableInput1()
        {
            document.getElementById("navhome").href="#";
            document.getElementById("navabout").href="#";
            var spin = document.getElementById("spinner1");
            spin.style.visibility="visible";
            var btn = document.getElementById("btn1");
            btn.value="Logging In...";
            btn.disabled=true;
            btn.style.opacity="0.5";
        }
        function enableInput1()
        {
            document.getElementById("navhome").href="../index.php";
            document.getElementById("navabout").href="../About/index.html";
            var spin = document.getElementById("spinner1");
            spin.style.visibility="hidden";
            var btn = document.getElementById("btn1");
            btn.value="Login";
            btn.disabled=false;
            btn.style.opacity="1";
        }
    </script>
</head>

<body class="d-md-flex justify-content-md-start align-items-md-start"><div class="container register">
    <nav class="navbar navbar-light navbar-expand-md fixed-top navigation-clean">
        <div class="container"><span></span>
            <div style="width: 100;height: 80;"><img class="img-fluid" src="assets/img/Untitled%20design.png" style="width: 80;height: 100;" width="80" height="60"></div><a class="navbar-brand" href="#" style="font-size: 28px;">Rent<span style="color: var(--purple);font-size: 28px;">Today</span></a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav text-dark ml-auto">
					<li class="nav-item"><a class="nav-link" href="../index.php" id="navhome">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="../About/index.html" id="navabout">About Us</a></li>
					<li class="nav-item" style="color: var(--light);"><a class="nav-link active text-dark" href="#" style="color: #6F42C1;background: white;">Login/Register</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <br><br>
    <div class="container register">
        <div class="row">
            <div class="col-md-3 register-left">
                <img src="assets/img/home.png" alt=""/>
                <h3>Welcome</h3>
                <p>Not yet Registered with us?</p>
                <input type="submit" name="" value="Register" onclick="location.href='../Registration/registration.php';"/><br/>
            </div>
            <div class="col-md-9 register-right">
                <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Owner</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Tenant</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <h3 class="register-heading">Login as an Owner</h3>
                        <div class="row register-form">
                            <div class="col-md-6">
                                <div class="c">
                                <form method="post" action="log.php" id="ownerlogin" name="ownerlogin" >
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Username *" value="" name="username" required/>
                                </div>
                                <br><br>
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="Password *" value="" name="password" required/>
                                </div>
                                <br>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" name="rme">
                                    <label class="form-check-label" for="flexCheckDefault">
                                      Remember Me
                                    </label>
                                </div>
                                <input type="submit" id="btn" class="btnRegister"  value="Login"> <i id="spinner" class="spinner-grow" style="visibility:hidden;margin-top: 10%;color:#6F42C1;"></i></input>
                            </form>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade show" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <h3  class="register-heading">Login as a Tenant</h3>
                        <div class="row register-form">
                            <div class="col-md-6">
                                <div class="c">
                                <form method="post" action="log1.php" id="tenantlogin" name="tenantlogin">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Username *" value="" name="username1" required/>
                                </div>
                                <br><br>
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="Password *" value="" name="password1" required/>
                                </div>
                                <br>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" name="rme">
                                    <label class="form-check-label" for="flexCheckDefault">
                                      Remember Me
                                    </label>
                                </div>
                                <input type="submit" id="btn1" class="btnRegister"  value="Login"> <i id="spinner1" class="spinner-grow" style="visibility:hidden;margin-top: 10%;color:#6F42C1;"></i></input>
                            </form>
                            </div>
                        </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script>
    var myForm = document.getElementById('ownerlogin');
    myForm.onsubmit = function(event)
    {
        disableInput();
        event.preventDefault();
        if(myForm.checkValidity()){
            if(loginValidation()){
                myForm.submit();
            } else {
                enableInput();
            }
        } else {
            enableInput();
        }
    }

    var myForm1 = document.getElementById('tenantlogin');
    myForm1.onsubmit = function(event)
    {
        disableInput1();
        event.preventDefault();
        if(myForm1.checkValidity()){
            if(loginValidation1()){
                myForm1.submit();
            } else {
                enableInput1();
            }
        } else {
            enableInput1();
        }
    }
    </script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>