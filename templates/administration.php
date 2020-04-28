<?php $this->title = "Administration"; ?>


<?= $this->session->show("add_post");?>
<?= $this->session->show("edit_post");?>
<?= $this->session->show('delete_post'); ?>

<h2 class="titresWhite">Page d'administration</h2>

<div class="mainDiv" id="mainDivAdministration">

	

	<button><a href="../public/index.php?route=addPost">Nouvel article</a></button>

	<h2>Liste des articles</h2>

	<table id="tablePosts">
		<tr class="tr0">
			<td class="title">Titre</td>
			<td class="content">Contenu</td>
			<td class="date">Date</td>
			<td class="actions">Actions</td>
		</tr>

		<?php
		$countTr = 0;
	        foreach($articles as $article){
				if($countTr === 0){
					$countTr=1;
				}else{
					$countTr = 0;
				}
	       ?>
	       
	       <tr class="tr<?=$countTr;?>">
		        <td class="title"><a href="../public/index.php?route=post&articleId=<?=htmlspecialchars($article->getId());?>"><?= $article->getTitle();?></a></td>
		        <td class="content"><?= substr($article->getContent(),0,150);?>...<a href="../public/index.php?route=post&articleId=<?=htmlspecialchars($article->getId());?>"><i>Lire la suite</i></a></td>
		        <td class="date"><?= htmlspecialchars($article->getDate());?></td>
		        <td class="actions">
		        	<span title="Modifier l'article"><a href="../public/index.php?route=post&articleId=<?=htmlspecialchars($article->getId());?>" onclick="startingTiny();"><i class="far fa-edit"></i></a></span>
		        	<span title="Supprimer l'article"><a href="../public/index.php?route=deletePost&articleId=<?=$article->getId();?>"><i class="far fa-trash-alt"></i></a></span>
		        </td>
		    </tr>
	        <?php
	        	}
	        ?>
	</table>

        <h2>Commentaires signalés</h2>

       	<?php

        if(count($comments) === 0){
        	echo "<p>Il n'y a aucun commentaire signalé</p>";
        }else{
        	?>

        	<table id="tableFlagComments">
				<tr class="tr0">
					<td>Date</td>
					<td>Auteur</td>
					<td>Contenu</td>
					<td>Actions</td>
				</tr>

        <?php
        $countTr = 0;
	        foreach($comments as $comment){
	        	if($countTr === 0){
					$countTr=1;
				}else{
					$countTr = 0;
				}
	       ?>
	       		<tr class="tr<?=$countTr;?>">
	       			<td class="date"><?= htmlspecialchars($comment->getDate());?></td>
			        <td class="author"><?= htmlspecialchars($article->getAuthor());?></td>
			        <td class="content"><?= htmlspecialchars($comment->getContent());?></td>
			        <td class="actions">
		        		<span title="Supprimer le commentaire"><a href="../public/index.php?route=deleteComment&commentId=<?=$comment->getId();?>"><i class="far fa-trash-alt"></i></a></span>
		        		<span title="Valider le commentaire"><a href="../public/index.php?route=unflagComment&commentId=<?=$comment->getId();?>"><i class="far fa-check-circle"></i></a></span>
				    </td>
			    </tr>
	        <?php
	        }?>
	    </table>
<?php
	    }

        ?>

        <h2>Liste des utilisateurs</h2>

        <table id="tableUsers">
				<tr class="tr0">
					<td>Pseudo</td>
					<td>Rôle</td>
					<td class="actions">Actions</td>
				</tr>

        <?php
        $countTr = 0;
        foreach($users as $user){
        	if($countTr === 0){
					$countTr=1;
				}else{
					$countTr = 0;
				}
       ?>
        	<tr class="tr<?=$countTr;?>">

		        <td><?= htmlspecialchars($user->getUser());?></td>
		        <td><?= (htmlspecialchars($user->getRole()) === "1") ? "Administrateur" : "Utilisateur";?></td>
				<td><span title="Supprimer l'utilisateur'"><a href="../public/index.php?route=deleteUser&userId=<?=$user->getId();?>"><i class="far fa-trash-alt"></i></a></span></td>

		    </tr>
        <?php
        	}
        ?>
    
    </table>
</div>