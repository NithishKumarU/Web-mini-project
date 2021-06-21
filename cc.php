<?php

include("db.php");
session_start();

// $sql = "DELETE FROM cart";
// $sql_run=mysqli_query($conn,$sql);
if(isset($_SESSION['userid']))
{
  #
} 
else{
  echo '<script>window.location="login.php"</script>';
}


if(isset($_POST['add']))
{
    $name = $_POST['hiddenname'];
    $price = $_POST['hiddenprice'];
    $_SESSION['count']=$_SESSION['count']+1;

    $query = "SELECT * FROM cart WHERE name = '$name'";
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result)==0)
    {
      $sql = "INSERT INTO cart (name, price) VALUES('$name','$price')";
      $sql_run=mysqli_query($conn,$sql);
      // if($sql_run){
      // echo "<script type='text/javascript'>alert('Successfully Added');</script>";
      // }
    }
    else{


      $sql = "UPDATE cart SET num = num+1 where name='$name'";
      $sql_run=mysqli_query($conn,$sql);
      // if($sql_run){
      // echo "<script type='text/javascript'>alert('Successfully Added');</script>";
      // }
    }

    
    
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="cc.css">
    <script src="https://kit.fontawesome.com/c6e87f4ab3.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <div class="hero-banner">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel" data-bs-interval="2000">
            <ol class="carousel-indicators">
              <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></li>
              <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></li>
              <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="pics/coff-page/h-bur.jpg" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="pics/coff-page/h-piz.jpg" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="pics/coff-page/h-chik.jpg" class="d-block w-100" alt="...">
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </a>
          </div>

    </div>
    <div class="nnaavv">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container-fluid">
              <!-- <a class="navbar-brand" href="#">Navbar</a> -->
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="Index.php">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#recom">Recommended</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#burgers">Burgers</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#piz">Pizzas</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#q">Sides</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#bev">Beverages</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#des">Desserts</a>
                  </li>

                  
                </ul>
              </div>
            </div>
            <div class="profile-nav">
              <div class="user-heading round d-flex" style="color:white;">
                <?php
                    if (isset($_SESSION['sname']))
                    {
                        echo('<h1>'.$_SESSION['sname'].'</h1>');
                    }
                    else
                    {
                        echo('<h4 class="m-0">Admin</h4>');
                    }
                ?>
                <a href="#">
                    <img src="pics/pro-pics/pic4.jpg" alt="">
                </a>
          </div>

            </div>
            
          </nav>
    </div>
    
    
    <div class="m-body">
      <div class="recom-bar" id="recom">
        <div class="recom-bar-heading">
            <h2>Recommended for you</h2>
        </div>
        <div class="recom-bar-items d-flex">
            <div class="recom-bar-item">
                <div class="recom-bar-item-image">
                    <img src="pics/coff-page/bur2.jfif" alt="" height="140px" style="border-radius:10px 10px 0 0;">
                </div>
                <div class="recom-bar-item-details p-2">
                <form action="#" method="POST">
                    <h5>Lamb Burger</h5>

                    <input type="hidden" name='hiddenname' value='Lamb Burger'>
                    <div class="d-flex">
                      <p>₹229</p>
                      <input type="hidden" name='hiddenprice' value='229'>
                      <button type="submit" class="btn btn-danger add-btn" name="add" onclick="incrementValue()" value="Increment Value">Add</button>
                    </div>
                </form>
                    
                </div>
            </div>
            <div class="recom-bar-item">
              <div class="recom-bar-item-image">
                  <img src="pics/coff-page/piz4.webp" alt="" height="140px" width="255px" style="border-radius:10px 10px 0 0;">
              </div>
              <div class="recom-bar-item-details p-2">
              <form action="#" method="POST">
                  <h5>Picante Paneer Pizza</h5>
                  <input type="hidden" name='hiddenname' value='Picante Paneer Pizza'>
                  <div class="d-flex">
                    <p>₹470</p>
                    <input type="hidden" name='hiddenprice' value='470'>
                    <button type="submit" class="btn btn-danger add-btn" name="add" onclick="incrementValue()" value="Increment Value">Add</button>
                  </div>
              </form>
              </div>
          </div>
          <div class="recom-bar-item">
            <div class="recom-bar-item-image">
                <img src="pics/coff-page/q2.jpg" alt="" height="140px" style="border-radius:10px 10px 0 0;">
            </div>
            <div class="recom-bar-item-details p-2">
            <form action="#" method="POST">
                <h5>Cheesy Fries</h5>
                <input type="hidden" name='hiddenname' value='Cheesy Fries'>
                <div class="d-flex">
                  <p>₹99</p>
                  <input type="hidden" name='hiddenprice' value='99'>
                  <button type="submit" class="btn btn-danger add-btn" name="add" onclick="incrementValue()" value="Increment Value">Add</button>
                </div>
                </form>
            </div>
        </div>
        <div class="recom-bar-item">
          <div class="recom-bar-item-image">
              <img src="pics/coff-page/bev1.jpg" alt="" height="140px" style="border-radius:10px 10px 0 0;">
          </div>
          <div class="recom-bar-item-details p-2">
          <form action="#" method="POST" >
              <h5>Mango Thickshake</h5>
              <input type="hidden" name='hiddenname' value='Mango Thickshake'>
              <div class="d-flex">
                <p>₹129</p>
                <input type="hidden" name='hiddenprice' value='129'>
                <button type="submit" name="add" class="btn btn-danger add-btn" onclick="incrementValue()" value="Increment Value">Add</button>
              </div>
              </form>
          </div>
        </div>
        <div class="recom-bar-item">
          <div class="recom-bar-item-image">
              <img src="pics/coff-page/des2.jpg" alt="" height="140px" style="border-radius:10px 10px 0 0;">
          </div>
          <div class="recom-bar-item-details p-2">
          <form action="#" method="POST">
              <h5>Chocolate Sundae</h5>
              <input type="hidden" name='hiddenname' value='Chocolate Sundae'>
              <div class="d-flex">
                <p>₹59</p>
                <input type="hidden" name='hiddenprice' value='59'>
                <button type="submit" name="add" class="btn btn-danger add-btn" onclick="incrementValue()" value="Increment Value">Add</button>
              </div>
              </form>
          </div>
        </div>
        </div>
    </div>
  
      <div class="bur-bar" id="burgers">
          <div class="bur-bar-heading">
              <h2>Burgers</h2>
          </div>
          <div class="bur-bar-items d-flex">
              <div class="bur-bar-item">
                  <div class="bur-bar-item-image">
                      <img src="pics/coff-page/bur1.jfif" alt="" height="160px" style="border-radius:10px 10px 0 0;">
                  </div>
                  <div class="bur-bar-item-details p-2">
                  <form action="#" method="POST">
                      <h5>Veg Burger</h5>
                      <input type="hidden" name='hiddenname' value='Veg Burger'>
                      <div class="d-flex">
                        <p>₹169</p>
                        <input type="hidden" name='hiddenprice' value='169'>
                        <button type="submit" name="add" class="btn btn-danger add-btn" onclick="incrementValue()" value="Increment Value">Add</button>
                      </div>
                      </form>
                  </div>
              </div>
              <div class="bur-bar-item">
                <div class="bur-bar-item-image">
                    <img src="pics/coff-page/bur2.jfif" alt="" height="160px" style="border-radius:10px 10px 0 0;">
                </div>
                <div class="bur-bar-item-details p-2">
                <form action="#" method="POST">
                    <h5>Lamb Burger</h5>
                    <input type="hidden" name='hiddenname' value='Lamb Burger'>
                    <div class="d-flex">
                      <p>₹229</p>
                      <input type="hidden" name='hiddenprice' value='229'>
                      <button type="submit" name="add" class="btn btn-danger add-btn" onclick="incrementValue()" value="Increment Value">Add</button>
                    </div>
                    </form>
                </div>
            </div>
            <div class="bur-bar-item">
              <div class="bur-bar-item-image">
                  <img src="pics/coff-page/bur3.jfif" alt="" height="160px" style="border-radius:10px 10px 0 0;">
              </div>
              <div class="bur-bar-item-details p-2">
              <form action="#" method="POST">
                  <h5>Paneer Burger</h5>
                  <input type="hidden" name='hiddenname' value='Paneer Burger'>
                  <div class="d-flex">
                    <p>₹179</p>
                    <input type="hidden" name='hiddenprice' value='179'>
                    <button type="submit" name="add" class="btn btn-danger add-btn" onclick="incrementValue()" value="Increment Value">Add</button>
                  </div>
                </form>
              </div>
          </div>
          <div class="bur-bar-item">
            <div class="bur-bar-item-image">
                <img src="pics/coff-page/recom4.jpg" alt="" height="160px" style="border-radius:10px 10px 0 0;">
            </div>
            <div class="bur-bar-item-details p-2">
            <form action="#" method="POST">
                <h5>Chicken Burger</h5>
                <input type="hidden" name='hiddenname' value='Chicken Burger'>
                <div class="d-flex">
                  <p>₹199</p>
                  <input type="hidden" name='hiddenprice' value='199'>
                  <button type="submit" name="add" class="btn btn-danger add-btn" onclick="incrementValue()" value="Increment Value">Add</button>
                </div>
            </form>
            </div>
        </div>
              
  
          </div>
      </div>
  
      <div class="pizza-bar" id="piz">
        <div class="pizza-bar-heading">
            <h2>Pizzas</h2>
        </div>
        <div class="pizza-bar-items d-flex">
            <div class="pizza-bar-item">
                <div class="pizza-bar-item-image">
                    <img src="pics/coff-page/piz1.webp" alt="" height="194px" style="border-radius:10px 10px 0 0;">
                </div>
                <div class="pizza-bar-item-details p-2">
                <form action="#" method="POST">
                    <h5>Famous Five Pizza</h5>
                    <input type="hidden" name='hiddenname' value='Famous Five Pizza'>
                    <div class="d-flex">
                      <p>₹470</p>
                      <input type="hidden" name='hiddenprice' value='470'>
                      <button type="submit" name="add" class="btn btn-danger add-btn" onclick="incrementValue()" value="Increment Value">Add</button>
                    </div>
                    </form>
                </div>
            </div>
            <div class="pizza-bar-item">
              <div class="pizza-bar-item-image">
                  <img src="pics/coff-page/piz2.webp" alt="" height="194px" style="border-radius:10px 10px 0 0;">
              </div>
              <div class="pizza-bar-item-details p-2">
              <form action="#" method="POST">
                  <h5>Non-veg Paradise Pizza</h5>
                  <input type="hidden" name='hiddenname' value='Non-veg Paradise Pizza'>
                  <div class="d-flex">
                    <p>₹490</p>
                    <input type="hidden" name='hiddenprice' value='490'>
                    <button type="submit" name="add" class="btn btn-danger add-btn" onclick="incrementValue()" value="Increment Value">Add</button>
                  </div>
                  </form>
              </div>
          </div>
          <div class="pizza-bar-item">
            <div class="pizza-bar-item-image">
                <img src="pics/coff-page/piz3.webp" alt="" height="194px" style="border-radius:10px 10px 0 0;">
            </div>
            <div class="pizza-bar-item-details p-2">
            <form action="#" method="POST">
                <h5>Farmfresh Supreme Pizza</h5>
                <input type="hidden" name='hiddenname' value='Farmfresh Supreme Pizza'>
                <div class="d-flex">
                  <p>₹450</p>
                  <input type="hidden" name='hiddenprice' value='450'>
                  <button type="submit" name="add" class="btn btn-danger add-btn" onclick="incrementValue()" value="Increment Value">Add</button>
                </div>
                </form>
            </div>
        </div>
        <div class="pizza-bar-item">
          <div class="pizza-bar-item-image">
              <img src="pics/coff-page/piz4.webp" alt="" height="194px" style="border-radius:10px 10px 0 0;">
          </div>
          <div class="pizza-bar-item-details p-2">
          <form action="#" method="POST">
              <h5>Picante Paneer Pizza</h5>
              <input type="hidden" name='hiddenname' value='Picante Paneer Pizza'>
              <div class="d-flex">
                <p>₹470</p>
                <input type="hidden" name='hiddenprice' value='470'>
                <button type="submit" name="add" class="btn btn-danger add-btn" onclick="incrementValue()" value="Increment Value">Add</button>
              </div>
              </form>
          </div>
      </div>
            
  
        </div>
    </div>
  
    <div class="sides-bar" id="q">
      <div class="sides-bar-heading" >
          <h2>Sides</h2>
      </div>
      <div class="sides-bar-items d-flex">
          <div class="sides-bar-item">
              <div class="sides-bar-item-image">
                  <img src="pics/coff-page/q1.jpg" alt="" height="160px" style="border-radius:10px 10px 0 0;">
              </div>
              <div class="sides-bar-item-details p-2">
              <form action="#" method="POST">
                  <h5>Veg Wrap</h5>
                  <input type="hidden" name='hiddenname' value='Veg Wrap'>
                  <div class="d-flex">
                    <p>₹79</p>
                    <input type="hidden" name='hiddenprice' value='79'>
                    <button type="submit" name="add" class="btn btn-danger add-btn" onclick="incrementValue()" value="Increment Value">Add</button>
                  </div>
                  </form>
              </div>
          </div>
          <div class="sides-bar-item">
            <div class="sides-bar-item-image">
                <img src="pics/coff-page/q2.jpg" alt="" height="160px" style="border-radius:10px 10px 0 0;">
            </div>
            <div class="sides-bar-item-details p-2">
            <form action="#" method="POST">
                <h5>Cheesy Fries</h5>
                <input type="hidden" name='hiddenname' value='Cheesy Fries'>
                <div class="d-flex">
                  <p>₹99</p>
                  <input type="hidden" name='hiddenprice' value='99'>
                  <button type="submit" name="add" class="btn btn-danger add-btn" onclick="incrementValue()" value="Increment Value">Add</button>
                </div>
                </form>
            </div>
        </div>
        <div class="sides-bar-item">
          <div class="sides-bar-item-image">
              <img src="pics/coff-page/q3.jpg" alt="" height="160px" style="border-radius:10px 10px 0 0;">
          </div>
          <div class="sides-bar-item-details p-2">
          <form action="#" method="POST">
              <h5>Veggie Strips</h5>
              <input type="hidden" name='hiddenname' value='Veggie Strips'>
              <div class="d-flex">
                <p>₹49</p>
                <input type="hidden" name='hiddenprice' value='49'>
                <button type="submit" name="add" class="btn btn-danger add-btn" onclick="incrementValue()" value="Increment Value">Add</button>
              </div>
              </form>
          </div>
      </div>
      <div class="sides-bar-item">
        <div class="sides-bar-item-image">
            <img src="pics/coff-page/q4.jpg" alt="" height="160px" style="border-radius:10px 10px 0 0;">
        </div>
        <div class="sides-bar-item-details p-2">
        <form action="#" method="POST">
            <h5>Chicken Fries</h5>
            <input type="hidden" name='hiddenname' value='Chicken Fries'>
            <div class="d-flex">
              <p>₹69</p>
              <input type="hidden" name='hiddenprice' value='69'>
              <button type="submit" name="add" class="btn btn-danger add-btn" onclick="incrementValue()" value="Increment Value">Add</button>
            </div>
            </form>
        </div>
    </div>
          
  
      </div>
  </div>
  
    <div class="bev-bar" id="bev">
      <div class="bev-bar-heading">
          <h2>Beverages</h2>
      </div>
      <div class="bev-bar-items d-flex">
          <div class="bev-bar-item">
              <div class="bev-bar-item-image">
                  <img src="pics/coff-page/bev1.jpg" alt="" height="160px" width="290.1px" style="border-radius:10px 10px 0 0;">
              </div>
              <div class="bev-bar-item-details p-2">
              <form action="#" method="POST">
                  <h5>Mango Thickshake</h5>
                  <input type="hidden" name='hiddenname' value='Mango Thickshake'>
                  <div class="d-flex">
                    <p>₹129</p>
                    <input type="hidden" name='hiddenprice' value='129'>
                    <button type="submit" name="add" class="btn btn-danger add-btn" onclick="incrementValue()" value="Increment Value">Add</button>
                  </div>
                  </form>
              </div>
          </div>
          <div class="bev-bar-item">
            <div class="bev-bar-item-image">
                <img src="pics/coff-page/bev2.jpg" alt="" height="160px" width="290.1px" style="border-radius:10px 10px 0 0;">
            </div>
            <div class="bev-bar-item-details p-2">
            <form action="#" method="POST">
                <h5>Miranda Float</h5>
                <input type="hidden" name='hiddenname' value='Miranda Float'>
                <div class="d-flex">
                  <p>₹59</p>
                  <input type="hidden" name='hiddenprice' value='59'>
                  <button type="submit" name="add" class="btn btn-danger add-btn" onclick="incrementValue()" value="Increment Value">Add</button>
                </div>
                </form>
            </div>
        </div>
        <div class="bev-bar-item">
          <div class="bev-bar-item-image">
              <img src="pics/coff-page/bev3.jpg" alt="" height="160px" width="290.1px" style="border-radius:10px 10px 0 0;">
          </div>
          <div class="bev-bar-item-details p-2">
          <form action="#" method="POST">
              <h5>Pepsi Float</h5>
              <input type="hidden" name='hiddenname' value='Pepsi Float'>
              <div class="d-flex">
                <p>₹59</p>
                <input type="hidden" name='hiddenprice' value='59'>
                <button type="submit" name="add" class="btn btn-danger add-btn" onclick="incrementValue()" value="Increment Value">Add</button>
              </div>
              </form>
          </div>
      </div>
      <div class="bev-bar-item">
        <div class="bev-bar-item-image">
            <img src="pics/coff-page/bev4.jpg" alt="" height="160px" width="290.1px" style="border-radius:10px 10px 0 0;">
        </div>
        <div class="bev-bar-item-details p-2">
        <form action="#" method="POST">
            <h5>Iced Tea</h5>
            <input type="hidden" name='hiddenname' value='Iced Tea'>
            <div class="d-flex">
              <p>₹79</p>
              <input type="hidden" name='hiddenprice' value='79'>
              <button type="submit" name="add" class="btn btn-danger add-btn" onclick="incrementValue()" value="Increment Value">Add</button>
            </div>
            </form>
        </div>
    </div>
          
  
      </div>
  </div>
  
  <div class="des-bar" id="des">
    <div class="des-bar-heading">
        <h2>Desserts</h2>
    </div>
    <div class="des-bar-items d-flex">
        <div class="des-bar-item">
            <div class="des-bar-item-image">
                <img src="pics/coff-page/des1.jpg" alt="" height="160px" width="290.1px" style="border-radius:10px 10px 0 0;">
            </div>
            <div class="des-bar-item-details p-2">
            <form action="#" method="POST">
                <h5>Blackcurrent Sundae</h5>
                <input type="hidden" name='hiddenname' value='Blackcurrent Sundae'>
                <div class="d-flex">
                  <p>₹59</p>
                  <input type="hidden" name='hiddenprice' value='59'>
                  <button type="submit" name="add" class="btn btn-danger add-btn" onclick="incrementValue()" value="Increment Value">Add</button>
                </div>
                </form>
            </div>
        </div>
        <div class="des-bar-item">
          <div class="des-bar-item-image">
              <img src="pics/coff-page/des2.jpg" alt="" height="160px" width="290.1px" style="border-radius:10px 10px 0 0;">
          </div>
          <div class="des-bar-item-details p-2">
          <form action="#" method="POST">
              <h5>Chocolate Sundae</h5>
              <input type="hidden" name='hiddenname' value='Chocolate Sundae'>
              <div class="d-flex">
                <p>₹59</p>
                <input type="hidden" name='hiddenprice' value='59'>
                <button type="submit" name="add" class="btn btn-danger add-btn" onclick="incrementValue()" value="Increment Value">Add</button>
              </div>
              </form>
          </div>
      </div>
      <div class="des-bar-item">
        <div class="des-bar-item-image">
            <img src="pics/coff-page/des3.jpg" alt="" height="160px" width="290.1px" style="border-radius:10px 10px 0 0;">
        </div>
        <div class="des-bar-item-details p-2">
        <form action="#" method="POST">
            <h5>Strawberry Sundae</h5>
            <input type="hidden" name='hiddenname' value='Strawberry Sundae'>
            <div class="d-flex">
              <p>₹59</p>
              <input type="hidden" name='hiddenprice' value='59'>
              <button type="submit" name="add" class="btn btn-danger add-btn" onclick="incrementValue()" value="Increment Value">Add</button>
            </div>
            </form>
        </div>
    </div>
    <div class="des-bar-item">
      <div class="des-bar-item-image">
          <img src="pics/coff-page/des4.jpg" alt="" height="160px" width="290.1px" style="border-radius:10px 10px 0 0;">
      </div>
      <div class="des-bar-item-details p-2">
      <form action="#" method="POST">
          <h5>Mango Sundae</h5>
          <input type="hidden" name='hiddenname' value='Mango Sundae'>
          <div class="d-flex">
            <p>₹59</p>
            <input type="hidden" name='hiddenprice' value='59'>
            <button type="submit" name="add" class="btn btn-danger add-btn" onclick="incrementValue()" value="Increment Value">Add</button>
          </div>
      </form>
      </div>
  </div>
        
  
    </div>
  </div>
      
    </div>

    <div class="fixedbutton d-flex">
      <a href="re.php"><i class="fas fa-shopping-cart fa-2x" style="color: white;"></i></a>
      <span class="item-count" id="number">
          <?php
            echo $_SESSION['count'];
          ?>
      </span>
    </div>
    
    <!-- Footer -->
    <section id="Contact">
      <footer>
          <div class="main-content">
              <div class="left box">
                  <h2>About us</h2>
                  <div class="content">
                      <p>We are here to ensure no gamer faces any lag, poor FPS, power cuts, malfunctioning components to provide them with long hours of seamless gaming</p>
                      <div class="social">
                          <a href="#" style="color: white;" ><span id="social-btn" class="fab fa-facebook-f"></span></a>
                          <a href="#" style="color: white;"><span id="social-btn" class="fab fa-twitter"></span></a>
                          <a href="#" style="color: white;"><span id="social-btn" class="fab fa-instagram"></span></a>
                          <a href="#" style="color: white;"><span id="social-btn" class="fab fa-youtube"></span></a>
                      </div>
                  </div>
              </div>
              
              <div class="center box">
                  <h2>Address</h2>
                  <div class="content">
                      <div class="place">
                          <span class="fas fa-map-marker-alt"></span>
                          <span class="text">Kalyan Nagar, Bangalore.</span>
                      </div>
                      <div class="phone">
                          <span class="fas fa-phone-alt"></span>
                          <span class="text">+91-9678534743</span>
                      </div>
                      <div class="email">
                          <span class="fas fa-envelope"></span>
                          <span class="text">geekscafe@gmail.com</span>
                      </div>  
                  </div>
              </div>

              <!-- <div class="right box">
                  <h2>Contact us</h2>
                  <div class="content">
                      <form action="#">
                          <div class="email">
                              <div class="text">Email *</div>
                              <input type="email" required>
                          </div>
                          <div class="msg">
                              <div class="text">Message *</div>
                              <textarea class="msgForm" name="name" cols="25" rows="2" required></textarea>
                          </div>
                          <div class="btn">
                              <button >Send</button>
                          </div>
                      </form>
                  </div>
              </div> -->
          </div>
          <div class="bottom">
              <center>
                  <p>&copy; 2020 Copyright. Made With <i class="fas fa-heart"></i> by Rajitha Mohan, Nithish kumar U</p>
              </center>
          </div>
      </footer>
  </section>


    <script src="cc.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
</body>
</html>
