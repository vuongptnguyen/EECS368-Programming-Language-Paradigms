<?php
			//Authors: Main Front End: Logan Ayer
			//         Main Back End:  Vuong Nguyen 
			//Date Last Edited: 5/9/2016 
			//DeletePost2.php takes in data from 
			//DeletePost.php to delete content from database

    // onnection to the database and start the session
    require("../common.php"); 

    // check to see whether the admin is logged in or not
    if(empty($_SESSION['user']))
    {
        // If they are not, redirect them to the login Admin page.
        header("Location: loginAdmin.php");

        die("Redirecting to loginAdmin.php");
    }
    //checkbox
    $checkbox = $_POST['delete'];

    if(empty($checkbox)) {
        echo("No delete request.");
    } else {
        //count the number of checkbox selected
        $count = count($checkbox);

        for($i=0; $i < $count; $i++)
        {
            echo("Post ID" .$checkbox[$i] . " is selected to delete." . "<br>");
            $result = $conn->query("DELETE FROM Posts WHERE post_id ='" . $checkbox[$i] . "'");
                //check query
                if(!$result) {
                    die ("failed to run query.");
                }
        }
        echo("<br> You have deleted $count posts. <br>");
    }

    echo "<br><a href='DeletePost.php'>Back to Delete Post</a>";
    echo "<br><a href='privateAdmin.php'>Back to Admin menu</a>";

?>
