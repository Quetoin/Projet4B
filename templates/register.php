<?php $this->title = "Inscription"; ?>

<h1 class="titresWhite">Inscription</h1>


<div class="mainDiv row" id="formRegisterMainDiv">
    
    <div id="formRegister" class="col">
        <form method="post" action="../public/index.php?route=register">

            <div class="row">
                <div class="col">
                    <label for="user">Pseudo</label><br>
                    <input type="text" id="user" name="user" placeholder="Pseudo"><br>
                    <?= isset($errors['user']) ? $errors['user'] : ''; ?>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <label for="password">Mot de passe</label><br>
                    <input type="password" id="password" name="password" placeholder="Mot de passe"><br>
                    <?= isset($errors['password']) ? $errors['password'] : ''; ?>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <label for="password2">Vérification du mot de passe</label><br>
                    <input type="password" id="password2" name="password2" Placeholder="Vérification du mot de passe"><br>
                    <?= isset($errors['password2']) ? $errors['password2'] : ''; ?>
                </div>
            </div>

            <div class="row">
                <input type="submit" value="Inscription" id="submitRegister" name="submit">
            </div>
        </form>
    </div>

    <div class="col" id="faUser">
        <i class="far fa-user"></i>

    </div>    

</div>