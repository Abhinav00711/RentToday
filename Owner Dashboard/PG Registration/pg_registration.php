<?php
   include ('../../db.php');  
   include ('../../config.php');

   if(isset($_COOKIE['prop_id'])) {
      $prop_id = $_COOKIE['prop_id'];
      try {
         $sql = "SELECT * FROM property_details WHERE prop_id = ('$prop_id');";
         $q = $pod->query($sql);
         $q->setFetchMode(PDO::FETCH_ASSOC);
     } catch (PDOException $e) {
         die("Could not connect to the database $dbname :" . $e->getMessage());
     }
   } else {
      echo "<script>location.href='../owner_dashboard.php'</script>";
   }
?>
<!DOCTYPE HTML>
<HTML lang="en">
   <head>
      <meta charset="UTF-8">
      <link rel="stylesheet" type="text/css" href="pg_reg.css">
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
         while($row = $q->fetch()){
            if(isset($_COOKIE['prop_id'])) {
               $prop_id = $_COOKIE['prop_id'];
               try {
                  $sql1 = "SELECT * FROM pg_facilities WHERE prop_id = ('$prop_id');";
                  $q1 = $pod->query($sql1);
                  $q1->setFetchMode(PDO::FETCH_ASSOC);
              } catch (PDOException $e) {
                  die("Could not connect to the database $dbname :" . $e->getMessage());
              }
            } else {
               echo "<script>location.href='../owner_dashboard.php'</script>";
            }
      ?>
      <main>
         <header>
            <h1>Edit Property</h1>
         </header>
         <div>
            <p> * Required Information </p>
            <form method="post" action="pg_reg.php" name="pgform" id="pgform">
               <fieldset>
                  <legend>Property details</legend>
                  <label for="prop_name">Property Name <span>*</span></label><input type="text" id="prop_name" name="prop_name" value="<?php echo $row['prop_name'] ?>" required /><br>
                  <label for="prop_address">Address <span>*</span></label><input type="text"  name="prop_address" id="prop_address" value="<?php echo $row['prop_address'] ?>" required /><br>
                  <label for="room_price">Price <span>*</span></label><input type="text"  name="room_price" id="room_price" value="<?php echo $row['room_price'] ?>" required /><br>
                  <label for="landmark">Landmark <span>*</span></label><input type="text"  name="landmark" id="landmark" value="<?php echo $row['landmark'] ?>" required />
               </fieldset>
               <?php
                  while($row1 = $q1->fetch()){
               ?>
               <fieldset>
                  <legend>PG Facilities</legend>
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
                  <label for="Hot_water">Hot Water <span>*</span></label>
                  <?php
                     if(strcmp($row1['hot_water'],'yes')==0){
                  ?>
                  <input type="radio" name="hotwater"  value="yes" id="Hot_water_yes" checked/>Yes
                  <input type="radio" name="hotwater"  value="no" id="Hot_water_no"/>No<br>
                  <?php
                     }
                     else{
                  ?>
                  <input type="radio" name="hotwater"  value="yes" id="Hot_water_yes"/>Yes
                  <input type="radio" name="hotwater"  value="no" id="Hot_water_no" checked/>No<br>
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
                  <label for="ac">Air Conditioner <span>*</span></label>
                  <?php
                     if(strcmp($row1['ac'],'yes')==0){
                  ?>
                  <input type="radio" name="ac"  value="yes" id="ac_yes" checked/>Yes
                  <input type="radio" name="ac"  value="no" id="ac_no"/>No<br>
                  <?php
                     }
                     else{
                  ?>
                  <input type="radio" name="ac"  value="yes" id="ac_yes"/>Yes
                  <input type="radio" name="ac"  value="no" id="ac_no" checked/>No<br>
                  <?php
                     }
                  ?>
                  <label for="study_table">Study Table <span>*</span></label>
                  <?php
                     if(strcmp($row1['study_table'],'yes')==0){
                  ?>
                  <input type="radio" name="study_table"  value="yes" id="study_table_yes" checked/>Yes
                  <input type="radio" name="study_table"  value="no" id="study_table_no"/>No<br>
                  <?php
                     }
                     else{
                  ?>
                  <input type="radio" name="study_table"  value="yes" id="study_table_yes"/>Yes
                  <input type="radio" name="study_table"  value="no" id="study_table_no" checked/>No<br>
                  <?php
                     }
                  ?>
                  <label for="meal">Meal <span>*</span></label>
                  <?php
                     if(strcmp($row1['meals'],'yes')==0){
                  ?>
                  <input type="radio" name="meal"  value="yes" id="meal_yes" checked/>Yes
                  <input type="radio" name="meal"  value="no" id="meal_no"/>No<br>
                  <?php
                     }
                     else{
                  ?>
                  <input type="radio" name="meal"  value="yes" id="meal_yes"/>Yes
                  <input type="radio" name="meal"  value="no" id="meal_no" checked/>No<br>
                  <?php
                     }
                  ?>
                  <label for="Laundary">Laundary <span>*</span></label>
                  <?php
                     if(strcmp($row1['laundry'],'yes')==0){
                  ?>
                  <input type="radio" name="Laundary"  value="yes" id="Laundary_yes" checked/>Yes
                  <input type="radio" name="Laundary"  value="no" id="Laundary_no"/>No<br>
                  <?php
                     }
                     else{
                  ?>
                  <input type="radio" name="Laundary"  value="yes" id="Laundary_yes"/>Yes
                  <input type="radio" name="Laundary"  value="no" id="Laundary_no" checked/>No<br>
                  <?php
                     }
                  ?>                 
                  <label for="Security">Security <span>*</span></label>
                  <?php
                     if(strcmp($row1['security'],'yes')==0){
                  ?>
                  <input type="radio" name="Security"  value="yes" id="Security_yes" checked/>Yes
                  <input type="radio" name="Security"  value="no" id="Security_no"/>No<br>
                  <?php
                     }
                     else{
                  ?>
                  <input type="radio" name="Security"  value="yes" id="Security_yes"/>Yes
                  <input type="radio" name="Security"  value="no" id="Security_no" checked/>No<br>
                  <?php
                     }
                  ?>
               </fieldset>
               <fieldset id="education">
                  <legend id="newledgent">Beds per room</legend>
                  <label class="container">Single
                  <?php
                     if(strcmp($row1['single_sharing'],'yes')==0){
                  ?>
                  <input type="checkbox" id="Single" value="yes" name="single" checked>
                  <?php
                     }
                     else{
                  ?>
                  <input type="checkbox" id="Single" value="yes" name="single">
                  <?php
                     }
                  ?>
                  <span class="checkmark"></span>
                  </label>
                  <label class="container">Double
                  <?php
                      if(strcmp($row1['double_sharing'],'yes')==0){
                  ?>
                  <input type="checkbox" id="Double" value="yes" name="double" checked>
                  <?php
                     }
                     else{
                  ?>
                  <input type="checkbox" id="Double" value="yes" name="double">
                  <?php
                     }
                  ?>
                  <span class="checkmark"></span>
                  </label>
                  <label class="container">Triple
                  <?php
                     if(strcmp($row1['triple_sharing'],'yes')==0){
                  ?>
                  <input type="checkbox" id="Triple" value="yes" name="triple" checked>
                  <?php
                     }
                     else{
                  ?>
                  <input type="checkbox" id="Triple" value="yes" name="triple">
                  <?php
                     }
                  ?>
                  <span class="checkmark"></span>
                  </label>
               </fieldset>
               <label for="duty">Property Description</label>
               <textarea name="comments" cols="40" rows="5" id="duty" maxlength="250" required><?php echo $row1['description'] ?></textarea>
               <br>
               </fieldset>
               <br><br>
               <div class="buttons">
                  <input type="reset" value="Reset" class="buttonSize" id="res"/>
                  <input type="submit" value="Submit" id="btn" class="buttonSize"><i id="loader" class="loader" style="visibility:hidden;"></i></input>
               </div>
               <br>
            </form>

            <script>
            var myForm = document.getElementById('pgform');
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