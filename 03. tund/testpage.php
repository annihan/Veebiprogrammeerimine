<?php
  $userName = "Anni-Liisi Hanni";

  $photoDir = "../Photos/";
  $photoTypes = ["image/jpeg", "image/png"];

  $fullTimeNow = date("d.m.Y H:i:s");
  $hourNow = date ("H");
  $partOfDay = "hägune aeg";

  if($hourNow < 8){
	  $partOfDay = "hommik";
  }
  if($hourNow > 8 and $hourNow < 16){
    $partOfDay = "parim aeg õppimiseks";
  }
  if($hourNow >= 16 and $hourNow < 19){
    $partOfDay = "vaba aja tegevused";
  }
  if($hourNow >= 19 and $hourNow < 21){
    $partOfDay = "õhtu";
  }
  if($hourNow >= 21 and $hourNow < 23){
    $partOfDay = "hilisõhtu";
  }
  if($hourNow >= 23 and $hourNow < 3){
    $partOfDay = "öö";
  }

  //info semestri kulgemise kohta
  $semesterStart = new DateTime("2019-9-2");
  $semesterEnd = new DateTime("2019-12-13");
  $semesterDuration = $semesterStart -> diff($semesterEnd);
  $today = new DateTime("now");
  $semesterElapsed = $semesterStart -> diff($today);
  //echo $semesterDuration;
  //var_dump($semesterDuration);
  //<p>Semester on täies hoos:
  //<meter min="0" max="112" value="16">13%</meter>
  //</p>
  $semesterInfoHTML = null;
  if($semesterElapsed -> format("%r%a") >= 0){
    $semesterInfoHTML = "<p>Semester on täies hoos:";
    $semesterInfoHTML .= '<meter min="0" max="' .$semesterDuration -> format("%r%a") .'" ';
    $semesterInfoHTML .= 'value="' .$semesterElapsed -> format("%r%a") .'">';
    $semesterInfoHTML .= round($semesterElapsed -> format("%r%a") / $semesterDuration -> format("%r%a") * 100, 1) ."%";
    $semesterInfoHTML .= "</meter> </p>";
  }

  //foto näitamine lehel
  $fileList = array_slice(scandir($photoDir), 2);//svandir loeb kausta sisu (loeb ka kataloogi . ja .. kausta sisse)
  //var_dump($fileList);
  $photoList = [];
  foreach ($fileList as $file){
    $fileInfo = getImagesize($photoDir .$file);
    //var_dump($fileInfo);
    if (in_array($fileInfo["mime"], $photoTypes)){
    array_push($photoList, $file);
    }
  } //võta missugune asi asjade seast, seda tähendab $file


  $photoList = ["tlu_terra_600x400_1.jpg", "tlu_terra_600x400_2.jpg", "tlu_terra_600x400_3.jpg"];//array ehk massiiv(terve loend erinevaid väärtuseid, arvud komadega eraldatult, tekstid komadega ja jutumärgid ümber, aga ka objektid)
  //selleks, et loosida, milliseid pilte veebilehel juhuslikult näidataks
  //var_dump($photoList);
  $photoCount = count($photoList);
  //echo $photoCount;
  $photoNum = mt_rand(0, $photoCount -1);
  //echo $photoList[$photoNum];
  //<img src="../Photos/tlu_terra_600x400_1.jpg" alt="TLÜ Terra õppehoone">
  $randomImgHTML = '<img src="' .$photoDir .$photoList[$photoNum] .'" alt="juhuslik foto">';

  require("header.php");

    echo "<h1>" .$userName .", veebiprogrammeerimine</h1>";
  ?>
  <p>See veebileht on loodud õppetöö kaigus ning ei sisalda tõsiseltvõetavat sisu!</p>
  <?php
   echo $semesterInfoHTML;
   ?>


  <hr>
  <?php
  echo "<p>Lehe avamise hetkel oli aeg: " .$fullTimeNow . ", " . $partOfDay .".</p>";
  echo $randomImgHTML;
  ?>

</body>
</html>
