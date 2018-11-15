<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
      
      if(isset($_GET['deluser'])){

      	$id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['deluser']);
      	 $deluser   =$us->delUserById($id);
      }

?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>User List</h2>
                <div class="block">
                	<?php
                      if (isset($deluser)) {
                   	  echo $deluser;
                     }
                     ?>

                  
                    <table class="data display datatable" id="example">

					<thead>
						<tr>
							<th width="10%">Serial No.</th>
							<th width="10%">Name</th>
              <th width="15%">User Name</th>
              <th width="15%">Email</th>
              <th width="20%">Details</th>  
              <th width="10%">Roles</th>        
							<th width="20%">Action</th>
						</tr>
					</thead>
					
					<tbody>
				 <?php
                   $getAllUser=$us->getAllUser();
                   
                   if ($getAllUser) {
                   	   $i=0;
                   	 while ($result = $getAllUser->fetch_assoc()) {
                   	$i++;

                ?>     
						<tr class="odd gradeX">
							<td><?php echo $i;?></td>
							<td><?php echo $result['adminName']?></td>
              <td><?php echo $result['adminUser']?></td>
              <td><?php echo $result['email']?></td>
              <td><?php echo $fm->textShorten($result['details'],40)?></td>
              <td>
                  <?php 
                       if ($result['role']==0) {
                        echo "Admin";
                        
                       }elseif ($result['role']==1) {
                         echo "Author";
                       }elseif ($result['role']==2) {
                         echo "Editor";
                       }

                  ?>
                  
              </td>
							<td><a href="viewuser.php?userid=<?php echo $result['adminID'];?>">
							View</a> 
              <?php
               if (Session::get("adminRole")=='0'){ ?>
                ||<a onclick="return confirm('Are you sure to Delete !')" href="?deluser=<?php echo $result['adminID'];?>">Delete</a>
               <?php }?>

               </td>
						</tr>
				<?php }}?>
						
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



