<?php
    require_once '../bl/business-logic-books.php';

    $bl = new BusinessLogicBooks;

    if(!empty($_POST['addBookName']) && !empty($_POST['addBookAuthor']) && !empty($_POST['addBookPrice'])) 
    {
        $book = new BookModel([

            'book_name' => $_POST['addBookName'],
            'author' => $_POST['addBookAuthor'],
            'price' => $_POST['addBookPrice']
        ]);

        $bl->set($book);

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="main.css"> -->
    <title>Book Store</title>
</head>
<body>

    <main class="container mt-4"> 
        <h1 class="mb-4 text-center">Welcome to Our BookStore</h2>

        <section class="row px-5">
            <form class="col mx-auto border border-secondary rounded" action='<?php echo basename($_SERVER['PHP_SELF']); ?>' method='POST'>
                <h2 class="text-center my-3">Add a Book</h2>
                <div class="row my-4">
                    <div class="col-10 input-group mx-auto mb-3">
                        <label class="pt-2 mr-3" for="addBookName">Book Name</label>
                        <input name='addBookName' class="form-control" id="addBookName" placeholder="Book Name">
                    </div>
                    <div class="col-10 input-group mx-auto mb-3">
                        <label class="pt-2 mr-3" for="addBookAuthor">Book Author</label>
                        <input name='addBookAuthor' class="form-control" id="addBookAuthor" placeholder="Book Author">
                    </div>
                    <div class="col-10 input-group mx-auto mb-3">
                        <label class="pt-2 mr-3" for="addBookPrice">Book Price</label>
                        <input name='addBookPrice' class="form-control" id="addBookPrice" placeholder="Book Price">
                    </div>
                </div>
                <div class="row justify-content-center my-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </section>

        <section class="row my-5 px-5">
            <form class="col mx-auto border border-secondary rounded" action='<?php echo basename($_SERVER['PHP_SELF']); ?>' method='POST'>
                <h2 class="text-center my-3">Select a Book</h2>
                <div class="row my-4">
                    <div class="col-10 input-group mx-auto my-2">
                        <label class="pt-2 mr-3" for="selectBookName">Book Name</label>
                        <input name='selectBookName' class="form-control" id="selectBookName" placeholder="Book Name">
                    </div>
                </div>
                <div class="row justify-content-center my-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </section>
    </main>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/mustache.js/2.3.2/mustache.js"></script>
<!-- <script src="main.js"></script> -->
</body>
</html>