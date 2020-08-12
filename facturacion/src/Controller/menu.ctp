<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Producto $producto
 */
?>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


<nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="#">Facturacion: MeryCruz</a>
        </div>
        <ul class="nav navbar-nav">
          <li class="active"><a href="/pwebfinal" class="active">Home</a></li>
          <li class="nav-item">
            <a class="nav-link" href="/~u20180584/facturacion/voucher-headers"><?=__('Vouchers')?><i class='glyphicon glyphicon-list-alt'></i></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/~u20180584/facturacion/products"><?=__('Products')?><i class='glyphicon glyphicon-barcode'></i></a>
          </li>            
          <li class="nav-item">
            <a class="nav-link" href="/~u20180584/facturacion/sellers"><?=__('Sellers')?><i  class='glyphicon glyphicon-credit-card'></i></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/~u20180584/facturacion/clients"><?=__('Clients')?><i class='glyphicon glyphicon-user'></i></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/~u20180584/facturacion/providers"><?=__('Providers')?><i class='glyphicon glyphicon-road'></i></a>
          </li>        
          
          <li class="nav-item">
            <a class="nav-link" href="/~u20180584/facturacion/users"><?=__('Users')?> <i  class='glyphicon glyphicon-lock'></i></a>
          </li>
          
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><?= $this->Html->image("flags/peru.png", [
                 'alt'=>'Español',
                 'url'=> ['controller'=>'App','action'=>'change-language','es_PE']
                 ]);  ?>
          </li> 
          <li><?= $this->Html->image("flags/usa.png", [
                   'alt'=>'English',
                   'url'=> ['controller'=>'App','action'=>'change-language','en_US']
                   ]);  ?>
          </li> 
          <li><?= $this->Html->image("flags/brazil.png", [
                   'alt'=>'Portugues',
                   'url'=> ['controller'=>'App','action'=>'change-language','pt_BR']
                   ]);  ?>
          </li>
          <li >

                <?php if($loggedIn): ?>
                    <?= $this->Html->link('Logout', '/users/logout', ['class' => 'btn btn-danger']); ?>                    
                <?php else: ?>
                    <?= $this->Html->link('Login', '/users/login', ['class' => 'btn btn-warning ']); ?>   
                <?php endif; ?>

          </li>
          <li><a href="">    </a></li>
       </ul>
      </div>
    </nav>


