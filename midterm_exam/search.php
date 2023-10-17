<?php
    require 'db_connect.php';
    if (isset ($_POST['Search'])) {
      $CategoryID = $_POST['CategoryID'];
      $CategoryName = $_POST['CategoryName'];
      $sql = "insert into 
      categories(CategoryID, CategoryName) 
      values('{$CategoryID}', '{$CategoryName}')";
      echo $sql;
      $conn->query($sql);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Search product by category</title>
</head>
<body>
  <header>
    <form action="product.php" method="get">
      <label for="category">
        <select name="category" id="category">
          <option value="1">Beverages</option>
          <option value="2">Condiments</option>
          <option value="3">Confections</option>
          <option value="4">Dairy Products</option>
          <option value="5">Grains/Cereals</option>
          <option value="6">Meat/Poultry</option>
          <option value="7">Produce</option>
          <option value="8">Seafood</option>
        </select>
      </label>
      <input type="submit" value="Search" name="submit">
    </form>
  </header>
</body>
</html>