<?php 
  $filepath = realpath(dirname(__FILE__));

    include_once ($filepath.' /../lib/Session.php');
    Session::checkLogin();
    
    
    include_once ($filepath.'/../lib/Database.php');
    include_once ($filepath.'/../helpers/Format.php');
?>



<?php
class Adminlogin {

	private $db;
	private $fm;
	
	public function __construct(){
		$this->db=new Database();
		$this->fm=new Format();
	}


   public function adminLogin($adminUser,$adminPass){
   	   $adminUser=$this->fm->validation($adminUser);
       $adminPass=$this->fm->validation($adminPass);
        
        $adminUser=mysqli_real_escape_string($this->db->link,$adminUser);
        $adminPass=mysqli_real_escape_string($this->db->link,$adminPass);

        if(empty($adminUser) || empty($adminPass)){
        	$loginmsg = "Username or Password must not be empty !!";
        	return $loginmsg;

        }

        else{
             $query = "SELECT * FROM tbl_user WHERE adminUser='$adminUser' AND adminPass='$adminPass'";
             $result=  $this->db->select($query);

             if($result !=false){
             	$value = $result->fetch_assoc();
                Session::set("adminlogin",true);
                Session::set("adminID",$value['adminID']);
                Session::set("adminName",$value['adminName']);
                Session::set("adminUser",$value['adminUser']);
                Session::set("adminRole",$value['role']);
                
                header("Location:index.php");
               }

               else{
                $loginmsg = "Username or Password  not match !!";
                  return $loginmsg;

               }

        }


   }


       // forgetpassword.php 7 no line
    public function RecoveryPassword($email){
        $email      =$this->fm->validation($email);
        $email      =mysqli_real_escape_string($this->db->link,$email);

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $msg = "Invalid email format"; 
       return $msg;
       } 


        else{
          $mailquery = "SELECT * FROM tbl_user where email='$email' LIMIT 1";
          $mailchack =$this->db->select($mailquery);
          if ($mailchack != false) {
            while ($result = $mailchack->fetch_assoc()) {
                $adminID = $result['adminID'];
                $adminUser = $result['adminUser'];
            }
            $text         = substr($email, 0,3);
            $rand         = rand(10000,99999);
            $newPassword  = "$text$rand";
            $password     =md5($newPassword);
            $query  ="UPDATE tbl_user
                            SET
                            adminPass='$password'
                            WHERE adminID='$adminID' ";

            $update_row =$this->db->update($query);
            $to          = "$email"; 
            $from        ="alaminrony100@gmail.com"; 
            $headers[]   = "From:$from";            
            $headers[]   = 'MIME-Version: 1.0';
            $headers[]   = 'Content-type: text/html; charset=iso-8859-1';  
            $subject     = "Your RecoveryPassword"; 
            $message     ="Your User Name is ".$adminUser." AND Password is ".$newPassword."please visit website to Login.";      
           

            $sendmail = mail($to, $subject, $message, implode("\r\n", $headers));

               if($sendmail){
                    $msg ="<span class='success'>Email sent successfully. </span>";
                    return $msg;
                }
                else{
                    $msg ="<span class='error'>Email Not sent . </span>";
                    return $msg;
                } 
              }else{
                 $msg ="<span class='error'>Email Not Exist . </span>";
                    return $msg;
              }    
       
    }

}





 }  

?>