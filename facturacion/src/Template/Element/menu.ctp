<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Producto $producto
 */
?>
<script>

  function statusChangeCallback(response) {  // Called with the results from FB.getLoginStatus().
    console.log('statusChangeCallback');
    console.log(response);                   // The current login status of the person.
    if (response.status === 'connected') {   // Logged into your webpage and Facebook.
      testAPI();

    } else {                                 // Not logged into your webpage or we are unable to tell.
      //document.getElementById('status').innerHTML = 'Please log ' +
        //'into this webpage.';
    }
  }


  function checkLoginState() {               // Called when a person is finished with the Login Button.
    FB.getLoginStatus(function(response) {   // See the onlogin handler
      statusChangeCallback(response);
      window.location.href = '/facturacion/users/loginfb?name='+document.getElementById('name').innerHTML
      +'&'+'email='+document.getElementById('email').innerHTML;
    });
  }


  window.fbAsyncInit = function() {
    FB.init({
      appId      : '436118690432746',
      cookie     : true,                     // Enable cookies to allow the server to access the session.
      xfbml      : true,                     // Parse social plugins on this webpage.
      version    : 'v5.0'           // Use this Graph API version for this call.
    });


    FB.getLoginStatus(function(response) {   // Called after the JS SDK has been initialized.
      statusChangeCallback(response);        // Returns the login status.
    });
  };

  
  (function(d, s, id) {                      // Load the SDK asynchronously
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "https://connect.facebook.net/en_PE/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));

 
  function testAPI() {                      // Testing Graph API after login.  See statusChangeCallback() for when this call is made.
    console.log('Welcome!  Fetching your information.... ');

    FB.api('/me',  {fields: 'id,name,email'}, function(response) {
      console.log('Successful login for: ' + response.name+' '+response.email);
      //window.location.href = '/facturacion/users/loginfb?name='+response.name;
      document.getElementById('name').innerHTML = response.name;
      document.getElementById('email').innerHTML = response.email;
    });
  }


</script>
<style>
.padded {
    padding-top: 5px;
    height:22px /* original height (25px) minus padding-top (3px) */
    text-align: center;
}
</style>


<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
  <?= $this->Html->link('Coorp. Mery Cruz',array('controller'=>'Pages','action'=>'display','home'), ['class' => 'nav-brand']) ?>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="nav navbar-nav">
      <li class="nav-item">          
        <?php if($loggedIn): extract($loggedIn, EXTR_PREFIX_SAME, "wddx"); if($role_id == 1 || $role_id == 3): ?>
          <?= $this->Html->link(__('Vouchers'), ['controller' => 'VoucherHeaders', 'action' => 'index'], ['class' => 'nav-link']) ?>
        <?php endif; endif; ?>
      </li>
      <li class="nav-item">
        <?php if($loggedIn): extract($loggedIn, EXTR_PREFIX_SAME, "wddx"); if($role_id == 1 || $role_id == 2 || $role_id == 3): ?>
          <?= $this->Html->link(__('Products'), ['controller' => 'Products', 'action' => 'index'], ['class' => 'nav-link']) ?>
        <?php endif; endif; ?>
      </li>            
      <li class="nav-item">
        <?php if($loggedIn): extract($loggedIn, EXTR_PREFIX_SAME, "wddx"); if($role_id == 1): ?>
          <?= $this->Html->link(__('Sellers'), ['controller' => 'Sellers', 'action' => 'index'], ['class' => 'nav-link']) ?>
        <?php endif; endif; ?>
      </li>
      <li class="nav-item">
        <?php if($loggedIn): extract($loggedIn, EXTR_PREFIX_SAME, "wddx"); if($role_id == 1): ?>
          <?= $this->Html->link(__('Clients'), ['controller' => 'Clients', 'action' => 'index'], ['class' => 'nav-link']) ?>
        <?php endif; endif; ?>
      </li>
      <li class="nav-item">
        <?php if($loggedIn): extract($loggedIn, EXTR_PREFIX_SAME, "wddx"); if($role_id == 1): ?>
          <?= $this->Html->link(__('Providers'), ['controller' => 'Providers', 'action' => 'index'], ['class' => 'nav-link']) ?>
        <?php endif; endif; ?>
      </li>
      <li class="nav-item">
        <?php if($loggedIn): extract($loggedIn, EXTR_PREFIX_SAME, "wddx"); if($role_id == 1): ?>
          <?= $this->Html->link(__('Warehouses'), ['controller' => 'Warehouses', 'action' => 'index'], ['class' => 'nav-link']) ?>
        <?php endif; endif; ?>
      </li>
      <li class="nav-item">
        <?php if($loggedIn): extract($loggedIn, EXTR_PREFIX_SAME, "wddx"); if($role_id == 1): ?>
          <?= $this->Html->link(__('Persons'), ['controller' => 'Persons', 'action' => 'index'], ['class' => 'nav-link']) ?>
        <?php endif; endif; ?>
      </li>
      <li class="nav-item">
        <?php if($loggedIn): extract($loggedIn, EXTR_PREFIX_SAME, "wddx"); if($role_id == 1): ?>
          <?= $this->Html->link(__('Cities'), ['controller' => 'Cities', 'action' => 'index'], ['class' => 'nav-link']) ?>
        <?php endif; endif; ?>
      </li>
      <li class="nav-item">
        <?php if($loggedIn): extract($loggedIn, EXTR_PREFIX_SAME, "wddx"); if($role_id == 1): ?>
          <?= $this->Html->link(__('Users'), ['controller' => 'Users', 'action' => 'index'], ['class' => 'nav-link']) ?>
        <?php endif; endif; ?>
      </li>
      <li class="nav-item">
        <?php if($loggedIn): extract($loggedIn, EXTR_PREFIX_SAME, "wddx"); if($role_id == 1): ?>
          <?= $this->Html->link(__('Report Sales'), ['controller' => 'VoucherHeaders', 'action' => 'reportesales'], ['class' => 'nav-link']) ?>
        <?php endif; endif; ?>
      </li>
      <li class="nav-item">
        <?php if($loggedIn): extract($loggedIn, EXTR_PREFIX_SAME, "wddx"); if($role_id == 1): ?>
          <?= $this->Html->link(__('Report Stock'), ['controller' => 'VoucherHeaders', 'action' => 'reportestock'], ['class' => 'nav-link']) ?>
        <?php endif; endif; ?>
      </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="padded" class="nav-item"><?= $this->Html->image("flags/peru.png", [
               'alt'=>'Español',
               'url'=> ['controller'=>'App','action'=>'change-language','es_PE']
               ]);  ?>
        </li>
        <li class="padded"class="nav-item"><?= $this->Html->image("flags/usa.png", [
                 'alt'=>'English',
                 'url'=> ['controller'=>'App','action'=>'change-language','en_US']
                 ]);  ?>
        </li>
        <li class="padded"class="nav-item"><?= $this->Html->image("flags/brazil.png", [
                 'alt'=>'Portugues',
                 'url'=> ['controller'=>'App','action'=>'change-language','pt_BR']
                 ]);  ?>
        </li>
        <li>
          <p> &nbsp;&nbsp;&nbsp; </p>
        </li>
        <li class="nav-item">
          <?= $this->Html->link(__('Sign in'), '/users/register', ['class' => 'btn btn-info']); ?>
        </li>
        <li class="nav-item">
          <div id="role_id" style="display: none;">
            <?php if($loggedIn): ?>
              <?php extract($loggedIn, EXTR_PREFIX_SAME, "wddx"); print_r($role_id); ?>
            <?php endif; ?>  
          </div>
        </li>
        <li>
          <p> &nbsp;&nbsp;&nbsp; </p>
        </li>
        <li class="nav-item">
          <?php if($loggedIn): ?>
              <!--?= $this->Html->link(__('Logout'), '/users/logout', ['class' => 'btn btn-danger']); ?-->
          <?php else: ?>

                <fb:login-button class="padded" scope="public_profile,email" onlogin="checkLoginState();">
                </fb:login-button>


              <div id="name" style="display: none;">
              </div>
              <div id="email" style="display: none;">
              </div>
          <?php endif; ?>
        </li>
        <li>
          <p> &nbsp;&nbsp;&nbsp; </p>
        </li>
        <li class="nav-item">
          <?php if($loggedIn): ?>
                      <?= $this->Html->link(__('Logout'), '/users/logout', ['class' => 'btn btn-danger']); ?>                    
                  <?php else: ?>
                      <?= $this->Html->link(__('Login'), '/users/login', ['class' => 'btn btn-warning ']); ?>   
                  <?php endif; ?>
        </li>
      </ul>
    
  </div>

</nav>


