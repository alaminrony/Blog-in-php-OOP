<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php

  if(!isset($_GET['postid']) || $_GET['postid']== NULL) {
       echo "<script> window.location='postlist.php';</script>";
       }

       else{
         
        $postid = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['postid']);

       }

 $pt =new Post();
  if($_SERVER['REQUEST_METHOD'] =='POST' && isset($_POST['submit'])){
     $updatePost = $pt->postUpdate($_POST, $_FILES, $postid);
  }

?>



        <div class="grid_10">		
            <div class="box round first grid">
                <h2>Update Post</h2>
                <div class="block">  

                <?php
                  if(isset($updatePost)){
                    echo $updatePost;

                  }


                ?>  

                <?php
                    $getpost  = $pt->AllPostById($postid);
                    if($getpost ){
                      while ($value= $getpost->fetch_assoc()) {
                        
                     

                 ?>                
                 <form action="" method="post" enctype="multipart/form-data">
                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>Title</label>
                            </td>
                            <td>
                                <input type="text"  name="title" value="<?php echo $value['title'];?>" class="medium" />
                            </td>
                        </tr>
                     
                        <tr>
                            <td>
                                <label>Category</label>
                            </td>
                            <td>
                                <select id="select" name="catId">
                                    <option>Select Category</option>
                                     <?php
                                          $cat      = new Category();
                                          $getCat   =$cat->getAllCat();
                                          if ($getCat) {
                                            while ($result =$getCat->fetch_assoc()) {
                                                ?>
                                                
                                           <option
                                           <?php
                                           if ($value['catId'] == $result['catId']) {   ?>
                                            selected = "selected"
                                         
                                         <?php  } ?>  value="<?php echo $result['catId'];?>"><?php echo $result['catName'];?>
                                             
                                        </option>


                                  <?php } }?>
                                </select>
                            </td>
                        </tr>
                   
                    
        
                        <tr>
                            <td>
                                <label>Upload Image</label>
                            </td>
                            <td>
                                <img src="<?php echo $value['image'];?>"  height="80px" width="200px"/><br/>
                                <input type="file" name="image" />
                                
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label>Author Name</label>
                            </td>
                            <td>
                                <input type="text" name="author" value="<?php echo $value['author'];?>" />
                                <input type="hidden" name="userId"  value="<?php echo Session::get('adminID');?>" />
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label>Tages</label>
                            </td>
                            <td>
                                <input type="text" name="tags" value="<?php echo $value['tags'];?>" />
                            </td>
                        </tr>

                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Content</label>
                            </td>
                            <td>
                                <textarea class="tinymce" name="body"><?php echo $value['body'];?></textarea>
                            </td>
                        </tr>
						<tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
                <?php }}?>
                </div>
            </div>
        </div>

        <!-- Load TinyMCE -->
    <script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            setupTinyMCE();
            setDatePicker('date-picker');
            $('input[type="checkbox"]').fancybutton();
            $('input[type="radio"]').fancybutton();
        });
    </script>
     <!-- Load TinyMCE -->

<?php include 'inc/footer.php';?>



 




