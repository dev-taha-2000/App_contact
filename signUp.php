<!DOCTYPE html>
<html lang="en"> 
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="style.css"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css"> 
    <title>ContactBrave | signUp</title>  
</head> 
<body>  
         
        <?php
        include'classUser.php';  
        if(isset($_POST['submit'])){
            $signUp=new Main;   
            $signUp->signUp($_POST['username'],$_POST['Email'],$_POST['password'],$_POST['verpass']); 
        }    
        ?>
         <!-- ::::::::::::::::header:::::::::::::::::::::::: -->
         <header class="d-flex justify-content-between p-2">   
            <h2><a href="index.php" style="text-decoration:none;color:black;">ContactBrave</a></h2> 
            <nav> 
                <ul> 
                    <li><a href="login.php" class="login">login</a></li>
                    <li><a href="signUp.php" class="signUp">signUp</a></li>
                </ul>
            </nav>   
       </header> 
         <!-- ::::::::::::::::header:::::::::::::::::::::::: -->
        <form method="POST" class="signup">  
           <div class="form">  
               <div style="text-align:center">
                    <h1 class="titre">signUp</h1> 
                </div>  
                <div>
                <label for="username">UserName*</label>  
                <input type="text"       name="username" id="username"       placeholder="usderName"       class="form-control" required> 
                </div>
                <span></span> 
                <label for="Email">Email*</label> 
                <input type="email"       name="Email"    id="Email"          placeholder="Email"           class="form-control" required>
                <span></span>    
                <label for="password">password*</label> 
                <input type="password"   name="password" id="password"        placeholder="password"       class="form-control"  required>
                <span></span>   
                <label for="verify password">verify password*</label> 
                <input type="password"       name="verpass"  id="verify" placeholder="verify password" class="form-control" required>  
                <span></span>  
                <div style="text-align:center;margin-top:10px"> 
                    <button class="btn btn-primary" name="submit">signUp</button> 
                    <a href="login.php"><button class="btn btn-light">login</button></a> 
                </div>  
           </div>
            <img src="img/const.jpg" id="img"style="height:100px">
        </form>   
</body>
<script>
const userNameRegex=/^[A-Za-z][A-Za-z0-9_]{4,12}$/; 
const EmailRegex=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
const passwordRegex=/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,16}$/;
let username = document.getElementById('username');
let Email = document.getElementById('Email');
let password = document.getElementById('password');
let verify=document.getElementById('verify');
let span=document.getElementsByTagName('span'); 
let form=document.querySelector('form');  

 form.addEventListener('submit',validateform);
 function validateform(e){ 
        if(username.value.match(userNameRegex) && Email.value.match(EmailRegex) && password.value.match(passwordRegex) ){
          
           e.target.submit();  
         
        }else{
                      
          alert('please check the data you entred');
          e.preventDefault(); 
        }

} 
 username.onkeydown=function(){    
   
   if(userNameRegex.test(username.value)){  
     span[0].innerText="username correct"; 
     span[0].style.color="lime";
     username.style.border="solid #7CFC00"; 
   }else{
     span[0].innerText="le nom incorrect";
     span[0].style.color="red";
     username.style.border="solid red";
   }
 } 
 Email.onkeydown=function(){  
   if(EmailRegex.test(Email.value)){    
     span[1].innerText="Email correct";
     span[1].style.color="lime";
     Email.style.border="solid #7CFC00"; 
   }else{
     span[1].innerText="Email incorrect";  
     span[1].style.color="red";
     Email.style.border="solid red"; 
   }
 } 
 password.onkeydown=function(){  
   if(passwordRegex.test(password.value)){    
     span[2].innerText="password correct";
     span[2].style.color="lime";
     password.style.border="solid #7CFC00";  
   }else{
     span[2].innerText="Minimum eight characters, at least one letter and one number";
     span[2].style.color="red";
     password.style.border="solid red";  
   }
 }   
 verify.onkeydown=function(){  
    if(password.value==verify.value){
     span[3].innerText="password correct";
     span[3].style.color="lime"; 
     verify.style.border="solid #7CFC00";   
    }else{
     span[3].innerText="password incorrect";
     span[3].style.color="red"; 
     verify.style.border="solid red";    
    }
 }      


</script>
</html>