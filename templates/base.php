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
		          <li><a href="../public/index.php?route=home">Accueil</a></li>
		          <li><a href="../public/index.php?route=listPosts">Blog</a></li>
		          <li><a href="../public/index.php?route=about">A propos</a></li>
		          <li><a href="../public/index.php?route=contactForm">Contact</a></li>
		          <li><a href="../public/index.php?route=register">Inscription</a></li>
		          <li><a href="../public/index.php?route=login">Connexion</a></li>

	        	</ul>
    		</div>
      	</header>

    	<div id="contentDiv">
        	<?= $content ?>
    	</div>

	</div>

</body>
</html>