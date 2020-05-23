<?php if (isset($success)): ?>
    <script type="text/javascript">
        myAlert('top', 'success', 'Request has been sent. We will check your request', 1500, './index.php');
    </script>
<?php endif; ?>
<div class="col-md-8 ml-auto mr-auto my-5">
    <div class="card bg-light">
        <div class="card-header bg-primary text-white">
            <h3>Borrow books</h3>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-10 col-xs-12 col-sm-6 my-3">
                <form action="" method="post">
                    <div class="form-group">
                        <table class="table table-striped text-center my-3">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Cover</th>
                                <th>Description</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($books as $key => $book): ?>
                                <tr>
                                    <td><input type="checkbox" id="checkbook<?php echo $key ?>" name="checkList[]" value="<?php echo $book->getId() ?>"
                                               class="form-check form-check-inline"></td>
                                    <td><label for="checkbook<?php echo $key ?>"><?php echo $book->getTitle(); ?></label></td>
                                    <td><label for="checkbook<?php echo $key ?>"><img class="cover" src="<?php echo './image/book-cover/' . $book->getCover(); ?>" alt="image"></label></td>
                                    <td class="text-left"><label for="checkbook<?php echo $key ?>"><span class="text"><?php echo $book->getDescription(); ?></span></label></td>
                                    <td><input type="hidden" name="borrowerId"
                                               value="<?php echo $_SESSION['userID']; ?>"></td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <button type="submit" class="btn btn-primary">Borrow</button>
                </form>
            </div>
        </div>
    </div>
</div>