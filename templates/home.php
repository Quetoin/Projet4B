<?php $this->title="Accueil";?>

    <div>
        <h1>Mon blog</h1>
        <p>En construction</p>

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
