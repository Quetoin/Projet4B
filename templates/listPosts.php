<?php $this->title="Blog";?>
        
        <h2 class="titresWhite">Articles</h2>
        <div class="mainDiv">
            <button><a href="../public/index.php?route=addPost">Nouvel article</a></button>
        <?php

        	foreach($articles as $article){

        		?>
        		<div class="news">
		            <h3><a href="../public/index.php?route=post&articleId=<?=htmlspecialchars($article->getId());?>"><?= htmlspecialchars($article->getTitle());?></a></h3>
		            <p><?= htmlspecialchars($article->getContent());?></p>
		            <p>Créé le : <?= htmlspecialchars($article->getDate());?> par <?= htmlspecialchars($article->getUser_id());?></p>
		        </div>
		        <br>
        <?php
        	}
        ?>
        </div>
    </div>
