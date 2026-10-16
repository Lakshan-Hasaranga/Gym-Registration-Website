<?php include './header.php' ?>
<section class="login">
    <div class="container">
        <div class="card">
            <h2>Gym System Login</h2>
            <form id="loginForm" >
                <input type="text" placeholder="User Name" name="userName" required>
                <input type="text" placeholder="Password" name="password" required>
                <input type="submit" class="btn">
            </form> 
 
        </div>
</div>
</section>

<style>
   .login{
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
        transform: translateY(25%);
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
    document.getElementById("loginForm").addEventListener("submit", function (e){
        e.preventDefault();

        const formData = new FormData(this);

        fetch("includes/login-back.php",{
            method:"POST",
            body:formData,
        })
        .then(res=>res.json())
        .then(data=>{
           Swal.fire({
                title:data.title,
                text:data.message,
                icon:data.status,
                confirmButtonText:"okey",
            }).then(()=> {
if(data.redirect){
    window.location.href=data.redirect;
}
            });
        }).catch(err=> {
            Swal.fire("Error", "Something went Wrong!", "error");
        });
    });
</script>


<?php include './footer.php' ?>