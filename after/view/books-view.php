<?php
    require_once '../bl/business-logic-books.php';

    $bl = new BusinessLogicBooks;

    //  Add new book
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

        <section name="displayBooks">
            <section class="row my-5 px-5">
                <form class="col mx-auto border border-secondary rounded" action='<?php echo basename($_SERVER['PHP_SELF']); ?>' method='POST'>
                    <h2 class="text-center my-3">Select a Book</h2>
                    <div class="row mb-3">
                        <div class="col-10 input-group mx-auto">
                            <label class="pt-2 mr-3" for="selectBookName">Select by Book Name</label>
                            <select name='selectBookName' class="form-control" id="selectBookName">
                                <option></option>
                                <?php

                                $allBooks = $bl->get();

                                for ($i = 0; $i < count($allBooks); $i++) {
                                    
                                    echo '<option>' . $allBooks[$i]->getBookName() . '</option>';
                                    
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-10 input-group mx-auto">
                            <label class="pt-2 mr-3" for="selectBookAuthor">Select by Author</label>
                            <select name='selectBookAuthor' class="form-control" id="selectBookAuthor">
                                <option></option>
                                <?php

                                $allBooks = $bl->get();

                                for ($i = 0; $i < count($allBooks); $i++) {
                                    
                                    echo '<option>' . $allBooks[$i]->getBookAuthor() . '</option>';
                                    
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row justify-content-center mb-3">
                        <button name="btnShowBooks" type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </section>
            
            <section class="row my-5 px-5">
                <div class="<?php if(!empty($_POST['selectBookName']) || !empty($_POST['selectBookAuthor'])){?>col px-0 border border-secondary rounded<?php }/* Just show when need it */ ?>"> 
                    <?php 
                        if(!empty($_POST['selectBookName']) || !empty($_POST['selectBookAuthor'])) {

                            for ($i = 0; $i < count($allBooks); $i++) {

                                if ($_POST['selectBookName'] == $allBooks[$i]->getBookName() || $_POST['selectBookAuthor'] == $allBooks[$i]->getBookAuthor()) {
                    ?>
                                    <table class="table">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>Book Name</th>
                                                <th>Author</th>
                                                <th>Price</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                    <?php
                                                echo '<td>' . $allBooks[$i]->getBookName() . '</td>';
                                                echo '<td>' . $allBooks[$i]->getBookAuthor() . '</td>';
                                                echo '<td>' . $allBooks[$i]->getBookPrice() . '</td>';
                    ?>
                                            </tr>
                                        </tbody>
                                    </table>
                    <?php
                                }
                            }
                        }
                    ?>
                </div>
            </section>
        </section>

            
        
    </main>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/mustache.js/2.3.2/mustache.js"></script>
<!-- <script src="main.js"></script> -->
</body>
</html>