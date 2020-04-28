<?php $this->title = "Profil"; ?>

<?= $this->session->show('update_password_false'); ?>

<div class="mainDiv">

	<button><a href="../public/index.php">Retour à l'accueil</a></button>

    <h3><?= $this->session->get('user'); ?></h3>

    <button><a href="../public/index.php?route=updatePassword">Modifier mon mot de passe</a></button>
    <button><a href="../public/index.php?route=deleteAccount">Supprimer mon compte</a></button>

</div>

