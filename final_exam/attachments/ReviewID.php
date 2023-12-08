<?php
include 'db_connect.php';
if (isset ($_POST['submit'])) {
  $ProductID = $_POST['ProductID'];
  $Detail = $_POST['Detail'];
  $sql = "update reviews set Attachment='1.png' where ReviewID=1";
  $reviewID = $conn->insert_id;
  $sql->execute();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Northwind - Review product</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
<header>
  <img src="images/northwind.png" alt="" id="logo">
  <span id="company">Northwind Traders</span>
</header>
<h1 class="title">Review</h1>
<div id="main">
  <form action="review.php" method="post" enctype="multipart/form-data">
    <p>
      <label for="product">Product to review</label>
      <select name="ProductID" id="product" placeholder="Please select product">
<?php
$sql = 'select ProductID, ProductName from products where Discontinued=0';

try {
  $result = $conn->query($sql);
  while($row = $result->fetch_assoc()) {
?>
        <option value="<?=$row['ProductID']?>"><?=$row['ProductName']?></option>
<?php    
  }
}
catch (Exception $e) {
  echo "Error: {$e->getMessage()}";
}

$conn->close();
?>      
      </select>
    </p>
    <p>
      <label for="detail">Detail</label>
      <textarea name="Detail" id="detail" cols="30" rows="10"></textarea>
    </p>
    <p>
      <label for="attachment">Attachment</label>
      <input type="file" name="Attachment" id="attachment">
    </p>
    <input type="submit" value="Submit" name="submit">
  </form>
</div>
</body>
</html>