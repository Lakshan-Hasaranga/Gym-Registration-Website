<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
  <?php include './header.php' ?>
<section class="register">
    <div class="container">
        <div class="card">
            <h2>Gym System Register</h2>
            <form id="registerForm" >
                <input type="text" placeholder="Full Name" name="fullName" required>
                <input type="text" placeholder="Phone" name="phone" required>
                <input type="text" placeholder="ID" name="userName" required>
                <input type="text" placeholder="Password" name="password" required>
                <input type="submit" class="btn">
            </form> 
 
        </div>
</div>
</section>

<style>
   .register{
        background-image: url(./img/hero-1.png);
        background-position: center;
        background-size: cover;
        background-repeat: no-repeat;
        min-height: 700px;

    }
    .card{
        text-align: center;
        background: #fff;
        box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;
        padding: 100px;
        max-width: 400px;
        margin: auto;
        transform: translateY(10%);
    }
    input[type="text"] {
        width: 100%;
        height: 30px;
        padding: 10px;
        margin-bottom: 20px;
}
.card h2{
        margin-bottom: 30px;
        
    }
    @media only screen and (max-width: 600px) {
        .card h2{
            font-size: 18px;
        }
        .card{
            transform: translateY(35%);
        }
    }
    
 </style> 
 <script>
    document.getElementById("registerForm").addEventListener("submit", function (e)
{
   e.preventDefault();

   const formData = new FormData(this);

   fetch("./includes/register-back.php",{
    method:"POST",
    body: formData
   })
   .then(response=>response.json())
   .then(data=>{
    if(data.success){
        Swal.fire("Success", data.message, "success");
}else{
    Swal.fire("Error", data.message, "error");
}   
   })
   .catch(error=>{
    Swal.fire("Error","Something went wrong", "error");
    console.error("Error", error);
   });
});
 </script>
<?php include './footer.php' ?>