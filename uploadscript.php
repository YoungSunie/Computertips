<?php
if (!(isset($_POST['title']))){
  header("location:index.php");
}
$titleF = $_POST['title'];
$password = $_POST['password'];
$title = str_replace(" ", "-", str_replace("?", "QUE", str_replace("!", "EXC", str_replace(".", "DOT", $_POST['title']))));
$content = str_replace("*", "<br>", $_POST['content']);
$myfile = fopen("blogs/$title.php", "w");
$setting = "<?php
if (!(isset(\$_GET['val']))){
  header(\"location:/index.php?name=$title.php\");
}
?>
<html>
<head>
  <meta charset=\"utf-8\">
<title>$titleF</title>
<style type=\"text/css\">
  body {
    line-height:2.0em ;
    background-color: white;
    text-align: center;
   }
</style>
</head>
<body>
<div>
<h1>$titleF</h1>\n";
$setting2 = "</div>
</body>
</html>";
fwrite($myfile, $setting);
fwrite($myfile, $content);
fwrite($myfile, $setting2);
fclose($myfile);
header("location:uploadimg.php?password=$password");
?>
