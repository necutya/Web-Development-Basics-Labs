<?php
include_once("header.php");


$posts = array(
                array('title' => "First Post",
                    'date' => date('g:iA d M Y'),
                    'author' => 'Artem Lebedev',
                    'content' => "It`s just a first post"),
                array('title' => "First Post",
                    'date' => date('g:iA d M Y'),
                    'author' => 'Artem Lebedev',
                    'content' => "It`s just a first post")
);
?>

<?php foreach ($posts as $post):?>
    <div class="post">
        <div class="content">
            <div class="metadata">
                <p><a class="name" href="#"><?php echo $post['author']?></a></>
                <p class="date"><?php echo $post['date']?></p>
            </div>
            <h2><a href=""><?php echo $post['title']?></a></h2>
            <p><?php echo $post['content']?></p>
        </div>
    </div>
<?php endforeach;?>


<?php include_once("navigation.php");
include_once("footer.php");
?>