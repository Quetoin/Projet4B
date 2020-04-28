<?php

$route = isset($article) && $article->getId() ? "editPost&articleId=".$article->getId() : "addPost";
$submit = $route === "addPost" ? "Envoyer" : "Mettre à jour";

$title = isset($article) && $article->getTitle() ? htmlspecialchars($article->getTitle()) : "";
$content = isset($article) && $article->getContent() ? htmlspecialchars($article->getContent()) : "";



?>

<form method="post" action="../public/index.php?route=<?=$route;?>">

    <label for="title">Titre : </label><br>
    <input type="text" id="title" name="title" value="<?=$title;?>" class="editable"><br>
    <?=isset($errors["title"]) ? $errors["title"] :"";?>

    <label for="content">Texte : </label><br>
    <input type="text" id="content" name="content" placeholder="<?=$content;?>" class="editable"></input><br>
    <?=isset($errors["content"]) ? $errors["content"] :"";?>

    <input type="submit" value="<?=$submit;?>" id="submit" name="submit">

</form>