<?php $this->title = "Inscription"; ?>


<div class="mainDiv">

	<a href="../public/index.php">Retour à l'accueil</a>

    <form method="post" action="../public/index.php?route=register">

        <label for="user">Pseudo</label><br>
        <input type="text" id="user" name="user"><br>
        <?= isset($errors['user']) ? $errors['user'] : ''; ?>

        <label for="password">Mot de passe</label><br>
        <input type="password" id="password" name="password"><br>
        <?= isset($errors['password']) ? $errors['password'] : ''; ?>

        <input type="submit" value="Inscription" id="submit" name="submit">
    </form>

    

</div>