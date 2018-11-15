<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

<?php 
    if ($_SERVER['REQUEST_METHOD']=='POST'  && isset($_POST['submit'])) {
        $UpdateTitleSlogan = $pt->updateTitleSlogan($_POST, $_FILES);
    }

?>


<div class="grid_10">

    <div class="box round first grid">
        <h2>Update Site Title and Description</h2>
         <?php
             if (isset($UpdateTitleSlogan)) {
                 echo $UpdateTitleSlogan;
             }

          ?>
        <div class="block sloginblock"> 

       
        <?php 
              $title_slogan = $pt->getTitleSlogan();
              if ($title_slogan) {
                  while ($result = $title_slogan->fetch_assoc()) {
               
             ?>   
                  
         <form action=" " method="post" enctype="multipart/form-data">
              
            <table class="form">					
                <tr>
                    <td>
                        <label>Website Title</label>
                    </td>
                    <td>
                        <input type="text"   name="title" value="<?php echo $result['title'];?>" class="medium" />
                    </td>
                </tr>
				 <tr>
                    <td>
                        <label>Website Slogan</label>
                    </td>
                    <td>
                        <input type="text"  name="slogan" value="<?php echo $result['slogan'];?>" class="medium" />
                    </td>
                </tr>

                <tr>
                    <td>
                        <label>Upload Logo</label>
                    </td>
                    
                      <td>
                        <img src="<?php echo $result['logo'];?>"  height="80px" width="200px"/><br/>
                        <input type="file" name="logo" />
                                
                    </td>
                    
                </tr>
				 
				
				 <tr>
                    <td>
                    </td>
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
