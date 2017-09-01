 <!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Admin Dashboard</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.28/css/uikit.min.css" />
	<link rel="stylesheet" href="style.css">
</head>
<body>
  <div id="site-wrapper">
        <div id="site-canvas">
         <a href="#" class="toggle-nav ">
                <div class="hexagon z-depth-3">
                    <div class="button "><span class="lines "></span></div>
                </div>
            </a>
        <div class="shadow">
           
            
        </div>
               <?php include 'includes/html/site-menu.html.php'; ?>
               <?php include 'includes/html/top-nav.html.php'; ?>
             <div class="content">
            <?php include 'includes/html/tiles.html.php'; ?> 
             <?php include 'includes/html/tables.html.php';?>

             </div>  
        </div>
    </div>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.28/js/uikit.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.28/js/uikit-icons.min.js"></script>
	<script type="text/javascript" src="assets/scripts/script.js"></script>
</body>
</html>
