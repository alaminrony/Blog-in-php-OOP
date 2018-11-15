<?php include 'inc/header.php';?>
<style>
.error{
	color: red;
	font-size: 15px;

}
</style>



<?php
  
   if($_SERVER['REQUEST_METHOD'] =='POST' && isset($_POST['submit'])){ 
   	
         $firstname   =$fm->validation($_POST['firstname']);
         $firstname   =mysqli_real_escape_string($db->link,$firstname);

    	 $lastname    =$fm->validation($_POST['lastname']);
    	 $lastname    =mysqli_real_escape_string($db->link,$lastname);

    	 $email       =$fm->validation($_POST['email']);
    	 $email       =mysqli_real_escape_string($db->link,$email);

     	 $body        =$fm->validation($_POST['body']);
	     $body        =mysqli_real_escape_string($db->link,$body);
	 	
	
    
	   if (empty($firstname)) {
	 	$error['firstname']= "Firstname is required";
	   }

	   elseif (!preg_match("/^[a-zA-Z ]*$/",$firstname)) {
      $error['firstname'] = "Only letters and white space allowed"; 
    }
    


   
	  if (empty($lastname)) {
	 	$error['lastname']= "Lastname is required";
	 }
 
	   elseif (!preg_match("/^[a-zA-Z ]*$/",$lastname)) {
      $error['lastname'] = "Only letters and white space allowed"; 
    } 
     


      
	  if (empty($email)) {
	 	$error['email']= "Email is required";
	 }
	  
	  elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $error['email'] = "Invalid email format"; 
    }
    





	  else {
	  	$query= "INSERT INTO tbl_contact(firstname,lastname,email,body) 
		    	VALUES('$firstname','$lastname','$email','$body')";

        	    $inserted_row =$db->insert($query);
        	               if($inserted_row){
        		           $msg ="Message send successfully !!";
        		           
        	               }

        	               else {
                          $msg=  "Message not successfully!";                         

		                    }

	                   }

	                }   

?>


	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<div class="about">
				<h2>Contact us</h2>
				<?php 
				    if (isset($msg)) {
				    	echo "<span style='color:green'>$msg</span>" ;
				    }

				?>  


			<form action="" method="post">
				<table>					
				<tr>
					<td>Your First Name:<font style="color: red;">*</font></td>
					
					<td>
						
						<input type="text" name="firstname" placeholder="Enter first name" value="<?php if(isset($firstname)){echo $firstname;}?>" />
						  <?php
					          if (isset($error['firstname'])) {
					   	        echo "<span class='error'>".$error['firstname']."</span>";
					         }
					        ?>
						
					</td>
				</tr>
				<tr>
					<td>Your Last Name:<font style="color: red;">*</font></td>
					
					<td>					 				
					<input type="text" name="lastname" placeholder="Enter Last name" value="<?php if(isset($lastname)){echo $lastname;}?>" />
					      <?php
					          if (isset($error['lastname'])) {
					   	        echo "<span class='error'>".$error['lastname']."</span>";
					         }
					        ?>	
					    			
				  </td>
				</tr>
				
				<tr>
					<td>Your Email Address:<font style="color: red;">*</font></td>
					
					<td>
						 
						
					<input type="text" name="email" placeholder="Enter Email Address" value="<?php if(isset($email)){echo $email;}?>" />
					     <?php
					          if (isset($error['email'])) {
					   	        echo "<span class='error'>".$error['email']."</span>";
					         }
					        ?>
					
					</td>
				</tr>
				<tr>
					<td>Your Message:</td>
					
					<td>
						 
						
					<textarea name="body"></textarea>
					     <?php
					          if (isset($error['body'])) {
					   	        echo "<span class='error'>".$error['body']."</span>";
					         }
					        ?>
					
					
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
					<input type="submit" name="submit" value="Send"/>
					</td>
				</tr>
		</table>
	<form>				
 </div>
</div>
<?php include 'inc/sidebar.php'?>
<?php include 'inc/footer.php'?>
		