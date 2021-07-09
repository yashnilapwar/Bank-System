<?php
   include 'config.php';
   if (isset($_POST['Submit'])) {
   $sender =mysqli_real_escape_string($mysqli, $_GET['id']);
   $reciver=mysqli_real_escape_string($mysqli, $_POST['Beneficiary_name']);
   $amount = $_POST['amount'];

   $que="SELECT * from customer where id=$sender";
   $Query=mysqli_query($mysqli,$que);
   $Q1= mysqli_fetch_array($Query);

   $que="SELECT * from customer where customer_name='$reciver'";
   $Query=mysqli_query($mysqli,$que);
   $Q2= mysqli_fetch_array($Query);

   if (($amount) < 0) {
      
      echo '<script> alert("Amount cannot be Negative")</script>';
   }
   else if (($amount) > $Q1['balance']) {
      
      echo '<script> alert("Insufficient Balance")</script>';
   }
   else if (($amount)==0) {
      
      echo '<script> alert("Amount cannot be Zero")</script>';
   }

   if(empty($reciver) || empty($amount)) {
      
      
      
      if(empty($reciver)) {
         
         echo "<font color='red'>Beneficiary Name field is empty.</font><br/>";
         
      }
         
         
         
      if(empty($amount)) {
         
         echo "<font color='red'>Amount field is empty.</font><br/>";
         
      }
   } else {
      
      //	if all the fields are filled (not empty)
      //Transaction
      $sendersbal=$Q1['balance']- $amount;
      $reciversbal=$Q2['balance']+ $amount;
      echo"$sendersbal $reciversbal";

      $query = "UPDATE customer SET balance=$sendersbal WHERE id=$sender ";
      $result = mysqli_query($mysqli,$query);

      $sid =$Q2['id'];
      $query = "UPDATE customer SET balance=$reciversbal WHERE id=$sid ";
      $result = mysqli_query($mysqli,$query);

      
      $sender_name= $Q1['customer_name'];
      $reciver_name=$Q2['customer_name'];
      echo"$sender_name $reciver_name $amount";
      //Transaction data to database
      $query="INSERT INTO transaction_history(senders_name,receivers_name,amount) VALUES('$sender_name','$reciver_name','$amount')";
      $result = mysqli_query($mysqli,$query);
      
      
      
      //display success message
      echo '<script> alert("Transaction Successfully")</script>';
      }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <!-- Bootstrap CSS -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  
   <link rel="stylesheet" type="text/css" href="library/font-awesome-4.3.0/css/font-awesome.min.css">
   <title>Document</title>
</head>
<body>
   
<header>
<nav class="navbar fixed-top navbar-expand-md navbar-dark bg-dark mb-4">
     <div class="container-fluid">
      <a class="navbar-brand" href="#">
         <img src="https://ibapi.in/images/bank.png" alt="" width="30" height="30" >
       </a> 
      <a class="navbar-brand" href="index.html">Citi Bank</a>
       <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
       </button>
       <div class="collapse navbar-collapse" id="navbarCollapse">
         <ul class="navbar-nav me-auto mb-2 mb-md-0">
        <li class="nav-item" style="margin-left: 50px;">
             <a class="nav-link active" aria-current="page" href="index.html">Home</a>
           </li>
           <li class="nav-item" style="margin-left: 50px;">
             <a class="nav-link active" href="Customers_list.php">Customer List</a>
           </li>
           <li class="nav-item" style="margin-left: 50px;">
            <a class="nav-link active" href="remove.php">Remove Customer </a>
          </li>
         <li class="nav-item" style="margin-left: 50px;">
             <a class="nav-link active" href="transaction_history.php">Transaction History</a>
           </li>
           <li class="nav-item" style="margin-left: 50px;">
             <a class="nav-link active" aria-current="page" href="https://internship.thesparksfoundation.info/">Contact Us</a>
           </li>
           <li class="nav-item"style="margin-left: 50px;">
            <a class="nav-link active" aria-current="page" href="https://www.thesparksfoundationsingapore.org/">About Us</a>
          </li>
         </ul>
         
       </div>
       <div>

      
        <a href="https://www.linkedin.com/in/yash-nilapwar-51ab3b159/"><i class="fa fa-linkedin" style="color:#fff; margin-right: 10px;"></i></a>
        <a href="#"><i class="fa fa-instagram" style="color:#fff;margin-right: 10px;"></i></a>
        <a href="#"><i class="fa fa-twitter" style="color:#fff;margin-right: 10px;"></i></a>
        <a href="https://github.com/yashnilapwar"><i class="fa fa-github" style="color:#fff;"></i></a>
        </div>
     </div>
   </nav>
   </header><br><br><br><br><br>

   <div class="col-10 mx-auto col-lg-5">
   <form class="p-5 border rounded-3 bg-light"  method="post" name="form1"> 
      <table width="25%" border="0">
         <tr>
         
         <td>Beneficiary Name</td>
         
         <td><input type="text" name="Beneficiary_name"></td>
         
         </tr>
         
        
         <tr>
            <td>Amount To Transfer</td>
            <td><input type="text" name="amount"></td>
         </tr>
         <tr>
         
         <td></td>
         
         <td> <a href="transaction_history.php"> <button class="btn btn-success" type="submit" name="Submit" value="Add">Pay</button></a></td>
         
         </tr>
      
      </table>
      
   </form>
</div>
</body>
</html>
