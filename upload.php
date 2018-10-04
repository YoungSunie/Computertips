<?php
if (!(isset($_GET['password'])) or !($_GET['password'] == 'j091105!!')){
  header('location:index.php');
}
?>
<html>
<head>
<title>Posting tools</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no"/>
<style type="text/css">
  #title{
    width: 90%;
    height: 5%;
  }
  #content{
    width: 100%;
    height: 70%;
    position: relative;
    left: 0%;
    top: 5%;
  }
  #submit{
    position: relative;
    left : 95%;
  }
  #input1{
    width : 60%;
  }
  #input2{
    width : 60%;
  }
</style>
<script type="text/javascript">
<!--
function button() {
  if((document.getElementById("title").value == "")){
    alert("Type your title");
  }
  else if((document.getElementById("content").value == "")){
    alert("Type your content");
  }
  else{
  var form = document.postInput;
  form.submit();
}}
function getSrc(){
  document.getElementById("input1").value = "<img src=\"/img/" + document.getElementById("title").value.replace(/ /gi, '-').replace(".", "DOT").replace("?", "QUE").replace("!", "EXC") + "/picture's name\" width=\"가로(가로사진 : 60% 세로사진 : 80%)\" height=\"auto\">";
}
function getButton(){
  document.getElementById("input2").value = "<button onclick=\"window.open('Your Link')\">click this</button>";
}
</script>
</head>
<body>
  <form name="postInput" method="post" action="uploadscript.php">
    <h1>Title : <input id="title" name="title" type="text"></h1>
     Content: <br><textarea name="content" id="content" cols="99" rows="99"></textarea>
     <input type="hidden" name="password" value="<?php echo $_GET['password'] ?>">
     <br><input id="btn" type="button" value="Finish" onclick="button();">
  </form>
  Input img src -> <input id="input1" type="textarea"></texarea> <button onclick="getSrc();">Get src code</button><br>
  Link Button-> <input id="input2" type="textarea"></texarea> <button onclick="getButton();">Get Link button code</button>
  <br>* is line feed.
</body>
</html>
