<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Blog - SignUp</title>
</head>
<body>
<div style="width: 900px; margin: auto;">
    <header style="background-color: grey; height: 75px; padding: 5px; width: 100%">
        <div id="logo" style="width: 100px;"><h1 style="color: white; float: left;">Blog!</h1></div><div style="color: white; margin-left: auto; margin-right: 0; margin-top: 25px; max-width: 150px;"><a style="color: white" href="/user/signIn">Sign In</a> / <a href="/user/signUp" style="color: white">SignUp</a></div>
    </header>

    <div style="margin: auto; padding: 20px; max-width: 300px;">
        <p><a href="/user/signIn">Already registered? Sign in.</a></p>

        <form action="/user/signUp" method="post" style="size:">
            <p><input type="text" name="name" placeholder="Username"></p>
            <p style="color: red"><?php echo $this->errors['1']?></p>
            <p><input type="text" name="email" placeholder="Email"></p>
            <p style="color: red"><?php echo $this->errors['2']?></p>
            <p><input type="password" name="password" placeholder="Password"></p>
            <p style="color: red"><?php echo $this->errors['3']?></p>
            <p><input type="password" name="confirmpassword" placeholder="Confirm Password"></p>
            <p style="color: red"><?php echo $this->errors['4']?></p>
            <p><button type="submit">Sign In</button></p>
        </form>
    </div>

    <footer>

    </footer>

</div>
</body>
</html>