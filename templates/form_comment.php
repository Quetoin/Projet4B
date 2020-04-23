<?php

$route = isset($post) && $post->get("id") ? "editComment" : "addComment";
$submit = $route === "addComment" ? "Ajouter" : "Mettre à jour";

$content = isset($post) ? htmlspecialchars($post->get("content")) : "";
$author = isset($post) ? htmlspecialchars($post->get("author")) : "";

?>

<form method="post" action="../public/index.php?route=addComment&articleId=<?= htmlspecialchars($article->getId()); ?>">

    <label for="content">Message</label><br>
    <textarea id="content" name="content" placeholder="<?=$content?>"></textarea><br>
     <?= isset($errors['content']) ? $errors['content'] : ''; ?>

    <input type="submit" value="<?=$submit?>" id="submit" name="submit">

</form>
