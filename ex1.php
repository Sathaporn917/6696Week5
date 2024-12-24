<!DOCTYPE html>
<html lang="en">
<head>
<!-- เพื่อม Bootstrap -->
<!-- Latest compiled and minified CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Krub:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,200;1,300;1,400;1,500;1,600;1,700&family=Mitr:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
    
<style>    
 body{        
    font-family: "Mitr", serif;
  font-weight: 700;
  font-style: normal;
    margin-left:150px;
    margin-right:150px;
    margin-top:150px;
    margin-bottom:150px;
}
</style>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
</head>
<body>
<h1>โปรแกรมคำนวน และ เงื่อนไข</h1>     
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
  <div class="row mb-3">
    <label for="inputEmail3" class="col-sm-2">คะแนนกลางภาค</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" id="inputEmail3" name="score1">
    </div>
    <label for="inputEmail3" class="col-sm-2">คะแนน</label>
  </div>
  <div class="row mb-3">
    <label for="inputPassword3" class="col-sm-2">คะแนนปลายภาค</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" id="inputPassword3" name="score2">
    </div>
    <label for="inputEmail3" class="col-sm-2">คะแนน</label>
  </div>
  <button type="submit" class="btn btn-primary">คำนวณคะแนนรวม</button>
  <button type="reset" class="btn btn-danger">ยกเลิก</button>
</form>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $s1=$_POST["score1"];
    $s2=$_POST["score2"];
    $sum=$s1+$s2;
  echo "<br><br> <h3>คุณได้คะแนนรวมเท่ากับ ".$sum." </h3> <br><br>";
  $t = date("H");

if ($sum < "50") {
  echo "<h1>ยินดีด้วยคุณสอบผ่าน!</h1><br>";
} else {
  echo "<h1>เสียใจด้วยคุณสอบตก!</h1><br>";
}
  echo "<div class='alert alert-success'>
  <strong>คำนวณเสร็จแล้ว!</strong>ผลคะแนนที่ได้ดังนี้ </div>";
}
?>

</body>
</html>
</body>
<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</html>