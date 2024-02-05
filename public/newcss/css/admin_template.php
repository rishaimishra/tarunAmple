
<!DOCTYPE html>
<html class="no-js">
      <head>
            <meta charset="UTF-8">
            <title><?php echo $title; ?></title>
            <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
            <!-- bootstrap 3.0.2 -->
            <link href="<?php echo BASE_URL.ADMIN_CSS; ?>bootstrap.min.css" rel="stylesheet" type="text/css" />
            <!-- font Awesome -->
            <link href="<?php echo BASE_URL.ADMIN_CSS; ?>font-awesome.min.css" rel="stylesheet" type="text/css" />
            <link rel="stylesheet" href="<?php echo BASE_URL.ADMIN_CSS; ?>jquery-ui.css">
            <!-- Ionicons -->
            <link href="<?php echo BASE_URL.ADMIN_CSS; ?>ionicons.min.css" rel="stylesheet" type="text/css" />
            <!-- Daterange picker -->
            <link href="<?php echo BASE_URL.ADMIN_CSS; ?>daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
            <!-- bootstrap wysihtml5 - text editor -->
            <link href="<?php echo BASE_URL.ADMIN_CSS; ?>bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
            <!-- Theme style -->
            <link href="<?php echo BASE_URL.ADMIN_CSS; ?>AdminLTE.css" rel="stylesheet" type="text/css" />
            <link href="<?php echo BASE_URL.ADMIN_CSS; ?>style.css" rel="stylesheet" type="text/css" />
            <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
            <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
            <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
             <!-- jQuery 2.0.2 -->
            <script src="<?php echo BASE_URL.ADMIN_JS; ?>jquery-1.10.2.js"></script>
            <script src="<?php echo BASE_URL.ADMIN_JS; ?>jquery-ui.js"></script>
           
            <!-- Bootstrap -->
            <script src="<?php echo BASE_URL.ADMIN_JS; ?>bootstrap.min.js" type="text/javascript"></script>
            <script src="<?php echo BASE_URL.ADMIN_JS; ?>jquery.validate.js" type="text/javascript"></script>
            
            <script src="<?php echo BASE_URL.ADMIN_JS; ?>myscript.js" type="text/javascript"></script>
            <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
            <!-- daterangepicker -->
            <script src="<?php echo BASE_URL.ADMIN_JS; ?>plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
            <!-- Bootstrap WYSIHTML5 -->
            <script src="<?php echo BASE_URL.ADMIN_JS; ?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
            <!-- iCheck -->
            <script src="<?php echo BASE_URL.ADMIN_JS; ?>plugins/iCheck/icheck.min.js" type="text/javascript"></script>
            <!-- AdminLTE App -->
            <script src="<?php echo BASE_URL.ADMIN_JS; ?>AdminLTE/app.js" type="text/javascript"></script>
            <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
            <script src="<?php echo BASE_URL.ADMIN_JS; ?>AdminLTE/dashboard.js" type="text/javascript"></script>
            <script type="text/javascript" src="<?php echo BASE_URL.ADMIN_JS; ?>ckeditor/ckeditor.js"></script>
            <script type="text/javascript" src="<?php echo BASE_URL.ADMIN_JS; ?>ckfinder/ckfinder.js"></script>
            <![endif]-->
      </head>
    
      <?php if($islogin){$class_style='bg-black';}else{$class_style='skin-blue';} ?>
      <body class="<?php echo $class_style; ?> wysihtml5-supported  pace-done fixed">
            <?php if(!$islogin){ echo $template['partials']['header']; } ?>
            <?php if(!$islogin){ echo $template['partials']['sidebar']; } ?>
            <?php echo $template['body']; ?>
            <?php if(!$islogin){ echo $template['partials']['footer']; } ?>
      </body>
</html>
