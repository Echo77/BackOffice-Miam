<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Bootstrap, from Twitter</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    
    <style>
      body {
        padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
      }
    </style>
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
                    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
                                   <link rel="shortcut icon" href="../assets/ico/favicon.png">
  </head>

  <body>
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="/cakephp">Miam Back-Office</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li><?php echo $this->Html->link('Menu', array('controller' => 'menus', 'action' => 'index')); ?></li>
              <li><?php echo $this->Html->link('Ingrédient', array('controller' => 'ingredients', 'action' => 'index')); ?></li>
              <li><?php echo $this->Html->link('Plat', array('controller' => 'plats', 'action' => 'index')); ?></li>
              <li><?php echo $this->Html->link('Commentaires', array('controller' => 'commentaires', 'action' => 'index')); ?></li>
              <li><?php echo $this->Html->link('MaJ des données', array('controller' => 'plats', 'action' => 'sendNotification'));?></li>
              <?php if(AuthComponent::user()):?> 
              <li><?php echo $this->Html->link('Se déconnecter', array('controller' => 'users', 'action' => 'logout')); ?></li>
            <?php endif; ?>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
