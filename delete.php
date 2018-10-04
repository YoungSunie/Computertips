<?php
if (!(isset($_GET['password'])) or !($_GET['password'] == 'j091105!!')){
  header("location:index.php");
}
?>
<html>
<head>
  <script>
  function check(){
    return confirm("Are you really going to remove this file?");
  }
  </script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no"/>
  <title>delete tools</title>
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
</head>
<body>
  <h1>Select post that you are going to remove</h1>
  <?php
  function rmdir_all($dir) {
  if (!file_exists($dir)) {
    return;
  }
  $dhandle = opendir($dir);
  if ($dhandle) {
    while (false !== ($fname = readdir($dhandle))) {
       if (is_dir( "{$dir}/{$fname}" )) {
          if (($fname != '.') && ($fname != '..')) {
             $this->rmdir_all("$dir/$fname");
          }
       } else {
          unlink("{$dir}/{$fname}");
       }
    }
    closedir($dhandle);
  }
  rmdir($dir);
}
    if (empty($_GET['name'])){
      $arrays = getArray();
      $password = $_GET['password'];
      echo "-><a href=\"index.php\">Home</a><br>";
      foreach($arrays as $value){
        echo "->";
        echo "<a href=\"\delete.php?name=";
        echo $value;
        echo "&password=$password\" onclick=\"return check()\">";
        echo str_replace("DOT", ".", str_replace("-", " ", str_replace("QUE", "?", str_replace("EXC", "!", str_replace(".php", "", $value)))));
        echo "</a><br>";
      }
    }
    else{
      $name = $_GET['name'];
      $location = "blogs/$name";
      unlink("$location");
      $name1 = str_replace(".php", "", $name);
      $location1 = "img/$name1/";
      if (is_dir($location1)){
        rmdir_all($location1);
      }
      header("location:index.php");
    }
    ?>
</body>
</html>
