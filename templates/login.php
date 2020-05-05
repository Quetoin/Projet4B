<?php $this->title = "Connexion"; ?>


<?php $this->session->show("error_login"); ?>
<?php $this->session->show("need_login"); ?>


<h1 class="titresWhite">Connexion</h1>


<div class="mainDiv" id="loginMainDiv">

    <form method="post" action="../public/index.php?route=login">

    	<div class="row">
            <div class="col">
		        <label for="user">Pseudo :</label><br>
		        <input type="text" id="user" name="user" placeholder="Pseudo" value="<?=isset($post)?htmlspecialchars($post->get('user')):'';?>"><br>
		    </div>
		</div>

		<div class="row">
            <div class="col">
		        <label for="password">Mot de passe : </label><br>
		        <input type="password" id="password" name="password" placeholder="Mot de passe"><br>
		    </div>
		</div>

		<div class="row">
        	<input type="submit" value="Se connecter" id="submit" name="submit">
        </div>
    </form>

    

</div>