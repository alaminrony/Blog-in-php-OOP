<?php include 'inc/header.php'?>
<?php 
   if(!isset($_GET['page']) || $_GET['page']== NULL) {
       header("Location:404.php");
       }

       else{
         
        $id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['page']);

       }

?>

        <?php 
                   $getPageById = $pt->getPageById($id);
                    if ($getPageById) {
                     while($result=$getPageById->fetch_assoc()) {

             ?>  

	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<div class="about">
				<h2><?php echo $result['name'];?></h2>
	
				<?php echo $result['body'];?>
	</div>

</div>
<?php  } } else{header("Location:404.php"); }?>
<?php include 'inc/sidebar.php'?>		
<?php include 'inc/footer.php'?>
	