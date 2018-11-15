<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>


<?php 

if(isset($_GET['delid'])){

      	$delid = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['delid']);
      	 $deletePost   =$pt->deletePostById($delid);
      }

?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Post List</h2>
        <div class="block"> 
                <?php 
        		     if (isset($deletePost)) {
        		      echo $deletePost;
        		     }

        		 ?> 
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th width="5%">SL NO</th>
					<th width="15%">Post Title</th>
					<th width="15%">Description</th>
					<th width="10%">Category</th>
					<th width="10%">Image</th>
					<th width="5%">Author</th>
					<th width="10%">Tages</th>
					<th width="15%">Date</th>
					<th width="15%">Action</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				    $getAllPost = $pt->getAllPost();
				    if ($getAllPost)
				    $i=0; {
				    	while ($result = $getAllPost->fetch_assoc()) {
				    		$i++;
				   
				?>
				<tr class="odd gradeX">
					<td><?php echo $i;?></td>
					<td><?php echo $result['title'];?></td>
					<td><?php echo $fm->textshorten($result['body'],55);?></td>
					<td><?php echo $result['catName'];?></td>
					<td><img src="<?php echo $result['image'];?>"  height="50px" width="70px"/></td>
					<td><?php echo $result['author'];?></td>
					<td><?php echo $result['tags'];?></td>
					<td><?php echo $fm->formatDate($result['date']);?></td>
					<td><a href="viewpost.php?viewpostid=<?php echo $result['id'];?>">View</a>
						<?php 
						   if (Session::get("adminID")==$result['userId'] ||Session::get("adminRole")=='0') { ?>

					 ||<a href="postedit.php?postid=<?php echo $result['id'];?>">Edit</a> 
					 || <a onclick="return confirm('Are you sure to Delete !')" href="?delid=<?php echo $result['id'];?>">Delete</a>

					 <?php }?>
					</td>
				
				</tr>

			<?php } }?>


					</tbody>		
				
				</table>

				
			  
               </div>
            </div>
        </div>

         <script type="text/javascript">

        $(document).ready(function () {
            setupLeftMenu();

            $('.datatable').dataTable();
            setSidebarHeight();


        });
    </script>
<?php  include 'inc/footer.php';?>        

