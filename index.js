const mqtt = require('mqtt');
const mysql = require('mysql');

// Create an MQTT client
const client = mqtt.connect('mqtt://driver.cloudmqtt.com:18757', {
  username: 'gikdxupr',
  password: 'iJAg6vTN723i'
});

const connection = mysql.createConnection({
  host     : 'localhost',
  user     : 'hieunm',
  password : 'Hieu@1532000',
  database : 'hieunm'
});

connection.connect((err) => {
  if (err) {
    console.error('Error connecting to MySQL: ' + err.stack);
    return;
  }
  console.log('Connected to MySQL server.');
});

// Handle the connect event
client.on('connect', function () {
  console.log('Connected to MQTT broker')
  //---------------------------------------
  // Subscribe to the topic
 client.subscribe('Temp_Is');
 client.subscribe('Temp_Os');
 client.subscribe('Hum');
 client.subscribe('Flood');
 client.subscribe('I0.0');
 client.subscribe('I0.1');
 client.subscribe('I0.2');
 client.subscribe('I0.3');
 client.subscribe('I0.4');
 client.subscribe('I0.5');
 client.subscribe('Q0.0');
 client.subscribe('Q0.1');
 client.subscribe('Q0.2');
 client.subscribe('Q0.3');
 client.subscribe('Q0.4');
 client.subscribe('Q0.5');
})

// Handle the message event
client.on('message', function (topic, message) {
  console.log('Received message:', message.toString())
  // Parse the message JSON
  const data = message.toString();
  const des=topic.toString();
  const timestamp = new Date().toLocaleString("sv-SE", { hour12: false }).slice(0, 19).replace(",", " ");
  console.log(data);
  console.log(timestamp);
 // Connect to the MYSQL Server database
 const query =`INSERT INTO hieunm.MQTT (timestamp,Destination, value) VALUES ('${timestamp}','${des}', '${data}')`;
 connection.query(query, (err, result) => {
   if (err) throw err;
   console.log('Data inserted into MySQL!');
 });

const query1 =`DELETE FROM hieunm.MQTT WHERE timestamp < DATE_SUB(NOW(), INTERVAL 5 MINUTE);`;
connection.query(query1, (err, result) => {
  if (err) throw err;
  console.log('Data deleted successful!');
});

});

// Handle the error event
client.on('error', function (error) {
 console.error('Error:', error)
})
