<?php $this->title = "Administration"; ?>


<?= $this->session->show("add_post");?>
<?= $this->session->show("edit_post");?>
<?= $this->session->show('delete_post'); ?>
<?php echo $this->session->get('id'); ?>

<h2 class="titresWhite">Page d'administration</h2>

<button><a href="../public/index.php">Retour à l'accueil</a></button>

<div class="mainDiv">

	
	<h3>Bienvenue sur votre page d'administration</h3>

	<button><a href="../public/index.php?route=addPost">Nouvel article</a></button>

	<p>Ici, vous pouvez rajouter ou modifier un article, valider ou non des commentaires, ou encore supprimer des comptes</p>


	<?php
        foreach($articles as $article){

       ?>
        	<div class="news">
		        <h3><a href="../public/index.php?route=post&articleId=<?=htmlspecialchars($article->getId());?>"><?= htmlspecialchars($article->getTitle());?></a></h3>
		        <p><?= htmlspecialchars($article->getContent());?></p>
		        <p>Créé le : <?= htmlspecialchars($article->getDate());?> par <?= htmlspecialchars($article->getAuthor());?></p>
		    </div>
		    <br>
        <?php
        	}
        ?>
    

</div>