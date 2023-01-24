<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>He-Man Page</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/css/bootstrap-responsive.min.css" rel="stylesheet">
    </head>

    <body>
        <div class="container">
            <div class="hero-unit">
<br/>
<?php
$instanceId = file_get_contents('http://169.254.169.254/latest/meta-data/instance-id');

?>

	    <div style="height:75px;background-color:#<?php echo substr($instanceId,3,6) ?>"></div>
<br/><br/>
<div style="text-align:center;">
<img src="https://de.web.img3.acsta.net/newsv7/19/08/19/09/10/4927821.jpg" align="middle" width="400"/>

                <h1>

                  <?php
                    $serverName = file_get_contents('http://169.254.169.254/latest/meta-data/tags/instance/Name');
                    echo strtoupper("{$serverName}");
                  ?>

                </h1>

               <B>Instance ID</B>

                    <?php
                      $instanceId = file_get_contents('http://169.254.169.254/latest/meta-data/instance-id');
                      echo "{$instanceId}";
                    ?>
		  <br/>

<B>Availability Zone</B>

<?php
		      $az = file_get_contents('http://169.254.169.254/latest/meta-data/placement/availability-zone');
		      echo "{$az}";
		      ?>
<br/>

<B>Current Time</B>

                  <?php echo "" . date("h:i:sa"); ?><br/><br/></td>
                 <div style="height:75px;background-color:#<?php echo substr($instanceId,3,6) ?>"></div>


            </div>
        </div>
</div>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
    </body>

</html>
