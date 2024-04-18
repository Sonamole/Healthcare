<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login to your account</title>
    <link rel="stylesheet" href="User/css/reglogin.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> -->
</head>
<body>

  <section>
    <div class="container">
      <div class="user signinBx">
        <div class="imgBx"><img src="https://raw.githubusercontent.com/WoojinFive/CSS_Playground/master/Responsive%20Login%20and%20Registration%20Form/img1.jpg" alt="" /></div>
        <div class="formBx">
          <form action="logaction.php" method="post">
            <h2>Sign In</h2>
            <input type="text" name="username" placeholder="Username" />
            <input type="password" name="password" placeholder="Password" />
            <button class=" btn btn-warning" type="submit" >Sign IN</button>
            <!-- <input type="submit" name="" value="Login" /> -->
            <p class="signup">
              Don't have an account ?
              <a href="#" onclick="toggleForm();">Sign Up.</a>
            </p>
          </form>
        </div>
      </div>
      <div class="user signupBx">
        <div class="formBx">
          <form action="User/action/regaction.php" method="post">
            <h2>Create an account<br>User!!</h2>
            <input type="text"   placeholder="Username" name="username"/>
            <input type="email"  placeholder="Email Address" name="email"/>
            <input type="hidden"   placeholder="category" name="category"/>
            <input type="password"   placeholder=" Password" name="password"/>
            <button class=" btn btn-warning" type="submit" name="signin" >Sign Up</button>
            <!-- <input type="submit" name="" value="Sign Up" /> -->
            <p class="signup">
              Don't have an account ?
              <a href="#" onclick="toggleForm();">Sign In.</a>
            </p>
            
          </form>
        </div>
        <div class="imgBx"><img src="https://raw.githubusercontent.com/WoojinFive/CSS_Playground/master/Responsive%20Login%20and%20Registration%20Form/img2.jpg" alt="" /></div>
      </div>
    </div>
  </section>

  <script>
    const toggleForm = () => {
  const container = document.querySelector('.container');
  container.classList.toggle('active');
};
    </script>
</body>
</html>