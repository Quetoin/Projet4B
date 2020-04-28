<?php $this->title = "MAJ Password"; ?>



<div class="mainDiv">

	<p>Le mot de passe de <?= $this->session->get("user");?> sera modifié</p>

    <form method="post" action="../public/index.php?route=updatePassword">

        <label for="oldPassword">Ancien mot de passe</label><br>
        <input type="password" id="oldPassword" name="oldPassword"><br>

        <label for="password">Nouveau mot de passe</label><br>
        <input type="password" id="password" name="password"><br>

        <label for="password2">Nouveau mot de passe</label><br>
        <input type="password" id="password2" name="password2"><br>

        <input type="submit" value="Mettre à jour" id="submit" name="submit">
    </form>

    

</div>