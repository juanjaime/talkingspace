<?php include("includes/header.php");?>
<ul id="topics">
    <li id="main-topic" class="topic topic">
        <div class="row">
            <div class="col-md-2">
                <div class="user-info">
                    <img class="avatar pull-left" src="images/avatars/<?php echo $topic->avatar;?>" />
                    <ul>
                        <li><strong><?php echo $topic->username; ?></strong></li>
                        <li><?php echo userPostCount($topic->user_id);?> posts</li>

                    </ul>
                </div>
            </div>
            <div class="col-md-10">
                <div class="topic-content pull-right">
                    <h1><?php echo $topic->title; ?></h1><h4>Category: <?php echo $topiccategory; ?></h4>
                    <p><?php echo $topic->body; ?></p>
                </div>
            </div>
        </div>
    </li>
    <?php foreach($replies as $reply):?>
    <li class="topic topic">
        <div class="row">
            <div class="col-md-2">
                <div class="user-info">
                    <img class="avatar pull-left" src="images/avatars/<?php echo $reply->avatar;?>"  />
                    <ul>
                        <li><strong><?php echo $reply->username; ?></strong></li>
                        <li><?php echo userPostCount($reply->user_id);?> posts</li>

                    </ul>
                </div>
            </div>
            <div class="col-md-10">
                <div class="topic-content pull-right">
                    <p><?php echo $reply->body; ?></p>
                </div>
            </div>
        </div>
    <?php endforeach ?>
</ul>
<?php if (isLogged()):?>
<h3>Reply To Topic</h3>

<form role="form" method="post" action="topic.php?topicid=<?php echo $topic->id;?>">
    <div class="form-group">
        <textarea id="reply" rows="10" cols="80" class="form-control" name="body"></textarea>
        <script>
            CKEDITOR.replace( 'reply' );
        </script>
    </div>
    <button type="submit" name="do_reply" class="btn btn-default">Submit</button>
</form>
<?php else: ?>
    <h3>Reply To Topic</h3>

        <p>Please Log In to comment</p>
 
<?php endif; ?>
<?php include("includes/footer.php");?>

