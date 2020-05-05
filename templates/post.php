<?php $this->title="Article";?>


<h1 class="titresWhite">Billet simple pour l'Alaska</h1>

<div class="mainDiv">


    <div id="postAlone">

        <?php
            if($this->session->get("role") === "admin"){
        ?>
                <form method="post" action="../public/index.php?route=editPost&articleId=<?=$article->getId();?>">

                    <h2><?=htmlspecialchars_decode($article->getTitle());?></h2>

                    <label for="content"></label><br>
                    <input type="text" id="content" name="content" value="<?=$article->getContent();?>" class="editable"><br>

                    <p>Publié le : <?= htmlspecialchars($article->getDate());?></p>

                    <input type="submit" value="Valider les changements" id="submit" name="submit">
                </form>
        <?php
            }else{
        ?>
                <h2><?=htmlspecialchars_decode($article->getTitle());?></h2>
                <p><?=htmlspecialchars_decode($article->getContent());?></p>

                <p>Publié le : <?= htmlspecialchars($article->getDate());?> par <?= htmlspecialchars($article->getAuthor());?></p>
        <?php
            }
        ?>
        

    </div>


    <br>

    <button><a href="../public/index.php?route=listPosts">Retour à la liste des articles</a></button>
    <button onclick="displayComments();" id="buttonDisplayComments">Afficher les commentaires</button>
    
</div>


<div class="mainDiv" id="comments">

        
        <h2>Commentaires</h2>

        <?php
            foreach($comments as $comment){
        ?>

            <div id="comment">
                <p><?= htmlspecialchars($comment->getContent());?></p>
                <p style="font-size:0.8em;"><i>Posté le <?= htmlspecialchars($comment->getDate());?> par <?= htmlspecialchars($comment->getAuthor());?></i></p>
                

                <?php
                if($comment->isFlag()){
                    ?>
                    <p>Ce commentaire a déjà été signalé</p>

                    <?php
                }else{
                    ?>
                    <button id="butSignaler"><a href="../public/index.php?route=flagComment&commentId=<?= $comment->getId(); ?>&articleId=<?=$article->getId();?>">Signaler le commentaire</a></button>
                    <?php
                        }
                    ?>
                    
            </div>
            <?php
                }
            ?>
        

        <h3>Ajouter un commentaire</h3>
            <?php include('form_comment.php'); ?>

</div>