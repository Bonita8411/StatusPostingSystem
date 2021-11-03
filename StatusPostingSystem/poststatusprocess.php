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
        $createtbl= "CREATE TABLE IF NOT EXISTS  post_status(
                statusCode VARCHAR(5) NOT NULL UNIQUE,
                status VARCHAR(255) NOT NULL,
                share VARCHAR(255),
                date VARCHAR(55) NOT NULL,
                permission VARCHAR(255))";

        $result = mysqli_query($conn,$createtbl);
        if (!$result)
          exit ("<p>Error: " . mysqli_error($conn) . "</p>" . "<Strong><p>Unable to create the table!!!</p></Strong>");

        $statusCode = $_POST["statusCode"];
        $status = $_POST["status"];
        $share = $_POST["share"];
        $date = $_POST["date"];
        $permission= $_POST["permission"];
        //seperate array by ","
        $permissionArray= implode(", ", $permission);
        $insert= "INSERT INTO post_status(statuscode, status, share, date, permission) 
        VALUES ('$statusCode', '$status', '$share', '$date', '$permissionArray')";
        
        $result = mysqli_query($conn,$insert);
        if (!$result)
          exit ("<p>Error: " . mysqli_error($conn) . "</p>" . "<Strong><p>Unable to insert into the table!!!</p></Strong>");
        
          echo "<Strong><p>New values have been adeed to the table</p></Strong>";
        // close the database connection
        mysqli_close($conn);
   }  // if successful database connection
?>
      <!--JavaScript at end of body for optimized loading-->
      <script type="text/javascript" src="js/materialize.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    </body>
  </html>