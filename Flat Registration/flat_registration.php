<!DOCTYPE HTML>
<HTML lang="en">
   <head>
      <meta charset="UTF-8">
      <link rel="stylesheet" type="text/css" href="flat_reg.css">
      <title>RentToday</title>
      <script src="validation.js"></script>
      <script>
        function disableInput()
        {
            
            var spin = document.getElementById("loader");
            spin.style.visibility="visible";
            var btn = document.getElementById("btn");
            btn.value="Submitting...";
            btn.disabled=true;
            btn.style.opacity="0.5";
            var res = document.getElementById("res");
            res.disabled=true;
            res.style.opacity="0.5";
        }
        function enableInput()
        {
            
            var spin = document.getElementById("loader");
            spin.style.visibility="hidden";
            var btn = document.getElementById("btn");
            btn.value="Submit";
            btn.disabled=false;
            btn.style.opacity="1";
            var res = document.getElementById("res");
            res.disabled=false;
            res.style.opacity="1";
        }
        </script>
   </head>
   <body>
      <?php
         if(isset($_COOKIE['owner_id'])) {
            $owner_id = $_COOKIE['owner_id'];
            $prop_id = uniqid($owner_id);
         
         if(isset($_COOKIE['prop_id'])) {
            setcookie("prop_id", "", time() - 3600,'/');
         }
         setcookie("prop_id", $prop_id, NULL ,'/');
      ?>
      <main>
         <header>
            <h1>Post Your Property Advertisement For Free</h1>
         </header>
         <div>
            <h2> Create Your Account </h2>
            <p> * Required Information </p>
            <form method="post" action="flat_reg.php" id="flatform" name="flatform">
               <fieldset>
                  <legend>Property details</legend>
                  <label for="prop_name">Property Name <span>*</span></label><input type="text" id="prop_name" name="prop_name" required /><br>
                  <label for="prop_address">Address <span>*</span></label><input type="text"  name="prop_address" id="prop_address" required /><br>
                  <label for="room_price">Price <span>*</span></label><input type="text"  name="room_price" id="room_price" required /><br>
                  <label for="landmark">Landmark <span>*</span></label><input type="text"  name="landmark" id="landmark" required />
               </fieldset>
               <fieldset>
                  <legend>Images</legend>
                  <label for="Attachment" > Images </label>
                            <input type="file" accept="image/*" id="img" name="att" multiple>
                            <input type="hidden" name="images" id="images"/>
                            <input type="hidden" name="images1" id="images1"/>
                         </fieldset>
                         <fieldset>
                            <legend>Flat Facilities</legend>
                  <label for="Wifi">WIFI <span>*</span></label>
                  <input type="radio" name="wifi"  value="yes" id="Wifi_yes" required/>Yes
                  <input type="radio" name="wifi"  value="no" id="Wifi_no"/>No<br>
                  <label for="drinking_water">Drinking Water <span>*</span></label>
                  <input type="radio" name="drinkingwater"  value="yes" id="drinking_water_yes" required/>Yes
                  <input type="radio" name="drinkingwater"  value="no" id="drinking_water_no" required/>No<br>
                  <label for="Lift">Lift <span>*</span></label>
                  <input type="radio" name="Lift"  value="yes" id="Lift_yes" required/>Yes
                  <input type="radio" name="Lift"  value="no" id="Lift_no" required/>No<br>
                  <label for="Housekeeping">Housekeeping <span>*</span></label>
                  <input type="radio" name="Housekeeping"  value="yes" id="Housekeeping_yes" required/>Yes
                  <input type="radio" name="Housekeeping"  value="no" id="Housekeeping_no" required/>No<br>
                  <label for="furnished">Furnished <span>*</span></label>
                  <input type="radio" name="furnished"  value="yes" id="furnished_yes" required/>Yes
                  <input type="radio" name="furnished"  value="no" id="furnished_no" required/>No<br>
               </fieldset>
               <fieldset>
                  <label for ="level" > BHK <span>*</span> </label>
                  <select name="level" id="level" required>
                     <option value="" disabled selected> -Select- </option>
                     <option value="1"> 1 </option>
                     <option value="2"> 2 </option>
                     <option value="3"> 3 </option>
                     <option value="4"> 4 </option>
                     <option value="5"> 5 </option>
                  </select>
               </fieldset>
               <label for="duty">Property Description</label>
               <textarea name="comments" cols="40" rows="5" id="duty" maxlength="250" required></textarea>
               <br>
               </fieldset>
               <br><br>
               <div class="buttons">
                  <input type="reset" value="Reset" class="buttonSize" id="res"/>
                  <input type="submit" value="Submit" id="btn" class="buttonSize">&nbsp;&nbsp;&nbsp;&nbsp;<i id="loader" class="loader" style="visibility:hidden;"></i></input>
               </div>
               <br>
            </form>
            <script src="https://www.gstatic.com/firebasejs/8.3.0/firebase-app.js"></script>
            <script src="https://www.gstatic.com/firebasejs/8.3.0/firebase-storage.js"></script>

            <script src="../init.js"></script>
            <script src="../test.js"></script>
            <script>
            var myForm = document.getElementById('flatform');
            myForm.onsubmit = async function(event)
            {
               disableInput();
               event.preventDefault();
               if(myForm.checkValidity()){
                  if(formValidation()){
                     var result = await UPLOAD_IMAGES();
                     if(result==1){
                        myForm.submit();
                     } else {
                        alert("Failed");
                        enableInput();
                     }
                  } 
                  else {
                  enableInput();
                  }
               }
               else {
                  enableInput();
               }
            }
            </script>
         </div>
      </main>
      <?php
         }
      ?>
   </body>
</HTML>