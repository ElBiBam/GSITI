<?php

?>
<?= $this->Html->css(captcha_layout_stylesheet_url(), ['inline' => false]) ?>
<h1><?php echo __('Login') ?></h1>
<?= $this->Form->create() ?>
<?= $this->Form->control('email') ?>
<?= $this->Form->control('password') ?>
<?= captcha_image_html() ?> 


  <!-- Captcha code user input textbox --> 
  <?= $this->Form->input('CaptchaCode', [ 
    'label' => 'Retype the characters from the picture:', 
    'maxlength' => '10', 
    'style' => 'width: 270px;', 
    'id' => 'CaptchaCode' 
  ]) ?> 
<?= $this->Form->button(__('Login'), ['class'=>'btn btn-primary']) ?>
<?= $this->Form->end() ?>