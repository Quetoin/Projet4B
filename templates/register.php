<?php $this->title = "Inscription"; ?>

<h1 class="titresWhite">Inscription</h1>


<div class="mainDiv">
    
    <form method="post" action="../public/index.php?route=register">

        <label for="user">Pseudo</label><br>
        <input type="text" id="user" name="user"><br>
        <?= isset($errors['user']) ? $errors['user'] : ''; ?>

        <label for="password">Mot de passe</label><br>
        <input type="password" id="password" name="password"><br>
        <?= isset($errors['password']) ? $errors['password'] : ''; ?>

        <label for="password2">Vérification du mot de passe</label><br>
        <input type="password" id="password2" name="password2"><br>
        <?= isset($errors['password2']) ? $errors['password2'] : ''; ?>

        <input type="submit" value="Inscription" id="submit" name="submit">
    </form>

    

</div>