<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php

  if(!isset($_GET['viewpostid']) || $_GET['viewpostid']== NULL) {
       echo "<script> window.location='postlist.php';</script>";
       }

       else{
         
        $id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['viewpostid']);

       }

 
  if($_SERVER['REQUEST_METHOD'] =='POST' && isset($_POST['submit'])){
    echo "<script> window.location='postlist.php';</script>";
  }

?>



        <div class="grid_10">		
            <div class="box round first grid">
                <h2>View Post</h2>
                <div class="block">  


                <?php
                    $getpost  = $pt->AllPostById($id);
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
                                <input type="text" readonly value="<?php echo $value['title'];?>" class="medium" />
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
                                <label>Image</label>
                            </td>
                            <td>
                                <img src="<?php echo $value['image'];?>"  height="80px" width="200px"/><br/>
                                <input type="file" />
                                
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label>Author Name</label>
                            </td>
                            <td>
                                <input type="text" value="<?php echo $value['author'];?>" />
                                
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label>Tages</label>
                            </td>
                            <td>
                                <input type="text"  value="<?php echo $value['tags'];?>" />
                            </td>
                        </tr>

                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Content</label>
                            </td>
                            <td>
                                <textarea class="tinymce">
                                  <?php echo $value['body'];?>
                                    
                                  </textarea>
                            </td>
                        </tr>
						<tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="OK" />
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



 




