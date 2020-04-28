<?php $this->title="Blog";?>
        
        <h2 class="titresWhite">Articles</h2>
        <div class="mainDiv">

            <div id="introListPosts">
                <p>Retrouvez ici la liste des chapitres de mon roman. Je vous saurais gré de vous montrer indulgent. En effet, écrire est une entreprise difficile qui s'accompagne de nombreuses heures de travail et d'insomnie.<br></p>
                <p>Cela dit, je vous demande également de garder un esprit critique et de ne pas hésiter à débattre de certains passages, j'essaierai de répondre autant que je peux.<br></p>
                <p>Bonne lecture mes amis !</p>

            </div>
        <?php

        	foreach($articles as $article){

        		?>
        		<div class="news">

		            <h3><a href="../public/index.php?route=post&articleId=<?=htmlspecialchars($article->getId());?>"><?=$article->getTitle();?></a></h3>

                    <p>Publié le : <?= htmlspecialchars($article->getDate());?>

		            <p><?= substr($article->getContent(),0,400);?>
                    <?=strlen($article->getContent()) > 400 ? "...<a href='../public/index.php?route=post&articleId=".htmlspecialchars($article->getId())."'><i>Lire la suite</i></a>" : "" ;?>
                    </p>

                    
                        <?php
                            if($article->getNbComments() === "0"){
                                ?><p> Pas de commentaire</p>
                        <?php
                            }elseif($article->getNbComments() === "1"){
                                ?><p> <a href="../public/index.php?route=post&articleId=<?=htmlspecialchars($article->getId());?>"><?=htmlspecialchars($article->getNbComments());?> commentaire</a></p>
                        <?php
                            }else {
                                ?><p><a href="../public/index.php?route=post&articleId=<?=htmlspecialchars($article->getId());?>"><?=htmlspecialchars($article->getNbComments());?> commentaires </a></p>
                        <?php
                            }
                        ?>
                        <button><a href="../public/index.php?route=post&articleId=<?=htmlspecialchars($article->getId());?>">Lire la suite</a></button>
		        </div>
		        <br>
        <?php
        	}
        ?>
        </div>
    </div>
