<html>
<head>
  <meta name="naver-site-verification" content="2189e1ba6320c75177af534d973479582e25ee25"/>
  <meta name="description" content="This blog has a information about computer">
  <meta charset="euc-kr">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no"/>
  <meta property="og:type" content="website">
  <meta property="og:title" content="Computertips">
  <meta property="og:description" content="This blog has a information about computer">
  <meta property="og:image" content="http://www.jay.p-e.kr/img/mainIMG.png">
  <meta property="og:url" content="http://www.jay.p-e.kr">
  <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-7269229877805935",
    enable_page_level_ads: true
  });
</script>
  <?php
  function getHostnames(){
    $hostname = $_SERVER["HTTP_HOST"];
    return $hostname;
  }
  function rtn_mobile_chk() {
      // 모바일 기종(배열 순서 중요, 대소문자 구분 안함)
      $ary_m = array("iPhone","iPod","IPad","Android","Blackberry","SymbianOS|SCH-M\d+","Opera Mini","Windows CE","Nokia","Sony","Samsung","LGTelecom","SKT","Mobile","Phone");

      for($i=0; $i<count($ary_m); $i++){
          if(preg_match("/$ary_m[$i]/i", strtolower($_SERVER['HTTP_USER_AGENT']))) {
              return $ary_m[$i];
              break;
          }
      }

      return "PC";

  }
if(rtn_mobile_chk() == "PC"){
  if(getHostnames() == 'm.jay.p-e.kr'){
    header("location:http://www.jay.p-e.kr");
  }
}else{
  if(getHostnames() == 'www.jay.p-e.kr'){
    header("location:http://m.jay.p-e.kr");
  }
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
  <title>Computertips blog</title>
  <meta charset="utf-8">
  <style type="text/css">

  <?php
  if (getHostnames() == 'm.jay.p-e.kr'){
    echo "
    #fixed-menu {
      background-color: orange;
      position: fixed;
      width: 100%;
      height: 5%;
      top: 0%;
      left: 0%;
      text-align: center;
    }
    #name{
      position: relative;
      height: 100%;
      width: auto;
    }
    #wrapper {
      position: absolute;
      width: 100%;
      height: 95%;
      margin: 0 auto;
      top: 5%;
      left: 0px;
      background-color: white;
      text-align: center;
      font-weight: bold ;
    }
    #category{
      position: fixed;
      left: 0%;
      top: 5%;
      width: 100%;
      height: auto;
      text-align: center;
      background-color: 87cefa;
      font-size: 100%;
    }
    #categoryimg{
      position : relative;
      height: 0%;
      width: auto;
      top : 1%;
      border-radius: 20px;
    }
    #img{
      position: absolute;
      height: 90%;
      width: auto;
      top: 5%;
      left: 1%;
    }
    #content{
      position: fixed;
      top: 5%;
      left: 0%;
      height: 95%;
      width: 80%;
      text-align: left;
      background-color: gray;
    }
    .menu a{cursor:pointer;}
    .menu .hide{display:none;}";
  }
  else{
    echo "
    #fixed-menu {
      background-color: orange;
      position: absolute;
      width: 80%;
      height: 12%;
      top: 1%;
      left: 10%;
      text-align: center;
      border-radius: 15px;
    }

    #wrapper {
      width: 60%;
      height: 83%;
      margin: 0 auto;
      position: relative;
      top: 13%;
      background-color: white;
      border: thick solid gray;
      text-align: center;
      font-weight: bold ;
    }
    #category{
      width: 18%;
      position: fixed;
      top: 15%;
      left: 0.5%;
      text-align: left;
      background-color: white;
      border-radius: 30px;
      border: medium solid orange;
      height: 80%;
      font-size: 100%;
    }
    #name{
      position: relative;
      height: 100%;
      width: auto;
    }
    #categoryimg{
      position : relative;
      height: auto;
      width: 85%;
      left: 7.5%;
      border-radius: 20px;
    }
    body{
      background-image: url('/img/4.jpg');:
    }
    #img{
      position: absolute;
      width: 8%;
      height: 90%;
      top: 5%;
      left: 1%;
    }";
  }
  ?>
  #img2{
    position: absolute;
    width: 8%;
    height: 90%;
    top: 5%;
    left: 91%;
  }
  </style>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script>
    $(document).ready(function(){
      $('#content').hide();
    $('#hideshow').click(function(){
        $('#content').toggle('show');
      });
    });
    </script>
</head>
<body>
  <?php
if (!(isset($_GET['val2']))){
  if(getHostnames() == 'www.jay.p-e.kr'){
echo "<script type=\"text/javascript\">
  var adfly_id = 18010273;
  var popunder_frequency_delay = 0;
  function goMobile(){
    location.href=\"http://m.jay.p-e.kr\";
  }
  </script><script src=\"https://cdn.adf.ly/js/display.js\"></script>";
}
}
 ?>
  <div id="fixed-menu" class="menu">
      <a href="http://<?php echo gethostnames(); ?>"><img src="img/name.png" id="name"></a>
      <?php
        if (getHostnames() == 'm.jay.p-e.kr'){
          echo "<a id=\"hideshow\"><img src=\"img/menu.png\" id=\"img\"></a>";
        }
        else{
          echo "<img src=\"img/main.png\" id=\"img\"></a>";
        }
      ?>
      <img src="img/main.png" id="img2">
  </div>
  <?php
    if (getHostnames() == 'www.jay.p-e.kr'){
      echo "<div id=\"category\">
        <img src=\"img/category.png\" id=\"categoryimg\"><br>
        &nbsp;-><a href=\"/index.php?val2\">Home</a><br> ";
        $arrays = getArray();
        foreach($arrays as $value){
          echo "&nbsp;->";
          echo "<a href=\"http://";
          echo getHostnames();
          echo "/index.php?name=";
          echo $value;
          echo "&val2\">";
          echo str_replace("DOT", ".", str_replace("-", " ", str_replace("QUE", "?", str_replace("EXC", "!", str_replace(".php", "", $value)))));
          echo "</a><br>";
        }
        echo "</div>";
    }
  ?>
  <div id="wrapper">
          <iframe src="<?php
          if (isset($_GET['name'])){
            echo "blogs/";
            echo $_GET['name'];
            echo "?val";
          }
          else{
            echo "instructions.php?val";
          }
          ?>" width="100%" height="100%" frameborder="0"></iframe>
  </div>
  <div id="content">
    &nbsp;-><a href="/index.php?val2">Home</a>
    <?php
    $arrays = getArray();
    foreach($arrays as $value){
      echo "<br>&nbsp;->";
      echo "<a href=\"http://";
      echo getHostnames();
      echo "/index.php?name=";
      echo str_replace(";", "?", $value);;
      echo "&val2\">";
      echo str_replace("DOT", ".", str_replace("-", " ", str_replace("QUE", "?", str_replace("EXC", "!", str_replace(".php", "", $value)))));
      echo "</a>";
    }
    ?>
  </div>
</body>
</html>
