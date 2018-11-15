<?php 
   $filepath = realpath(dirname(__FILE__));

    include_once ($filepath.'/../lib/Database.php');
    include_once ($filepath.'/../helpers/Format.php');
?>

<?php
  class User{
           private $db;
	       private $fm;
	
	public function __construct(){
		$this->db=new Database();
		$this->fm=new Format();
	}


	public function InsertUser($data){
       
        $adminUser       =$this->fm->validation($data['adminUser']); 
        $adminUser       =mysqli_real_escape_string($this->db->link,$adminUser);

        $adminPass      =$this->fm->validation (md5($data['adminPass']));
        $adminPass      =mysqli_real_escape_string($this->db->link,$adminPass);

        $email      =$this->fm->validation($data['email']);
        $email      =mysqli_real_escape_string($this->db->link,$email); 

        $role           =$this->fm->validation($data['role']); 
        $role           =mysqli_real_escape_string($this->db->link,$role); 
    
         
      
       
		if(empty($adminUser)||empty($adminPass)||empty($email)||empty($role)){
        	$msg = "<span class='error'>Field must not be empty !! </span>";
        	return $msg;

        }else{
          $mailquery = "SELECT * FROM tbl_user where email='$email' LIMIT 1";
          $mailchack =$this->db->select($mailquery);
          if ($mailchack) {
            $msg ="<span class='error'>Email Already Exists. </span>";
            return $msg;
            
          }
        else{

        	$query ="INSERT INTO tbl_user(adminName,adminUser,adminPass,email,details,role) VALUES('','$adminUser','$adminPass','$email','','$role')";
        	$Userinsert =$this->db->insert($query);
        	if($Userinsert){
        		$msg ="<span class='success'>User insert successfully. </span>";
        		return $msg;
        	}
        	else{
        		$msg ="<span class='error'>User Not inserted . </span>";
        		return $msg;
        	}
        }
	}
 } 


    public function getUserById($userId,$userRole){
        $query ="SELECT * FROM tbl_user WHERE adminID ='$userId' AND role='$userRole'";
        $result = $this->db->select($query);
        return $result;
    }


     public function updateUser($data,$userId){   

        $adminName      =$this->fm->validation($data['adminName']);
        $adminName      =mysqli_real_escape_string($this->db->link, $data['adminName']);

        $adminUser       =$this->fm->validation($data['adminUser']); 
        $adminUser       =mysqli_real_escape_string($this->db->link, $data['adminUser']); 

         $email       =$this->fm->validation($data['email']); 
        $email       =mysqli_real_escape_string($this->db->link, $data['email']);

         $details       =$this->fm->validation($data['details']); 
        $details       =mysqli_real_escape_string($this->db->link, $data['details']);      
        
             $query= "UPDATE tbl_user
                          SET 
                          adminName      = '$adminName',
                          adminUser      = '$adminUser',
                          email          = '$email',
                          details        = '$details'
                          where adminID  ='$userId'
                         ";


                $update_row =$this->db->update($query);
                           if($update_row){
                           $msg ="<span class='success'> Data Update successfully. </span>";
                           return $msg;
                           }

                           else {
                          $msg= "<span class='error'>Data Not Update !</span>";
                          return $msg;
                    }

      }


       public function getAllUser(){
        $query ="SELECT * FROM tbl_user ORDER BY adminID DESC ";
        $result = $this->db->select($query);
        return $result;
    }

    

     public function delUserById($id){
        
        $query ="DELETE from tbl_user where adminID='$id'";
         $delData  =$this->db->delete($query);

         if($delData){
                $msg ="<span class='success'>User DELETE successfully. </span>";
                return $msg;
            }
            else{
                $msg ="<span class='error'>User Not Deleted . </span>";
                return $msg;
            }   

    }
    
    // viewuser.php 34 no line
    public function ViewUserById($id){
        $query ="SELECT * FROM tbl_user WHERE adminID ='$id'";
        $result = $this->db->select($query);
        return $result;
    }
 

 

   




}  
?>