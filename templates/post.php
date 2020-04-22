<?php $this->title="Article";?>

<div class="mainDiv">


    <div>

        <h2><?= htmlspecialchars($article->getTitle());?></h2>
        <p><?= htmlspecialchars($article->getContent());?></p>
        <p><?= htmlspecialchars($article->getAuthor());?></p>
        <p>Créé le : <?= htmlspecialchars($article->getDate());?></p>

    </div>


    <br>

    <button><a href="../public/index.php?route=listPosts">Retour à l'accueil</a></button>
    <button><a href="../public/index.php?route=editPost&articleId=<?=$article->getId();?>">Modifier l'article</a></button>
    <button><a href="../public/index.php?route=deletePost&articleId=<?=$article->getId();?>">Supprimer l'article</a></button>
    


    <div id="comments">

        <h3>Ajouter un commentaire</h3>
            <?php include('form_comment.php'); ?>
            
        <h3>Commentaires</h3>

        <?php
            foreach($comments as $comment){
        ?>

            <h4><?= htmlspecialchars($comment->getAuthor());?></h4>
            <p><?= htmlspecialchars($comment->getContent());?></p>
            <p>Posté le <?= htmlspecialchars($comment->getDate());?></p>
            

            <?php
            if($comment->isFlag()){
                ?>
                <p>Ce commentaire a déjà été signalé</p>

                <?php
            }else{
                ?>
                <button><a href="../public/index.php?route=flagComment&commentId=<?= $comment->getId(); ?>&articleId=<?=$article->getId();?>">Signaler le commentaire</a></button>
                <?php
                    }
                ?>
                <button><a href="../public/index.php?route=deleteComment&commentId=<?=$comment->getId();?>&articleId=<?=$article->getId();?>">Supprimer le commentaire</a></button>

        <?php
            }
        ?>

    </div>
</div>