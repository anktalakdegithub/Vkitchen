<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Sarala');

body {
  width: 100vw;
  height: 100vh;
  background-color: #282c34;
  display: flex;
  align-items: center;
  justify-content: center;
}

h1 {
  color: #fff;
  font-family: Sarala, Arial, sans-serif;
  font-size: 22px;
  text-transform: uppercase;
  text-align: center;
  margin-bottom: 30px;
}

#container {
  max-width: 80vw;
  max-height: 80vh;
  position: relative;
}

#player {
  width: 100%;
  border: 2px solid #111;
  box-shadow: 0 0 50px #111;
}

#capture-button {
  display: block;
  position: absolute;
  width: 50px;
  height: 50px;
  bottom: 20px;
  left: 50%;
  margin-left: -25px;
  border-radius: 50%;
  background-color: #ff0000;
  border: 2px solid #fff;
  cursor: pointer;
  transition: all .15s ease-in-out;
  opacity: 0.5;
  outline: none;
  
  &:hover {
    transform: scale(1.1);
  }
  
  &:active {
    background-color: #00ff00;
  }
}

#output {
  display: none;
}
    </style>
</head>
<body>
<div id="container">
  <h1>Save the camera's picture to a file</h1>
  <video id="player" autoplay></video>
  <button id="capture-button" title="Take a picture"></button>
</div>
<canvas id="output"></canvas>
</body>
<script>
    const player = document.getElementById('player');
const captureButton = document.getElementById('capture-button');
const outputCanvas = document.getElementById('output');
const context = outputCanvas.getContext('2d');

navigator.mediaDevices
  .getUserMedia({ video: true })
  .then((stream) => {
    player.srcObject = stream;
  }).catch(error => {
    console.error('Can not get an access to a camera...', error);
  });

captureButton.addEventListener('click', () => {
  // Get the real size of the picture
  const imageWidth = player.offsetWidth;
  const imageHeight = player.offsetHeight;
  
  // Make our hidden canvas the same size
  outputCanvas.width = imageWidth;
  outputCanvas.height = imageHeight;
  
  // Draw captured image to the hidden canvas
  context.drawImage(player, 0, 0, imageWidth, imageHeight);
  
  // A bit of magic to save the image to a file
  const downloadLink = document.createElement('a');
  downloadLink.setAttribute('download', `capture-${new Date().getTime()}.png`);
  outputCanvas.toBlob((blob) => {
    downloadLink.setAttribute('href', URL.createObjectURL(blob));
    downloadLink.click();
  });
});
</script>
</html>