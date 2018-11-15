       
		<div class="sidebar clear">
			<div class="samesidebar clear">
				
				<h2>Categories</h2>
				   <?php
			         $getAllCategory=$cat->getAllCat();                   
                     if ($getAllCategory) {                   	   
                   	 while ($result = $getAllCategory->fetch_assoc()) {
                  	?>
			  		
					<ul>
						<li><a href="posts.php?catid=<?php echo $result['catId'];?>"><?php echo $result['catName'];?></a></li>
											
					</ul>

				<?php }}?> 
			</div>


			
			
			<div class="samesidebar clear">
				
				<h2>Latest articles</h2>
					<?php
				    $LatestPost = $pt->LatestPost();
				   if ($LatestPost) {
				    	while ($result=$LatestPost->fetch_assoc()) {
				    

				   ?>
					<div class="popular clear">
						<h3><a href="post.php?id=<?php echo $result['id'];?>"><?php echo $result['title'];?></a></h3>
						<a href="#"><img src="admin/<?php echo $result['image'];?>" alt="post image"/></a>
				 
						<p><?php  echo $fm->textShorten($result['body'],125);?></p>	
					</div>

				<?php }} else{ header("Location:404.php");}?>

					
			</div>
			
		</div>