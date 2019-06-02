<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>訂單管理系統</title>
</head>
<?php

// 是否是表單送回
if (isset($_POST["SD"])  ) {
   $NAME = $_POST["NAME"];  // 取得欄位資料
   $PH = $_POST["PH"];
   $AD = $_POST["AD"];
   $P = $_POST["P"];
   $QU = $_POST["QU"];
   $PN = $_POST["PN"];
   // 檢查是否有輸入欄位資料
   if(isset($_POST['SD'])){

   if ($NAME != "" && $PH != ""&& $AD != ""&& $P != ""&& $QU != ""&& $PN != "") {
      $db = mysqli_connect("192.168.0.101", "JOKER", "JOKER");
      mysqli_query($db,"set names utf8");
      mysqli_select_db($db, "dbf"); // 選擇資料庫
      // 建立SQL字串
      $sql = "INSERT INTO ff (NAME,PH,AD,PN,QU,P) values('";
      $sql.= $NAME."', '".$PH."', '".$AD."', '".$P."', '".$QU."', '".$P."')";
      if (!mysqli_query($db, $sql)) { // 執行SQL指令
        echo "<script language=\"JavaScript\">alert(\"fail\");</script>";
      }
      else 
      {

        echo "<script language=\"JavaScript\">alert(\"success\");</script>";
      mysqli_close($db); // 關閉連接  
      }    
   }
} 
}
?>
<form action="fhw.php" method="post">
<body>
<div class="container">
<form class="form-horizontal" role="form">
  <div class="form-group">
    <label for="name" class="col-sm-6">消費者</label>
    <div class="row">
            <div class="col-sm-4 ">
                <div class="container">
                    <input type="text" class="form-control" name="NAME" id="firstname" placeholder="请输入名字">
                </div> 
            </div>
            <div class="col-sm-4 ">
                <div class="container">
                    <input type="text" class="form-control" name="PH" id="firstname" placeholder="请输入電話">
                </div> 
            </div>
            <div class="col-sm-4 ">
                <div class="container">
                    <input type="text" class="form-control" name="AD" id="firstname" placeholder="请输入地址">
                </div> 
            </div>
        </div>
    </div>
  <div class="form-group">
    <label for="name" class="col-sm-2 control-label">商品</label>
    <div class="row">
            <div class="col-sm-4 ">
                <div class="container">
                    <input type="text" class="form-control" name="PN" id="firstname" placeholder="请输入商品名">
                </div> 
            </div>
            <div class="col-sm-4 ">
                <div class="container">
                    <input type="text" class="form-control" name="QU" id="firstname" placeholder="请输入數量">
                </div> 
            </div>
            <div class="col-sm-4 ">
                <div class="container">
                    <input type="text" class="form-control" name="P" id="firstname" placeholder="请输入價格">
                </div> 
            </div>
  </div>
  <br>
  <br>
        <div class="d-flex justify-content-around">
            <div class="row">
                <div clas="col-sm-4">
                    <div class="container">
                        <div class="col-sm-8">
                        <button type="submit" name="SD" class="btn btn-default  btn-lg">Save</button> 
                        </div>
                    </div>
                </div>  

                <div clas="col-sm-4">
                <div class="container">
                        <div class="col-sm-8">
                        <button type="submit" class="btn btn-default  btn-lg">Delete</button> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
</form>
<form action="fhw.php" method="post">
<div class="col-sm-4 ">
                <div class="container">
                    <input type="text" class="form-control" name="SHNAME" id="firstname" placeholder="请输入名字">
                </div> 
<div clas="col-sm-4">
                <div class="container">
                        <div class="col-sm-8">
                        <button type="submit" name="SH" class="btn btn-default  btn-lg">Seacrh</button> 
                        </div>
                    </div>
                </div>
</div>
</from>
<div class="container">
<table class="table table-condensed">
 
  <thead>
    <tr>
      <th>ID</th>
      <th>名称</th>
      <th>手機</th>
      <th>地址</th>
      <th>商品</th>
      <th>數量</th>
      <th>日期</th>
      <th>價格(NTD)</th>
    </tr>
  </thead>
  <?php
  if (isset($_POST["SH"])  ) {
  $db = mysqli_connect("192.168.0.101", "JOKER", "JOKER");
      mysqli_query($db,"set names utf8"); 
      mysqli_select_db($db, "dbf"); 
      $SHNAME = $_POST["SHNAME"];
      $sql = "SELECT * FROM ff WHERE NAME='".$SHNAME."' ";
      $rows = mysqli_query($db, $sql);  
      $num = mysqli_num_rows($rows); 
      if ($num > 0) { // 顯示每一筆記錄
        while ($row = mysqli_fetch_array($rows)) {
           $id = $row["ID"];
           echo "<tr>";
           echo "<td>" . $id . "</td>";
           echo "<td>" . $row["NAME"] . "</td>";
           echo "<td>" . $row["PH"] . "</td>";
           echo "<td>" . $row["AD"] . "</td>";
           echo "<td>" . $row["PN"] . "</td>";
           echo "<td>" . $row["QU"] . "</td>";
           echo "<td>" . $row["D"] . "</td>";
           echo "<td>" . $row["P"] . "</td>";
           echo "</tr>";
        }
     }
    }
      ?>
  
</div>



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
