<?php 

session_start();

// if there's no user logged in, stay on the login page, else stay in the website
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}

?>

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lim's Flat Icons</title>
    
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"/>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.0.11/typed.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

    <script>
        // script code to monitor session time
        $(function() {
            // will read the time stamp every 3 seconds
            function timeChecker() {
                setInterval(function(){
                    var storedTimeStamp = sessionStorage.getItem("lastTimeStamp");
                    // [3] will compare the stored time stamp to the current time
                    timeCompare(storedTimeStamp);
                }, 3000); // 3 seconds == 3000 milliseconds
            }

            // will compare the stored time stamp to the current time
            function timeCompare(timeString) {
                var currentTime = new Date();           // the current time
                var pastTime = new Date(timeString);    // the time since last mouse movement
                var timeDiff = currentTime - pastTime;  // the amount of time that past since last mouse movement
                var minPast = (timeDiff/60000);         // the amount of inactive time in minute

                if (minPast > 5) {  // if the inactive time is greater than 5 minutes
                    sessionStorage.removeItem("lastTimeStamp");     // cleans the session storage
                    
                    // logs out the user
                    window.location = "inactive-logout.php";
                    return false;
                }
            }

            // [1] will create a session storage object (labelled 'lastTimeStamp'),
            // capture and save timestamp of the last mouse movement into that object
            $(document).mousemove(function(){
                var timeStamp = new Date ();
                // similar to cookie but only stores the data on the session
                // so when the browser is closed, the data disappears
                sessionStorage.setItem("lastTimeStamp", timeStamp);
            });

            // [2] will read the object, assign the data to a variable, and compare it to the current time
            timeChecker();

        });

    </script>

