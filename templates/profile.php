<?php $this->title = "Profil"; ?>


<div class="mainDiv">

	<button><a href="../public/index.php">Retour à l'accueil</a></button>

    <h3><?= $this->session->get('user'); ?></h3>

    <button><a href="../public/index.php?route=updatePassword">Modifier son mot de passe</a></button>

</div>

