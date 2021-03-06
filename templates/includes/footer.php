</div>
</div>
</div>
<div class="col-md-4">
    <div class="sidebar">
        <div class="block">
            <?php if (!isLogged()):?>
            <h3>Login Form</h3>
            <form role="form" method="post" action="login.php">
                <div class="form-group">
                    <label>Username</label>
                    <input name="username" type="text" class="form-control" placeholder="Enter Username">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input name="password" type="password" class="form-control" placeholder="Enter Password">
                </div>
                <button name="do_login" type="submit" class="btn btn-primary">Login</button> <a  class="btn btn-default" href="register.php"> Create Account</a>
            </form>
        </div>
        <?php else: ?>
        <h3><?php echo getUser()['username']?></h3>
            <div class="userdata">
                Welcome, <?php echo getUser()['name']; ?>
            </div>
            <br>
            <form role="form" method="post" action="logout.php">
                <input type="submit" name="do_logout" class="btn btn-primary" value="Logout" />
            </form>
    </div>
        <?php endif; ?>
        <div class="block">
            <h3>Categories</h3>
            <div class="list-group">
                <a href="topics.php" class="list-group-item <?php echo isactive(null);?>">All Topics <span class="badge pull-right"><?php echo totalTopicCount(); ?></span></a>

                    <?php foreach (categoryDisplay() as $category):?>
                        <a href="topics.php?category=<?php echo urlencode($category->id);?>" class="list-group-item <?php echo isactive($category->id);?>"><?php echo $category->name; ?><span class="badge pull-right"><?php echo topicCount($category->id) ?></span></a>
                    <?php endforeach ;?>


            </div>
        </div>
    </div>
</div>
</div>
</div><!-- /.container -->


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="js/bootstrap.js"></script>
</body>
</html>