<?php
if (!(isset($_GET['val']))){
  header("location:index.php");
}
?>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no"/>
  <style type="text/css">
  body{
    text-align: center;
  }
  h1{
    position: relative;
    top: 40%;
  }
  p{
    position: absolute;
    bottom: 0;
    left: 0%;
    width: 100%;
    color: gray;
  }
  </style>
</head>
<body>
  <h1>Please select the category!!</h1>
  <p align="center">www.jay.p-e.kr has the copyright on all the works.</p>
</body>
</html>
