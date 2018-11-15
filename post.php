<?php include 'inc/header.php';?>
<?php
  if (!isset($_GET['id']) || $_GET['id']== NULL) {
  	header("Location:404.php");
  	
  } else{
  	$id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['id']);
  }

?>

	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<div class="about">
			<?php
			   $post = $pt->AllPostById($id);
			   
			    if ($post) {
			    	while ($result = $post->fetch_assoc()) {
			 
			      ?>
			
				<h2><?php echo $result['title'];?></h2>
				<h4><?php echo $fm->formatDate($result['date'])?>, By <a href="#"><?php echo $result['author'];?></a></h4>
				<a href="#"><img src="admin/<?php echo $result['image'];?>" alt="post image"/></a>

				<p>
					<?php  echo $result['body'];?>
				</p>

			 
				
				<div class="relatedpost clear">
					<h2>Related articles</h2>
					 <?php
				        $catid = $result['catId'];
				         $relatedPost=$pt->relatedPost($catid);
				        
				         if ($relatedPost) {
				          while ($rresult = $relatedPost->fetch_assoc()) {
			    
			        ?>

					 <a href="post.php?id=<?php echo $rresult['id'];?>">
					 	<img src="admin/<?php echo $rresult['image'];?>" alt="post image"/>
					 </a>
					
                 <?php }} else{ echo "No related Post Available.!!";}?>

				</div>
			<?php  } } else{header("Location:404.php"); }?>

	</div>
	
	
</div>

<?php include 'inc/sidebar.php';?>
<?php include 'inc/footer.php';?>
		