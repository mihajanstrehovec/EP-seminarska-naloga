<!DOCTYPE html>

<link rel="stylesheet" type="text/css" href="<?= CSS_URL . "style.css" ?>">
<meta charset="UTF-8" />
<title>Edit entry</title>

<h1>Edit book</h1>

<p>[
<a href="<?= BASE_URL . "books" ?>">All books</a> |
<a href="<?= BASE_URL . "books/add" ?>">Add new</a>
]</p>

<form action="<?= BASE_URL . "books/edit" ?>" method="post">
    <input type="hidden" name="id" value="<?= $book["id"] ?>"  />
    <p><label>Author: <input type="text" name="author" value="<?= $book["author"] ?>" autofocus /></label></p>
    <p><label>Title: <input type="text" name="title" value="<?= $book["title"] ?>" /></label></p>
    <p><label>Price: <input type="number" name="price" value="<?= $book["price"] ?>" /></label></p>
    <p><label>Year: <input type="number" name="year" value="<?= $book["year"] ?>" /></label></p>
    <p><label>Description: <br/><textarea name="description" cols="70" rows="10"><?= $book["description"] ?></textarea></label></p>
    <p><button>Update record</button></p>
</form>

<form action="<?= BASE_URL . "books/delete" ?>" method="post">
    <input type="hidden" name="id" value="<?= $book["id"] ?>"  />
    <label>Delete? <input type="checkbox" name="delete_confirmation" /></label>
    <button type="submit" class="important">Delete record</button>
</form>