</head>
<body>
    <!-- THE SCROLL UP BUTTON -->
    <div class="scroll-up-btn">         <!-- the scroll up button which returns the user back to the homepage when clicked -->
        <i class="fas fa-angle-up"></i> <!-- inverted v icon -->
    </div>
    <!-- THE NAVIGATION BAR -->
    <nav class="navbar">    
        <div class="max-width">
            <div class="logo"><a href="#">Lim's     <!-- the website logo -->
                <span class="flat">Flat</span>
                <span class="icons"> Icons</span></a>
            </div>
            <ul class="menu">   <!-- the links to different sections -->
                <li><a href="#home" class="menu-btn">Home</a></li>
                <li><a href="#about" class="menu-btn">About</a></li>
                <li><a href="#sample-portfolio" class="menu-btn">Samples</a></li>
                <li><a href="#" class="menu-btn">Portfolio</a></li>
                <li><a href="#contact" class="menu-btn">Contact</a></li>
                <li><a href="logout.php" class="menu-btn">Logout</a></li>
            </ul>
            <div class="menu-btn">  <!-- the hamburger menu button that appears when max-width is reduced (see responsive media query) -->
                <i class="fas fa-bars"></i>
            </div>
        </div>
    </nav>

    <!-- THE HOMEPAGE -->
    <section class="home" id="home">
      <div class="max-width">
          <div class="row">
            <div class="home-content">  <!-- the welcoming message -->
                <div class="text-1">Hi! I'm Limuelle and I design</div>
                <div class="text-2">Flat Icons</div>
                <div class="text-3">about <span class="typing"></span></div>
                <span class="samples-first"><a href="#sample-portfolio">View samples first</a></span> <!-- the button to samples section -->
                <span class="portfolio"><a href="#">Check my portfolio</a></span>        <!-- the button to portfolio -->
            </div>
          </div>
      </div>
    </section>

    <!-- THE ABOUT SECTION -->
    <section class="about" id="about">
        <div class="max-width">
            <h2 class="title">Here's a little context about me</h2>
            <div class="about-content">
                <div class="column left">
                    <img src="images/profile-1.jpg" alt="">
                </div>
                <div class="column right">
                    <h3>Hi there! I'm glad you stop by.</h3>
                    <span>Who am I?</span>
                    <p>I’m Limuelle Alamil but my friends call me Lim. I’m a Computer Science student at University of the Philippines Visayas.</p>
                    <span>Why make flat icons?</span>
                    <p>At first, I just did it out of boredom during the community lockdown but as I continue, I learned that I might have a knack for designing icons and all I need is practice. Since then, I’ve been making flat icons out of different ideas that I have in mind. I design several for foods, hobbies, and my favorite anime, and I made this website as a virtual space for my flat icons. I’m also learning this skill as a foundation in making more elaborate illustrations and UI design which is one of the fields I’m currently most interested in.</p>
                    <a href="#contact">Contact me</a>   <!-- the button to contacts section -->
                </div>
            </div>
        </div>
    </section>

    <!-- THE SAMPLES SECTION -->
    <section class="sample-portfolio" id="sample-portfolio">
        <div class="max-width">
            <h2 class="title">Here are samples of my work</h2>
            <div class="carousel owl-carousel"> <!-- the carousel; a set of slidable cards containing images -->
                <div class="card">              <!-- a slidable card -->
                    <a href="#">   <!-- the user gets redirected to this link when a card is clicked -->
                        <div class="box">       <!-- the contents of the carousel -->
                            <img src="images/Sample1.png" alt="">
                            <div class="text">Did you like this? Click to see my whole portfolio.</div>
                        </div>
                    </a>
                </div>
                <div class="card">
                    <a href="#">
                        <div class="box">
                            <img src="images/Sample2.png" alt="">
                            <div class="text">Did you like this? Click to see my whole portfolio.</div>
                        </div>
                    </a>
                </div>
                <div class="card">
                    <a href="#">
                        <div class="box">
                            <img src="images/Sample3.png" alt="">
                            <div class="text">Like this? Click to see my whole portfolio.</div>
                        </div>
                    </a>
                </div>
                <div class="card">
                    <a href="#">
                        <div class="box">
                            <img src="images/Sample4.png" alt="">
                            <div class="text">Did you like this? Click to see my whole portfolio.</div>
                        </div>
                    </a>
                </div>
                <div class="card">
                    <a href="#">
                        <div class="box">
                            <img src="images/Sample5.png" alt="">
                            <div class="text">Did you like this? Click to see my whole portfolio.</div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
    
    <!-- THE CONTACTS SECTION -->
    <section class="contact" id="contact">
        <div class="max-width">
            <h2 class="title">Here's how you can contact me</h2>
            <div class="contact-content">
                <!-- the contact details column -->
                <div class="column left">
                    <div class="text">I would love to hear from you!</div>
                    <p>Interested on my works? Have any comments? Or just want to say hi? You can send me a message using this contact form or reach me using the following information. </p>
                    <div class="icons">
                        <div class="row">
                            <i class="fas fa-user"></i> <!-- human icon -->
                            <div class="info">
                                <div class="head">Name</div>
                                <div class="sub-title">Limuelle Alamil</div>
                            </div>
                        </div>
                        <div class="row">
                            <i class="fas fa-map-marker-alt"></i>   <!-- "Google maps" icon -->
                            <div class="info">
                                <div class="head">Address</div>
                                <div class="sub-title">Capiz, Philippines</div>
                            </div>
                        </div>
                        <div class="row">
                            <i class="fas fa-envelope"></i>
                            <div class="info">
                                <div class="head">Email</div>   <!-- email icon -->
                                <div class="sub-title">abc@gmail.com</div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- the contact form column -->
                <div class="column right">
                    <div class="text">Message me</div>


                    

                    <form name="web-form" class="contact-form" action="connect.php" onsubmit="alert('You have submitted your message. Thanks!');" autocomplete="off" method="POST">    <!-- database purposes -->
                        <div class="fields">            <!-- the field for name and email -->
                            <div class="field name">    <!-- users can type their name here -->
                                <input type="text" class="fullname" placeholder="Name" name="fullname" required>
                            </div>
                            <div class="field email">   <!-- users can type their email here -->
                                <input type="email" class="email-input" placeholder="Email" name="email" required>
                            </div>
                        </div>
                        <div class="field">             <!-- users can type the subject of message here -->
                            <input type="text" class="subject" placeholder="Subject" name="subject" required>
                        </div>
                        <div class="field textarea">    <!-- users can type their message here -->
                            <textarea class="message" cols="30" rows="10" placeholder="Message.." name="message" required></textarea>
                        </div>
                        <div class="button-area">       <!-- the submit button -->
                            <button class="send-msg" type="submit" name="send">Send message</button>
                            <!-- <input type="submit"> -->
                        </div>
                    </form>




                </div>
            </div>
        </div>
    </section>

    <!-- THE FOOTER SECTION -->
    <footer>
        <span class="lim">Lim's </span> <!-- the website logo -->
        <span class="flat">Flat </span>
        <span class="icons">Icons </span>
        <span class="line">| </span>
        <span class="copyright"><i class="far fa-copyright"></i></span> <!-- copyright icon -->
        <span class="year">2021 All rights reserved.</span>
        <div class="socials">   <!-- social media links -->
            <a href="https://www.pinterest.ph/"><i class="fa fa-facebook-square"></i></a>
            <a href="https://www.instagram.com/"><i class="fa fa-instagram"></i></a>
            <a href="https://www.pinterest.ph/"><i class="fa fa-pinterest-square"></i></a>
        </div>
    </footer>

    <script src="script.js"></script>
</body>
</html>
