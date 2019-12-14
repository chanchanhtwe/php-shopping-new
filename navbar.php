<?php session_start(); ?>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php"><i class="glyphicon glyphicon-shopping-cart"></i> MM Shopping</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">

            </ul>

            <ul class="nav navbar-nav navbar-right">

                <?php
                if(isset($_SESSION['login'])){
                    //echo "login";
                   // print_r($_SESSION['login']);
                    if(isset($_SESSION['login']['role'])){
                        ?>
                        <li>
                            <a href="dashboard.php">
                                <i class="glyphicon glyphicon-dashboard"></i> Dashboard</a>
                            </a>
                        </li>
                        <li>
                            <a href="orders.php">
                                <i class="glyphicon glyphicon-list-alt"></i> Orders
                            </a>
                        </li>
                        <li>
                            <a href="posts.php">
                                <i class="glyphicon glyphicon-tags"></i> Posts
                            </a>
                        </li>
                        <li>
                            <a href="categories.php"><i class="glyphicon glyphicon-th-list"></i> Categories</a>
                        </li>
                        <?php
                    }
                    ?>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="glyphicon glyphicon-user"></i> <?php echo $_SESSION['login']['name'] ?> <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="setting.php"><i class="glyphicon glyphicon-cog"></i> Setting</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="logoutshop.php"><i class="glyphicon glyphicon-log-out"></i> Logout</a></li>
                        </ul>
                    </li>
                    <?php
                }else{
                   // echo "No login";
                    ?>
                    <li><a href="loginshop.php"><i class="glyphicon glyphicon-log-in"></i> Login </a></li>
                    <?php
                }
                ?>

            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>