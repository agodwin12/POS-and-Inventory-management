<?php
session_start();

$servername = 'localhost';
$usernames = 'root';
$password = '';
$db = 'favourite';
$conn = mysqli_connect('localhost','root','','favourite');
if ($conn){
    echo 'done';
} else{
    echo 'failed';
}

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
} else {
    header("Location: loginfile.php");
    exit;
}

if (isset($_POST['sell'])){

    $agent = $_POST['agent'];
    $date = $_POST['date'];
    $product = $_POST['product'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

    $date = date('Y-m-d', strtotime($date));
    $totalAmount = 0;

    foreach ($agent as $key => $value){
        $currentAmount = $price[$key] * $quantity[$key];
        $totalAmount += $currentAmount;
        $save = "INSERT INTO sales (agent,date,product,price,quantity) VALUES ('".$value."','".$date[$key]."','".$product[$key]."','".$price[$key]."','".$quantity[$key]."')";
        $res = mysqli_query($conn,$save);
        if ($res){
            header("location: userHome.php");
        }else{
            echo "try again";
        }
    }


}

?>

<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <title>Sell</title>
</head>
<body>
<div class="container">
    <div class="btn">
        <button class="btn btn-success"><a href="totalSales.php" style="text-decoration: none">HOME</a></button>
    </div> <!-- NAVBAR -->
    <form action="" method="post">
        <hr>
        <h1 style="text-align: center">Take an order</h1>
        <input type="date" class="form-control" name="date" id="dateField" readonly>
        <hr>
        <div class="input-field">
            <table class="table table-bordered" id="table_field">
                <tr>
                    <th>Agent</th>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Amount</th>
                    <th>Action</th>
                </tr>
                <tr>
                    <td><input class="form-control" type="text" name="agent[]" value="<?php echo $username; ?>" readonly></td>
                    <td>
                        <select name="product[]" class="form-control">
                            <option value="">--SELECT PRODUCT--</option>
                            <option value="PINEAPPLE JUICE">PINEAPPLE JUICE</option>
                            <option value="COCKTAIL JUICE">COCKTAIL JUICE</option>
                            <option value="PINEAPPLE GINGER JUICE">PINEAPPLE GINGER JUICE</option>
                            <option value="CARROT JUICE">CARROT JUICE</option>
                            <option value="GINGER JUICE">GINGER JUICE</option>
                        </select>
                    </td>
                    <td><input class="form-control price" type="number" name="price[]" onchange="calculateAmount();" step="0.01"></td>
                    <td><input class="form-control quantity" type="number" name="quantity[]" onchange="calculateAmount();"></td>
                    <td><input class="form-control amount" type="text" name="amount[]" readonly></td>
                    <td><input class="btn btn-warning" type="button" id="add" value="ADD" required onclick="addRow()"></td>
                </tr>
            </table>
            <div class="mb-5 col-md-4">
                <td><input class="form-control" type="text" name="total" id="total" placeholder="TOTAL AMOUNT" readonly value="<?php echo isset($totalAmount) ? $totalAmount : ''; ?>"></td>
            </div>
            <center>
                <input class="btn btn-success" type="submit" name="sell" id="save" value="SELL">
            </center>
        </div>
    </form>
</div>

<script>
    function calculateAmount() {
        var totalAmount = 0;
        $('#table_field tr').each(function() {
            var price = parseFloat($(this).find('.price').val()) || 0;
            var quantity = parseFloat($(this).find('.quantity').val()) || 0;
            var amount = price * quantity;
            $(this).find('.amount').val(amount.toFixed(2));
            totalAmount += amount;
        });
        $('#total').val(totalAmount.toFixed(2));
    }

    function addRow() {
        var newRow = `<tr>
                        <td><input class="form-control" type="text" name="agent[]" value="<?php echo $username; ?>" readonly></td>
                        <td>
                            <select name="product[]" class="form-control">
                                <option value="">--SELECT PRODUCT--</option>
                                <option value="PINEAPPLE JUICE">PINEAPPLE JUICE</option>
                                <option value="COCKTAIL JUICE">COCKTAIL JUICE</option>
                                <option value="PINEAPPLE GINGER JUICE">PINEAPPLE GINGER JUICE</option>
                                <option value="CARROT JUICE">CARROT JUICE</option>
                                <option value="GINGER JUICE">GINGER JUICE</option>
                            </select>
                        </td>
                        <td><input class="form-control price" type="number" name="price[]" onchange="calculateAmount();" step="0.01"></td>
                        <td><input class="form-control quantity" type="number" name="quantity[]" onchange="calculateAmount();"></td>
                        <td><input class="form-control amount" type="text" name="amount[]" readonly></td>
                        <td><input class="btn btn-danger" type="button" value="REMOVE" onclick="removeRow(this)"></td>
                    </tr>`;
        $('#table_field').append(newRow);
    }

    function removeRow(button) {
        $(button).closest('tr').remove();
        calculateAmount();
    }
</script>

<script>
    var currentDate = new Date();

    var formattedDate = currentDate.getFullYear() + '-' +
        ('0' + (currentDate.getMonth() + 1)).slice(-2) + '-' +
        ('0' + currentDate.getDate()).slice(-2);

    document.getElementById('dateField').value = formattedDate;
</script>