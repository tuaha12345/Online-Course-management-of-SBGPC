<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Simple Face</title>
  <style>
    .container {
      text-align: center;
    }

    .face {
      width: 200px;
      height: 200px;
      background-color: yellow;
      border-radius: 50%;
      position: relative;
      border: 2px solid black;
      margin-left: 50px;
    }

    .eyes {
      width: 50px;
      height: 50px;
      background-color: white;
      border-radius: 50%;
      position: absolute;
      top: 40px;
    }

    .eye-left {
      left: 40px;
    }

    .eye-right {
      left: 110px;
    }

.black-ball {
  width: 30px;
  height: 30px;
  background-color: black;
  border-radius: 50%;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}


    .nose {
      width: 20px;
      height: 20px;
      background-color: brown;
      border-radius: 50%;
      position: absolute;
      top: 80px;
      left: 90px;
    }

    .mouth {
      width: 100px;
      height: 20px;
      background-color: red;
      border-radius: 0 0 50px 50px;
      position: absolute;
      top: 120px;
      left: 50px;
    }

    .hands {
      width: 40px;
      height: 100px;
      background-color: yellow;
      position: absolute;
      top: 140px;
    }

    .hand-left {
      transform: rotate(-45deg);
      left: -30px;
    }

    .hand-right {
      transform: rotate(45deg);
      left: 190px;
    }

.green-ball {
  width: 50px;
  height: 50px;
  background-color: green;
  border-radius: 50%;
  position: absolute;
  top: -25px;
  
}
.finger {
  width: 5px;
  height: 40px;
  background-color: green;
  position: absolute;
  top: -20px;
}

.finger1 {
  left: 10px;
  transform: rotate(-30deg);
}

.finger2 {
  left: 20px;
  transform: rotate(0deg);
}

.finger3 {
  left: 30px;
  transform: rotate(30deg);
}

.mouse:hover + .face .hand-left {
  top: 20px;
  left:0px;
  transform: rotate(75deg);
}

.mouse:hover + .face .hand-right {
  top: 20px;
  left:170px;
  transform: rotate(-85deg);
}
  </style>
</head>
<body>

<body>
  <div class="container">
    <p class="mouse">Hover here</p>
    <div class="face">
      <div class="eyes eye-left">
        <div class="black-ball"></div>
      </div>
      <div class="eyes eye-right">
        <div class="black-ball"></div>
      </div>
      <div class="nose"></div>
      <div class="mouth"></div>
      <div class="hands hand-left">
        <div class="green-ball">
          <div class="finger finger1"></div>
          <div class="finger finger2"></div>
          <div class="finger finger3"></div>
        </div>
      </div>
      <div class="hands hand-right">
        <div class="green-ball">
          <div class="finger finger1"></div>
          <div class="finger finger2"></div>
          <div class="finger finger3"></div>
        </div>
      </div>
    </div>
  </div>
</body>



</body>
</html>
