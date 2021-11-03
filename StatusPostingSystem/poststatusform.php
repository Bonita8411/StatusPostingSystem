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
            <form action="poststatusprocess.php" method="POST">
            <div class="row">
                    <div class="input-field">
                        <p>Status Code (required):</p>
                        <input id= "statusCode"type="text" name="statusCode" pattern= "[Ss]\d{4}" title= "The format is S followed by 4 numbers."
                        placeholder="eg. S0001"required>
                    </div>
            </div>
            <div class="row">
                    <div class="input-field">
                        <p>Status (required):</p>
                        <input id= "status" type="text" name="status" pattern="^[A-Za-z0-9 ,.!?]+$" title="Status should only contain letters, numbers, commas, full stops, spaces, ! and ? only."
                        placeholder="eg. Doing Assignment" required >
                    </div>
            </div>
            <div class="row">
                    <p>Date:
                    <label>
                        <input id="date" type="date" name="date" value=" "required>
                    </label>
                    </p>
                    <div class="col-s6">
                      <p>Share:</p>
                      <label>
                          <input class="with-gap" type="radio" name="share" value="public" />
                          <span>Public</span>
                      </label>
                      <br>
                      <label>
                          <input class="with-gap" type="radio" name="share" value="friends"/>
                          <span>Friend</span>
                      </label>
                      <br>
                      <label>
                          <input class="with-gap" type="radio" name="share" value="onlyMe"/>
                          <span>Only Me</span>
                      </label>
                    </div>
                    <div class="col-s6">
                      <p>Permission Type:</p>
                      <p>
                      <label>
                          <input type="checkbox" name="permission[]" value= "Allow Like">
                          <span>Allow Like</span>
                      </label>
                      <label>
                          <input type="checkbox" name="permission[]" value= "Allow Comment">
                          <span>Allow Comment</span>
                      </label>
                      <label>
                          <input type="checkbox" name="permission[]" value= "Allow Share">
                          <span>Allow Share</span>
                      </label>
                      </p>
                    </div>
                        <input class="btn wave-effect waves-light cyan" type="submit" value="Post Status">
                        <input class="btn wave-effect waves-light cyan" type="reset" value="Reset">
            </form>
            </div>
            <a href="index.html">Return to Home Page</a>
            <a style="float:right" href="searchstatusform.html">Search status</a>

          
      <!--JavaScript at end of body for optimized loading-->
      <script type="text/javascript" src="js/materialize.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    </body>
  </html>