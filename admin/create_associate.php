<!--
/**
 * CSCI 467 Intro to Software Engineering
 * @author For NIU by David Jones
 * @version 1.0
 * Resources: https://getbootstrap.com/docs/4.5/components/alerts/  -- bootstrap examples
 *
 */
-->

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>CSCI 467 Create Associate</title>

    <!-- Importing Bootstrap CSS library https://getbootstrap.com/ -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
</head>

<body>
    <div style="margin-top: 20px" class="container">
        <h1>Create Associate</h1>
        <!-- styling of the form for bootstrap https://getbootstrap.com/docs/4.5/components/forms/ -->
        <form action="create_associate.php" method="post">
            <div class="form-group">
                <label for="username">Username</label>
                <input class="form-control" type="text" id="username" name="username">
            </div>
            <div class="form-group">
                <label for="new_password">New Password</label>
                <input class="form-control" type="text" id="new_password" name="new_password">
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input class="form-control" type="text" id="address" name="address">
            </div>
			<div class="form-group">
                <label for="commission">Commission</label>
                <input class="form-control" type="text" id="commission" name="commission">
            </div>
            
            <div class="form-group">
                <input class="btn btn-primary" name='Submit' type="submit" value="Submit">
            </div>
        </form>
        <div>
            <br>
            <a href="admin_menu.php">Back to Admin Menu</a></br>
        </div>

        <!-- jQuery and JS bundle w/ Popper.js -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
    
    
    <?php
        session_start();
        require_once('../config.php');
        require_once('../validate_session.php');
        if (isset($_POST['Submit'])){

    
            /**
             * Grab information from the form submission and store values into variables.
             */ 
            $username = isset($_POST['username']) ? $_POST['username'] : " ";
            $new_pass = isset($_POST['new_password']) ? $_POST['new_password'] : " ";
            $address = isset($_POST['address']) ? $_POST['address'] : " ";
            $commission = isset($_POST['commission']) ? $_POST['commission'] : " ";
			
            //Insert into Student table;
            
            $query  = "INSERT INTO User (Uusername, Upassword, address, commission)
                        VALUES ('".$username."', '".$new_pass."', '".$address."', '".$commission."');";

            // The query sent to the DB can be printed by not commenting the following row
            //echo $queryStudent;
            if ($conn->query($query) === TRUE) {
            echo "<br> New record created successfully for user id ".$sid;
            } else {
                echo "<br> The record was not created, the query: <br>" . $query . "  <br> Generated the error <br>" . $conn->error;
            }
			header("Location: admin_menu.php");
}
?>


</body>

</html>