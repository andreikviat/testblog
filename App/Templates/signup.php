<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Blog - SignIn</title>
</head>
<body>
<div style="width: 900px; margin: auto;">
    <header style="background-color: grey; height: 75px; padding: 5px; width: 100%">
        <div id="logo" style="width: 100px;"><h1 style="color: white; float: left;">Blog!</h1></div><div style="color: white; margin-left: auto; margin-right: 0; margin-top: 25px; max-width: 150px;"><a style="color: white" href="/user/signIn">Sign In</a> / <a href="/user/signUp" style="color: white">SignUp</a></div>
    </header>

    <div style="margin: auto; padding: 20px; max-width: 300px;">

        <form action="/user/signUp" method="post" style="size:">
            <p><input type="text" name="name" placeholder="Username"></p>
            <p><input type="text" name="email" placeholder="Email"></p>
            <p><input type="password" name="password" placeholder="Password"></p>
            <p><input type="password" name="confirmpassword" placeholder="Confirm Password"></p>
            <p><button type="submit">Sign In</button></p>
        </form>
    </div>
    <?php foreach ($this->errors as $value) { ?>
        <p style="color: red"><?php echo $value;?></p>
    <?php } ?>

    <footer>

    </footer>

</div>
</body>
</html>