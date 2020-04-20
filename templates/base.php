<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <title><?= $title ?></title>
    <link href="../public/CSS/style.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Exo&display=swap" rel="stylesheet"> 
</head>
<body>
	<div id="main">
		<header>
    		<div id="barreNav">
	        	<a href="index.php" id="imgLogoA"><img src="img/logoJF.jpg" id="imgLogo"></a>

	       		<ul>
		          <li><a href="index.php?action=home">Accueil</a></li>
		          <li><a href="index.php?action=listPosts">Blog</a></li>
		          <li><a href="index.php?action=about">A propos</a></li>
		          <li><a href="index.php?action=contactForm">Contact</a></li>

	        	</ul>
    		</div>
      	</header>

    	<div id="content">
        	<?= $content ?>
    	</div>

	</div>

</body>
</html>