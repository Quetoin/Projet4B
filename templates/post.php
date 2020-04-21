<?php $this->title="Article";?>

<div class="mainDiv">


    <div>

        <h2><?= htmlspecialchars($article->getTitle());?></h2>
        <p><?= htmlspecialchars($article->getContent());?></p>
        <p><?= htmlspecialchars($article->getAuthor());?></p>
        <p>Créé le : <?= htmlspecialchars($article->getDate());?></p>

    </div>


    <br>

    <button><a href="../public/index.php">Retour à l'accueil</a></button>
    <button><a href="../public/index.php?route=editPost&articleId=<?=$article->getId();?>">Modifier l'article</a></button>
    <button><a href="../public/index.php?route=deletePost&articleId=<?=$article->getId();?>">Supprimer l'article</a></button>
    


    <div id="comments">
        <h3>Commentaires</h3>

        <?php
            foreach($comments as $comment){
        ?>

            <h4><?= htmlspecialchars($comment->getAuthor());?></h4>
            <p><?= htmlspecialchars($comment->getContent());?></p>
            <p>Posté le <?= htmlspecialchars($comment->getDate());?></p>
        
        <?php
            }
        ?>

    </div>
</div>