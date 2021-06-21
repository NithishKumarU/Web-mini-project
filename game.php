<?php

include("db.php");

 session_start();
 if (isset($_SESSION['userid']))
 {
    #
 }
 else
 {
    echo '<script>window.location= "login.php"</script>';
 }

 if (isset($_POST['review']))
 {
    $review=$_POST['rev-text'];
    $name=$_SESSION['sname'];
    $game='Cold war';
    $query = "INSERT INTO revtable (name, game, review) VALUES('$name','$game','$review')";
    $result = mysqli_query($conn, $query);
    if($result)
    {
        echo "<script type='text/javascript'>alert('Review Added');</script>";
    }

 }

 if(isset($_POST['bio-btn']))
 {
    
    
    $name=$_POST['name'];
    $mail=$_SESSION['userid'];
    $phone=$_POST['phone'];
    $rawdate=($_POST['date']);
    $dob = date('Y-m-d', strtotime($rawdate));
    $country=$_POST['country'];
    $query = "DELETE FROM bio WHERE email= '$mail' ";
    $result = mysqli_query($conn, $query);
    $query = "INSERT INTO bio (name, email, phone, dob, country) VALUES('$name','$mail','$phone', '$dob', '$country')";
    $result = mysqli_query($conn, $query);

 }
 


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/c6e87f4ab3.js" crossorigin="anonymous"></script>
    <link href="https://vjs.zencdn.net/7.8.4/video-js.css" rel="stylesheet" />
    <link rel="stylesheet" href="game.css">
    <title>Document</title>
