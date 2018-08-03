<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Blog - SignIn</title>
</head>
<body>
<div style="width: 900px; margin: auto;">
    <header style="background-color: grey; height: 75px; padding: 5px; width: 100%">
        <div id="logo" style="width: 100px;"><h1 style="color: white; float: left;">Blog!</h1></div>
        <?php if (!empty($this->user)) { ?>
            <div style="color: white; margin-left: auto; margin-right: 0; margin-top: 25px; max-width: 150px;"><p style="color: white">Welcome, <?php echo $this->user->name;?></p></div>
        <?php } ?>

    </header>

    <div style="margin: auto; padding: 20px; max-width: 300px;">
        <h1>Create new Post</h1>
        <form action="/post/create" method="post" enctype="multipart/form-data">
            <p><input type="text" name="title" placeholder="Title" size="65"></p>
            <p><input type="text" name="short_description" placeholder="Short description" size="65"></p>
            <p><textarea type="text" name="content" placeholder="Content" rows="25" cols="65"></textarea></p>
            <p><input type="file" name="image" placeholder="Upload" "></p>
            <p><button type="submit">Create</button></p>
        </form>
    </div>
    <?php if (!empty($this->errors)){ foreach ($this->errors as $value) { ?>
        <p style="color: red"><?php echo $value;?></p>
    <?php }} ?>

    <footer>

    </footer>

</div>
</body>
</html>