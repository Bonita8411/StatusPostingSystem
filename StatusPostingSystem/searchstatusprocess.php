<!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <link rel="stylesheet" href="style.css">
      <title>Index Page</title>
    </head>
    <body>
    <nav>
            <div class="nav-wrapper cyan">
              <a href="index.html" class="brand-logo center">Status Posting System</a>
              <ul id="nav-mobile" class="left">
                <li><a href="index.html">Home</a></li>
                <li><a href="about.html">About Page</a></li>
              </ul>
              <ul id="nav-mobile" class="right">
                <li><a href="poststatusform.php">Post Status</a></li>
                <li><a href="searchstatusform.html">Search Status</a></li>
              </ul>
            </div>
          </nav>

          <div class="center-wrapper">
<?php   
   // sql info or use include 'file.inc'
   require_once('/home/kdk8411/conf/sqlinfo.inc.php');
   // The @ operator suppresses the display of any error messages
   // mysqli_connect returns false if connection failed, otherwise a connection value
   $conn = mysqli_connect($sql_host,
       $sql_user,
       $sql_pass,
       $sql_db);
    $sql_table = "post_status";
   // Checks if connection is successful
   if (!$conn) {
       // Displays an error message
       echo "<p>Database connection failure</p>";
   } else {
       // Upon successful connection
            if(isset($_GET["searchButton"])){
                if($_GET["search_box"] == ""){
                    echo "Please input the status!!!";
                }else{
                    $searchStatus = $_GET["search_box"]; 
                    $sql = "SELECT * FROM $sql_table WHERE status LIKE '%$searchStatus%'";
                    $result = mysqli_query($conn,$sql);
                    if(mysqli_num_rows($result) >= 1){
                        while ($row = mysqli_fetch_assoc($result)){
                            echo "<strong>Status:</strong> " .$row["status"];
                            echo "<br><strong>Status Code:</strong> " .$row["statusCode"];
                            echo "<br><strong>Share:</strong> " .$row["share"];
                            $dateFormat = $row["date"];
                            echo "<br><strong>Date:</strong> " .date('d-F-Y', strtotime($dateFormat));
                            echo "<br><strong>Permission Type:</strong> " .$row["permission"];
                            echo "<br><br>";
                            }
                    }else{
                        echo "No status found!!!";
                    }
                }
            }
        mysqli_free_result($result);
        // close the database connection
        mysqli_close($conn);
   }  // if successful database connection
?>
      <a href="index.html">Return to Home Page</a>
      <a style="float:right" href="poststatusform.php">Post a new status</a>
  </div>
      <!--JavaScript at end of body for optimized loading-->
      <script type="text/javascript" src="js/materialize.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    </body>
  </html>