<?php

$route = isset($article) && $article->getId() ? "editPost&articleId=".$article->getId() : "addPost";
$submit = $route === "addPost" ? "Envoyer" : "Mettre à jour";

$title = isset($article) && $article->getTitle() ? htmlspecialchars($article->getTitle()) : "";
$content = isset($article) && $article->getContent() ? htmlspecialchars($article->getContent()) : "";
$author = isset($article) && $article->getAuthor() ? htmlspecialchars($article->getAuthor()) : "";



?>

<form method="post" action="../public/index.php?route=<?=$route;?>">

    <label for="title">Titre</label><br>
    <input type="text" id="title" name="title" value="<?=$title;?>"><br>

    <label for="content">Contenu</label><br>
    <textarea id="content" name="content" value="<?=$content;?>"></textarea><br>

    <label for="author">Auteur</label><br>
    <input type="text" id="author" name="author" value="<?=$author;?>"><br>

    <input type="submit" value="Envoyer" id="submit" name="submit">

</form>