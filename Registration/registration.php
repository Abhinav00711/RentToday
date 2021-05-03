<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <title>Registration</title>
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/Navigation-Clean.css">
        <link rel="stylesheet" href="assets/css/registration.css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat|Ubuntu" rel="stylesheet">
        <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
        <script>
            function disableInput()
            {
                document.getElementById("navhome").href="#";
                document.getElementById("navabout").href="#";
                var spin = document.getElementById("spinner");
                spin.style.visibility="visible";
                var btn = document.getElementById("btn");
                btn.value="Registering...";
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
                btn.value="Register";
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
                btn.value="Registering...";
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
                btn.value="Register";
                btn.disabled=false;
                btn.style.opacity="1";
            }
        </script>
    </head>
    <body>
        <nav class="navbar navbar-light navbar-expand-md fixed-top navigation-clean">
            <div class="container">
                <span></span>
                <div style="width: 100;height: 80;"><img class="img-fluid" src="assets/img/Untitled%20design.png" style="width: 80;height: 100;" width="80" height="60"></div>
                <a class="navbar-brand" href="#" style="font-size: 28px;">Rent<span style="color: var(--purple);font-size: 28px;">Today</span></a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navcol-1">
                    <ul class="navbar-nav text-dark ml-auto">
                        <li class="nav-item"><a class="nav-link" href="../index.php" id="navhome">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="../About/index.html" id="navabout">About Us</a></li>
                        <li class="nav-item" style="color: var(--light);"><a class="nav-link active text-dark" href="#" style="color: #6F42C1;background: white;">Login/Register</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <br><br><br>
        <div class="container register">
            <div class="row">
                <div class="col-md-3 register-left">
                    <img src="assets/img/home5.png" alt=""/>
                    <h3>Welcome</h3>
                    <p>You are 30 seconds away from renting/listing a property!</p>
                    <input type="submit" name="" value="Login" onclick="location.href='../Login/login.php';"/><br/>
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
                            <h3 class="register-heading">Register as an Owner</h3>
                            <div class="row register-form">
                                <div class="col-md-6">
                                    <form method="post" action="regp.php" id="ownerform" name="ownerform">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Name *" value="" name="name" required/>
                                        </div>
                                        <div class="form-group">
                                            <input type="tel" class="form-control" maxlength="10" minlength="10" placeholder="Phone *" pattern="[0-9]{10}" value="" name="contact" required/>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" minlength="6" placeholder="Password *" value="" name="password" required/>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control"  placeholder="Confirm Password *" value="" name="cpassword" required/>
                                        </div>
                                        <div class="form-group">
                                            <div class="maxl">
                                                <label>Gender *&nbsp;&nbsp;</label>
                                                <label class="radio inline"> 
                                                <input type="radio" name="gender" value="Male" checked required>
                                                <span> Male </span> 
                                                </label>
                                                <label class="radio inline"> 
                                                <input type="radio" name="gender" value="Female" required>
                                                <span>Female </span> 
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input type="hidden" class="form-control" placeholder="" value="" id="hidden" name="hidden"/>
                                        </div>
                                </div>
                                <div class="col-md-6">
                                <div class="form-group">
                                <input type="text" class="form-control" placeholder="Username *" value="" name="username" required/>
                                </div>
                                <div class="form-group">
                                <input type="email" class="form-control" placeholder="Email *" value="" name="email" required/>
                                </div>
                                <div class="form-group">
                                <select class="form-control" name="prop_type" required>
                                <option class="hidden" value="" selected disabled>Please select your Property Type</option>
                                <option name="flat" value="Flat">Flat</option>
                                <option name="pg" value="PG">PG</option>
                                </select>
                                </div>
                                <div class="form-group">
                                <label for="myfile">Upload Address Proof:</label>
                                <input type="file" accept="image/*,.pdf" class="form-control" value="" id="address_proof" name="address_proof" required/>
                                </div>
                                <div class="buttonbox"> 
                                <input type="submit" id="btn" class="btnRegister" value="Register"> <i id="spinner" class="spinner-grow" style="visibility:hidden;margin-top: 10%;color:#6F42C1;"></i></input>
                                </div>
                                </div>
                            </div>
                            </form>
                        </div>
                        <!-- Owner Form ended -->
                        <!-- Tenant form started -->
                        <div class="tab-pane fade show" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <h3  class="register-heading">Register as a Tenant</h3>
                            <div class="row register-form">
                                <div class="col-md-6">
                                    <form method="post" action="regp1.php" id="tenantform" name="tenantform">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Name *" value="" name="name1" required/>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Username *" value="" name="username1" required/>
                                        </div>
                                        <div class="form-group">
                                            <input type="tel" class="form-control" maxlength="10" minlength="10" placeholder="Phone *" pattern="[0-9]{10}" value="" name="contact1" required/>
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control" placeholder="Email *" value="" name="email1" required/>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" maxlength="3" minlength="2" class="form-control" placeholder="Age *" value="" name="age1" required/>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Guardian Name *" value="" name="guardian_name1" required/>
                                        </div>
                                        <div class="form-group">
                                            <input type="tel" class="form-control" maxlength="10" minlength="10" placeholder="Guardian Contact *" pattern="[0-9]{10}" value="" name="guardian_contact1" required/>
                                        </div>
                                        <div class="form-group">
                                            <div class="maxl">
                                                <label>Gender *&nbsp;&nbsp;</label>
                                                <label class="radio inline"> 
                                                <input type="radio" name="gender1" value="Male" checked required>
                                                <span> Male </span> 
                                                </label>
                                                <label class="radio inline"> 
                                                <input type="radio" name="gender1" value="Female" required>
                                                <span>Female </span> 
                                                </label>
                                            </div>
                                        </div>
                                        </div>
                                        <div class="col-md-6">
                                        <div class="form-group">
                                        <input type="password" class="form-control" placeholder="Password *" value="" name="password1" required/>
                                        </div>
                                        <div class="form-group">
                                        <input type="password" class="form-control" placeholder="Confirm Password *" name="cpassword1" value="" required/>
                                        </div>
                                        <div class="form-group">
                                        <select class="form-control" name="role1" required>
                                        <option class="hidden" value="" selected disabled>Please select your Role</option>
                                        <option name="student1" value="Student">Student</option>
                                        <option name="faculty1" value="Faculty">Faculty</option>
                                        </select>
                                        </div>
                                        <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Residence City *" value="" name="city1" required/>
                                        </div>
                                        <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Residence State *" value="" name="state1" required/>
                                        </div>
                                        <div class="form-group">
                                        <label for="myfile">Upload ID Proof:</label>
                                        <input type="file" accept="image/*,.pdf" class="form-control" value="" id="id_proof1" name="id_proof1" required/>
                                        </div>
                                        <div class="form-group">
                                        <input type="hidden" class="form-control" placeholder="" value="" id="hidden1" name="hidden1"/>
                                        </div>
                                        <div class="buttonbox"> 
                                        <input type="submit" id="btn1" class="btnRegister" value="Register"> <i id="spinner1" class="spinner-grow" style="visibility:hidden;margin-top: 10%;color:#6F42C1;"></i></input>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br><br>
        <!-- The core Firebase JS SDK is always required and must be listed first -->
        <script src="https://www.gstatic.com/firebasejs/8.3.0/firebase-app.js"></script>
        <script src="https://www.gstatic.com/firebasejs/8.3.0/firebase-storage.js"></script>
        <script src="../init.js"></script>
        <script src="reg.js"></script>
        <script src="reg1.js"></script>
        <script>
            //Validation
            
            var myForm = document.getElementById('ownerform');
            var myForm1 = document.getElementById('tenantform');

            myForm.onsubmit = function(event)
            {
                disableInput();
                event.preventDefault();
                if(myForm.checkValidity()){
                    if(formValidation()){
                        var usname = document.ownerform.username;
                        var str = usname.value + "/Address_Proof";
                        var fileInput = document.getElementById('address_proof');
                        var file = fileInput.files[0];
                        //alert(file.name);
                        var storageRef = firebase.storage().ref(str);
            
                        document.getElementById('hidden').value = str;
                        var task = storageRef.put(file);
                        
                        task.on('state_changed',
                            function progress(snapshot){
                            
                            },
                            function error(err){
                                alert("Error in File Upload");//Error
                                enableInput();
                            },
                            function complete(){
                                //alert("Complete");
                                myForm.submit();
                            }
                        );
                    } else {
                        enableInput();
                    }
                } else {
                    enableInput();
                }
            }

            myForm1.onsubmit = function(event)
            {
                disableInput1();
                event.preventDefault();
                if(myForm1.checkValidity()){
                    if(formValidation1()){
                        var usname = document.tenantform.username1;
                        var str = usname.value + "/Id_Proof";
                        var fileInput = document.getElementById('id_proof1');
                        var file = fileInput.files[0];
                        var storageRef = firebase.storage().ref(str);
                        
                        document.getElementById('hidden1').value = str;
                        var task = storageRef.put(file);
                        
                        task.on('state_changed',
                            function progress(snapshot){
                            
                            },
                            function error(err){
                                alert("Error in File Upload");//Error
                                enableInput1();
                            },
                            function complete(){
                                //alert("Complete");
                                myForm1.submit();
                            }
                        );
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

