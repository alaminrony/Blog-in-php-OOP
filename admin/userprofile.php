<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php 
     $userId   = Session::get("adminID");
     $userRole = Session::get("adminRole");
 
?>


<?php 
if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])){
   $updateUser = $us->updateUser($_POST,$userId);
  }

?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Update User Profile</h2>
               <div class="block ">

                 <?php
                    if(isset($updateUser)){
                        echo $updateUser;

                    }
                 
                 ?>  

                 <?php
                    $getUser  =$us->getUserById($userId,$userRole);
                    if($getUser){
                      while ($result= $getUser->fetch_assoc()) {
                  

                 ?>


                 <form action=" " method="post">
                    <table class="form">					
                        <tr>
                          <td>
                            <label>Name</label>
                          </td>

                            <td>
                                <input type="text" name="adminName" value="<?php echo $result['adminName'];?>" />
                            </td>
                        </tr>

                        <tr>
                           <td>
                            <label>User Name</label>
                          </td>
                            <td>
                                <input type="text" name="adminUser" value="<?php echo $result['adminUser'];?>"   />
                            </td>
                        </tr>

                        <tr>
                           <td>
                            <label>User Email</label>
                          </td>
                            <td>
                                <input type="text" name="email" value="<?php echo $result['email'];?>"  />
                            </td>
                        </tr>

                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Details</label>
                            </td>
                            <td>
                                <textarea class="tinymce" name="details"><?php echo $result['details'];?></textarea>
                            </td>
                        </tr>
                        
                            

						            <tr> 
                           <td> </td>
                            <td>
                                <input type="submit" name="submit" Value="Update" />
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