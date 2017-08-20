 <!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Admin Dashboard</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="style.css">
</head>
<body>
  <div id="site-wrapper">
        <div id="site-canvas">
            <a href="#" class="toggle-nav">
                <div class="hexagon">
                    <div class="button"><span class="lines "></span></div>
                </div>
            </a>
             <div id="site-menu">
               <?php include 'includes/html/left-menu.html.php'; ?>
            </div> 
             <div class="top-nav">
                <?php include 'includes/html/top-nav.html.php'; ?>
            </div> 
             <div class="content">
    <!-- <div class="bg" style="background-color: red; height: 100vh;width: 100vw;"></div> -->
            <?php include 'includes/html/tiles.html.php'; ?> 
            <?php include 'includes/pages/tables.html.php'; ?> 
             </div>  
        </div>
    </div>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script type="text/javascript" src="assets/scripts/script.js"></script>
</body>
</html>
