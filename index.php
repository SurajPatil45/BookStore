<?php

    require_once("../bookstore/php/operation.php");  

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books</title>
    <script src="https://kit.fontawesome.com/d577a802ab.js" crossorigin="anonymous"></script>
   
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
   <main>
       <div class="container text-center">
           <h1 class="py-4 bg-dark text-light rounded"><i class="fas fa-swatchbook"></i> Book Store</h1>
           <div class="d-flex justify-content-center">
               
           <form action="" method="POST" class="w-50">
                   
                    <div class="py-2">                       <!-- Division class with padding 2  -->
                        <div class="input-group mb-3">
                        <div class="input-group-prepend">
                         <span class="input-group-text bg-warning"><i class="fas fa-id-badge"></i></span>
                        </div>
                         <input type="text" autocomplete="off" class="form-control" placeholder="ID" name="book_id" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                    </div>

                    <div class="pt-2">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                         <span class="input-group-text bg-warning"><i class="fas fa-book"></i></span>
                        </div>
                         <input type="text" autocomplete="off" class="form-control" placeholder="Book Name" name="book_name" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                    </div>

                    <div class="row pt-2">
                        <div class="col">
                            <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-warning"><i class="fas fa-people-carry"></i></span>
                            </div>
                                <input type="text" autocomplete="off" class="form-control" placeholder="Publisher" name="book_publisher" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                        </div>

                        <div class="col">
                            <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-warning"><i class="fas fa-dollar-sign"></i></span>
                            </div>
                                <input type="text" autocomplete="off" class="form-control" placeholder="Price" name="book_price" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                        </div>
                    </div>

                   <div class="d-flex justify-content-center">
                       <button class="btn btn-success" id="btn-create" name="create" data-toggle="tooltip" data-placement="bottom" title="Create"><i class="fas fa-plus"></i></button>
                       <button class="btn btn-primary" id="btn-read" name="read" data-toggle="tooltip" data-placement="bottom" title="Read"><i class="fas fa-sync"></i></button>
                       <button class="btn btn-light border" id="btn-update" name="update" data-toggle="tooltip" data-placement="bottom" title="Update"><i class="fas fa-pen-alt"></i></button>
                       <button class="btn btn-danger" id="btn-delete" name="delete" data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="fas fa-trash-alt"></i></button>
                   </div>
              </form>
           </div>

           <div class="d-flex table-data">
               <table class="table table-striped table-dark">
                   <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Book Name</th>
                            <th>Publisher</th>
                            <th>Book Price</th>
                            <th>Edit</th>
                        </tr>
                   </thead>
                   <tbody id="tbody">
                    <?php
                        
                        //read
                             if(isset($_POST['read'])){
                                       $result = getData(); 

                                if($result){
                                    while($row = mysqli_fetch_assoc($result)){?>
                                        <tr>
                                            <td data-id="<?php echo $row['id'];?>"><?php echo $row['id']; ?></td>
                                            <td data-id="<?php echo $row['id'];?>"><?php echo $row['book_name']; ?></td>
                                            <td data-id="<?php echo $row['id'];?>"><?php echo $row['book_publisher']; ?></td>
                                            <td data-id="<?php echo $row['id'];?>"><?php echo '$'.$row['book_price']; ?></td>
                                            <td><i class="fas fa-edit btnedit" data-id="<?php echo $row['id'];?>"></i></td>
                                        </tr>

                                    <?php
                                       
                                      }
                                }
                             }
                    ?>
                   
                   </tbody>
               </table>
           </div>


       </div>
   </main>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="../bookstore/php/main.js"></script>
</body>
</html>