<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
.container{
    width:1200px;
    margin: auto;
}
.top{
    margin-top : 15px;
}
</style>
</head>
<body>


<?php

    $host = "localhost";
    $user = "root";
    $password = "";
    $db = "productphp";

    $connection = mysqli_connect($host,$user,$password,$db);

    if(!$connection){
        die("Cannot connect to Database");
    }
?>
    
<div class="container">

    <h1>Add Product</h1>

    <a href="add.php"><button>Add</button></a>

    <table class="top">
    <tr>
        <th>Product</th>
        <th>Qty</th>
        <th>Price</th>
        <th>Action</th>
    </tr>

    <?php

        $sql = "SELECT * FROM product";
        $result = $connection->query($sql);

        while($row = $result->fetch_assoc()){

            echo "
            
                <tr>
                    <td>$row[productname]</td>
                    <td>$row[qty]</td>
                    <td>$row[price]</td>
                    <td>
                        <button>Edit</button>
                        <a href='delete.php?id=$row[id]'><button>Delete</button></a>
                    </td>
                </tr>

            ";
        }
    ?>
    </table>
    
</div>

</body>
</html>