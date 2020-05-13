<?php

?>
<h3>LIST BOOKS</h3>
<table class="table table-bordered table-dark">
    <thead>
    <tr>
        <th scope="col">Id</th>
        <th scope="col">Title</th>
        <th scope="col">Author</th>
        <th scope="col">Category</th>
        <th scope="col">Publisher</th>
        <th scope="col">Copyright Year</th>
        <th scope="col">Description</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($books

    as $key => $book): ?>
    <tr>
        <th scope="row"><?php echo ++$key; ?></th>
        <td><?php echo $book->getTitle(); ?></td>
        <td><?php echo $book->getAuthors(); ?></td>
        <td><?php echo $book->getSubjectId(); ?></td>
        <td><?php echo $book->getPublisher(); ?></td>
        <td><?php echo $book->getCopyrightYear(); ?></td>
        <td><?php echo $book->getDescription(); ?></td>

        <td>
            <a class="btn btn-primary btn-sm" href="listBook.php?page=update&id=<?php echo $book->getId(); ?>"
               role="button">Edit</a>
            <a class="btn btn-danger btn-sm" href="listBook.php?page=delete&id=<?php echo $book->getId(); ?>"
               role="button">Delete</a>
            <a class="btn btn-info btn-sm" href="listBook.php?page=details&id=<?php echo $book->getId(); ?>"
               role="button">Details</a>
        </td>

        <?php endforeach ?>
    </tbody>
</table>