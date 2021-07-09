<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <!-- Bootstrap CSS -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   
   <link rel="stylesheet" type="text/css" href="library/font-awesome-4.3.0/css/font-awesome.min.css">
   <title>Customers</title>
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
   </header>
<?php

//including the database connection file

include 'config.php';


echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
?>
<div class="p-5 border rounded-3 bg-light">
<table class="table table-success table-striped" border=3px cellpadding=10 >
   <tr>
   <td><b>User ID</b></td>
   <td><b>Users<b></td>
   <td><b>Email<b></td>
   <td><b>Balance<b></td>
   <td><b>Transfer<b></td>
   </tr>
      <?php
      $query="select * from customer";

      $result = mysqli_query($mysqli,$query); ?>
      
      <?php
          while ($rows = mysqli_fetch_assoc($result)) {
      ?>
      <tr style="color : black;">
         <td class="py-2"><?php echo $rows['id'] ?></td>
         <td class="py-2"><?php echo $rows['customer_name'] ?></td>
         <td class="py-2"><?php echo $rows['email'] ?></td>
         <td class="py-2"><?php echo $rows['balance'] ?></td>
         <td><a href="transfer.php?id= <?php echo $rows['id'];?>"> <button class="btn btn-success" type="button">Transfer</button></a></td>
      </tr>
      <?php
      }
      ?>
</table>
</div>

</body>
</html>