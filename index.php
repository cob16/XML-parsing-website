<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Steve's Garden Center</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="" />
	
	<!------Styles-------->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 20px;
        padding-bottom: 40px;
      }

      /* Custom container */
      .container-narrow {
        margin: 0 auto;
        max-width: 700px;
      }
      .container-narrow > hr {
        margin: 30px 0;
      }

      /* Main marketing message and sign up button */
      .jumbotron {
        margin: 60px 0;
        text-align: center;
      }
      .jumbotron h1 {
        font-size: 72px;
        line-height: 1;
      }
      .jumbotron .btn {
        font-size: 21px;
        padding: 14px 24px;
      }

      /* Supporting marketing content */
      .marketing {
        margin: 60px 0;
      }
      .marketing p + h4 {
        margin-top: 28px;
      }
    </style>
    <link href="../assets/css/bootstrap-responsive.css" rel="stylesheet">
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="container-narrow">
      <div class="masthead">
        <ul class="nav nav-pills pull-right">
          <li class="active"><a href="#">Home</a></li>
          <li><a href="#">Contact</a></li>
        </ul>
        <h3 class="muted">Steve's Garden Centre</h3>
      </div>
      <hr>
      <div class="jumbotron">
        <h1>Welcome to Steve's Garden Centre!</h1>
		<p class="lead">Here at Steve's garden center we can supply you with all the items you'll need to have the perfect garden this summer; including plant pots, garden tools and plant food.</p>
        <a class="btn btn-large btn-success" href="#">Contact us</a>
      </div>
      <hr>
      <div class="row-fluid marketing">
        <?php

        $servername = "localhost";
        $username = "root";
        $password = "Universe94!";
        $dbname = "GloverSure";

        // Create connection
        $conn1= new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn1->connect_error) {
          die("Connection failed: " . $conn1->connect_error);
        }

        $sql = "SELECT * FROM products";
        $result = $conn1->query($sql) or die(mysql_error());

        while($row = $result->fetch_assoc()) {

          echo "<div class='span6'>";
          echo "<h4> " . $row['name'] . "</h4>";
          echo "<p> " . $row['description']. " </p>";
          echo "<h5>&pound;" . $row['price'] . " </h5>";
          echo "</div>";
        }
        $conn1->close();
        ?>
      </div>
      <hr>
      <div class="footer">
        <p class="pull-left">&copy; GloverSure 2013</p>
		<p class="pull-right clearfix">Built with <a href="http://twitter.github.io/bootstrap/index.html" target="_blank">Bootstrap</a>
	  </div>
    </div>
    <!------JavaScript------>
    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/bootstrap-transition.js"></script>
    <script src="../assets/js/bootstrap-alert.js"></script>
    <script src="../assets/js/bootstrap-modal.js"></script>
    <script src="../assets/js/bootstrap-dropdown.js"></script>
    <script src="../assets/js/bootstrap-scrollspy.js"></script>
    <script src="../assets/js/bootstrap-tab.js"></script>
    <script src="../assets/js/bootstrap-tooltip.js"></script>
    <script src="../assets/js/bootstrap-popover.js"></script>
    <script src="../assets/js/bootstrap-button.js"></script>
    <script src="../assets/js/bootstrap-collapse.js"></script>
    <script src="../assets/js/bootstrap-carousel.js"></script>
    <script src="../assets/js/bootstrap-typeahead.js"></script>
  </body>
</html>