<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\VoucherHeader $voucherHeader
 */
?>

<div  style="background: #0D1D52;">
            <ul class="nav nav-tabs">
                    <li class="nav-item"><?= $this->Html->link(__('List Voucher Headers'), ['action' => 'index'], ['class' => 'nav-link']) ?></li>
                    <li class="nav-item"><?= $this->Html->link(__('List Voucher Types'), ['controller' => 'VoucherTypes', 'action' => 'index'], ['class' => 'nav-link']) ?></li>
                    <li class="nav-item"><?= $this->Html->link(__('New Voucher Type'), ['controller' => 'VoucherTypes', 'action' => 'add'], ['class' => 'nav-link']) ?></li>
                    <li class="nav-item"><?= $this->Html->link(__('List Sellers'), ['controller' => 'Sellers', 'action' => 'index'], ['class' => 'nav-link']) ?></li>
                    <li class="nav-item"><?= $this->Html->link(__('New Seller'), ['controller' => 'Sellers', 'action' => 'add'], ['class' => 'nav-link']) ?></li>
                    <li class="nav-item"><?= $this->Html->link(__('List Clients'), ['controller' => 'Clients', 'action' => 'index'], ['class' => 'nav-link']) ?></li>
                    <li class="nav-item"><?= $this->Html->link(__('New Client'), ['controller' => 'Clients', 'action' => 'add'], ['class' => 'nav-link']) ?></li>
            </ul>
</div>

<div class="row">
    <div class="col-md-6 col-md-offset-3"> 
        <?= $this->Form->create($voucherHeader) ?>
        <fieldset class="form-group">
            <legend><?= __('Add Voucher Header') ?></legend>          
            <?php                
                echo $this->BootsCakeForm->control('issue_date',  array(
                'label' => __('Issue Date'),
                'type'=>'datetime',                
                'default' => date('Y-m-d H:i'),
                ), ['empty' => true]);
                echo $this->Form->control('voucher_type_id', ['options' => $voucherTypes]);
                echo $this->Form->control('seller_id', ['options' => $sellers]);
                echo $this->Form->control('client_id', ['options' => $clients]);
                echo $this->Form->control('status', ['type' => 'checkbox']);
            ?>        
        </fieldset>             
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <legend><?= __('Add Voucher Detail') ?></legend>
    </div>
</div>

<div class="row">
    <div class="col-sm-4">
        <?=__('Product') ?>
    </div>
    <div class="col-sm-2">
        <?=__('Quantity') ?>
    </div>     
    <div class="col-sm-2">
        <?=__('Price') ?>
    </div>
    <div class="col-sm-2">
        <?=__('Amount') ?>
    </div>
</div>
</br>

<?php
    $count = 4;
    for($i=0; $i<$count; $i++){

?>
<fieldset> 
    <div class="row">	
	    
            	<?php echo $this->Form->hidden('voucher_details.'.$i.'.id'); ?>
            
	    <div class="col-sm-4">
                <?php echo $this->Form->control('voucher_details.'.$i.'.product_id', ['label' => ''], ['options' => $products]); ?>
            </div>
            <div class="col-sm-2">                    
                <?php echo $this->Form->input('voucher_details.'.$i.'.quantity', ['type'=>'number', 'label' => '','onBlur'=>'Calcular()']); ?>
            </div>
            <div class="col-sm-2">
                <?php echo $this->Form->input('voucher_details.'.$i.'.price', ['type'=>'number', 'label' => '','onBlur'=>'Calcular()']); ?>            
            </div>
	    <div class="col-sm-2">
                <?php echo $this->Form->input($i.'.amount', ['type'=>'number', 'label' => '']); ?>            
            </div>                                   
    </div>
<?php
    }
?>
    <div class="row">	
	<div class="col-sm-8">
	</div>
	<div class="col-sm-2">
                <?php echo $this->Form->input('total', ['label' => 'Total', 'readonly']); ?>            
        </div> 
    </div>
</fieldset> 

 <div class="row">
    <div class="col-md-4 col-md-offset-3"> 
        <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-info']) ?>
        <?= $this->Form->end() ?>
    </div>
</div>

<script type="text/javascript">
  function Calcular () {
    var total = 0;
    for(var i=0;i<4;i++){
	var cantidad = document.getElementById('voucher-details-'+i+'-quantity');
	var precio = document.getElementById('voucher-details-'+i+'-price');
	var amount = cantidad.value*precio.value;
	amountFix = amount.toFixed(2);
	document.getElementById(i+'-'+'amount').value = amountFix;
	total = total + cantidad.value*precio.value;
    }
    totalFix = total.toFixed(2);
    document.getElementById('total').value = totalFix;
 }
</script>
