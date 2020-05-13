<div class="alert alert-warning" role="alert">
    DO YOU WANT DELETE <?php echo $book->getTitle();?>!
</div>
<form action="./index.php?page=deleteBook" method="post">
    <input type="hidden" name="confirm" value="<?php echo $book->getId(); ?>"/>
    <div class="form-group">
        <button type="submit" class="btn btn-danger">Delete</button>
        <a class="btn btn-secondary" href="index.php">Cancel</a>
    </div>
</form>