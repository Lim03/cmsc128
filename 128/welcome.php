<?php 

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <script>
        $(function() {
            function timeChecker() {
                setInterval(function(){
                    var storedTimeStamp = sessionStorage.getItem("lastTimeStamp");
                    timeCompare(storedTimeStamp);
                }, 3000);
            }

            function timeCompare(timeString) {
                var currentTime = new Date();
                var pastTime = new Date(timeString);
                var timeDiff = currentTime - pastTime;
                var minPast = (timeDiff/60000);

                if (minPast > 1) {  //greater than 1 minute
                    sessionStorage.removeItem("lastTimeStamp");
                    window.location = "logout.php";
                    return false;
                } else {
                    console.log(currentTime + " - " + pastTime + " - " + minPast + "min past");
                }
            }

            // will create a session storage object, capture and save timestamp of the last mouse movement into that object
            $(document).mousemove(function(){
                var timeStamp = new Date ();
                sessionStorage.setItem("lastTimeStamp", timeStamp); // acts like cookie but only stores the data on the session so when the browser is closed, the data is destroyed
            });

            // read the object, assign the data to a variable and compare it to the current time

            timeChecker();

        });

    </script>
</head>
<body>
    <?php echo "<h1>Welcome " . $_SESSION['username'] . "</h1>"; ?>
    <a href="logout.php">Logout</a>
</body>
</html>