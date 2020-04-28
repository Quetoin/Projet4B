<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <title><?= $title ?></title>
    <link href="../public/CSS/style.css" rel="stylesheet" />
    <script src="https://cdn.tiny.cloud/1/13jez1so392mwv0okhoomvhvpez2gz4krvz78dnt14eat865/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <link href="https://fonts.googleapis.com/css2?family=Exo&display=swap" rel="stylesheet"> 

	<link rel="icon" type="image/png" href="../public/img/favicon/favicon.ico">

</head>

<body>
	<div id="main">
		<header>
    		<div id="barreNav">
	        	<a href="index.php" id="imgLogoA"><img src="img/logoJF.jpg" id="imgLogo" alt="imgLogo"></a>

	       		<ul>
		          <li><a href="../public/index.php?route=home">Accueil</a></li>
		          <li><a href="../public/index.php?route=listPosts">Articles</a></li>
		          <li><a href="../public/index.php?route=about">Biographie</a></li>
		          <li><a href="../public/index.php?route=contactForm">Contact</a></li>

		          <?php
		          	if($this->session->get("user")){
		          ?>	
		          		<li><a href="../public/index.php?route=logout">Déconnexion</a></li>
    					
    			<?php if($this->session->get("role") === "admin"){?>
    					<li><a href="../public/index.php?route=administration">Administration</a></li>
    				<?php }

		          	}else{
		          ?>
		          		<li><a href="../public/index.php?route=register">Inscription</a></li>
		          		<li><a href="../public/index.php?route=login">Connexion</a></li>
		          <?php
		          	}
		          ?>

	        	</ul>
    		</div>
      	</header>

    	<div id="contentDiv">
        	<?= $content ?>
    	</div>

	</div>

	<footer>
		<div id="innerFooter">
			<div id="plan">
				<h4>Plan du site</h4>
				<a href="../public/index.php?route=home">Accueil</a><br>
		        <a href="../public/index.php?route=listPosts">Articles</a><br>
		        <a href="../public/index.php?route=about">Biographie</a><br>
		        <a href="../public/index.php?route=contactForm">Contact</a><br>
				<a href="../public/index.php?route=register">Inscription</a><br>
		        <a href="../public/index.php?route=login">Connexion</a><br>
			</div>
			<div id="social">
				<h4>Me retrouver sur :</h4>
				<p><a href="#">Facebook</a></p>
				<p><a href="#">Twitter</a></p>
			</div>
		</div>	

	</footer>

<script src="../public/js/script.js"></script>
<script src="https://kit.fontawesome.com/586aab2eb8.js" crossorigin="anonymous"></script>
</body>
</html>