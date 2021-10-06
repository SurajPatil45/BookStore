<?php
    require_once("db.php");

    $con = Createdb();

    //create button click 
    //create
    if(isset($_POST['create'])){
        createData(); 
    }

    // //read
    // if(isset($_POST['read'])){
    //     getData(); 
    // }


    //update
    if(isset($_POST['update'])){
        updateData(); 
    }

    //update
    if(isset($_POST['delete'])){
        deleteRecord(); 
    }


    //Insert data
    function createData(){
            $bookname = textboxValue('book_name');
            $bookpublisher = textboxValue('book_publisher');
            $bookprice = textboxValue('book_price');

        if($bookname && $bookpublisher && $bookprice){
            $sql = "INSERT into books(book_name,book_publisher,book_price) 
                    values ('$bookname','$bookpublisher','$bookprice')";

                if(mysqli_query($GLOBALS['con'],$sql)){
                    textNode("success","Record inserted successfully.");
                }
                else {
                    echo "Error";
                }
        }
        else{
            textNode("error","Provide data in Textbox");
        }
    }

     function textboxValue($value){
        $textbox= mysqli_real_escape_string($GLOBALS['con'],trim($_POST[$value])); //trim secure from sql injection
        if(empty($textbox)){
             return false;
         }else {
             return $textbox;
         }
     }

     //message
     function textNode($classname,$msg){
         $element = "<h5 class='$classname'>$msg</h5>";
         echo $element;
     }



     //Get data from mysql database
     function getData(){
         $sql = "SELECT * from books";

         $result = mysqli_query($GLOBALS['con'],$sql);

         if(mysqli_num_rows($result)>0){
             return $result;
         }
     }


     //Update data
     function updateData(){
            $bookid = textboxValue("book_id");
            $bookname = textboxValue("book_name");
            $bookpublisher = textboxValue("book_publisher");
            $bookprice = textboxValue("book_price");

            if($bookname && $bookpublisher && $bookprice){
                $sql = "UPDATE books SET book_name='$bookname', book_publisher='$bookpublisher', book_price='$bookprice' WHERE id='$bookid'"; 
                    if(mysqli_query($GLOBALS['con'],$sql)){
                        textNode("success","Data updated successfully");
                    }else{
                        textNode("error","Enable to update data");
                    }
            }else{
                textNode("error","Select data to be updated using edit icon");
            }
     }


     //Delete record
     function deleteRecord(){
        $bookid = (int)textboxValue("book_id");

        $sql = "DELETE from books  WHERE id='$bookid'";
        if(mysqli_query($GLOBALS['con'],$sql)){
            textNode("success","Record deleted successfully");
        }else{
            textNode("error","Enable to delete record");
        }
     }


    //  //delete all
    //  function deletebtn(){
    //      $result = getData();
    //      $i = 0;

    //      if($result){
    //          while($row=mysqli_fetch_assoc($result)){
    //                 $i++;
    //                 if($i>10){

    //                 }
    //          }
    //      }
    //  }
?>