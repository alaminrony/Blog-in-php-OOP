<?php 
   $filepath = realpath(dirname(__FILE__));

    include_once ($filepath.'/../lib/Database.php');
    include_once ($filepath.'/../helpers/Format.php');
?>


<?php

  class Post{
  	 private $db;
	 private $fm;
	
	 public function __construct(){
		$this->db=new Database();
		$this->fm=new Format();
	}

	public function AllPostById($postid){
		$query = "SELECT * FROM tbl_post WHERE id='$postid'";
		$result=$this->db->select($query);
		return $result;
	}
    

	public function relatedPost($catid){
		$related_query ="SELECT * FROM tbl_post WHERE catId='$catid' order by rand() LIMIT 6";
	    $result = $this->db->select($related_query);
	    return $result;
	}


	public function getPostByCatId($id){
		$query = "SELECT * FROM tbl_post WHERE catId='$id'";
		$result=$this->db->select($query);
		return $result;

	}

	public function LatestPost(){
		$query = "SELECT * FROM tbl_post LIMIT 5";
		$result=$this->db->select($query);
		return $result;

	}

    public function SearchPost($search){
		$query = "SELECT * FROM tbl_post WHERE title LIKE '%$search%' OR body LIKE '%$search%' ";

	$result=$this->db->select($query);
		return $result;
		
	}


		public function postInsert($data, $file){

		$title         =$this->fm->validation($data['title']);
		$catId         =$this->fm->validation($data['catId']);		
		$body          =$this->fm->validation($data['body']);
		$author        =$this->fm->validation($data['author']);
		$tags          =$this->fm->validation($data['tags']);
		$userId        =$this->fm->validation($data['userId']);
		

		$title         =mysqli_real_escape_string($this->db->link, $data['title']);
		$catId         =mysqli_real_escape_string($this->db->link, $data['catId']);		
		$body          =mysqli_real_escape_string($this->db->link, $data['body']);
		$author        =mysqli_real_escape_string($this->db->link, $data['author']);
		$tags          =mysqli_real_escape_string($this->db->link, $data['tags']);
		$userId        =mysqli_real_escape_string($this->db->link,$data['userId']);
		
       
		    $permited  = array('jpg', 'jpeg', 'png', 'gif');
		    $file_name = $file['image']['name'];
		    $file_size = $file['image']['size'];
		    $file_temp = $file['image']['tmp_name'];

		    $div = explode('.', $file_name);
		    $file_ext = strtolower(end($div));
		    $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
		    $uploaded_image = "uploads/".$unique_image;

		    if( $catId == ''|| $title == ''|| $body  == ''|| $author  == '' ||$tags== '' || $file_name==''){
		    	$msg = "<span class='error'> fields must not be empty !! </span>";
        	    return $msg;

		    }
		     elseif ($file_size >1048567) {
			     $msg= "<span class='error'>Image Size should be less then 1MB! </span>";
			      return $msg;
			    } 

			 elseif (in_array($file_ext, $permited) === false) {
			     $msg= "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";
			      return $msg;

			    }
		    
		    else{
		    	move_uploaded_file($file_temp, $uploaded_image);
		    	$query= "INSERT INTO tbl_post(catId,title,body, image, author,tags,userId ) 
		    	VALUES('$catId','$title', '$body','$uploaded_image','$author','$tags','$userId')";

        	    $inserted_row =$this->db->insert($query);
        	               if($inserted_row){
        		           $msg ="<span class='success'> post insert successfully. </span>";
        		           return $msg;
        	               }

        	               else {
                          echo "<span class='error'>post Not Inserted !</span>";
				    }
				}
				        	
			}



			public function getAllPost(){
		      /*  JOIN BY ARRIES JOIN  */

		   $query = "SELECT p.*, c.catName 
		             FROM tbl_post as p, tbl_category as c
		             WHERE p.catId = c.catId
		             ORDER BY p.title DESC    "; 		 
         
          $result = $this->db->select($query);
           return $result;
        

	}


	 public function postUpdate($data, $file, $postid){
    	$title         =$this->fm->validation($data['title']);
		$catId         =$this->fm->validation($data['catId']);		
		$author        =$this->fm->validation($data['author']);
		$tags          =$this->fm->validation($data['tags']);
		$body          =$this->fm->validation($data['body']);
		$userId        =$this->fm->validation($data['userId']);
		

		$title         =mysqli_real_escape_string($this->db->link, $data['title']);
		$catId         =mysqli_real_escape_string($this->db->link, $data['catId']);		
		$author        =mysqli_real_escape_string($this->db->link, $data['author']);
		$tags          =mysqli_real_escape_string($this->db->link, $data['tags']);
		$body          =mysqli_real_escape_string($this->db->link, $data['body']);
		$userId        =mysqli_real_escape_string($this->db->link,$data['userId']);
		
		
       
		    $permited  = array('jpg', 'jpeg', 'png', 'gif');
		    $file_name = $file['image']['name'];
		    $file_size = $file['image']['size'];
		    $file_temp = $file['image']['tmp_name'];

		    $div = explode('.', $file_name);
		    $file_ext = strtolower(end($div));
		    $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
		    $uploaded_image = "uploads/".$unique_image;

		  if($title == '' || $catId == '' || $author  == '' ||$tags== '' || $body  == ''){
		    	$msg = "<span class='error'> fields must not be empty !! </span>";
        	    return $msg;

		    }
		      else{
					if (!empty($file_name)) {
					      	 	
					      	 

					     if ($file_size >1048567) {
						     echo "<span class='error'>Image Size should be less then 1MB! </span>";
						    } 

						 elseif (in_array($file_ext, $permited) === false) {
						     echo "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";
						    }

					    
					    else{
					    	move_uploaded_file($file_temp, $uploaded_image);

					    	$query= "UPDATE tbl_post
					    	         SET 
					    	         catId     = '$catId',
					    	         title     = '$title',
					    	         body      = '$body',
					    	         image     = '$uploaded_image',
					    	         author    = '$author',
					    	         tags      = '$tags',
					    	         userId    ='$userId'
					    	         WHERE id ='$postid' ";


			        	    $update_row =$this->db->update($query);
			        	               if($update_row){
			        		           $msg ="<span class='success'> post Update successfully. </span>";
			        		           return $msg;
			        	               }

			        	               else {
			                          echo "<span class='error'>post Not Update !</span>";
							          }
				        	
				        	}
				    
				    } 
				       
				       else{

					    						    	
					    	$query= "UPDATE tbl_post
					    	         SET 
					    	         catId     = '$catId',
					    	         title     = '$title',
					    	         body      = '$body',					    	         
					    	         author    = '$author',
					    	         tags      = '$tags',
					    	         userId    ='$userId'
					    	         WHERE id ='$postid'  ";


			        	    $update_row =$this->db->update($query);
			        	               if($update_row){
			        		           $msg ="<span class='success'> post Update successfully. </span>";
			        		           return $msg;
			        	               }

			        	               else {
			                          echo "<span class='error'>post Not Update !</span>";
							    }

				    }
				 
         
            }
    }

         



	public function deletePostById($delid){
		 $query = "SELECT * FROM tbl_post WHERE id='$delid'";
        	    $getData = $this->db->select($query);

        	    if ($getData) {
        	    	while ($delImg =$getData->fetch_assoc()) {
        	    	 $delLink =	$delImg['image'];
        	    	 unlink($delLink);

        	    		
        	    	}
        	    }
        
		         $delquery ="DELETE from tbl_post where id='$delid'";
		         $delData  =$this->db->delete($delquery);

		         if($delData){
		                $msg ="<span class='success'> Post Deleted successfully. </span>";
		                return $msg;
		            }
		            else{
		                $msg ="<span class='error'> Post Not Deleted . </span>";
		                return $msg;
		            } 
	}



       public function getTitleSlogan(){
       	       $query = "SELECT * FROM title_slogan where id='1'";
               $result= $this->db->select($query);
               return $result;
       }


	    public function updateTitleSlogan($data, $file){
    	$title         =$this->fm->validation($data['title']);
		$slogan         =$this->fm->validation($data['slogan']);		
		
		$title         =mysqli_real_escape_string($this->db->link, $data['title']);
		$slogan         =mysqli_real_escape_string($this->db->link, $data['slogan']);		
		
		
       
		    $permited  = array('png');
		    $file_name = $file['logo']['name'];
		    $file_size = $file['logo']['size'];
		    $file_temp = $file['logo']['tmp_name'];

		    $div = explode('.', $file_name);
		    $file_ext = strtolower(end($div));
		    $same_image ='Logo'.'.'.$file_ext;
		    $uploaded_image = "uploads/".$same_image;

		  if($title == '' || $slogan == '' ){
		    	$msg = "<span class='error'> fields must not be empty !! </span>";
        	    return $msg;

		    }
		      else{
					if (!empty($file_name)) {
					      	 	
					      	 

					     if ($file_size >1048567) {
						     $msg= "<span class='error'>Image Size should be less then 1MB! </span>";
						     return $msg;
						    } 

						 elseif (in_array($file_ext, $permited) === false) {
						     $msg= "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";
						     return $msg;

						    }

					    
					    else{
					    	move_uploaded_file($file_temp, $uploaded_image);

					    	$query= "UPDATE title_slogan
					    	         SET 
					    	        
					    	         title     = '$title',
					    	         slogan    = '$slogan',					    	       
					    	         logo     = '$uploaded_image'
					    	        
					    	         WHERE id ='1' ";


			        	    $update_row =$this->db->update($query);
			        	               if($update_row){
			        		           $msg ="<span class='success'>Data Update successfully. </span>";
			        		           return $msg;
			        	               }

			        	               else {
			                          echo "<span class='error'>Data Not Update !</span>";
							          }
				        	
				        	}
				    
				    } 
				       
				       else{

					    						    	
					    	$query= "UPDATE title_slogan
					    	         SET 
					    	          title     = '$title',
					    	         slogan    = '$slogan'
					    	         WHERE id ='1'  ";


			        	    $update_row =$this->db->update($query);
			        	               if($update_row){
			        		           $msg ="<span class='success'> Data Update successfully. </span>";
			        		           return $msg;
			        	               }

			        	               else {
			                          echo "<span class='error'>Data Not Update !</span>";
							    }

				    }
				 
         
            }
    }


      public function socialmedia(){
      	$query = "SELECT * FROM tbl_social WHERE id='1' ";
      	$result = $this->db->select($query);
      	return $result;

      }

      public function Updatesocialmedia($data){
      	$facebook      =$this->fm->validation($data['facebook']);
		$twitter       =$this->fm->validation($data['twitter']);		
		$linkdin       =$this->fm->validation($data['linkdin']);	
		$google        =$this->fm->validation($data['google']);

		$facebook         =mysqli_real_escape_string($this->db->link, $data['facebook']);
		$twitter         =mysqli_real_escape_string($this->db->link, $data['twitter']);
		$linkdin         =mysqli_real_escape_string($this->db->link, $data['linkdin']);
		$google         =mysqli_real_escape_string($this->db->link, $data['google']);
		
             $query= "UPDATE tbl_social
		    	          SET 
		    	          facebook     = '$facebook',
		    	          twitter      = '$twitter',
		    	          linkdin      = '$linkdin',
		    	          google       = '$google'
		    	         WHERE id ='1'  ";


        	    $update_row =$this->db->update($query);
        	               if($update_row){
        		           $msg ="<span class='success'> Data Update successfully. </span>";
        		           return $msg;
        	               }

        	               else {
                          echo "<span class='error'>Data Not Update !</span>";
				    }

      }


      public function Copyright(){
      		$query = "SELECT * FROM tbl_copyright WHERE id='1' ";
      	    $result = $this->db->select($query);
      	    return $result;
      }

      public function UpdateCopyright($copyright){
      	   $query= "UPDATE tbl_copyright
		    	          SET 
		    	          copyright     = '$copyright'
		    	          
		    	         WHERE id ='1'  ";


        	    $update_row =$this->db->update($query);
        	               if($update_row){
        		           $msg ="<span class='success'> Data Update successfully. </span>";
        		           return $msg;
        	               }

        	               else {
                          echo "<span class='error'>Data Not Update !</span>";
				    }

      }
	    


	    public function PageInsert($data){

		$name         =$this->fm->validation($data['name']);
		$body         =$this->fm->validation($data['body']);		
		
		$name         =mysqli_real_escape_string($this->db->link, $data['name']);
		$body         =mysqli_real_escape_string($this->db->link, $data['body']);		
		
		
       
		   

		    if($name == '' || $body == ''){
		    	$msg = "<span class='error'> fields must not be empty !! </span>";
        	    return $msg;

		    }
		     
		    
		    else{
		    	
		    	$query= "INSERT INTO tbl_page(name,body ) 
		    	VALUES('$name','$body')";

        	    $inserted_row =$this->db->insert($query);
        	               if($inserted_row){
        		           $msg ="<span class='success'>Page insert successfully. </span>";
        		           return $msg;
        	               }

        	               else {
                          echo "<span class='error'>Page Not Inserted !</span>";
				    }
				}
				        	
			}


		public function getPage(){
			$query = "SELECT * FROM tbl_page";
			$result = $this->db->select($query);
			return $result;
		}

		public function getPageById($id){
			$query = "SELECT * FROM tbl_page where id='$id'";
			$result = $this->db->select($query);
			return $result;
		}


		 public function PageUpdate($data,$id){
		 	$name         =$this->fm->validation($data['name']);
		 	$body         =$this->fm->validation($data['body']);		
		
		$name         =mysqli_real_escape_string($this->db->link, $data['name']);
		$body         =mysqli_real_escape_string($this->db->link, $data['body']);
      	   $query= "UPDATE tbl_page
		    	          SET 
		    	          name     = '$name',
		    	          body     = '$body'
		    	          
		    	         WHERE id ='$id'  ";


        	    $update_row =$this->db->update($query);
        	               if($update_row){
        		           $msg ="<span class='success'>Page Update successfully. </span>";
        		           return $msg;
        	               }

        	               else {
                          echo "<span class='error'>Page Not Update !</span>";
				    }

      }

         // Call to deletepage.php
      public function deletePageById($delPageId){		 
        
		         $delquery ="DELETE from tbl_page where id='$delPageId'";
		         $delData  =$this->db->delete($delquery);

		         if($delData){
		               echo "<script> alert('Data Delete succressfully');</script>";
                   echo "<script> window.location='index.php';</script>";
                    
		            }
		            else{
		               echo "<script>alert('Page Not Delete successfully');</script>";
                   echo "<script> window.location='index.php';</script>";
                    
		            } 
      
	}


	public function getALLMessage(){
		$query ="SELECT * FROM tbl_contact where status='0' ORDER BY id DESC";
		$result = $this->db->select($query);
		return $result;
	}

	public function getMessageById($id){
		$query ="SELECT * FROM tbl_contact WHERE id='$id'";
		$result = $this->db->select($query);
		return $result;
	}


	public function sentToSeenBox($SeenMsgId){
		 $query= "UPDATE tbl_contact
		    	          SET 
		    	          status     = '1'		    	          
		    	         WHERE id ='$SeenMsgId'  ";

        	    $update_row =$this->db->update($query);
        	               if($update_row){
        		           $msg ="<span class='success'>Message Sent to SeenBox successfully. </span>";
        		           return $msg;
        	               }

        	               else {
                          echo "<span class='error'>Message Not Sent to SeenBox !</span>";
				    }
		
		$result = $this->db->select($query);
		return $result;
	}

	public function getALLSeenMessage(){
		$query ="SELECT * FROM tbl_contact where status='1' ORDER BY id DESC";
		$result = $this->db->select($query);
		return $result;
	}


	 public function deleteMessage($delid){		 
        
		         $delquery ="DELETE from tbl_contact where id='$delid'";
		         $delData  =$this->db->delete($delquery);

		         if($delData){
		             $msg ="<span class='success'>Message Delete successfully. </span>";
        		           return $msg;
        	               }
		            else{
		              $msg ="<span class='success'>Message Not Delete. </span>";
        		           return $msg;
        	               
		            } 
      
	}


	// start to codeing for slider  // start to codeing for slider
    

	public function addSlider($data,$file){
		$title         =$this->fm->validation($data['title']);
		$title         =mysqli_real_escape_string($this->db->link, $data['title']);
		
		
       
		    $permited  = array('jpg', 'jpeg', 'png', 'gif');
		    $file_name = $file['image']['name'];
		    $file_size = $file['image']['size'];
		    $file_temp = $file['image']['tmp_name'];

		    $div = explode('.', $file_name);
		    $file_ext = strtolower(end($div));
		    $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
		    $uploaded_image = "uploads/slider/".$unique_image;

		    if($title == '' ){
		    	$msg = "<span class='error'> fields must not be empty !! </span>";
        	    return $msg;

		    }elseif(empty($file_name)){
		    	$msg = "<span class='error'>Image fields must not be empty !! </span>";
        	    return $msg;
		    }
		    else{
					if ($file_size >1048567) {
						     $msg= "<span class='error'>Image Size should be less then 1MB! </span>";
						     return $msg;
						    } 

						 elseif (in_array($file_ext, $permited) === false) {
						     $msg= "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";
						     return $msg;

						    }

					    
					    else{
					    	move_uploaded_file($file_temp, $uploaded_image);

					    	$query= "INSERT INTO tbl_slider(title,image) VALUES('$title','$uploaded_image') ";
					    	        
			        	    $inserted_row =$this->db->insert($query);
			        	               if($inserted_row){
			        		           $msg ="<span class='success'>Slider image insert successfully. </span>";
			        		           return $msg;
			        	            }

			        	               else {
			                          $msg= "<span class='error'>Slider image Not insert !</span>";
			                          return $msg;
							            }
				        	
				        	}
				  }
		    
            } 


    public function ALLSlider(){
    	$query ="SELECT * FROM tbl_slider";
    	$result= $this->db->select($query);
    	return $result;
    }

     public function ALLSliderFont(){
    	$query ="SELECT * FROM tbl_slider ORDER BY id ASC LIMIT 5 ";
    	$result= $this->db->select($query);
    	return $result;
    }

   

    public function GetSliderByID($sliderid){
    	$query ="SELECT * FROM tbl_slider where id='$sliderid' ";
    	$result= $this->db->select($query);
    	return $result;
    }


     public function sliderUpdate($data,$file,$sliderid){
     	

    	$title         =$this->fm->validation($data['title']);    	
	    $title         =mysqli_real_escape_string($this->db->link,$title);

	    
		
		    $permited  = array('jpg', 'jpeg', 'png', 'gif');
		    $file_name = $file['image']['name'];
		    $file_size = $file['image']['size'];
		    $file_temp = $file['image']['tmp_name'];

		    $div = explode('.', $file_name);
		    $file_ext = strtolower(end($div));
		    $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
		    $uploaded_image = "uploads/slider/".$unique_image;

		  if($title == ''){
		    	$msg = "<span class='error'> fields must not be empty !! </span>";
        	    return $msg;

		    }
		      else{
					if (!empty($file_name)) {
					      	 	
					      	 

					     if ($file_size >1048567) {
						     echo "<span class='error'>Image Size should be less then 1MB! </span>";
						    } 

						 elseif (in_array($file_ext, $permited) === false) {
						     echo "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";
						    }

					    
					    else{
					    	move_uploaded_file($file_temp, $uploaded_image);

					    	$query= "UPDATE tbl_slider
					    	         SET 
					    	         
					    	        title     = '$title',         
					    	        image     = '$uploaded_image' 
					    	        WHERE id ='$sliderid' ";


			        	    $update_row =$this->db->update($query);
			        	                if($update_row){
			        		           $msg ="<span class='success'>Slider Update successfully. </span>";
			        		           return $msg;
			        	               }

			        	               else {
			                          $msg= "<span class='error'>slider Not Update !</span>";
			                          return $msg;
							       }
				        	
				        	}
				    
				    } 
				       
				       else{

					    						    	
					    	$query= "UPDATE tbl_slider
					    	         SET 			    	      
					    	         title     = '$title'	    
					    	         WHERE id ='$sliderid'  ";


			        	    $update_row =$this->db->update($query);
			        	               if($update_row){
			        		           $msg ="<span class='success'>Slider Update successfully. </span>";
			        		           return $msg;
			        	               }

			        	               else {
			                          $msg= "<span class='error'>slider Not Update !</span>";
			                          return $msg;
							    }

				    }
				 
         
            }
    }



      public function deleteSlider($delSid){

    	    $query = "SELECT * FROM tbl_slider WHERE id ='$delSid' ";
    	    $getData = $this->db->select($query);

    	    if ($getData) {
    	    	while ($delImg =$getData->fetch_assoc()) {
    	    	 $delLink =	$delImg['image'];
    	    	 unlink($delLink);

    	    		
    	    	}
    	    }

	         $delquery ="DELETE from tbl_slider where id='$delSid'";
	         $delData  =$this->db->delete($delquery);

	         if($delData){
	                $msg ="<span class='success'>Slider Deleted successfully. </span>";
	                return $msg;
	            }
	            else{
	                $msg ="<span class='error'>Slider Not Deleted . </span>";
	                return $msg;
	            }   

	    }


	





}
?>