<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Blog- <?php foreach ($this->posts as $post){ echo $post->title;}?></title>
</head>
<body>
    <div style="width: 900px; margin: auto;">
        <header style="background-color: grey; height: 75px; padding: 5px; width: 100%">
            <div id="logo" style="width: 100px;"><h1 style="color: white; float: left;">Blog!</h1></div>
            <?php if (!empty($this->user)) { ?>
                <div style="color: white; margin-left: auto; margin-right: 0; margin-top: 25px; max-width: 150px;"><p style="color: white">Welcome, <?php echo $this->user->name;?></p></div>
            <?php } else { ?>
                <div style="color: white; margin-left: auto; margin-right: 0; margin-top: 25px; max-width: 150px;"><a style="color: white" href="/user/signIn">Sign In</a> / <a href="/user/signUp" style="color: white">SignUp</a></div>
            <?php } ?>
        </header>


    <?php foreach ($this->posts as $post){?>
    <div style="border-width: 1px; border-color: black; border-style: double; margin-top: 5px; min-height: 275px;">
        <article style="border: 1px; margin-bottom: 15px; padding: 5px;">
            <h2><?php echo $post->title; ?></h2>
            <div style="width: 150px; max-height: 150px; float: left; padding: 5px;"><img src="/images/<?php echo $post->image?>" width="150px" style="padding-right: 5px; max-height: 150px"></div>
            <p style="overflow: hidden; text-overflow: ellipsis; text-align: justify;"><?php echo $post->content; ?>
            <hr />
            <p style="text-align: right"><?php echo date('d/m/y',strtotime($post->date)); ?> by <?php echo $post->user; ?></p>
        </article>
    </div>
    <?php }?>


    <footer>

    </footer>

</div>
</body>
</html>