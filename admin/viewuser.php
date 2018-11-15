<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>



<?php 
if(!isset($_GET['userid']) || $_GET['userid']== NULL) {
       echo "<script> window.location='userlist.php';</script>";
       }

       else{
         
        $id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['userid']);


       }

if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])){
   echo "<script> window.location='userlist.php';</script>";
  }

?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>View User Profile</h2>
               <div class="block ">

                
          
                 <?php
                        //User.php 132 no line

                    $ViewUserById=$us->ViewUserById($id);
                    if($ViewUserById){
                      while ($result= $ViewUserById->fetch_assoc()) {
                  

                 ?>


                 <form action=" " method="post">
                    <table class="form">					
                        <tr>
                          <td>
                            <label>Name</label>
                          </td>

                            <td>
                                <input type="text" readonly value="<?php echo $result['adminName'];?>" />
                            </td>
                        </tr>

                        <tr>
                           <td>
                            <label>User Name</label>
                          </td>
                            <td>
                                <input type="text" readonly value="<?php echo $result['adminUser'];?>"   />
                            </td>
                        </tr>

                        <tr>
                           <td>
                            <label>User Email</label>
                          </td>
                            <td>
                                <input type="text" readonly value="<?php echo $result['email'];?>"  />
                            </td>
                        </tr>

                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Details</label>
                            </td>
                            <td>
                                <textarea class="tinymce" ><?php echo $result['details'];?></textarea>
                            </td>
                        </tr>
                        
                            

						            <tr> 
                           <td> </td>
                            <td>
                                <input type="submit" name="submit" Value="Ok" />
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