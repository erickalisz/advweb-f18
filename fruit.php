<?php
$conn = mysqli_connect('localhost', 'website', 'password', 'data');
//check connection
if($conn){
    echo "connected";
}
else{
    echo "not connected";
} 

//query
$query = "SELECT * FROM fruit";
//prepare the query
$statement = $conn -> prepare($query);
$statement -> execute();
$result = $statement -> get_result();
if($result -> num_rows > 0){
    while($row = $result -> fetch_assoc()){
        $id = $row['fruitID'];
        $name = $row['name'];
        $color = $row['color'];
        $organic = $row['isOrganic'];
        $price = $row['price'];
        echo "<h4>$name</h4>";
        echo "<p>$color</p>";
        echo "<p>$organic</p>";
        echo "<p>$price</p>";
    }
}
?>
<!doctype html>
<html>
    <head>
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.css">
        <link rel="stylesheet" href="node_modules/font-awesome/css/font-awesome.css">
        <link rel="stylesheet" href="custom.css">
        <script src="node_modules/jquery/dist/jquery.js"></script>
        <script src="node_modules/popper.js/dist/umd/popper.js"></script>
        <script src="node_modules/bootstrap/dist/js/bootstrap.js"></script>
        <title>Fruit</title>
    </head>
    <body>
        <p></p>
    </body>
</html>