</head>
<body>
    <!-- <header>
        <img src="logo/widouttext.png" alt="" class="logo">
        <h1>Geek's Cafe</h1>
        <nav>
            <ul class="nav-links">
                <li><a href="" ><i class="fas fa-bell fa-lg"></i></a></li>
                <li><a href="" ><i class="fas fa-envelope fa-lg"></i></a></li>
            </ul>
            <a href="" ><i class="fas fa-user-alt fa-2x"></i>&nbsp;&nbsp;&nbsp;&nbsp;Admin</a>
        </nav>
    </header>

    <section>
        <div class="main-body">

        </div>
    </section> -->
    <div class="vertical-nav bg-white border" id="sidebar" >
        <div class="py-4 px-3 mb-4 bg-light">
            <div class="media d-flex align-items-center">
                <img src="pics/pro-pics/pic4.jpg" alt="..." width="80" height="80" class="mr-3 rounded-circle img-thumbnail shadow-sm">
                <div class="media-body">
                    <?php
                        if (isset($_SESSION['sname']))
                        {
                            echo('<h4 class="m-0">'.$_SESSION['sname'].'</h4>');
                        }
                        else
                        {
                            echo('<h4 class="m-0">Admin</h4>');
                        }
                    ?>
                    <!-- <h4 class="m-0">Admin</h4> -->
                    <p class="font-weight-normal text-muted mb-0"></p>
                </div>
            </div>
        </div>

        <p class="text-gray font-weight-bold text-uppercase px-3 small pb-4 mb-0">Dashboard</p>

        <ul class="nav flex-column bg-white mb-0">
            <li class="nav-item ">
                <a href="#" class="nav-link text-dark bg-light" onclick="openPage0()"><i class="fa fa-newspaper mr-3 fa-fw" style="color: #f12020;"></i>New Releases</a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link text-dark" onclick="openPage1();"><i class="fa fa-fire mr-3 fa-fw" style="color: #f12020;"></i>Popular</a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link text-dark" onclick="openPage2();"><i class="fa fa-info-circle mr-3 fa-fw" style="color: #f12020;"></i>Coming Soon</a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link text-dark" onclick="openPage3();"><i class="fa fa-pen-square mr-3 fa-fw" style="color: #f12020;"></i>Reviews</a>
            </li>
        </ul>

        <p class="text-gray font-weight-bold text-uppercase px-3 small py-4 mb-0">My Profile</p>

        <ul class="nav flex-column bg-white mb-0">
            <li class="nav-item">
                <a href="#" class="nav-link text-dark " onclick="openPage4();"><i class="fa fa-user-alt mr-3 fa-fw " style="color: #f12020;"></i>Profile</a>
            </li>
            <!-- <li class="nav-item">
                <a href="#" class="nav-link text-dark" onclick="openPage5();"><i class="fa fa-comment-alt mr-3 fa-fw" style="color: #f12020;"></i>Chat</a>
            </li> -->
            <!-- <li class="nav-item">
                <a href="#" class="nav-link text-dark"><i class="fa fa-gamepad mr-3 fa-fw" style="color: #f12020;"></i>Game Library</a>
            </li> -->
        </ul>
        <div class="side-buttons" >
         
            <a class="btn btn-danger" href="Index.php" role="button" ><i class="fas fa-home"></i></i>&nbsp;&nbsp;Home</a>
            <a class="btn btn-danger" href="logout.php" role="button" ><i class="fa fa-sign-out-alt"></i>&nbsp;&nbsp;Logout</a>

            
        </div>
        
        
    </div>

    <div class="main-p">
        <div class="page-content p-5" id="content">
            <button id="sidebarCollapse" type="button" class="btn btn-light bg-white rounded-pill shadow-sm px-4 mb-4"><i class="fa fa-bars mr-2"></i><small class="text-uppercase font-weight-bold">Toggle</small></button>
    
            <h2 class="display-4 text-white">New Releases</h2>
    
            <div class="separator "></div>
    
            <div class="card" style="margin-bottom: 15px;">
                <div class="row card-body">
                    <div class="col-md-3" >
                        <img class="card-img-left img-fluid " src="pics/valhalla.jpg" alt="">
                    </div>
                    <div class="col-md-9">
                        <h5 class="card-title" >Valhalla</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Platform: PC, XBOX, PS5</h6>
                        <h6 class="card-subtitle mb-2 text-muted">November 10,2020</h6>
                        <p class="card-text">Assassin's Creed Valhalla is an open world action-adventure game, structured around several main story quests and numerous optional side missions. The player takes on the role of Eivor (/ˈeɪvɔːr/), a Viking raider, as they lead their fellow Vikings against the Anglo-Saxon kingdoms.</p>
                        <p class="card-text">Build your own Viking Legend. Become Eivor, a Viking raider raised to be a fearless warrior, and lead your clan from icy desolation in Norway to a new home amid the lush farmlands of ninth-century England. Find your settlement and conquer this hostile land by any means to earn a place in Valhalla. England in the age of the Vikings is a fractured nation of petty lords and warring kingdoms. Beneath the chaos lies a rich and untamed land waiting for a new conqueror. Will it be you? Write Your Viking Saga. </p>
                        
                        <a class="btn btn-primary" href="javscript:void('0')" onclick="videoPlay()" role="button" style="background-color:#f12020;color:white;border:none;">Watch Trailer</a>
                        <div class="video-popup">
                            <i class="fa fa-close icon-close-video" onclick="closeVid()"></i>
                            <a href="#" class="btn-control-video "></a>
                            <video id="my-video" class="video-js" preload="auto" width="100%" height="100%" poster="MY_VIDEO_POSTER.jpg" data-setup='{"fluid":true}'>
                                <div id="vi">
                                    <source src="Vid/valhalla.mp4" type="video/mp4" />
                                </div>
                               
                                <!-- <source src="MY_VIDEO.webm" type="video/webm" /> -->
                                <p class="vjs-no-js">
                                To view this video please enable JavaScript, and consider upgrading to a
                                web browser that
                                <a href="https://videojs.com/html5-video-support/" target="_blank" supports HTML5 video></a>
                                </p>
                            </video>
                        </div>
    
                    </div>
                </div>
            </div>
    
            <div class="card" style="margin-bottom: 15px;">
                <div class="row card-body">
                    <div class="col-md-3" >
                        <img class="card-img-left img-fluid " src="pics/legion.jpg" alt="">
                    </div>
                    <div class="col-md-9">
                        <h5 class="card-title">Watch Dogs: Legion</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Platform: PC, XBOX, PS5</h6>
                        <h6 class="card-subtitle mb-2 text-muted">October 29,2020</h6>
                        <p class="card-text">Assassin's Creed Valhalla is an open world action-adventure game, structured around several main story quests and numerous optional side missions. The player takes on the role of Eivor (/ˈeɪvɔːr/), a Viking raider, as they lead their fellow Vikings against the Anglo-Saxon kingdoms.</p>
                        
                        
                        <a class="btn btn-primary" href="javscript:void('0')" onclick="videoPlay()" role="button" style="background-color:#f12020;color:white;border:none;">Watch Trailer</a>
                        <div class="video-popup">
                            <i class="fa fa-close icon-close-video" onclick="closeVid()"></i>
                            <a href="#" class="btn-control-video "></a>
                            <video id="my-video" class="video-js" preload="auto" width="100%" height="100%" poster="MY_VIDEO_POSTER.jpg" data-setup='{"fluid":true}'>
                                <source src="Vid/legion.mp4" type="video/mp4" />
                                <!-- <source src="MY_VIDEO.webm" type="video/webm" /> -->
                                <p class="vjs-no-js">
                                To view this video please enable JavaScript, and consider upgrading to a
                                web browser that
                                <a href="https://videojs.com/html5-video-support/" target="_blank" supports HTML5 video></a>
                                </p>
                            </video>
                        </div>
    
                        
                    </div>
                </div>
            </div>
    
            <div class="card" style="margin-bottom: 15px;">
                <div class="row card-body">
                    <div class="col-md-3" >
                        <img class="card-img-left img-fluid " src="pics/coldwar.jpg" alt="">
                    </div>
                    <div class="col-md-9">
                        <h5 class="card-title">Call of Duty: Cold war</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Platform: PC, XBOX, PS5</h6>
                        <h6 class="card-subtitle mb-2 text-muted">October 29,2020</h6>
                        <p class="card-text">Black Ops Cold War will drop fans into the depths of the Cold War's volatile geopolitical battle of the early 1980s. Nothing is ever as it seems in a gripping single-player Campaign, where players will come face-to-face with historical figures and hard truths, as they battle around the globe through iconic locales like East Berlin, Vietnam, Turkey, Soviet KGB headquarters, and more. MULTIPLAYER Engage in deniable operations and signature combat in the next generation of Multiplayer. ZOMBIES Players will bring a Cold War arsenal of weapons and equipment into the next evolution of Treyarch's signature Zombies co-operative experience. WARZONE Black Ops Cold War will also support and build on the hit, free-to-play experience Call of Duty: Warzone.</p>
                    
                        <a class="btn btn-primary" href="javscript:void('0')" onclick="videoPlay()" role="button" style="background-color:#f12020;color:white;border:none;">Watch Trailer</a>
                        <div class="video-popup">
                            <i class="fa fa-close icon-close-video" onclick="closeVid()"></i>
                            <a href="#" class="btn-control-video "></a>
                            <video id="my-video" class="video-js" preload="auto" width="100%" height="100%" poster="MY_VIDEO_POSTER.jpg" data-setup='{"fluid":true}'>
                                <source src="Vid/legion.mp4" type="video/mp4" />
                                <!-- <source src="MY_VIDEO.webm" type="video/webm" /> -->
                                <p class="vjs-no-js">
                                To view this video please enable JavaScript, and consider upgrading to a
                                web browser that
                                <a href="https://videojs.com/html5-video-support/" target="_blank" supports HTML5 video></a>
                                </p>
                            </video>
                        </div>
                    
                    
                    </div>
                </div>
            </div>
            
            <div class="card" style="margin-bottom: 15px;">
                <div class="row card-body">
                    <div class="col-md-3" >
                        <img class="card-img-left img-fluid " src="pics/cyberpunk.jpg" alt="">
                    </div>
                    <div class="col-md-9">
                        <h5 class="card-title">Cyberpunk 2077</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Platform: PC</h6>
                        <h6 class="card-subtitle mb-2 text-muted">December 10,2020</h6>
                        <p class="card-text">Cyberpunk 2077 is an open-world, action-adventure story set in Night City, a megalopolis obsessed with power, glamour and body modification. Assume the role of V, a mercenary outlaw going after a one-of-a-kind implant that is the key to immortality. You can customize your character’s cyberware, skillset and playstyle, and explore a vast city where the choices you make shape the story and the world around you. Become a cyberpunk, an urban mercenary equipped with cybernetic enhancements and build your legend on the streets of Night City. Take the riskiest job of your life and go after a prototype implant that is the key to immortality.</p>
                    
                        <a class="btn btn-primary" href="javscript:void('0')" onclick="videoPlay()" role="button" style="background-color:#f12020;color:white;border:none;">Watch Trailer</a>
                        <div class="video-popup">
                            <i class="fa fa-close icon-close-video" onclick="closeVid()"></i>
                            <a href="#" class="btn-control-video "></a>
                            <video id="my-video" class="video-js" preload="auto" width="100%" height="100%" poster="MY_VIDEO_POSTER.jpg" data-setup='{"fluid":true}'>
                                <source src="Vid/legion.mp4" type="video/mp4" />
                                <!-- <source src="MY_VIDEO.webm" type="video/webm" /> -->
                                <p class="vjs-no-js">
                                To view this video please enable JavaScript, and consider upgrading to a
                                web browser that
                                <a href="https://videojs.com/html5-video-support/" target="_blank" supports HTML5 video></a>
                                </p>
                            </video>
                        </div>
                    
                    
                    </div>
                </div>
            </div>
    
        </div>
    
        <div class="page-content p-5 popu" id="content" style="display: none;" >
            <button id="sidebarCollapse2" type="button" class="btn btn-light bg-white rounded-pill shadow-sm px-4 mb-4"><i class="fa fa-bars mr-2"></i><small class="text-uppercase font-weight-bold">Toggle</small></button>
    
            <h2 class="display-4 text-white">Popular</h2>
    
            <div class="separator "></div>
            
            <div class="body-m">
                <div class="lcontainer">
                    <div class="game-card-box">
                        <div class="game-card">
                            <div class="game-card__cover" style="background-image:url(pics/csgo.jpg)"></div>
                        </div>
                        <div class="game-card-text">
                                CS:GO
                        </div>
                    </div>
                    <div class="game-card-box">
                        <div class="game-card">
                            <div class="game-card__cover" style="background-image:url(pics/valorant.jpg)"></div>
                        </div>
                        <div class="game-card-text">
                                Valorant
                        </div>
                    </div>
                    <div class="game-card-box">
                        <div class="game-card">
                            <div class="game-card__cover" style="background-image:url(pics/warzone.jpg)"></div>
                        </div>
                        <div class="game-card-text">
                                WarZone
                        </div>
                    </div>
                    <div class="game-card-box">
                        <div class="game-card">
                            <div class="game-card__cover" style="background-image:url(pics/apex.jpg)"></div>
                        </div>
                        <div class="game-card-text">
                                Apex Legends
                        </div>
                    </div>
                    <div class="game-card-box">
                        <div class="game-card">
                            <div class="game-card__cover" style="background-image:url(pics/lol.jpg)"></div>
                        </div>
                        <div class="game-card-text">
                                League Of Legends
                        </div>
                    </div>
                    <div class="game-card-box">
                        <div class="game-card">
                            <div class="game-card__cover" style="background-image:url(pics/rdr2.jpg)"></div>
                        </div>
                        <div class="game-card-text">
                                RDR2
                        </div>
                    </div>
                    <div class="game-card-box">
                        <div class="game-card">
                            <div class="game-card__cover" style="background-image:url(pics/dota.jpg)"></div>
                        </div>
                        <div class="game-card-text">
                                Dota 2
                        </div>
                    </div>
                    <div class="game-card-box">
                        <div class="game-card">
                            <div class="game-card__cover" style="background-image:url(pics/amongus.jpg)"></div>
                        </div>
                        <div class="game-card-text">
                                Among Us
                        </div>
                    </div>
                    <div class="game-card-box">
                        <div class="game-card">
                            <div class="game-card__cover" style="background-image:url(pics/pubg.jpg)"></div>
                        </div>
                        <div class="game-card-text">
                                PUBG
                        </div>
                    </div>
                    <div class="game-card-box">
                        <div class="game-card">
                            <div class="game-card__cover" style="background-image:url(pics/minecraft.jpg)"></div>
                        </div>
                        <div class="game-card-text">
                                Minecraft
                        </div>
                    </div>
                    <div class="game-card-box">
                        <div class="game-card">
                            <div class="game-card__cover" style="background-image:url(pics/fortnight.jpg)"></div>
                        </div>
                        <div class="game-card-text">
                                Fornite
                        </div>
                    </div>
                    <div class="game-card-box">
                        <div class="game-card">
                            <div class="game-card__cover" style="background-image:url(pics/fallguys.jpg)"></div>
                        </div>
                        <div class="game-card-text">
                                Fall Guys
                        </div>
                    </div>
                    <div class="game-card-box">
                        <div class="game-card">
                            <div class="game-card__cover" style="background-image:url(pics/division.jpg)"></div>
                        </div>
                        <div class="game-card-text">
                                Division 2
                        </div>
                    </div>
                    <div class="game-card-box">
                        <div class="game-card">
                            <div class="game-card__cover" style="background-image:url(pics/godofwar.jpg)"></div>
                        </div>
                        <div class="game-card-text">
                                God Of War
                        </div>
                    </div>
                    <div class="game-card-box">
                        <div class="game-card">
                            <div class="game-card__cover" style="background-image:url(pics/got.jpg)"></div>
                        </div>
                        <div class="game-card-text">
                                Ghost Of Tsushima
                        </div>
                    </div>
                </div>
            </div>
    
        
    
            
        </div>

        <div class="page-content p-5 popu" id="content" style="display: none;" >
            <button id="sidebarCollapse3" type="button" class="btn btn-light bg-white rounded-pill shadow-sm px-4 mb-4"><i class="fa fa-bars mr-2"></i><small class="text-uppercase font-weight-bold">Toggle</small></button>
    
            <h2 class="display-4 text-white">Coming Soon</h2>
    
            <!-- <div class="separator "></div> -->
            
            <div class="game-class">

                <div class="divider-up"></div>
                <div class="bar-game-heading">
                    <div class="game-row-image-title">Game Title</div>
                    <div class="game-row-date">Release date</div>
                    <div class="game-row-dev">Game developer</div>
                    <div class="game-row-protection">DRM</div>
                    <div class="game-row-followers">Followers</div>
                </div>
                <div class="divider-down"></div>

                <div class="game-detail-box">
                    <div class="" style="padding: 0; border: 0;">

                      <div class="row">
                          <div class="game-col-image">
                            <img src="pics/Coming-soon/hl3.jpg" alt="">
                          </div>
                          <div class="game-col-bar-purple"></div>
                          <div class="game-col-title">Half Life 3</div>
                          <div>-</div>
                          <div class="game-col-date">01 Jan 25</div>
                          <div>-</div>
                          <div class="game-col-dev">Valve</div>
                          <div>-</div>
                          <div class="game-col-drm">STEAM</div>
                          <div>-</div>
                          <div id="fol-count" class="game-col-followers">52118</div>
                          <div class="game-col-icon" ><i id="f-1" class="fas fa-circle-notch" onclick="follow('fol-count','f-1'); this.onclick=null;" style="cursor:pointer;"></i></div>
                      </div>
                    </div>
                </div>

                <div class="game-detail-box">
                    <div class="" style="padding: 0; border: 0;">

                      <div class="row">
                          <div class="game-col-image">
                            <img src="pics/Coming-soon/gta6.jpg" alt="">
                          </div>
                          <div class="game-col-bar-purple"></div>
                          <div class="game-col-title">Grand Theft Auto VI</div>
                          <div>-</div>
                          <div class="game-col-date">15 Oct 23</div>
                          <div>-</div>
                          <div class="game-col-dev">Rockstar</div>
                          <div>-</div>
                          <div class="game-col-drm">Rockstar</div>
                          <div>-</div>
                          <div id="fol-count2" class="game-col-followers">51658</div>
                          <div class="game-col-icon"><i id="f-2" class="fas fa-circle-notch" onclick="follow('fol-count2','f-2'); this.onclick=null;" style="cursor:pointer;"></i></div>
                      </div>
                    </div>
                </div>

                <div class="game-detail-box">
                    <div class="" style="padding: 0; border: 0;">

                      <div class="row">
                          <div class="game-col-image">
                            <img src="pics/Coming-soon/ffxvi.jpg" alt="">
                          </div>
                          <div class="game-col-bar-purple"></div>
                          <div class="game-col-title">Final Fantasy XVI</div>
                          <div>-</div>
                          <div class="game-col-date">30 Sep 22</div>
                          <div>-</div>
                          <div class="game-col-dev">Square Enix</div>
                          <div>-</div>
                          <div class="game-col-drm">Denuvo</div>
                          <div>-</div>
                          <div  id="fol-count3" class="game-col-followers">5014</div>
                          <div class="game-col-icon"><i id="f-3" class="fas fa-circle-notch" onclick="follow('fol-count3','f-3'); this.onclick=null;" style="cursor:pointer;"></i></div>
                      </div>
                    </div>
                </div>

                <div class="game-detail-box">
                    <div class="" style="padding: 0; border: 0;">

                      <div class="row">
                          <div class="game-col-image">
                            <img src="pics/Coming-soon/last2.jpg" alt="">
                          </div>
                          <div class="game-col-bar-purple"></div>
                          <div class="game-col-title">The Last of Us Part II</div>
                          <div>-</div>
                          <div class="game-col-date">20 Jun 22</div>
                          <div>-</div>
                          <div class="game-col-dev">Naughty Dog</div>
                          <div>-</div>
                          <div class="game-col-drm">STEAM</div>
                          <div>-</div>
                          <div id="fol-count4" class="game-col-followers">12208</div>
                          <div class="game-col-icon"><i id="f-4" class="fas fa-circle-notch" onclick="follow('fol-count4','f-4'); this.onclick=null;" style="cursor:pointer;"></i></div>
                      </div>
                    </div>
                </div>

                <div class="game-detail-box">
                    <div class="" style="padding: 0; border: 0;">

                      <div class="row">
                          <div class="game-col-image">
                            <img src="pics/Coming-soon/payday3.jpg" alt="">
                          </div>
                          <div class="game-col-bar-purple"></div>
                          <div class="game-col-title">Payday 3</div>
                          <div>-</div>
                          <div class="game-col-date">01 Jan 23</div>
                          <div>-</div>
                          <div class="game-col-dev">Starbreeze Studio</div>
                          <div>-</div>
                          <div class="game-col-drm">STEAM</div>
                          <div>-</div>
                          <div id="fol-count5" class="game-col-followers">8716</div>
                          <div class="game-col-icon"><i id="f-5" class="fas fa-circle-notch" onclick="follow('fol-count5','f-5'); this.onclick=null;" style="cursor:pointer;"></i></div>
                      </div>
                    </div>
                </div>

                <div class="game-detail-box">
                    <div class="" style="padding: 0; border: 0;">

                      <div class="row">
                          <div class="game-col-image">
                            <img src="pics/Coming-soon/es6.jpg" alt="">
                          </div>
                          <div class="game-col-bar-purple"></div>
                          <div class="game-col-title">The Elder Scrolls 6</div>
                          <div>-</div>
                          <div class="game-col-date">01 Oct 22</div>
                          <div>-</div>
                          <div class="game-col-dev">Bethesda Game Studios</div>
                          <div>-</div>
                          <div class="game-col-drm">STEAM</div>
                          <div>-</div>
                          <div id="fol-count6" class="game-col-followers">49499</div>
                          <div class="game-col-icon"><i id="f-6" class="fas fa-circle-notch" onclick="follow('fol-count6','f-6'); this.onclick=null;" style="cursor:pointer;"></i></div>
                      </div>
                    </div>
                </div>

                <div class="game-detail-box">
                    <div class="" style="padding: 0; border: 0;">

                      <div class="row">
                          <div class="game-col-image">
                            <img src="pics/Coming-soon/pa.jpg" alt="">
                          </div>
                          <div class="game-col-bar-purple"></div>
                          <div class="game-col-title">Project Athia</div>
                          <div>-</div>
                          <div class="game-col-date">01 Oct 22</div>
                          <div>-</div>
                          <div class="game-col-dev">Valve</div>
                          <div>-</div>
                          <div class="game-col-drm">STEAM</div>
                          <div>-</div>
                          <div id="fol-count7" class="game-col-followers">52118</div>
                          <div class="game-col-icon"><i id="f-7" class="fas fa-circle-notch" onclick="follow('fol-count7','f-7'); this.onclick=null;" style="cursor:pointer;"></i></div>
                      </div>
                    </div>
                </div>

                <div class="game-detail-box">
                    <div class="" style="padding: 0; border: 0;">

                      <div class="row">
                          <div class="game-col-image">
                            <img src="pics/Coming-soon/re4.jpg" alt="">
                          </div>
                          <div class="game-col-bar-purple"></div>
                          <div class="game-col-title">Resident Evil 4 Remake</div>
                          <div>-</div>
                          <div class="game-col-date">01 Jul 22</div>
                          <div>-</div>
                          <div class="game-col-dev">Capcom</div>
                          <div>-</div>
                          <div class="game-col-drm">STEAM</div>
                          <div>-</div>
                          <div id="fol-count8" class="game-col-followers">640</div>
                          <div class="game-col-icon"><i id="f-8" class="fas fa-circle-notch" onclick="follow('fol-count8','f-8'); this.onclick=null;" style="cursor:pointer;"></i></div>
                      </div>
                    </div>
                </div>

                <div class="game-detail-box">
                    <div class="" style="padding: 0; border: 0;">

                      <div class="row">
                          <div class="game-col-image">
                            <img src="pics/Coming-soon/ghost.jpg" alt="">
                          </div>
                          <div class="game-col-bar-purple"></div>
                          <div class="game-col-title">Ghostwire: Tokyo</div>
                          <div>-</div>
                          <div class="game-col-date">01 Dec 21</div>
                          <div>-</div>
                          <div class="game-col-dev">Tango Gameworks</div>
                          <div>-</div>
                          <div class="game-col-drm">Denuvo</div>
                          <div>-</div>
                          <div id="fol-count9" class="game-col-followers">7989</div>
                          <div class="game-col-icon"><i id="f-9" class="fas fa-circle-notch" onclick="follow('fol-count9','f-9'); this.onclick=null;" style="cursor:pointer;"></i></div>
                      </div>
                    </div>
                </div>

                <div class="game-detail-box">
                    <div class="" style="padding: 0; border: 0;">

                      <div class="row">
                          <div class="game-col-image">
                            <img src="pics/Coming-soon/d4.jpg" alt="">
                          </div>
                          <div class="game-col-bar-purple"></div>
                          <div class="game-col-title">Diablo 4</div>
                          <div>-</div>
                          <div class="game-col-date">15 Oct 21</div>
                          <div>-</div>
                          <div class="game-col-dev">BATTLENET</div>
                          <div>-</div>
                          <div class="game-col-drm">BATTLENET</div>
                          <div>-</div>
                          <div id="fol-count10" class="game-col-followers">13,989</div>
                          <div class="game-col-icon"><i id="f-10" class="fas fa-circle-notch" onclick="follow('fol-count10','f-10'); this.onclick=null;" style="cursor:pointer;"></i></div>
                      </div>
                    </div>
                </div>

                

            </div>
    
        
    
            
        </div>

        <div class="page-content p-5 popu" id="content" style="display: none;" >
            <button id="sidebarCollapse4" type="button" class="btn btn-light bg-white rounded-pill shadow-sm px-4 mb-4"><i class="fa fa-bars mr-2"></i><small class="text-uppercase font-weight-bold">Toggle</small></button>
    
            <h2 class="display-4 text-white">Reviews</h2>
            
            <div class="separator "></div>
            
            <!-- <div class="rev-search-bar">
                <form>
                    <input type="text" name="search" placeholder="Search..">
                    
                </form>
            </div> -->

            <div class="review-table">

                

                <div class="reviews-part">
                    <div class="rev-item">
                        <div class="rev-img">
                            <img src="pics/coldwar.jpg" alt="" height="347px">
                        </div>
                        <div class="rev-review">
                            <div class="rev-name">
                                <div class="rev-num">1.</div>
                                <div class="rev-title"> ColdWar</div>
                            </div>
                            <div class="rev-score-bar">
                                <div class="rev-score">
                                    <p>6.7</p>
                                </div>
                                <p>Critic Score</p>
                                <div class="rev-user-score">
                                    <p>7.2</p>
                                </div>
                                <p>User Score</p>
                            </div>
                            <div class="rev-summary">
                                <p>Probably the best Call of Duty game of the last decade. With a superb campaign, a great Zombies mode and a -mostly- balanced and rich multiplayer mode Cold War is a game no fan of the franchise should miss out. Black Ops Cold War will also support and build on the hit, free-to-play experience Call of Duty: Warzone.
                                    Cross Play, Cross-Progression and Cross-Generation Enabled. Unlock the power of next-gen Call of Duty experiences with higher framerate, hardware-based ray-tracing, shorter load times and more. <br><br> MULTIPLAYER <br>
                                    Engage in deniable operations and signature combat in the next generation of Multiplayer.
                                </p>
                            </div>
                            <div class="rev-buttons">
                                <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalIn">
                                    Write a Review
                                    </button>
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalOut" >See User Review</button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModalIn" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Write your Review Here</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="#" method="POST">
                                                <div class="modal-body">
                                                    <div class="form-floating">
                                                        <textarea name="rev-text" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 200px"></textarea>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" name ="review" class="btn btn-primary">Save changes</button>
                                                </div>
                                            </form>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModalOut" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel2">Sign out</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <?php
                                                    $sql="SELECT * FROM revtable";
                                                    $result = mysqli_query($conn, $sql);

                                                    while($row = mysqli_fetch_array($result))
                                                    {   
                                                        echo "<div class=\"us-rev\"><div class=\"us-rev-heading\">" . $row['name'] . " :</div><div class=\"us-rev-content\"> &emsp;&emsp;&emsp;" . $row['review'] . "</div></div>";  
                                                    }
                                                ?> 
                                                <!-- <div class="us-rev">
                                                    <div class="us-rev-heading">
                                                        Rajitha :
                                                    </div>
                                                    <div class="us-rev-content">
                                                        &emsp;Its a amazing game
                                                    </div>
                                                </div> -->
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Save changes</button>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                            </div>
                        </div>
                        <!-- Button trigger modal -->
                        <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        Launch demo modal
                        </button> -->

                        

                        
                    </div>
                </div>
                
                
                
                
            </div>
    
        
    
            
        </div>

        <div class="page-content p-5 popu" id="content" style="display: none;" >
            <button id="sidebarCollapse5" type="button" class="btn btn-light bg-white rounded-pill shadow-sm px-4 mb-4"><i class="fa fa-bars mr-2"></i><small class="text-uppercase font-weight-bold">Toggle</small></button>
            <div class="profile-body">
                <div class="container bootstrap snippets bootdey">
                    <div class="row">
                      <div class="profile-nav col-md-3">
                          <div class="panel">
                              <div class="user-heading round">
                                    <a href="#">
                                        <img src="pics/pro-pics/pic4.jpg" alt="">
                                    </a>
                                    <?php
                                        if (isset($_SESSION['sname']))
                                        {
                                            echo('<h1>'.$_SESSION['sname'].'</h1>');
                                            echo('<p>'.$_SESSION['userid'].'</p>');
                                        }
                                        else
                                        {
                                            echo('<h4 class="m-0">Admin</h4>');
                                        }
                                    ?>
                                    <!-- <h1>Rajitha Mohan</h1>
                                    <p>mohanrajitha@gmail.com</p> -->
                              </div>
                          </div>
                          <div class="card mt-5" style="width: 16rem;">
                            <div class="card-header">
                              Featured
                            </div>
                            <ul class="list-group list-group-flush">
                              <li class="list-group-item"><i class="fas fa-user-friends"></i>&nbsp&nbsp&nbspFriends : 120</li>
                              <li class="list-group-item"><i class="fas fa-circle text-success"></i>&nbsp&nbsp&nbspOnline : 35</li>
                            </ul>
                          </div>
                      </div>
                      <div class="profile-info col-md-9">
                            <div class="panel">
                                <form>
                                    <textarea placeholder="Whats in your mind today?" rows="2" class="form-control input-lg p-text-area"></textarea>
                                </form>
                                <div class="panel-footer p-2">
                                    <button class="btn btn-danger float-right">Post</button>
                                </div>

                            </div>
                            <div class="panel">
                                <div class="bio-graph-heading">
                                    The further you get into technology, the further you go into gaming. That's the general rule.
                                </div>
                                <div class="panel-body bio-graph-info">
                                    <!-- <h1>Bio</h1> -->
                                    <div class="row pl-3 mt-2">
                                        <form action="" method="POST" style="width:100%;">
                                        <!-- <div class="bio-row">
                                            <p><span>First Name </span>: Rajitha</p>

                                        </div>
                                        <div class="bio-row">
                                            <p><span>Last Name </span>: Mohan</p>
                                        </div>
                                        <div class="bio-row">
                                            <p><span>Country </span>: India</p>
                                        </div>
                                        <div class="bio-row">
                                            <p><span>Birthday</span>: 09 September 1999</p>
                                        </div>
                                        <div class="bio-row">
                                            <p><span>Occupation </span>: UI Designer</p>
                                        </div>
                                        <div class="bio-row">
                                            <p><span>Email </span>: mohanrajitha@gmail.com</p>
                                        </div>
                                        <div class="bio-row">
                                            <p><span>Mobile </span>: (12) 03 4567890</p>
                                        </div>
                                        <div class="bio-row">
                                            <p><span>Phone </span>: 88 (02) 123456</p>
                                        </div> -->
                                        <?php
                                            $smail=$_SESSION['userid'];
                                            $sql="SELECT * FROM bio where email='$smail'";
                                            $result = mysqli_query($conn, $sql);
                                            if($row = mysqli_fetch_array($result))
                                            {
                                                $bname=$row['name'];
                                                $bphone=$row['phone'];
                                        
                                                // $bdate=date('d-m-y', strtotime($row['dob']));
                                                $bcountry=$row['country'];
                                            }
                                            
                                        ?>
                                        <div class="input-group mb-3 w-75 mx-auto mt-3">
                                            <span class="input-group-text" id="basic-addon1" style="background-color:#f12020;color:white;">Name</span>
                                            <input  type="text" class="form-control" name="name" value=<?php 
                                                if(isset($bname))
                                                {
                                                    echo  $bname; 
                                                }
                                                else{
                                                    echo "";
                                                }
                                            
                                            ?> Username aria-label="Username" aria-describedby="basic-addon1" placeholder="Username" >
                                        </div>
                                        <div class="input-group mb-3 w-75 mx-auto">
                                            <span class="input-group-text" id="basic-addon1" style="background-color:#f12020;color:white;">Email</span>
                                            <input type="email" class="form-control" name="email" value=<?php echo  $smail; ?> aria-label="Username" aria-describedby="basic-addon1" disabled>
                                        </div>
                                        <div class="input-group mb-3 w-75 mx-auto">
                                            <span class="input-group-text" id="basic-addon1" style="background-color:#f12020;color:white;">Mobile no.</span>
                                            <input type="text" class="form-control" name="phone" value=<?php
                                                if(isset($bname))
                                                {
                                                    echo  $bphone;
                                                }
                                                 ?> Mobile-number aria-label="Username" aria-describedby="basic-addon1">
                                        </div>
                                        <div class="input-group mb-3 w-75 mx-auto">
                                            <span class="input-group-text" id="basic-addon1" style="background-color:#f12020;color:white;">Date Of Birth</span>
                                            <input type="date" id="date" name="date" class="form-control" value=<?php
                                            if(isset($bname))
                                            {
                                                echo  $row['dob'];
                                            }
                                            ?> dd-mm-yyyy  aria-label="Username" aria-describedby="basic-addon1">
                                        </div>
                                        <div class="input-group mb-3 w-75 mx-auto">
                                            <select class="custom-select " name="country" placeholder=<?php echo  $bcountry; ?>>
                                            <option value="<?php echo $bcountry; ?>"><?php 
                                            if(isset($bname))
                                            {
                                                echo  $bcountry; 
                                            }
                                            ?></option>
                                            <option value="Afghanistan">Afghanistan</option>
                                            <option value="Åland Islands">Åland Islands</option>
                                            <option value="Albania">Albania</option>
                                            <option value="Algeria">Algeria</option>
                                            <option value="American Samoa">American Samoa</option>
                                            <option value="Andorra">Andorra</option>
                                            <option value="Angola">Angola</option>
                                            <option value="Anguilla">Anguilla</option>
                                            <option value="Antarctica">Antarctica</option>
                                            <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                            <option value="Argentina">Argentina</option>
                                            <option value="Armenia">Armenia</option>
                                            <option value="Aruba">Aruba</option>
                                            <option value="Australia">Australia</option>
                                            <option value="Austria">Austria</option>
                                            <option value="Azerbaijan">Azerbaijan</option>
                                            <option value="Bahamas">Bahamas</option>
                                            <option value="Bahrain">Bahrain</option>
                                            <option value="Bangladesh">Bangladesh</option>
                                            <option value="Barbados">Barbados</option>
                                            <option value="Belarus">Belarus</option>
                                            <option value="Belgium">Belgium</option>
                                            <option value="Belize">Belize</option>
                                            <option value="Benin">Benin</option>
                                            <option value="Bermuda">Bermuda</option>
                                            <option value="Bhutan">Bhutan</option>
                                            <option value="Bolivia">Bolivia</option>
                                            <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                            <option value="Botswana">Botswana</option>
                                            <option value="Bouvet Island">Bouvet Island</option>
                                            <option value="Brazil">Brazil</option>
                                            <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                                            <option value="Brunei Darussalam">Brunei Darussalam</option>
                                            <option value="Bulgaria">Bulgaria</option>
                                            <option value="Burkina Faso">Burkina Faso</option>
                                            <option value="Burundi">Burundi</option>
                                            <option value="Cambodia">Cambodia</option>
                                            <option value="Cameroon">Cameroon</option>
                                            <option value="Canada">Canada</option>
                                            <option value="Cape Verde">Cape Verde</option>
                                            <option value="Cayman Islands">Cayman Islands</option>
                                            <option value="Central African Republic">Central African Republic</option>
                                            <option value="Chad">Chad</option>
                                            <option value="Chile">Chile</option>
                                            <option value="China">China</option>
                                            <option value="Christmas Island">Christmas Island</option>
                                            <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                                            <option value="Colombia">Colombia</option>
                                            <option value="Comoros">Comoros</option>
                                            <option value="Congo">Congo</option>
                                            <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
                                            <option value="Cook Islands">Cook Islands</option>
                                            <option value="Costa Rica">Costa Rica</option>
                                            <option value="Cote D'ivoire">Cote D'ivoire</option>
                                            <option value="Croatia">Croatia</option>
                                            <option value="Cuba">Cuba</option>
                                            <option value="Cyprus">Cyprus</option>
                                            <option value="Czech Republic">Czech Republic</option>
                                            <option value="Denmark">Denmark</option>
                                            <option value="Djibouti">Djibouti</option>
                                            <option value="Dominica">Dominica</option>
                                            <option value="Dominican Republic">Dominican Republic</option>
                                            <option value="Ecuador">Ecuador</option>
                                            <option value="Egypt">Egypt</option>
                                            <option value="El Salvador">El Salvador</option>
                                            <option value="Equatorial Guinea">Equatorial Guinea</option>
                                            <option value="Eritrea">Eritrea</option>
                                            <option value="Estonia">Estonia</option>
                                            <option value="Ethiopia">Ethiopia</option>
                                            <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                                            <option value="Faroe Islands">Faroe Islands</option>
                                            <option value="Fiji">Fiji</option>
                                            <option value="Finland">Finland</option>
                                            <option value="France">France</option>
                                            <option value="French Guiana">French Guiana</option>
                                            <option value="French Polynesia">French Polynesia</option>
                                            <option value="French Southern Territories">French Southern Territories</option>
                                            <option value="Gabon">Gabon</option>
                                            <option value="Gambia">Gambia</option>
                                            <option value="Georgia">Georgia</option>
                                            <option value="Germany">Germany</option>
                                            <option value="Ghana">Ghana</option>
                                            <option value="Gibraltar">Gibraltar</option>
                                            <option value="Greece">Greece</option>
                                            <option value="Greenland">Greenland</option>
                                            <option value="Grenada">Grenada</option>
                                            <option value="Guadeloupe">Guadeloupe</option>
                                            <option value="Guam">Guam</option>
                                            <option value="Guatemala">Guatemala</option>
                                            <option value="Guernsey">Guernsey</option>
                                            <option value="Guinea">Guinea</option>
                                            <option value="Guinea-bissau">Guinea-bissau</option>
                                            <option value="Guyana">Guyana</option>
                                            <option value="Haiti">Haiti</option>
                                            <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
                                            <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                                            <option value="Honduras">Honduras</option>
                                            <option value="Hong Kong">Hong Kong</option>
                                            <option value="Hungary">Hungary</option>
                                            <option value="Iceland">Iceland</option>
                                            <option value="India">India</option>
                                            <option value="Indonesia">Indonesia</option>
                                            <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                                            <option value="Iraq">Iraq</option>
                                            <option value="Ireland">Ireland</option>
                                            <option value="Isle of Man">Isle of Man</option>
                                            <option value="Israel">Israel</option>
                                            <option value="Italy">Italy</option>
                                            <option value="Jamaica">Jamaica</option>
                                            <option value="Japan">Japan</option>
                                            <option value="Jersey">Jersey</option>
                                            <option value="Jordan">Jordan</option>
                                            <option value="Kazakhstan">Kazakhstan</option>
                                            <option value="Kenya">Kenya</option>
                                            <option value="Kiribati">Kiribati</option>
                                            <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
                                            <option value="Korea, Republic of">Korea, Republic of</option>
                                            <option value="Kuwait">Kuwait</option>
                                            <option value="Kyrgyzstan">Kyrgyzstan</option>
                                            <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
                                            <option value="Latvia">Latvia</option>
                                            <option value="Lebanon">Lebanon</option>
                                            <option value="Lesotho">Lesotho</option>
                                            <option value="Liberia">Liberia</option>
                                            <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                                            <option value="Liechtenstein">Liechtenstein</option>
                                            <option value="Lithuania">Lithuania</option>
                                            <option value="Luxembourg">Luxembourg</option>
                                            <option value="Macao">Macao</option>
                                            <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
                                            <option value="Madagascar">Madagascar</option>
                                            <option value="Malawi">Malawi</option>
                                            <option value="Malaysia">Malaysia</option>
                                            <option value="Maldives">Maldives</option>
                                            <option value="Mali">Mali</option>
                                            <option value="Malta">Malta</option>
                                            <option value="Marshall Islands">Marshall Islands</option>
                                            <option value="Martinique">Martinique</option>
                                            <option value="Mauritania">Mauritania</option>
                                            <option value="Mauritius">Mauritius</option>
                                            <option value="Mayotte">Mayotte</option>
                                            <option value="Mexico">Mexico</option>
                                            <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                                            <option value="Moldova, Republic of">Moldova, Republic of</option>
                                            <option value="Monaco">Monaco</option>
                                            <option value="Mongolia">Mongolia</option>
                                            <option value="Montenegro">Montenegro</option>
                                            <option value="Montserrat">Montserrat</option>
                                            <option value="Morocco">Morocco</option>
                                            <option value="Mozambique">Mozambique</option>
                                            <option value="Myanmar">Myanmar</option>
                                            <option value="Namibia">Namibia</option>
                                            <option value="Nauru">Nauru</option>
                                            <option value="Nepal">Nepal</option>
                                            <option value="Netherlands">Netherlands</option>
                                            <option value="Netherlands Antilles">Netherlands Antilles</option>
                                            <option value="New Caledonia">New Caledonia</option>
                                            <option value="New Zealand">New Zealand</option>
                                            <option value="Nicaragua">Nicaragua</option>
                                            <option value="Niger">Niger</option>
                                            <option value="Nigeria">Nigeria</option>
                                            <option value="Niue">Niue</option>
                                            <option value="Norfolk Island">Norfolk Island</option>
                                            <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                                            <option value="Norway">Norway</option>
                                            <option value="Oman">Oman</option>
                                            <option value="Pakistan">Pakistan</option>
                                            <option value="Palau">Palau</option>
                                            <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
                                            <option value="Panama">Panama</option>
                                            <option value="Papua New Guinea">Papua New Guinea</option>
                                            <option value="Paraguay">Paraguay</option>
                                            <option value="Peru">Peru</option>
                                            <option value="Philippines">Philippines</option>
                                            <option value="Pitcairn">Pitcairn</option>
                                            <option value="Poland">Poland</option>
                                            <option value="Portugal">Portugal</option>
                                            <option value="Puerto Rico">Puerto Rico</option>
                                            <option value="Qatar">Qatar</option>
                                            <option value="Reunion">Reunion</option>
                                            <option value="Romania">Romania</option>
                                            <option value="Russian Federation">Russian Federation</option>
                                            <option value="Rwanda">Rwanda</option>
                                            <option value="Saint Helena">Saint Helena</option>
                                            <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                            <option value="Saint Lucia">Saint Lucia</option>
                                            <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                                            <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
                                            <option value="Samoa">Samoa</option>
                                            <option value="San Marino">San Marino</option>
                                            <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                            <option value="Saudi Arabia">Saudi Arabia</option>
                                            <option value="Senegal">Senegal</option>
                                            <option value="Serbia">Serbia</option>
                                            <option value="Seychelles">Seychelles</option>
                                            <option value="Sierra Leone">Sierra Leone</option>
                                            <option value="Singapore">Singapore</option>
                                            <option value="Slovakia">Slovakia</option>
                                            <option value="Slovenia">Slovenia</option>
                                            <option value="Solomon Islands">Solomon Islands</option>
                                            <option value="Somalia">Somalia</option>
                                            <option value="South Africa">South Africa</option>
                                            <option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
                                            <option value="Spain">Spain</option>
                                            <option value="Sri Lanka">Sri Lanka</option>
                                            <option value="Sudan">Sudan</option>
                                            <option value="Suriname">Suriname</option>
                                            <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                                            <option value="Swaziland">Swaziland</option>
                                            <option value="Sweden">Sweden</option>
                                            <option value="Switzerland">Switzerland</option>
                                            <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                                            <option value="Taiwan, Province of China">Taiwan, Province of China</option>
                                            <option value="Tajikistan">Tajikistan</option>
                                            <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                                            <option value="Thailand">Thailand</option>
                                            <option value="Timor-leste">Timor-leste</option>
                                            <option value="Togo">Togo</option>
                                            <option value="Tokelau">Tokelau</option>
                                            <option value="Tonga">Tonga</option>
                                            <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                            <option value="Tunisia">Tunisia</option>
                                            <option value="Turkey">Turkey</option>
                                            <option value="Turkmenistan">Turkmenistan</option>
                                            <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                                            <option value="Tuvalu">Tuvalu</option>
                                            <option value="Uganda">Uganda</option>
                                            <option value="Ukraine">Ukraine</option>
                                            <option value="United Arab Emirates">United Arab Emirates</option>
                                            <option value="United Kingdom">United Kingdom</option>
                                            <option value="United States">United States</option>
                                            <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                                            <option value="Uruguay">Uruguay</option>
                                            <option value="Uzbekistan">Uzbekistan</option>
                                            <option value="Vanuatu">Vanuatu</option>
                                            <option value="Venezuela">Venezuela</option>
                                            <option value="Viet Nam">Viet Nam</option>
                                            <option value="Virgin Islands, British">Virgin Islands, British</option>
                                            <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                                            <option value="Wallis and Futuna">Wallis and Futuna</option>
                                            <option value="Western Sahara">Western Sahara</option>
                                            <option value="Yemen">Yemen</option>
                                            <option value="Zambia">Zambia</option>
                                            <option value="Zimbabwe">Zimbabwe</option>
                                            </select>
                                        </div>
                                        
                                        <div class="input-group mb-3 w-75 mx-auto">
                                            <button class="btn btn-primary" type="submit" name="bio-btn" style="background-color:#f12020;color:white;border:none;">Submit form</button>
                                            
                                        </div>
                                        </form>

                                        
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            
            
    
        
    
            
        </div>

        <!-- <div class="page-content p-5 popu" id="content" style="display: none;" >
            <button id="sidebarCollapse6" type="button" class="btn btn-light bg-white rounded-pill shadow-sm px-4 mb-4"><i class="fa fa-bars mr-2"></i><small class="text-uppercase font-weight-bold">Toggle</small></button>
    
            <div class="chat-body">
                <div class="row">
                    <div class="col-md-1 chat-group-nav" >
                        <div class="servers">
                            <div class="server-icon"><span><img src="pics/pro-pics/pic4.jpg" alt="" height="50px" style="border-radius: 50%;"></span></div>
                            <div class="server-seperator"></div>
                            <div class="server-icon active"><span>Atd</span></div>
                            <div class="server-icon"><span>T</span></div>
                            <div class="server-icon"><span>CS</span></div>
                            <div class="server-icon"><span>PUG</span></div>
                        </div>
                    </div>
                    <div class="col-md-11 chat" >
                        <div class="chatOuter">
                            <div class="messages">
                                <div class="messages-received" id="msg-boxx">
                                    <div class="up r-msg">
                                        <div class="msg-box">
                                            <p>Hi !!</p>
                                            <p style="font-size: 12px;">10:56 pm</p>
                                        </div>
                                        
                                    </div>
                                    <div class="s-msg">
                                        <div class="msg-box float-right">
                                            <p>Hey...Whats up?</p>
                                            <p style="font-size: 12px;">10:58 pm</p>
                                        </div>
                                        
                                    </div>
                                    <div class="r-msg">
                                        <div class="msg-box">
                                            <p>Nothing Much just wanted to ask if want join for a game!</p>
                                            <p style="font-size: 12px;">11:15 pm</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="send-box d-flex">
                                <div class="messages-send">
                                    <input type="text" placeholder="Messages">
                    
                                </div>
                                <div class="messages-send-btn">
                                        <input type="submit" class="btn btn-danger" id="add-msg">
                                </div>
                                </div>
                                
                            </div>
                            <div class="friends">
                                <div class="friends-heading">
                                    <p>Online</p>
                                </div>
                                <div class="friends-seperator"></div>
                                <div class="friends-list">
                                    <a href="">
                                        <div class="friend-icon">
                                            <div class="friend-icon-img">
                                                    <img src="pics/pro-pics/pic1.jpg" alt="" height="35px" width="35px" style="border-radius: 50%;">
                                            </div>
                                            <div class="friend-icon-name">
                                                <p>Nithish Kumar</p>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="">
                                        <div class="friend-icon">
                                            <div class="friend-icon-img">
                                                    <img src="pics/pro-pics/pic2.jpg" alt="" height="35px" width="35px" style="border-radius: 50%;">
                                            </div>
                                            <div class="friend-icon-name">
                                                <p>Mark</p>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="">
                                        <div class="friend-icon">
                                            <div class="friend-icon-img">
                                                    <img src="pics/pro-pics/pic3.jpg" alt="" height="35px" width="35px" style="border-radius: 50%;">
                                            </div>
                                            <div class="friend-icon-name">
                                                <p>Nyra</p>
                                            </div>
                                        </div>
                                    </a>
                                    
                                    <div class="friend-icon"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
            
            
            
    
        
    
            
        </div> -->

        


    </div>

    






    
    
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <script src="https://vjs.zencdn.net/7.8.4/video.js"></script>
    <script src="game.js"></script>
</body>
</html>
