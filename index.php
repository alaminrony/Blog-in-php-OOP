<?php include 'inc/header.php';?>
<?php include 'inc/slider.php';?>

	

	<div class="contentsection contemplete clear">
		<div class="maincontent clear">

			<!--pagination   -->
			<?php 
			$per_page_content= 3;
			if (isset($_GET['pageid'])) {
				$page = $_GET['pageid'];
				
			}else{
				$page=1;
			}

			$start_form = ($page-1)*$per_page_content;
			

			?>
			<!--pagination   -->
			<?php
			  $query = "SELECT * FROM tbl_post LIMIT $start_form, $per_page_content";
			  $post  =$db->select($query);

			
			  if ($post) {
			  	while ($result = $post->fetch_assoc()) {
			  		
			  	
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
			<?php } ?>
			<!--pagination   -->
			<?php
			  $query          ="SELECT * FROM tbl_post";
			  $result         = $db->select($query);
			  $total_row      = mysqli_num_rows($result);
			  $total_pages    =ceil($total_row/$per_page_content);
			 echo "<span class='pagination'><a href='index.php?pageid=1'>".'First Page'."</a>";
             for ($i=1; $i <=$total_pages ; $i++) { 
                echo "<a href='index.php?pageid=".$i."'>".$i."</a>";
             	
             }

			
			 echo "<a href='index.php?pageid=$total_pages'>".'Last Page'."</a></span>"?>

			<!--end of pagination   -->

		<?php } else{
			header("Location:404.php");
		}?>
			
		

		</div>
<?php include 'inc/sidebar.php';?>
<?php include 'inc/footer.php';?>