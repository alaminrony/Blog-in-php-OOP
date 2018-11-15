<?php include '../classes/Post.php'?>
<?php
     $pt = new Post();
       
       if(!isset($_GET['delpage']) || $_GET['delpage']== NULL) {     
       echo "<script> window.location='index.php';</script>";
       }

       else{
         
        $delPageId = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['delpage']);
        $delpage = $pt->deletePageById($delPageId);

       }  

  

?>



        