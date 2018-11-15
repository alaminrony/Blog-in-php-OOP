<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php 
    if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])){
        $UpdateSocialMedia = $pt->Updatesocialmedia($_POST);
    }

?>

<div class="grid_10">

    <div class="box round first grid">
        <h2>Update Social Media</h2>
        <div class="block"> 
        <?php 
                   
                   $getAllSocialMedia = $pt->socialmedia();
                   if ($getAllSocialMedia) {
                       while ($result = $getAllSocialMedia->fetch_assoc()) {
                    
               

               ?>              
         <form action=" " method="POST" enctype="multipart/form-data">
            <table class="form">					
                <tr>
                    <td>
                        <label>Facebook</label>
                    </td>
                    <td>
                        <input type="text" name="facebook" value="<?php echo $result['facebook'];?>"  class="medium" />
                    </td>
                </tr>
				 <tr>
                    <td>
                        <label>Twitter</label>
                    </td>
                    <td>
                        <input type="text" name="twitter" value="<?php echo $result['twitter'];?>" class="medium" />
                    </td>
                </tr>
				
				 <tr>
                    <td>
                        <label>LinkedIn</label>
                    </td>
                    <td>
                        <input type="text" name="linkdin" value="<?php echo $result['linkdin'];?>" class="medium" />
                    </td>
                </tr>
				
				 <tr>
                    <td>
                        <label>Google Plus</label>
                    </td>
                    <td>
                        <input type="text" name="google" value="<?php echo $result['google'];?>" class="medium" />
                    </td>
                </tr>
				
				 <tr>
                    <td></td>
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
<?php include 'inc/footer.php';?>