<?php
    include ('../../db.php');  
    include ('../../config.php');
    
    if(isset($_COOKIE['prop_id'])) {
        $pid = $_COOKIE['prop_id'];
        try {
            $sql = "SELECT * FROM property_details WHERE prop_id = ('$pid');";
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
         while($row=$q->fetch()){   
            if(isset($_COOKIE['prop_id'])) {
               $pid = $_COOKIE['prop_id'];
               try {
                  $sql1 = "SELECT * FROM flat_facilities WHERE prop_id = ('$pid');";
                  $q1 = $pod->query($sql1);
                  $q1->setFetchMode(PDO::FETCH_ASSOC);
              } catch (PDOException $e) {
                  die("Could not connect to the database $dbname :" . $e->getMessage());
              }
           } else {
               echo "<script>
                   location.href='../../Login/login.php'</script>";
           }
      ?>
      <main>
         <header>
            <h1>Edit Property</h1>
         </header>
         <div>
            <p> * Required Information </p>
            <form method="post" action="flat_reg.php" id="flatform" name="flatform">
               <fieldset>
                  <legend>Property details</legend>
                  <label for="prop_name">Property Name <span>*</span></label><input type="text" id="prop_name" name="prop_name" value="<?php echo $row['prop_name'] ?>" required /><br>
                  <label for="prop_address">Address <span>*</span></label><input type="text"  name="prop_address" id="prop_address" value="<?php echo $row['prop_address'] ?>" required /><br>
                  <label for="room_price">Price <span>*</span></label><input type="text"  name="room_price" id="room_price" value="<?php echo $row['room_price'] ?>" required /><br>
                  <label for="landmark">Landmark <span>*</span></label><input type="text"  name="landmark" id="landmark" value="<?php echo $row['landmark'] ?>" required />
               </fieldset>
               <fieldset>
               <?php
                  while($row1 = $q1->fetch()){
               ?>
                  <fieldset>
                  <legend>Flat Facilities</legend>
                  <label for="Wifi">WIFI <span>*</span></label>
                  <?php
                     if(strcmp($row1['wifi'],'yes')==0){
                  ?>
                  <input type="radio" name="wifi"  value="yes" id="Wifi_yes" checked/>Yes
                  <input type="radio" name="wifi"  value="no" id="Wifi_no"/>No<br>
                  <?php
                     }
                     else{
                  ?>
                  <input type="radio" name="wifi"  value="yes" id="Wifi_yes"/>Yes
                  <input type="radio" name="wifi"  value="no" id="Wifi_no" checked/>No<br>
                  <?php
                     }
                  ?>
                  <label for="drinking_water">Drinking Water <span>*</span></label>
                  <?php
                     if(strcmp($row1['drinking_water'],'yes')==0){
                  ?>
                  <input type="radio" name="drinkingwater"  value="yes" id="drinking_water_yes" checked/>Yes
                  <input type="radio" name="drinkingwater"  value="no" id="drinking_water_no"/>No<br>
                  <?php
                     }
                     else{
                  ?>
                  <input type="radio" name="drinkingwater"  value="yes" id="drinking_water_yes"/>Yes
                  <input type="radio" name="drinkingwater"  value="no" id="drinking_water_no" checked/>No<br>
                  <?php
                     }
                  ?>
                  <label for="Lift">Lift <span>*</span></label>
                  <?php
                     if(strcmp($row1['lift'],'yes')==0){
                  ?>
                  <input type="radio" name="Lift"  value="yes" id="Lift_yes" checked/>Yes
                  <input type="radio" name="Lift"  value="no" id="Lift_no"/>No<br>
                  <?php
                     }
                     else{
                  ?>
                  <input type="radio" name="Lift"  value="yes" id="Lift_yes" checked/>Yes
                  <input type="radio" name="Lift"  value="no" id="Lift_no"/>No<br>
                  <?php
                     }
                  ?>
                  <label for="Housekeeping">Housekeeping <span>*</span></label>
                  <?php
                     if(strcmp($row1['housekeeping'],'yes')==0){
                  ?>
                  <input type="radio" name="Housekeeping"  value="yes" id="Housekeeping_yes" checked/>Yes
                  <input type="radio" name="Housekeeping"  value="no" id="Housekeeping_no"/>No<br>
                  <?php
                     }
                     else{
                  ?>
                  <input type="radio" name="Housekeeping"  value="yes" id="Housekeeping_yes"/>Yes
                  <input type="radio" name="Housekeeping"  value="no" id="Housekeeping_no" checked/>No<br>
                  <?php
                     }
                  ?>
                  <label for="furnished">Furnished <span>*</span></label>
                  <?php
                     if(strcmp($row1['furnished'],'yes')==0){
                  ?>
                  <input type="radio" name="furnished"  value="yes" id="furnished_yes" checked/>Yes
                  <input type="radio" name="furnished"  value="no" id="furnished_no"/>No<br>
                  <?php
                     }
                     else{
                  ?>
                  <input type="radio" name="furnished"  value="yes" id="furnished_yes"/>Yes
                  <input type="radio" name="furnished"  value="no" id="furnished_no" checked/>No<br>
                  <?php
                     }
                  ?>
               </fieldset>
               <fieldset>
                  <label for ="level" > BHK <span>*</span> </label>
                  <select name="level" id="level" required>
                  <?php
                     if(strcmp($row1['bhk'],'1')==0){
                  ?>
                     <option value="1" selected> 1 </option>
                  <?php
                     }
                     else{
                  ?>
                     <option value="1"> 1 </option>
                  <?php
                     }
                  ?>
                  <?php
                     if(strcmp($row1['bhk'],'2')==0){
                  ?>
                     <option value="2" selected> 2 </option>
                  <?php
                     }
                     else{
                  ?>
                     <option value="2"> 2 </option>
                  <?php
                     }
                  ?>
                  <?php
                     if(strcmp($row1['bhk'],'3')==0){
                  ?>
                     <option value="3" selected> 3 </option>
                  <?php
                     }
                     else{
                  ?>
                     <option value="3"> 3 </option>
                  <?php
                     }
                  ?>
                  <?php
                     if(strcmp($row1['bhk'],'4')==0){
                  ?>
                     <option value="4" selected> 4 </option>
                  <?php
                     }
                     else{
                  ?>
                     <option value="4"> 4 </option>
                  <?php
                     }
                  ?>
                  <?php
                     if(strcmp($row1['bhk'],'5')==0){
                  ?>
                     <option value="5" selected> 5 </option>
                  <?php
                     }
                     else{
                  ?>
                     <option value="5"> 5 </option>
                  <?php
                     }
                  ?>
                  </select>
               </fieldset>
               <label for="duty">Property Description</label>
               <textarea name="comments" cols="40" rows="5" id="duty" maxlength="250" required><?php echo $row1['description'] ?></textarea>
               <br>
               </fieldset>
               <br><br>
               <div class="buttons">
                  <input type="reset" value="Reset" class="buttonSize" id="res"/>
                  <input type="submit" value="Submit" id="btn" class="buttonSize">&nbsp;&nbsp;&nbsp;&nbsp;<i id="loader" class="loader" style="visibility:hidden;"></i></input>
               </div>
               <br>
            </form>
            <script>
            var myForm = document.getElementById('flatform');
            myForm.onsubmit = async function(event)
            {
               disableInput();
               event.preventDefault();
               if(myForm.checkValidity()){
                  if(formValidation()){
                     myForm.submit();
                  }
                  else {
                     enableInput();
                  }
               } else {
                  enableInput();
               }
            }
            </script>
         </div>
      </main>
      <?php
            }
         }
      ?>
   </body>
</HTML>