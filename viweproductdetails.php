<?php
include 'actions/dbconnection.php';

$pid = "";

if (isset($_GET['pid'])) {
    $pid = $_GET['pid'];
}

if ($pid == "") {
    header("Location: advanceSearch.php");
    die();
}


$query = "SELECT * FROM products WHERE product_id = '" . $pid . "'   ";


$result = $conn->query($query);

$name;
$disc;
$pric;
$imageURL;

$pid;

if ($result->num_rows > 0) {

    $row[] = $conn->fetch_assoc();

    $name = $row["product_name"];

    $disc = $row["discription"];
    $pric = $row["sell_price"];
    $imageURL = $row["product_profile_image"];
}else {

    header("Location: advacedSearch.php?msg=product not found");
}

?>
<html>

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php include 'header.php' ?>

    <table>

        <tr>

            <td>

                <img src=" <?php echo "actions/productImages/". $imageURL?> " alt="img" width="400" height="400">

            </td>
            <td>
                <h2>
                    <?php echo $name ?>
                </h2>
                <h2>
                    <?php echo $disc ?>
                </h2>
                <h2>
                    <?php echo $pric ?>
                </h2>

<form action="">

<input type="hidden" name="" value="<?php echo $pid; ?>">

<input type="submit" value="add to cart">

</form>

            </td>


        </tr>

    </table>




    <?php include 'footer.php' ?>
</body>

</html>