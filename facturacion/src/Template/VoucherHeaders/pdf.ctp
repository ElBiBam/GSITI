<div class='row'>
	<div class='col-md-6 offset-md-3'>
		<?= $this->BootsCakeFlash->render() ?>
		<div class='card'>
			<h3 class='card-header'>Register</h3>
			<div class="card-body">
				<?php echo $this->Form->create() ?>
				<div class='form-group'>
					<?php echo $this->Form->input(__('email'), ['class'=>'form-control','required']) ?>
				</div>
				<div class='form-group'>
					<?php echo $this->Form->input(__('password'), ['class'=>'form-control','required']) ?>
				</div>
				<?php
				echo $this->Form->button('Register', ['class'=>'btn btn-primary']);
				echo $this->Form->end();
				?>
			</div>
		</div>
	</div>
</div>
