<!doctype html>
<html lang="en">
<head>
    <x-header-tag></x-header-tag>
</head>
<body class="bg-gradient-to-r from-blue to-gray-op">
<x-register-header></x-register-header>
<section>
    <div class="m-auto p-space-0.5 text-center">
        @if($errors->any())
            <h3 class="m-auto p-2 text-center rounded-xl bg-red text-white w-fit my-[10px]"
                style="font-family: 'Outfit',sans-serif; font-size: 35px;" id="hideMe">
                {{$errors->first()}}
                <script>
                    setTimeout(() => {
                        const elem = document.getElementById("hideMe");
                        elem.parentNode.removeChild(elem);
                    }, 5000);
                </script>
            </h3>
        @endif
        <form action="/login/validation" method="POST" class="grid items-center">
            @csrf

             <div class="login-form-container">
        <div class="login-form">
            <div class="login-header">
                <h1 id='login-title'>Welcome to Woodside Academy</h1>
            
            </div>
            <div class="form-box">
                
           

                <input type="email" placeholder="Email" name="email">
                <input type="password" placeholder="Password" name="password">

                <button id="login-btn" type="submit">Login</button>
                <p id="reset-pass">Forgot Password? <a href="#">Reset Password</a></p>
                <p id="reset-pass">Don't have an account?<a href="#"> Register Here</a></p>

 </div>
        </div>

        <div class="hero-image">
            <img src="../images/LOGO.jpg" alt="">
        </div>
    </div>

        </form>
    </div>
</section>
</body>
</html>
