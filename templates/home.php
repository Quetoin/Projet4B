<?php $this->title="Accueil";?>
        
        <div class="mainDiv">
            <a href="../public/index.php?route=addPost">Nouvel article</a>
        <?php

        	foreach($articles as $article){

        		?>
        		<div>
		            <h2><a href="../public/index.php?route=post&articleId=<?=htmlspecialchars($article->getId());?>"><?= htmlspecialchars($article->getTitle());?></a></h2>
		            <p><?= htmlspecialchars($article->getContent());?></p>
		            <p><?= htmlspecialchars($article->getAuthor());?></p>
		            <p>Créé le : <?= htmlspecialchars($article->getDate());?></p>
		        </div>
		        <br>
        <?php
        	}
        ?>
        </div>
    </div>
