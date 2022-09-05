<?php
include "header.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Mania | Flight Ticket</title>
    <link rel="shortcut icon" href="css/icon.ico" type="image/x-icon">
</head>
<style>
    .details {
        border-style: solid;
        border-width: 3px;
        border-radius: 20px;
        padding-left: 45px;
        width: 450px;
        height: auto;
        margin-top: 30px;
        margin-left: 33%;
    }

    .image {
        height: auto;
        width: auto;
    }
    .ticket_header{
        display: flex;
        background-color: #678983;
        padding-top: 20px;
        padding-left: 20px;
    }
    body{
        background-color: #F0E9D2;
        margin: 0;
    }
</style>

<body>
<?php
    $id=$_GET['id'];
    include "config.php";
    $sql1="SELECT * FROM flight_booking WHERE flightbooking_id={$id}";
    $result1=mysqli_query($conn,$sql1);
    $row1=mysqli_fetch_assoc($result1);
    $sql2="SELECT * FROM flight_payment WHERE flightbooking_id={$id}";
    $result2=mysqli_query($conn,$sql2);
    $row2=mysqli_fetch_assoc($result2);
    $sql3="SELECT operator FROM flight WHERE flight_id={$row1['Flight_id']}";
    $result3=mysqli_query($conn,$sql3);
    $row3=mysqli_fetch_assoc($result3);
    ?>
    <div class="ticket_header">
        <div class="image">
            <img src="css/logo.png" class="tourImage" alt="logo" style="height: 80px;width: 80px;">
        </div>
        <h1 style="text-align: center; padding-left: 30px;">Travel Mania</h1>
    </div>
    <hr noshade size="3">
    <h2 style="text-align: center;">FLIGHT TICKET</h2>
    <div class="details">
        <p>
            Booking ID : <?php echo $row1['flightbooking_id']?> <br><br>
            Transaction ID: <?php echo $row2['transcation_id']?> <br><br>
            Operator: <?php echo $row3['operator']?> <br><br>
            Username: <?php echo $_SESSION["username"]?> <br><br>
            Origin: <?php echo $row1['origin']?> <br><br>
            Destination: <?php echo $row1['destination']?> <br><br>
            Departure Date: <?php echo $row1['date']?> <br><br>
            Number Of Passengers: <?php echo $row1['Passengers']?> <br><br>
            Fare : <?php echo $row2['amount']?> <br><br>
        </p>
    </div>
    <button onclick="window.location.href='dashboard.php'" style="margin: 15px auto auto 47%; padding: 3px 5px 3px 5px ;">BACK</button>
</body>

</html>