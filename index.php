<?php

include("db.php");

 session_start();

 if(isset($_POST['conreq']))
 {
    $mail=$_POST['con-mail'];
    $msg=$_POST['con-msg'];

    $query = "INSERT INTO conrequest (email, msg) VALUES('$mail','$msg')";
    $result = mysqli_query($conn, $query);
    echo "<script type='text/javascript'>alert('Youll be contacted Soon');</script>";
 }

 if(isset($_POST['fb-btn']))
 {
    $txt=$_POST['fb-text'];
    $name=$_SESSION['sname'];
    $sql= "INSERT INTO feedback (name,feedback) VALUES ('$name','$txt') ";
    $result = mysqli_query($conn, $sql);
    echo "<script type='text/javascript'>alert('Your Feedback/Suggestion has be recorded');</script>";
 }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="home.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300&display=swap" rel="stylesheet">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous"> -->
    <script src="https://kit.fontawesome.com/c6e87f4ab3.js" crossorigin="anonymous"></script>
    
    <title>Geek's Cafe</title>
</head>
<body>
<!-- Navigation bar -->
    <div class="s-body">
        <header>
                <img src="logo/widouttext.png" alt="" class="logo">
                <h1>Geek's Cafe</h1>
                <nav class="navbar">
                    <ul class="nav-links">
                        <li><a href="#" class="under-line" >Home</a></li>
                        <li><a href="#AboutUs" class="under-line" >About Us</a></li>
                        <li><a href="#Services" class="under-line" >Services</a></li>
                        <li><a href="#Contact" class="under-line" >Contact</a></li>
                    </ul>
                </nav>
                <?php 
                if (isset($_SESSION['userid']))
                {
                    echo('<a href="logout.php" ><button class="login-btn">Logout</button></a>');
                }
                else
                {
                    echo('<a href="login.php" ><button class="login-btn">Login</button></a>');
                }
                ?>         
        </header>

        <section>
            <div class="hero">
                <div class="top-head">
                    <!-- <img src="Icons/keyboard.jpg" alt=""> -->
                    <h1>Welcome to Geek's Cafe.</h1>
                    <h2>We've got you consoles and coffee!</h2>
                </div>
            </div>
        </section>

        <section>
            <div class="container">
                <div class="one">
                    <div class="con">
                        <div class="card">
                            <div class="front">
                                <img class="cup" src="icons/1989.jpg" alt="">
                            </div>
                            <div class="back">
                                <img class="cup" src="icons/hungry.jpg" alt="">
                                <!-- <div class="cafebtn"> -->
                                    <a href="cc.php" ><button class="order-btn">Order now &#9749</button></a>
                                <!-- </div> -->
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="or">
                    <h1>Or</h1>
                </div>
                <div class="two">
                    <div class="con">
                        <div class="card">
                            <div class="front">
                                <img class="cup" src="icons/1974.jpg" alt="">
                            </div>
                            <div class="back">
                                <img class="cup" src="icons/join.jpg" alt="">
                                <a href="game.php"><button class="join-btn">Connect &#8594</button></a>
                                
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="AboutUs">
            <div class="des">
                <div class="d-heading">
                    <p>Geek's Cafe : Esports Gaming Cafe in Bengaluru</p>
                </div>
                <div class="d-content">
                    <p>We are here to ensure no gamer faces any of the above hassles. Geek's Cafe, located in KalyanNagar, is Bengaluru's first dedicated eSports hub. Our aim is to pioneer the Indian eSports scene; to create a community and culture that takes eSports to the next level. At Geek's Cafe, you will no longer be troubled by internet issues, poor FPS or faulty hardware. We are here to provide a seamless gaming experience where your only worry should be on how to win the game. The surreal gaming environment at the cafe will get you right into the zone and have you pumping your fists. One of our primary aims is to bring Indian Gamers into the International E-Sports competitive arena. Not only have we envisioned Indian gaming teams playing in the E-Sports majors, we strongly believe that the Indian Gamers have the potential to get there and win. We are here to pave that path for you with regular events which not only bring you laurels, but also challenge your skill as a gamer. Being a professional gamer in India is not too far away in the future.</p>

                </div>
            </div>
        </section>

        <section>
                <div class="des-c">
                    <div class="dc-heading">
                        <p>Geek's Cafe : Good to the Last Drop!</p>
                    </div>
                    <div class="dc-content">
                        <p>Alongside having a variety of PC and console games for your entertainment, we have our very own cafe to serve your taste buds too! A coffee to pull you through another game or two, a quick snack to charge you up or a whole spread, we've got you covered!
                            We offer delicious food at a very affordable price range, so that you and your peers can go easy on your wallet. 
                            A gooey,warm blueberry muffin, a flaky cranberry scone and the rich cocoa in a steaming cup of hot chocolate, you can nestle down in a corner booth of our cafe with one of your favourite books from the wide range we have, or you may order it to your gaming table to grab a snack in between your matches!</p>
                    </div>
                </div>
        </section>

        <section class="menu">
                <div class="des-d">
                    <div class="cafe-content">
                        <div class="c-1">
                            <img class="table-img" src="Icons/coffee.jpg" alt="">
                            <p>Coffee</p>
                        </div>
                        <div class="c-2">
                            <img class="table-img" src="Icons/burger.jpg" alt="">
                            <p>Burgers</p>
                        </div>
                        <div class="c-3">
                            <img class="table-img" src="Icons/pizza.jpg" alt="">
                            <p>Pizzas</p>
                        </div>
                        <div class="c-8">

                        </div>
                        <div class="c-4">
                            <img class="table-img" src="Icons/salad.jpg" alt="">
                            <p>Salads</p>
                        </div>
                        <div class="c-5">
                            <img class="table-img" src="Icons/pasta.jpg" alt="">
                            <p>Pastas</p>
                        </div>
                        <div class="c-6">
                            <img class="table-img" src="Icons/dessert.jpg" alt="">
                            <p>Desserts</p>
                        </div>
                        <div class="c-7">

                        </div>
                    </div>
                </div>
        </section>

        <section id="Services">
            <div class="avail">
                <div class="a-one">
                    <div class="a-num">30+</div>
                    <hr>
                    <div class="a-text">HIGH END PCS</div>
                </div>
                <div class="a-two">
                    <div class="a-num">10+</div>
                    <hr>
                    <div class="a-text">CONSOLES</div>
                </div>
                <div class="a-three">
                    <div class="a-num">50+</div>
                    <hr>
                    <div class="a-text">CAFE ITEMS</div>
                </div>
            </div>
        </section>

        <section>
            <div class="detail-box">
                <div class="heading">
                    <h1>What you'll get</h1>
                </div>
                <div class="main-box">
                    <div class="one-1">
                        <img  class="what-icon" src="https://static.tildacdn.com/lib/tildaicon/64333335-6530-4539-b462-393236353136/kideducate_computer.svg" alt="">
                        <h3>High End PC's</h3>
                        <p>Our PCs have been optimized and tested for an unparalleled gaming experience. We give no excuses and your opponents stand no chance.</p>
                    </div>
                    <div class="two-2">
                        <img class="what-icon" src="https://static.tildacdn.com/lib/tildaicon/34396464-3661-4038-b865-663739356431/cafe_burger.svg" alt="">
                        <h3>Cafe</h3>
                        <p>For those gamers who would not want to get out of the chair even when hungry, all you have to do is ask for food/beverages to be served at your desk. Your wish will be our command.</p>
                    </div>
                    <div class="three-3">
                        <img class="what-icon" src="https://static.tildacdn.com/lib/tildaicon/63323462-3232-4133-b332-323662306538/24br_chair.svg" alt="">
                        <h3>Professional Gaming Chair</h3>
                        <p>Whether you want to play a relaxed game while leaning back or indulge in intense gaming for the whole day, our ergonomic chairs have your back.</p>
                    </div>
                    <div class="four-4">
                        <img class="what-icon" src="https://static.tildacdn.com/tild3030-6664-4366-a335-373265363863/5.svg" alt="">
                        <h3>High Speed Internet</h3>
                        <p>We would never let the gamers in our lounge be tagged as pp'ers. With a primary and a backup internet, we will keep you connected from the type you type glhf till the opponents type gg.</p>
                    </div>
                    <div class="five-5">
                        <img class="what-icon" src="https://static.tildacdn.com/lib/tildaicon/34316630-3863-4935-a138-383833333630/Tilda_Icons_40_IT_game.svg" alt="">
                        <h3>Console Stations</h3>
                        <p>For the console gamers, the PS4s are waiting for you to pick up the controllers and immerse yourself into the gaming experience on the 40 inch Full HD TV screens.</p>
                    </div>
                    <div class="six-6">
                        <img class="what-icon" src="https://static.tildacdn.com/tild3762-3834-4938-a631-356666356539/1.svg" alt="">
                        <h3>Experience</h3>
                        <p>Our diskless solution ensures that every single PC is an exact replica of each other, and no one has an advantage. Also, our manager are always ready to attend to any of your concerns anytime.</p>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="question-box">
                <div class="q-text">
                    <div class="q-main">
                        <p>Do you have any feedback or suggestions?</p>
                    </div>
                    <div class="q-sub">
                        <p>In case you want to visit our cafe, or have any doubts regarding pricing or anything remotely close to gaming. Contact Us!</p>
                    </div>
                    <div class="fb-box">
                        <form action="" method="POST">
                            <input type="text" placeholder=" Feedback/Suggestion" name="fb-text" required>
                            <button class="fb-btn" name="fb-btn" type="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>

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

                    <div class="right box">
                        <h2>Contact us</h2>
                        <div class="content" >
                            <form action="#" method="POST">
                                <div class="email">
                                    <div class="text">Email *</div>
                                    <input type="email" name="con-mail" style="color:white;" required>
                                </div>
                                <div class="msg">
                                    <div class="text">Message *</div>
                                    <textarea class="msgForm" name="con-msg" cols="25" rows="2" style="color:white;" required></textarea>
                                </div>
                                <div class="btn">
                                    <button type="submit" name="conreq">Send</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="bottom">
                    <center>
                        <p>&copy; 2020 Copyright. Made With <i class="fas fa-heart"></i> by Rajitha Mohan, Nithish kumar U</p>
                    </center>
                </div>
            </footer>
        </section>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="home.js"></script>
</body>
</html>
