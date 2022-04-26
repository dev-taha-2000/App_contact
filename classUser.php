
<?php  
class dbase
{  
    public $username="root";  
    public $password=""; 
    public function __construct()
    {  
      $this->connect=new PDO("mysql:host=localhost;dbname=appgestionbanquaire;",$this->username,$this->password); 
    }
}
class Main extends dbase
{   
          /**  
           * function for signUp
           */ 
        public  function signUp($username,$email,$pass,$verpass){ 
            session_start(); 
            if(!empty($username) AND !empty($email) AND !empty($pass) AND !empty($verpass))
            {   
              $query="SELECT *FROM `users` WHERE  `password`='$pass' AND `userName`='$username' limit 1"; 
              $requete=$this->connect->prepare($query); 
              $requete->execute();  
              $row=$requete->rowCount();
              if($row>0)     
              {     
                  echo '<div class="alert alert-danger" role="alert">
                          this user name or email is already 
                        </div>';  
              }
              else 
              {
                $_SESSION['userName']=$username; 
                $_SESSION['pass']=$pass;  
                $_SESSION['email']=$email; 
                $date=date("D M j G:i:s T Y");       
                $query=$this->connect->prepare("INSERT INTO `users`(`userName`,`password`,`Email`, `Date`) VALUES('$username','$pass','$email','$date')");
                $query->execute(); 
                header('Location:home.php');  
              }   
            }   
        }   
            /**
             *functio for afiche('date,username,email')the user.   
            */ 
            public  function profile(){     
              $username=$_SESSION['userName']; 
              $password=$_SESSION['pass']; 
              $query=" SELECT *FROM `users` WHERE  `password`='$password' AND `userName`='$username' limit 1"; 
              $result=$this->connect->prepare($query);
              $result->execute();
              $userRow=$result->fetch(PDO::FETCH_ASSOC); 
              $_SESSION['id_user']=$userRow['id'];  
              return $userRow; 
            }      
          /**
           * function for login 
           */ 
          public function login($userName,$pass)  
          { 
            session_start();
            if(!empty($userName) AND !empty($pass))
            {         
              $query="SELECT *FROM `users` WHERE `userName`='$userName' AND `password`='$pass' limit 1"; 
              $requete=$this->connect->prepare($query);
              $requete->execute();  
              $row=$requete->rowCount(); 
            }  
            if($row>0)
            {    
              $_SESSION['userName']=$userName;  
              $_SESSION['pass']=$pass; 
              $_SESSION['id']=`id`;
              $_SESSION['date']=date("D M j G:i:s T Y");  
              header('Location:home.php');   
            }   
            else    
            {   
              echo'<script>alert("this compte not existe")</script>';       
            }   
          }    
        public function Apload()  
        {
          $id_user=$_SESSION['id_user'];
          $target="img_apload/".basename($_FILES['img_profile']['name']);    
          $nameImg=$_FILES['img_profile']['name'];  
          $query="UPDATE `users` SET `image`='$nameImg' WHERE `id`='$id_user' ";    
          $result=$this->connect->prepare($query);
          $result->execute();
          /**
           * transfare img to file img; 
           */
          if(move_uploaded_file($_FILES['img_profile']['tmp_name'],$target)) 
          {
              $msg="image aploaded sucsesfily";
              echo $msg;
          }else
          {
              $msg="there was a problem";
              echo $msg; 
          } 
        } 
}           
 
class Crude extends dbase{
  public $id_contact;
  public $name; 
  public $phone;
  public $adresse;
  public $email;
  public $id_signup; 

  public function select(){   
    $id=$_SESSION['id_user'];  
    $query="SELECT * FROM contact where id_signup='$id'";    
    $result=$this->connect->prepare($query); 
    $result->execute();   
    $info=$result->fetchall();    
    return $info;    
  } 
  public function search($search){
    $id=$_SESSION['id_user']; 
    $query="SELECT *FROM `contact` WHERE id_signup='$id' AND CONCAT(`name`,`email`) LIKE '%$search%'";
    $result=$this->connect->prepare($query);
    $result->execute();
    $value=$result->fetchall();   
    return $value;  
  }
  public function insert($name,$email,$phone,$adresse){     
    $id=$_SESSION['id_user']; 
    $query="INSERT INTO `contact`(`name`,`phone`,`adresse`,`email`,`id_signup`) VALUE ('$name','$phone','$adresse','$email','$id')";    
    $result=$this->connect->prepare($query); 
    $data=$result->execute();  
    return $data;
  } 
   function edit($id_contact,$name,$phone,$adresse, $email){  
   $query="UPDATE `contact` SET `name`='$name',`phone`='$phone',`adresse`=' $adresse',`email`='$email' WHERE id_contact='$id_contact'"; 
   $result=$this->connect->prepare($query);
   $result->execute(); 
   header('Location:contact.php');  
  }  
 
  public function delete($id_contact){ 
    $query="DELETE FROM `contact` WHERE id_contact='$id_contact'";
    $result=$this->connect->prepare($query); 
    $result->execute();    
    if($result){
      header('Location:contact.php');
    }else{
      header('Location:contact.php');
      echo 'false';
    }  
  } 
} 


?> 