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

    <div style="margin: auto; padding: 10px; max-width: 400px; text-align: center;">
        <h1>Editing Post</h1>
        <form action="/post/edit/<?php echo $this->post->id;?>" method="post" enctype="multipart/form-data">
            <p><img src = "/images/<?php echo $this->post->image;?>"></p>
            <p>Title <input type="text" id="title" name="title" placeholder="Title" size="65" value="<?php echo $this->post->title; ?>"></p>
            <p>Short Description <input type="text" name="short_description" placeholder="Short description" size="65" value="<?php echo $this->post->short_description;?>"></p>
            <p>Content <textarea type="text" name="content" placeholder="Content" rows="25" cols="65"><?php echo $this->post->content;?></textarea></p>
            <p> <input type="file" name="image" placeholder="Upload" "></p>
            <input type="hidden" name="id" value="<?php echo $this->post->id;?>">
            <p><button type="submit">Update</button></p>
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