<?php
session_start(); 
include 'conn.php';
if (!empty($_SESSION)) {

    $e = $_SESSION['email'];

    $getdetails = mysqli_query($conn, "SELECT * FROM user WHERE email = '$e'");
    while ($row = mysqli_fetch_object($getdetails)) {
        $defaultName = $row->fullname;
    }

}

$sql = "SELECT * FROM booked WHERE email= '$e'";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Review Order</title>

<style>
  @media print {
    body * {
      visibility: hidden;
      margin: 0;
      
      
    }
    .print-container, .print-container * {
      visibility: visible;
  
    }
    .print-container {
      position: absolute;
      left: 0;
      top: 0;
    
      
    }
    .print-container {
      width: 100%;
      margin: 0 auto;
      padding:20px;
      
     
    
    }
  }

  body{
    background-color: #f0f0f0; 
    margin: 0;
    padding: 20px;
    
  }
  /*Css for table */

  .print-box{
    padding-top: 30px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    padding-bottom: 35px;
    display: grid;
    place-items: center;
    width: 60%;
    padding-left: 30px;
    padding-right:30px ;
    margin-left: 18%;
    margin-top: 40px;
    border-radius: 10px;
  }

  .print-container{
  
    background-color: gainsboro;
    width: 100%;
    height: auto;
    font-family: 'Courier New', Courier, monospace;
   padding:0 0 20px 20px;
   border-radius: 10px;
  }


   /*Css for buttons */
  .buttons{
    margin-top: 10px;
    width: 100%;
    padding:0 40px 0 40px;
   
    
  
  }

  .buttons #button1{
    width: 100%;
    padding: 15px;
    background-color: #4267B2;
    color: #f0f0f0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
  }

  .buttons #button2{
    width: 100%;
    padding: 15px;
    background-color: green;
    color: #f0f0f0;
   border: none;
   border-radius: 4px;
   cursor: pointer;
   margin-top: 10px;
  }
  .buttons #button1:hover{
    background-color: darkblue;
    
  }

  .buttons #button2:hover{
    background-color: darkgreen;
  }
</style>
</head>
<body>

<?php
if ($result) {
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
?>

<div class="print-box">
<div class="print-container">
  <h2 style="text-align: center;">ORDER REVIEW</h2>
  <table>
    <tr>
      <td><strong>Prodduct Number:</strong></td>
      <td><?php echo $row['id']; ?></td>
    </tr>
    <tr>
      <td><strong>Product:</strong></td>
      <td><?php echo $row['des']; ?></td>
    </tr>
    <tr>
      <td><strong>Total:</strong></td>
      <td><?php echo $row['total']; ?></td>
    </tr>
    <tr>
      <td><strong>Email:</strong></td>
      <td><?php echo $row['email']; ?></td>
    </tr>
    <tr>
      <td><strong>Date:</strong></td>
      <td><?php echo $row['date']; ?></td>
    </tr>
    <tr>
      <td><strong>Quantity:</strong></td>
      <td><?php echo $row['people']; ?></td>
    </tr>
    <tr>
      <td><strong>Mode of Payment:</strong></td>
      <td><?php echo $row['transpo']; ?></td>
    </tr>

    <tr>
      <td><strong>Extra Fee for Enhanced Order Safety:</strong></td>
      <td><?php echo $row['hotel']; ?></td>
    </tr>
  </table>
</div>


<div class="buttons">
<button type="button" id="button1" onclick="window.print()">Check</button> 
<button type="button" id="button2" href="booked.php" >Go back</button>
</div>


</div>

<?php
    }
  } else {
    echo "No order records available";
  }
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

?>


</body>
</html>