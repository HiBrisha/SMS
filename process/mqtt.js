// Set up MQTT client options
var brokerUrl = 'driver.cloudmqtt.com'; // Replace with your broker URL and port
var clientId = 'dc1162d9-2c5a-43c6-9044-1f44af11dd72' + new Date().getTime(); // Generate a unique client ID
var username = 'gikdxupr'; // Replace with your MQTT broker username
var password = 'iJAg6vTN723i'; // Replace with your MQTT broker password
var port = 38757;
var mqttOptions = {
  keepAliveInterval: 60,
  cleanSession: true,
  useSSL: true,
  userName: username,
  password: password,
  onSuccess: onConnect,
  onFailure: onConnectionLost
};

// Create a new MQTT client instance
var mqttClient = new Paho.MQTT.Client(brokerUrl, port, clientId);

// Set up event handlers for the MQTT client
mqttClient.onConnectionLost = onConnectionLost;
mqttClient.onMessageArrived = onMessageArrived;
mqttClient.connect(mqttOptions);
//----------------------------------------------------------
const toggle1 = document.getElementById('Au_Man');
const toggle2 = document.getElementById('Door');
const toggle3 = document.getElementById('Camera');
const toggle4 = document.getElementById('Fan');
const toggle5 = document.getElementById('Alarm');
const toggle6 = document.getElementById('Generate');
const image1 = document.getElementById('AM_Img');
const image2 = document.getElementById('Door_Img');
const image3 = document.getElementById('Camera_Img');
const image4 = document.getElementById('Fan_Img');
const image5 = document.getElementById('Alarm_Img');
const image6 = document.getElementById('Generate_Img');
//Toggle1-------------------------------------------------
toggle1.addEventListener('change', () => {
  if (toggle1.checked) {
    publishMessage('I0.0', '1')
  } else {
    publishMessage('I0.0', '0')
  }
});
//Toggle2-------------------------------------------------
toggle2.addEventListener('change', () => {
  if (toggle2.checked) {
    publishMessage('I0.1', '1')
  } else {
    publishMessage('I0.1', '0')
  }
});
//Toggle3-------------------------------------------------
toggle3.addEventListener('change', () => {
  if (toggle3.checked) {
    publishMessage('I0.2', '1')
  } else {
    publishMessage('I0.2', '0')
  }
});
//Toggle4-------------------------------------------------
toggle4.addEventListener('change', () => {
  if (toggle4.checked) {
    publishMessage('I0.3', '1')
  } else {
    publishMessage('I0.3', '0')
  }
});
//Toggle5-------------------------------------------------
toggle5.addEventListener('change', () => {
  if (toggle5.checked) {
    publishMessage('I0.4', '1')
  } else {
    publishMessage('I0.4', '0')
  }
});
//Toggle6-------------------------------------------------
toggle6.addEventListener('change', () => {
  if (toggle6.checked) {
    publishMessage('I0.5', '1')
  } else {
    publishMessage('I0.5', '0')
  }
});
//------------------------------------------------------------
// Callback function for when the MQTT client is connected
function onConnect() {
  console.log('Connected to MQTT broker.');
  // Subscribe to a topic
  mqttClient.subscribe('Q0.0');
  mqttClient.subscribe('Q0.1');
  mqttClient.subscribe('Q0.2');
  mqttClient.subscribe('Q0.3');
  mqttClient.subscribe('Q0.4');
  mqttClient.subscribe('Q0.5');
  mqttClient.subscribe('Temp_Is');
  mqttClient.subscribe('Temp_Os');
  mqttClient.subscribe('Hum');
  mqttClient.subscribe('Flood');
}

// Callback function for when the MQTT client is disconnected
function onConnectionLost(responseObject) {
  if (responseObject.errorCode !== 0) {
    console.log('Connection lost: ' + responseObject.errorMessage);
  }
}

// Callback function for when a message is received
function onMessageArrived(message) {
  console.log('Message received: ' + message.payloadString, 'on topic:', message.destinationName);
  if (message.destinationName == 'Q0.0') {
    if (message.payloadString == '1') {
      toggle1.checked=true;
      document.getElementById('Au_Man_Sta').innerHTML = "ON";
      image1.src = './pictures/logo_Icon/Au_Man.png';
    } else if (message.payloadString == '0') {
      toggle1.checked=false;
      document.getElementById('Au_Man_Sta').innerHTML = "OFF";
      image1.src = './pictures/logo_Icon/Au_Man_Stop.png';
    }
  } else if (message.destinationName == 'Q0.1') {
    if (message.payloadString == '1') {
      toggle2.checked=true;
      document.getElementById('Door_Sta').innerHTML = "ON";
      image2.src = './pictures/logo_Icon/Door.png';
    } else if (message.payloadString == '0') {
      toggle2.checked=false;
      document.getElementById('Door_Sta').innerHTML = "OFF";
      image2.src = './pictures/logo_Icon/Door_Close.png';
    }
  } else if (message.destinationName == 'Q0.2') {
    if (message.payloadString == '1') {
      toggle3.checked=true;
      document.getElementById('Camera_Sta').innerHTML = "ON";
      image3.src = './pictures/logo_Icon/Camera_On.png';
    } else if (message.payloadString == '0') {
      toggle3.checked=false;
      document.getElementById('Camera_Sta').innerHTML = "OFF";
      image3.src = './pictures/logo_Icon/Camera.png';
    }
  }
  else if (message.destinationName == 'Q0.3') {
    if (message.payloadString == '1') {
      toggle4.checked=true;
      document.getElementById('Fan_Sta').innerHTML = "ON";
      image4.src = './pictures/logo_Icon/Fan_On.png';
    } else if (message.payloadString == '0') {
      toggle4.checked=false;
      document.getElementById('Fan_Sta').innerHTML = "OFF";
      image4.src = './pictures/logo_Icon/Fan.png';
    }
  }
  else if (message.destinationName == 'Q0.4') {
    if (message.payloadString == '1') {
      toggle5.checked=true;
      document.getElementById('Alarm_Sta').innerHTML = "ON";
      image5.src = './pictures/logo_Icon/Alarm.png';
    } else if (message.payloadString == '0') {
      toggle5.checked=false;
      document.getElementById('Alarm_Sta').innerHTML = "OFF";
      image5.src = './pictures/logo_Icon/Alarm_Off.png';
    }
  } else if (message.destinationName == 'Q0.5') {
    if (message.payloadString == '1') {
      toggle6.checked=true;
      document.getElementById('Generate_Sta').innerHTML = "ON";
      image6.src = './pictures/logo_Icon/E_Generator_On.png';
    } else if (message.payloadString == '0') {
      toggle6.checked=false;
      document.getElementById('Generate_Sta').innerHTML = "OFF";
      image6.src = './pictures/logo_Icon/E_Generator.png';
    }
  } else if (message.destinationName == 'Temp_Is') {
    document.getElementById('Temp_Is').innerHTML = message.payloadString + " ℃";
  } else if (message.destinationName == 'Temp_Os') {
    document.getElementById('Temp_Os').innerHTML = message.payloadString + " ℃";
  } else if (message.destinationName == 'Hum') {
    document.getElementById('Hum').innerHTML = message.payloadString + " %";
  } else if (message.destinationName == 'Flood') {
    document.getElementById('Flood').innerHTML = message.payloadString;
  }
}

function publishMessage(topic, message) {
  var message = new Paho.MQTT.Message(message);
  message.destinationName = topic;
  mqttClient.send(message);
  console.log("Message sent!");
}
