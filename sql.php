<?php
$servername = "localhost"; // change to your server name
$username = "hieunm"; // change to your MySQL username
$password = "Hieu@1532000"; // change to your MySQL password
$dbname = "hieunm"; // change to your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

$sql ="(select * from MQTT where Destination='Temp_Is' order by timestamp desc  limit 1) union all (select * from MQTT where Destination='Temp_Os' order by timestamp desc limit 1)union all (select * from MQTT where Destination='Hum' order by timestamp desc limit 1) union all (select * from MQTT where Destination='Flood' order by timestamp desc limit 1)union all (select * from MQTT where Destination='Q0.0' order by timestamp desc limit 1)union all (select * from MQTT where Destination='Q0.1' order by timestamp desc limit 1)union all (select * from MQTT where Destination='Q0.2' order by timestamp desc limit 1)union all (select * from MQTT where Destination='Q0.3' order by timestamp desc limit 1)union all (select * from MQTT where Destination='Q0.4' order by timestamp desc limit 1)union all (select * from MQTT where Destination='Q0.5' order by timestamp desc limit 1);";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // Output data of each row
  while($row = $result->fetch_assoc()) {
  if($row["Destination"]=="Flood"){
// JavaScript code embedded in PHP block
  echo "<script type='text/javascript'>";
  echo "var sValue = '" . $row["value"] . "';";
  echo "document.getElementById('" . $row["Destination"] . "').innerHTML = sValue;";
  echo "</script>";
}else if($row["Destination"]=="Hum"){
  // JavaScript code embedded in PHP block
  echo "<script type='text/javascript'>";
  echo "var sValue = '" . $row["value"] . "';";
  echo "document.getElementById('" . $row["Destination"] . "').innerHTML = sValue+'%';";
  echo "</script>";
  }else if($row["Destination"]=="Q0.0"){
  if($row["value"]=="1"){
    // JavaScript code embedded in PHP block
  echo "<script type='text/javascript'>";
  echo "document.getElementById('Au_Man').checked=true;";
  echo "document.getElementById('Au_Man_Sta').innerHTML = 'ON';";
  echo "document.getElementById('AM_Img').src = './pictures/logo_Icon/Au_Man.png';";
  echo "</script>";
 } else{
  echo "<script type='text/javascript'>";
  echo "document.getElementById('Au_Man').checked=false;";
  echo "document.getElementById('Au_Man_Sta').innerHTML = 'OFF';";
  echo "document.getElementById('AM_Img').src = './pictures/logo_Icon/Au_Man_Stop.png';";
  echo "</script>";
 }
}else if($row["Destination"]=="Q0.1"){
  if($row["value"]=="1"){
    // JavaScript code embedded in PHP block
  echo "<script type='text/javascript'>";
  echo "document.getElementById('Door').checked=true;";
  echo "document.getElementById('Door_Sta').innerHTML = 'ON';";
  echo "document.getElementById('Door_Img').src = './pictures/logo_Icon/Door.png';";
  echo "</script>";
 } else{
  echo "<script type='text/javascript'>";
  echo "document.getElementById('Door').checked=false;";
  echo "document.getElementById('Door_Sta').innerHTML = 'OFF';";
  echo "document.getElementById('Door_Img').src = './pictures/logo_Icon/Door_Close.png';";
  echo "</script>";
 }
}else if($row["Destination"]=="Q0.2"){
  if($row["value"]=="1"){
    // JavaScript code embedded in PHP block
  echo "<script type='text/javascript'>";
  echo "document.getElementById('Camera').checked=true;";
  echo "document.getElementById('Camera_Sta').innerHTML = 'ON';";
  echo "document.getElementById('Camera_Img').src = './pictures/logo_Icon/Camera_On.png';";
  echo "</script>";
 } else{
  echo "<script type='text/javascript'>";
  echo "document.getElementById('Camera').checked=false;";
  echo "document.getElementById('Camera_Sta').innerHTML = 'OFF';";
  echo "document.getElementById('Camera_Img').src = './pictures/logo_Icon/Camera.png';";
  echo "</script>";
 }
}else if($row["Destination"]=="Q0.3"){
  if($row["value"]=="1"){
    // JavaScript code embedded in PHP block
  echo "<script type='text/javascript'>";
  echo "document.getElementById('Fan').checked=true;";
  echo "document.getElementById('Fan_Sta').innerHTML = 'ON';";
  echo "document.getElementById('Fan_Img').src = './pictures/logo_Icon/Fan_On.png';";
  echo "</script>";
 } else{
  echo "<script type='text/javascript'>";
  echo "document.getElementById('Fan').checked=false;";
  echo "document.getElementById('Fan_Sta').innerHTML = 'OFF';";
  echo "document.getElementById('Fan_Img').src = './pictures/logo_Icon/Fan.png';";
  echo "</script>";
 }
}else if($row["Destination"]=="Q0.4"){
  if($row["value"]=="1"){
    // JavaScript code embedded in PHP block
  echo "<script type='text/javascript'>";
  echo "document.getElementById('Alarm').checked=true;";
  echo "document.getElementById('Alarm_Sta').innerHTML = 'ON';";
  echo "document.getElementById('Alarm_Img').src = './pictures/logo_Icon/Alarm.png';";
  echo "</script>";
 } else{
  echo "<script type='text/javascript'>";
  echo "document.getElementById('Alarm').checked=false;";
  echo "document.getElementById('Alarm_Sta').innerHTML = 'OFF';";
  echo "document.getElementById('Alarm_Img').src = './pictures/logo_Icon/Alarm_Off.png';";
  echo "</script>";
 }
}else if($row["Destination"]=="Q0.5"){
  if($row["value"]=="1"){
    // JavaScript code embedded in PHP block
  echo "<script type='text/javascript'>";
  echo "document.getElementById('Generate').checked=true;";
  echo "document.getElementById('Generate_Sta').innerHTML = 'ON';";
  echo "document.getElementById('Generate_Img').src = './pictures/logo_Icon/E_Generator_On.png';";
  echo "</script>";
 } else{
  echo "<script type='text/javascript'>";
  echo "document.getElementById('Generate').checked=false;";
  echo "document.getElementById('Generate_Sta').innerHTML = 'OFF';";
  echo "document.getElementById('Generate_Img').src = './pictures/logo_Icon/E_Generator.png';";
  echo "</script>";
 }
}else{
  // JavaScript code embedded in PHP block
  echo "<script type='text/javascript'>";
  echo "var sValue = '" . $row["value"] . "';";
  echo "document.getElementById('" . $row["Destination"] . "').innerHTML = sValue+'°C';";
  echo "</script>";
  }
 }
} else {
  echo "0 results";
}
?>
