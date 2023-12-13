<!DOCTYPE html>
<html>
	<head>

  <meta charset="utf-8">
   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="../../assets/frontoffice/css/bootstrap.min.css">
    <!-- Your additional styles -->
    <link rel="stylesheet" href="../../assets/frontoffice/css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

		<title>Melodi</title>

	
		<link href="../../assets/frontoffice/css/bootstrap.min.css" rel="stylesheet">	
		<!-- Animate CSS -->
		<link href="../../assets/frontoffice/css/css/animate.min.css" rel="stylesheet">
		<!-- Basic stylesheet -->
		<link rel="stylesheet" href="../../assets/frontoffice/css/css/owl.carousel.css">
		<!-- Font awesome CSS -->
		<link href="../../assets/frontoffice/css/font-awesome.min.css" rel="stylesheet">		
		<!-- Custom CSS -->
		<link href="../../assets/frontoffice/css/style.css" rel="stylesheet">
		<link href="../../assets/frontoffice/css/style-color.css" rel="stylesheet">
		
		<!-- Favicon -->
		<link rel="shortcut icon" href="../../assets/frontoffice/img/logo">


   
    <style>
		body {
            background-color: #ffffff;
            background-image: url('../../assets/frontoffice/img/background/login.jpg');
            background-size: cover;
            background-position: center center;
            background-attachment: fixed;
            color: #1a1a1a;
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

		.input-box span {
            display: block;
            margin-bottom: 8px;
            color: #8B4513; /* Change the color to match your desired style */
            font-weight: bold; /* Add bold style */
        }

        .input-box input {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            border: 1px solid #808080;
            background-color: #dcdcdc;
            color: #1a1a1a;
            border-radius: 5px;
            font-size: 16px; /* Add font size */
        }

        .button input {
            background-color: #8B4513;
            color: #ffffff;
            cursor: pointer;
            width: 200px;
            height: 40px;
            font-size: 16px; /* Add font size */
        }

        .button input:hover {
            background-color: #542828;
        }
    </style>
  </head>
  <div class="container">
        <div class="logo-container" style="margin-left: auto; margin-right: 20px;">
        <a href="index.php">
            <img src="../../assets/frontoffice/img/logo/logologin.png" alt="Logo" class="app-brand-logo demo">
        </a>
  <body>
  <div class="content">
    <form method="post" action="artist.php" onsubmit="return validateForm(this)">
        <div class="user-details">
            <div class="input-box">
                <span class="details">Nom de l'artiste</span>
                <input type="text" placeholder="Entrer le nom de l'artist" id="nom" name="nom" >
            </div>
            <div class="input-box">
                <span class="details">Description</span>
                <textarea id="description" placeholder="Enter la description"name="description" cols="40" rows="5"></textarea>
                            
            </div>
            <div class="input-box">
                <span class="details">URL de l'image</span>
                <input type="text" placeholder="Enter image URL" id="image" name="image" >
            </div>
        </div>
        <div class="button">
            <input type="submit" value="Ajouter artiste">
        </div>
    </form>
</div>

	</body>	
</html>
