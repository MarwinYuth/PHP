<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>

        .container{
            width:1200px;
            margin: auto;
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

        $productname = "";
        $qty = "";
        $price = "";

        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $name = $_POST['product'];
            $qty = $_POST['qty'];
            $price = $_POST['price'];

            if($name == "" || $qty == "" || $price == ""){
                echo "
                
                <script>
                alert('Input First')
                </script>
                
                ";
            }

            $sql = "INSERT INTO product (productname,qty,price) VALUES ('$name', '$qty', '$price')";
            $connection->query($sql);

            header('location: ./index.php');
            exit;
        }

    ?>

    <div class="container">

        <h1>Add Product to backend</h1>

        <form method="POST">

            <input type="text" placeholder="product" name="product"><br><br>
            <input type="text" placeholder="qty" name="qty"><br><br>
            <input type="text" placeholder="price" name="price"><br><br>
            <button type="submit">Submit</button>

        </form>

    </div>


</body>
</html>