<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

<?php
   if (!Session::get("adminRole")=='0') { ?>
      echo "<script> window.location='index.php';</script>";
<?php }?>


<?php
  
  if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])){
    $insertUser = $us->InsertUser($_POST);
  }

?>


        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add New User</h2>
               <div class="block copyblock ">
                   <?php
                    if(isset($insertUser)){
                        echo $insertUser;

                    } 
                 
                 ?>  
                 <form action="" method="post" >
                    <table class="form"> 
                     

                        <tr>
                           <td>
                              <label>User Name</label>
                            </td>

                            <td>
                                <input type="text" name="adminUser" placeholder="Enter User Name..."  class="medium" />
                            </td>
                        </tr>

                         <tr>
                           <td>
                                <label>Password</label>
                            </td>
                            <td>
                                <input type="text" name="adminPass" placeholder="Enter Password Name..." class="medium"   />
                            </td>
                        </tr>

                         <tr>
                           <td>
                                <label>Email</label> 
                            </td>
                            <td>
                                <input type="text" name="email" placeholder="Enter Valid Email..." class="medium"   />
                            </td>
                        </tr>


                         <tr>
                             <td>
                                <label>Admin Role</label>
                            </td>
                            <td>
                                <select id="select" name="role">
                                  <option>SELECT Role</option>
                                  <option value="0">Admin</option>
                                  <option value="1">Author</option>
                                  <option value="2">Editor</option>
                                </select>
                            </td>
                        </tr>

						             <tr> 
                            <td> </td>
                            <td>
                                <input type="submit" name="submit" Value="Creat" />
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