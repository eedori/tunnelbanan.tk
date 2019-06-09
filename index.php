<!DOCTYPE html>
<html>
 <meta http-equiv="refresh" content="60;">
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<link  rel="stylesheet" type="text/css" href="style.php">
<body>
  <div>
    <br><br><br>
  </div>
  <div class="row">
    <div class="col-sm-4 logo">
  <img src="https://maxcdn.icons8.com/Share/icon/win10/Logos//atom_editor1600.png " alt="Mountain View" style="width:25px;height:25 px;">    adri innovations
  </div>
  <div class="col-sm-4">
    <h1>Departures</h1>
 </div>
</div>
<br><br><br>
<div class="alert alert-info" style="font-size:25px;">
  <strong>BETA!</strong>System is under development<br>
Data will be refreshed in <span id="countdowntimer">60 </span> seconds
<script type="text/javascript">
    var timeleft = 60;
    var downloadTimer = setInterval(function(){
    timeleft--;
    document.getElementById("countdowntimer").textContent = timeleft;
    if(timeleft <= 0)
        clearInterval(downloadTimer);
    },1000);
    
</script>
    
</div>
<br>
<br> <br>
<div class="row departing" >
  <div class="col-sm-6">
    <img src="https://cdn.iconscout.com/public/images/icon/free/png-512/metro-subway-underground-train-railway-engine-emoj-symbol-368e7101b9ce45ca-512x512.png" alt="Mountain View" style="width:150px;height:150px;"><br><br><br>
        <?php
      $json = file_get_contents('http://api.sl.se/api2/realtimedeparturesv4.json?key=YOURKEY&siteid=9205&timewindow=5');

      $data = json_decode($json, true);
       "<pre class='depap'>";
      foreach($data['ResponseData']['Metros'] as $bine) {
          echo "TRAIN LINE <kbd>".$bine['LineNumber']."</kbd> <br>"  ;
          echo "DESTINATION: <kbd>".$bine['Destination']."</kbd><br>";
          echo "DEPARTS: <kbd>>".$bine['DisplayTime']."</kbd><br><br>";
      }
      //echo_r($data);
      echo "</pre>";
      ?>



  </div>
  <div class="col-sm-6">
   <img src="https://iconscout.blob.core.windows.net/public/images/icon/free/png-512/school-bus-vehicle-public-transportation-emoj-symbol-32037d999fa3e33b-512x512.png" alt="Mountain View"  style="width:150px;height:150px;"><br><br><br>
   <?php
   $json = file_get_contents('http://api.sl.se/api2/realtimedeparturesv4.json?key=YOURKEY&siteid=1138&timewindow=5');
   $data = json_decode($json, true);
      
   "<pre2>";
   foreach($data['ResponseData']['Buses'] as $line) {
     echo "BUS <kbd>".$line['LineNumber']."</kbd> <br>"  ;
     echo "DESTINATION: <kbd>".$line['Destination']."</kbd><br>";
     echo "DEPARTS: <kbd>>".$line['DisplayTime']."</kbd><br><br>";
      echo "<br><br>";
   }
   //echo_r($data);
   echo "</pre2>";


?></div>
</div>


</body>
</html>