<?php include 'inc/header.php';?>
<?php include 'inc/slider.php';?>

<?php
   if(!isset($_GET['catid']) || $_GET['catid']== NULL) {
       echo "<script> window.location='404.php';</script>";
       }

       else{
         
        $id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['catid']);
         $getPostByCatId= $pt->getPostByCatId($id);

       }


?>

	

	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<?php
			   if ($getPostByCatId) {
			   	 while ($result=$getPostByCatId->fetch_assoc()) {
			
			?>

		
		
			<div class="samepost clear">
				<h2><a href="post.php?id=<?php echo $result['id'];?>"><?php echo $result['title'];?></a></h2>
				<h4><?php echo $fm->formatDate($result['date'])?>, By <a href="#"><?php echo $result['author'];?></a></h4>
				 <a href="#"><img src="admin/<?php echo $result['image'];?>" alt="post image"/></a>
				 
				<p><?php  echo $fm->textShorten($result['body']);?></p>
					
				
				<div class="readmore clear">
					<a href="post.php?id=<?php echo $result['id'];?>">Read More</a>
				</div>
			</div>

		<?php  } } else{ header("Location:404.php");} ?>


			
		

		</div>
<?php include 'inc/sidebar.php';?>
<?php include 'inc/footer.php';?>