<?php $this->title = "Connexion"; ?>


<?php $this->session->show("error_login"); ?>

<div class="mainDiv">

	<a href="../public/index.php">Retour à l'accueil</a>

    <form method="post" action="../public/index.php?route=login">

        <label for="user">Pseudo</label><br>
        <input type="text" id="user" name="user" value="<?=isset($post)?htmlspecialchars($post->get('user')):'';?>"><br>

        <label for="password">Mot de passe</label><br>
        <input type="password" id="password" name="password"><br>

        <input type="submit" value="Se connecter" id="submit" name="submit">
    </form>

    

</div>