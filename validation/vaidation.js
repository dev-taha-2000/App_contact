const userNameRegex=/^[A-Za-z][A-Za-z0-9_]{7,29}$/; 
const EmailRegex=/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;
const passwordRegex=/?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/;
 let username = document.getElementById('username');
 let Email = document.getElementById('Email');
 let password = document.getElementById('password');
 let virify = document.getElementsById('virify password');
 let span=document.getElementsByTagName("span");
 let form=document.querySelector('form');

 form.addEventListener('submit',validateform);
 function validateform(e){
        if(nome.value.match(nomRegex) && prenome.value.match(prenomRegex) && email.value.match(emailRegex) ){
          
           e.target.submit();  
         
        }else{
                      
          alert('please check the data you entred');
          e.preventDefault(); 
        }

} 
 username.onkeydown=function(){    
   
   if(userNameRegex.test(username.value)){  
     span[0].innerText="le nome correct";
     span[0].style.color="lime";
     nome.style.border="solid green"; 
   }else{
     span[0].innerText="le nom incorrect";
     span[0].style.color="red";
     nome.style.border="solid red";
   }
 } 
 Email.onkeydown=function(){  
   if(EmailRegex.test(Email.value)){    
     span[1].innerText="le prenome correct";
     span[1].style.color="lime";
   }else{
     span[1].innerText="le prenom incorrect";
     span[1].style.color="red";
   }
 } 
 password.onkeydown=function(){  
   if(passwordRegex.test(password.value)){    
     span[2].innerText="email correct";
     span[2].style.color="lime";
   }else{
     span[2].innerText="email incorrect";
     span[2].style.color="red";
   }
 } 
 password.onkeydown=function(){  
   if(passwordRegex.test(password.value)){  
     span[3].innerText="password correct";
     span[3].style.color="lime";
   }else{
     span[3].innerText="password incorrect"; 
     span[3].style.color="red";
   }
 }   
