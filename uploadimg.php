<?php
if (!(isset($_GET['password'])) or !($_GET['password'] == 'j091105!!')){
  header('location:index.php');
}
?>
<?php
  function getArray(){
      $dir = "blogs/";
      $handle  = opendir($dir);
      $files = array();
      while (false !== ($filename = readdir($handle))) {
        if($filename == "." || $filename == ".."){
        continue;
        }

    // 파일인 경우만 목록에 추가한다.
      if(is_file($dir . "/" . $filename)){
        $files[] = $filename;
        }
      }
      closedir($handle);
      sort($files);
    return $files;
  }
?>
<html>
<head>
  <title>uploadimg tools</title>
  <script>
  function _(el){
  	return document.getElementById(el);
  }
  function uploadFile(){
    <?php
    if (!(isset($_GET['name']))){
      echo "alert(\"Choose your poster's name\");";
    }
    ?>
    if((document.getElementById("file1").value == "")){
      alert("Select your image");
    }
    else{
  	var file = _("file1").files[0];
    var post = "<?php
    if (isset($_GET['name'])){
    echo $_GET['name'];
    }
    else{
      echo "";
    }
    ?>";
  	// alert(file.name+" | "+file.size+" | "+file.type);
  	var formdata = new FormData();
  	formdata.append("file1", file);
    formdata.append("name", post);
  	var ajax = new XMLHttpRequest();
  	ajax.upload.addEventListener("progress", progressHandler, false);
  	ajax.addEventListener("load", completeHandler, false);
  	ajax.addEventListener("error", errorHandler, false);
  	ajax.addEventListener("abort", abortHandler, false);
  	ajax.open("POST", "file_upload_parser.php");
  	ajax.send(formdata);
    ajax.send(post);
  }
  }
  function progressHandler(event){
  	_("loaded_n_total").innerHTML = "Uploaded "+event.loaded+" bytes of "+event.total;
  	var percent = (event.loaded / event.total) * 100;
  	_("progressBar").value = Math.round(percent);
  	_("status").innerHTML = Math.round(percent)+"% uploaded... please wait";
  }
  function completeHandler(event){
  	_("status").innerHTML = event.target.responseText;
  	_("progressBar").value = 0;
  }
  function errorHandler(event){
  	_("status").innerHTML = "Upload Failed";
  }
  function abortHandler(event){
  	_("status").innerHTML = "Upload Aborted";
  }
</script>
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no"/>
</head>
<body>
  <h2>Select img</h2>
  <h4>You can upload again.</h4>
<form id="upload_form" enctype="multipart/form-data" method="post">
  -><a href="index.php">Home</a><br>
  Poster's name : <br><?php
    $arrays = getArray();
    $password = $_GET['password'];
    foreach($arrays as $value){
      echo "->";
      echo "<a href=\"uploadimg.php?name=";
      echo str_replace(".php" , "", $value);
      echo "&password=$password\">";
      echo str_replace("DOT", ".", str_replace("-", " ", str_replace("QUE", "?", str_replace("EXC", "!", str_replace(".php", "", $value)))));
      echo "</a><br>";
    }
    ?><br>
  <input type="file" name="file1" id="file1"><br><br>
  <input type="button" value="Upload File" onclick="uploadFile()">
  <progress id="progressBar" value="0" max="100" style="width:300px;"></progress>
  <h3 id="status"></h3>
  <p id="loaded_n_total"></p>
</form>
</body>
</html>
