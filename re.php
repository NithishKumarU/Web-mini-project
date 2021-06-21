<?php

include("db.php");
session_start();
if(isset($_SESSION['userid']))
{
  #
} 
else{
  echo '<script>window.location="login.php"</script>';
}
if(isset($_POST['payed']))
{
    echo "<script type='text/javascript'>alert('Payment Successful');</script>";
    $sql="DELETE FROM cart";
    $_SESSION['count']=0;
    $result = mysqli_query($conn, $sql);
    echo '<script>window.location="cc.php"</script>';
}

if(isset($_POST['cancel']))
{
    
    $sql="DELETE FROM cart";
    $_SESSION['count']=0;
    $result = mysqli_query($conn, $sql);
    echo '<script>window.location="cc.php"</script>';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/c6e87f4ab3.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="re.css">
    <title>Document</title>
</head>
<body>
    <div class="card receipt-box mx-auto">
        <div class="row">
            <div class="col">
                <div class="row">
                    <div class="col-6 p-4">
                        <h4>Geek's Cafe</h4>
                        <p>7A, Whitefield Main Rd,<br> Narayanappa Garden, Whitefield, Bengaluru, Karnataka 560066</p>
                    </div>
                    <div class="col text-left p-4 receipt-date">
                        <p>Date: 10 December, 2020</p>
                        <p>Receipt #:34576809</p>
                    </div>
                </div>
                <div class="row text-center receipt-heading">
                    <h1>Receipt</h1>
                </div>
                <div class="receipt-table">
                    <table class="table">
                        <thead>
                            <th>Product</th>
                            <th>#</th>
                            <th>Price</th>
                            <th>Total</th>
                            <th>Delete</th>
                        </thead>
                        <tbody>
                            <?php
                                $temp=0;
                                $sql="SELECT * FROM cart";
                                $result = mysqli_query($conn, $sql);
                            
                                while($row = mysqli_fetch_array($result))
                                {   
                                    $temp=$temp+$row['price']*$row['num'];
                                    echo "<tr><td class=\"col-md-8\"><em>" . $row['name'] . "</td><td class=\"col-md-1\" style=\"text-align: center\">" . $row['num'] . "</td><td class=\"col-md-1 text-center\">₹".$row['price']."</td><td class=\"col-md-1 text-center\">₹".$row['price']*$row['num']."</td><td class=\"col-md-1\"><a href='delete.php?id=".$row['id']."'><i class=\"fas fa-trash-alt\" style=\"color:#f12020;text-align:center;\"></i></a></td></tr>";  
                                }


                            ?>
                            <tr>
                                <td>   </td>
                                <td>   </td>
                                <td class="text-right">
                                <p>
                                    <strong>Subtotal: </strong>
                                </p>
                                <p>
                                    <strong>Tax: </strong>
                                </p></td>
                                <td class="text-center">
                                <p>
                                    <strong>₹<?php echo $temp;  ?></strong>
                                </p>
                                <p>
                                    <strong>₹<?php echo $temp*0.05;  ?></strong>
                                </p></td>
                            </tr>
                            <tfoot>
                                <td>   </td>
                                <td>   </td>
                                <td class="text-right"><h4><strong>Total: </strong></h4></td>
                                <td class="text-center text-danger"><h4><strong>₹<?php echo $temp+$temp*0.05;  ?></strong></h4></td>
                            </tfoot>
                        </tbody>
                    </table>
                </div>
            </div>
            
            <div class="col">
                <div class="row mt-4">
                    <div class="row text-center receipt-heading">
                        <h1>Payment</h1>
                    </div>
                    <form action="" method="POST" id="myform" >
                    <div class="mb-3">
                        <label for="CardHolderName" class="form-label">Card Holder's Name</label>
                        <input type="text" class="form-control" id="CardHolderName" required>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Card Number</label>
                        <div class="row d-flex">
                            <input type="text" class="form-control" id="CardNumber" maxlength="16" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="form-group">
                            <label for="" class="form-label">Card Expiry Date</label>
                                <div class="row">
                                    <div class="col-9 p-0">
                                        <select class="form-control" id="exampleFormControlSelect1" required>
                                            <option>January</option>
                                            <option>February</option>
                                            <option>March</option>
                                            <option>April</option>
                                            <option>May</option>
                                            <option>June</option>
                                            <option>July</option>
                                            <option>August</option>
                                            <option>September</option>
                                            <option>October</option>
                                            <option>November</option>
                                            <option>December</option>
                                        </select>
                                    </div>
                                    <div class="col-3">
                                        <select class="form-control" id="exampleFormControlSelect1" name="year" required>
                                        <option value="2020">2034</option>
                                        <option value="2020">2033</option>
                                        <option value="2020">2032</option>
                                        <option value="2020">2031</option>
                                        <option value="2020">2030</option>
                                        <option value="2020">2029</option>
                                        <option value="2020">2028</option>
                                        <option value="2020">2027</option>
                                        <option value="2020">2026</option>
                                        <option value="2020">2025</option>
                                        <option value="2020">2024</option>
                                        <option value="2020">2023</option>
                                        <option value="2020">2021</option>
                                        <option value="2020">2020</option>
                                        </select>
                                    </div>
                                </div>        
                        </div>              
                    </div>
                    <div class="mb-3 cvv-i">
                        <label for="" class="form-label">Card CVV</label>
                        <input type="text" class="form-control " id="CardCVV" maxlength="3" required>
                    </div>
                    <div class="mb-3 d-flex justify-content-center re-btns">
                    
                        <button type="submit" name="payed" class="btn btn-danger mr-2">Submit</button>
                    </form>
                    <form action="" method="POST">
                        <button type="submit" name="cancel" class="btn btn-light">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>    
        </div>       
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
</body>
</html>