<?php
    if(!$_GET){
        header('location: RSVP.php');
        die();
    }
?>

<html>
    <head>
        <title>LAME! | Almost Harrison</title>
        <?php include_once "HTMLhead.php"; ?>
    </head>
    <body>
        
        <?php include_once "header.php";  ?>
        <div class="grid-container">
            <div class="grid-100 center pushedDown">
            <h1>That is unforturnate!</h1>
            <h2>We're sad that you're not able to come, but if things changes, come back. The invitation is still good until October 1st!</h2>
            </div>
        </div>
            <?php
            //Connect DB
            $con = mysqli_connect("localhost", "root", "", "toy");

            //Check for connection error
            if(mysqli_connect_error()) {
                echo "Something went wrong with the connection";
            } else {
                echo "DB connected";
            }

            mysqli_autocommit($con, false);
            
            //Set Guest's response to false on Guest Table
            $sql = "UPDATE Guests SET response=false WHERE GID = {$_GET['GID']} ";
            echo $sql;
            
            mysqli_query($con, $sql);
            
            //Message if something went wrong, else, commit and give success message.
            if (mysqli_error($con)) {
                
                echo "Something went wrong with the query";
            } else {
                mysqli_commit($con);
                echo "Success!";
            }

            include_once "footer.php";
        ?>
    
    
    
    </body>


</html>