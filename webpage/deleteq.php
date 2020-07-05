<?php
include("db_config.php");

if (isset($_POST['query'])) {
    $search_query = $_POST['query'];


    $query = "SELECT * FROM masks WHERE name LIKE '$search_query%'";
    $result = mysqli_query($connection, $query);
    if (mysqli_num_rows($result) > 0) {
        while ($record = mysqli_fetch_array($result)) {
            echo"
            <div class=\"container\"><h4>$record[name]</h4></div>
              <div class=\"container\"><a href=\"deletef.php?del=$record[masks_id]\">Delete</a></div>

			  <hr>
			  </div>";
        }
    } else {
        echo "<p style='color:red'>Nincs ilyen maszk!</p>";
    }
}