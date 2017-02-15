<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>AdminLTE 2 | Log in</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- jQuery 2.2.3 -->
        <script src="<?php echo SCRIPTPATH ?>/jquery-1.11.3.js" type="text/javascript"></script>
        <script src="<?php echo SCRIPTPATH ?>/admin.js" type="text/javascript"></script>
        <script src="<?php echo SCRIPTPATH ?>/js/bootstrap.min.js" type="text/javascript"></script>
        <!-- Bootstrap 3.3.6 -->
        <link rel="stylesheet" href="<?php echo COMPONENTPATH ?>/bootstrap-3.3.7-dist/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?php echo CSSPATH ?>/font-awesome.min.css">
        <!-- Ionicons -->
        <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">-->
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo CSSPATH ?>/AdminLTE.min.css">
        <!-- iCheck -->
        <!--<link rel="stylesheet" href="<?php echo PLUGINSPATH ?>/iCheck/square/blue.css">-->


        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="login-logo">
                <a href="../../index2.html">FRS</a>
            </div>
            <!-- /.login-logo -->
            <div class="login-box-body">
                <p class="login-box-msg">Sign in to start your session</p>

                <form id="login-form" action="<?php echo BASE_URL . '/auth/login' ?>" method="post">
                    <div class="form-group has-feedback">
                        <input type="name" class="form-control required" name="userName" placeholder="User Name" data-type="userName">
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" class="form-control required" name="password" placeholder="Password" data-type="password">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="row">
                        <div class="col-xs-8">
                            <div class="login-checkbox icheck">
                                <label>
                                    <input type="checkbox"> Remember Me
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-xs-4">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>


                <!-- /.social-auth-links -->

                <a href="#">I forgot my password</a><br>

            </div>
            <!-- /.login-box-body -->
        </div>
        <!-- /.login-box -->

        <!-- jQuery 2.2.3 -->


        <!--<script src="<?php echo PLUGINSPATH ?>/jQuery/jquery-2.2.3.min.js" type="text/javascript"></script>-->
        <!-- Bootstrap 3.3.6 -->
        
        <!-- iCheck -->
        <script src="<?php echo SCRIPTPATH ?>/iCheck/icheck.min.js"></script>

    </body>
</html>
