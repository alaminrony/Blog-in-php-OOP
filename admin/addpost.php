﻿<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php

 $pt =new Post();
  if($_SERVER['REQUEST_METHOD'] =='POST' && isset($_POST['submit'])){
     $insertPost = $pt->postInsert($_POST, $_FILES);
  }

?>



        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add New Post</h2>
                <div class="block">  

                <?php
                  if(isset($insertPost)){
                    echo $insertPost;

                  }


                ?>               
                 <form action="addpost.php" method="post" enctype="multipart/form-data" >
                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>Title</label>
                            </td>
                            <td>
                                <input type="text" placeholder="Enter Post Title..." name="title"  />
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
                                                
                                           <option value="<?php echo $result['catId'];?>"><?php echo $result['catName'];?></option>

                                  <?php } }?>
                                </select>
                            </td>
                        </tr>
                   
                    
        
                        <tr>
                            <td>
                                <label>Upload Image</label>
                            </td>
                            <td>
                                <input type="file" name="image" />
                            </td>
                        </tr>

                         <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Content</label>
                            </td>
                            <td>
                                <textarea class="tinymce" name="body"></textarea>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label>Author Name</label>
                            </td>
                            <td>
                                <input type="text" name="author"  value="<?php echo Session::get('adminName');?>" />
                                 <input type="hidden" name="userId" value="<?php echo Session::get('adminID');?>" />
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label>Tages</label>
                            </td>
                            <td>
                                <input type="text" name="tags" />
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



 




