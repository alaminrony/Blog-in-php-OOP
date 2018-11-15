<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php 
    if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])) {
        $copyright =$_POST['copyright'];
        $UpdateCopyright = $pt->UpdateCopyright($copyright);
        
    }
?>

        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Update Copyright Text</h2>
                 <?php 
                   if (isset($UpdateCopyright)) {
                       echo $UpdateCopyright;
                   }
                ?> 
                
                <div class="block copyblock">
                    
            <?php 
                $Copyright = $pt->Copyright();
                if ($Copyright) {
                  while ($result =$Copyright->fetch_assoc()) {
            ?>

                 <form action=" " method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text"  name="copyright" value="<?php echo $result['copyright'];?>" class="large" />
                            </td>
                        </tr>
						
						 <tr> 
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
