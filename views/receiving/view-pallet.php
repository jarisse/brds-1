<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */

$this->title = 'View Receiving Contents';
?>
<div id="main-content">
	
	<div class="wrapper-150">
		<h1 class="page-title">View Receiving Contents</h1>

		<div class="one-column help-bg-gray pdt-one-column" >
		    <?php 
		    	$js = 'function beforeValidate(form) {if ( form.data("cancel") {this.validateOnSubmit = false;this.beforeValidate = "";form.submit();return false;}return true;}';
		    	$form = ActiveForm::begin([
		    	'options' => ['class' => 'form-horizontal'],
		    	'fieldConfig' => [
		    		'template' => '<div class="control-group">{label}<div class="f-full-size">{input}</div></div>',
		    	]
		    ]); ?>
		    
		    <?= $form->field($customer_model, 'name')->dropDownList($customer_list, ['class'	=> 'uborder help-70percent',
																 			 'prompt'	=> '-- Select a customer --',
																 			 'onchange'	=> 'getTransactionList(getFieldValueById("mstcustomer-name"));
																 			 				hideHTMLById("trx-details");'])->label('SELECT CUSTOMER', ['class' => 'control-label-f']); ?>
		    
		    <?= $form->field($transaction_model, 'transaction_id', 
						['template' 	=> '<div class="control-group">{label}<div>{input}
											<button class="btn btn-primary help-20percent" onclick="js: viewTransactionSummary(getFieldValueById(\'trxtransactiondetails-transaction_id\')); return false;" 
											name="btn-transaction-summary">Summary</button>
											</div></div>'])->dropDownList($transaction_list, ['class'	=> 'uborder help-50percent',
																							  'prompt'	=> '-- Select a transaction --',
																							  'onchange' => 'getTransaction(getFieldValueById("trxtransactiondetails-transaction_id"))'])->label('SELECT TRANSACTION', ['class' => 'control-label-f']); ?>
		    
			
			<div class="control-group">
				<label class="control-label-f">TRANSACTION DETAILS</label>
	            <div class="f-full-size help-75percent" style="background:#ccc; min-height: 365px; padding:20px;">
	            	<div id="trx-details" style="display: none;">
	            		<div class="control-group">
		            		<div class="f-inline-size">
		            			<?= Html::textInput('customer_name', null, ['class' => 'text-view',
		            									   		   		    'disabled' => 'disabled']); ?>
		            		</div>
		            	</div>
		            	<div class="control-group">
		            		<div class="f-inline-size">
		            			<?= Html::textInput('customer_code', null, ['class' => 'text-view',
		            									   		   		    'disabled' => 'disabled']); ?>
		            		</div>
		            	</div>
		            	<div class="control-group">
		            		<?= Html::label('DATE', 'created_date', ['class' => 'control-label']) ?>
		            		<div class="f-inline-size">
		            			<?= Html::textInput('created_date', null, ['class' 	  => 'uborder disabled help-40percent',
		            									   		   		   'disabled' => 'disabled']); ?>
		            		</div>
		            	</div>
		            	<div class="control-group">
		            		<?= Html::label('BRDS ID #', 'transaction_id', ['class' => 'control-label']) ?>
		            		<div class="f-inline-size">
		            			<?= Html::textInput('transaction_id', null, ['class' 	=> 'uborder disabled help-40percent',
		            									   		   		     'readonly' => 'readonly']); ?>
		            		</div>
		            	</div>
		            	<div class="control-group">
		            		<?= Html::label('SAP #', 'sap_no', ['class' => 'control-label']) ?>
		            		<div class="f-inline-size">
		            			<?= Html::textInput('sap_no', null, ['class' 	=> 'uborder disabled help-40percent',
		            									   		   				   'disabled' => 'disabled']); ?>
		            		</div>
		            	</div>
		            	<div class="control-group">
		            		<?= Html::label('WAREHOUSE', 'plant_location', ['class' => 'control-label']) ?>
		            		<div class="f-inline-size">
		            			<?= Html::textInput('plant_location', null, ['class' 	=> 'uborder disabled help-20percent',
		            									   		   			 'disabled' => 'disabled']); ?>
		            		</div>
		            	</div>
		            	<div class="control-group">
		            		<?= Html::label('S. LOC', 'storage_location', ['class' => 'control-label']) ?>
		            		<div class="f-inline-size">
		            			<?= Html::textInput('storage_location', null, ['class' 	=> 'uborder disabled help-40percent',
		            									   		   			 'disabled' => 'disabled']); ?>
		            		</div>
		            	</div>
		            	<div class="control-group">
		            		<?= Html::label('T.PLATE #', 'truck_van', ['class' => 'control-label']) ?>
		            		<div class="f-inline-size">
		            			<?= Html::textInput('truck_van', null, ['class' 	=> 'uborder disabled help-20percent',
		            									   		   		'disabled' => 'disabled']); ?>
		            		</div>
		            		<?= Html::button('Remarks', ['class' => 'btn btn-primary help-20percent',
		            									 'onclick' => 'alert(remarks);']) ?>
		            	</div>
		            	<div class="control-group">
		            		<?= Html::label('# Pallet(s)', 'pallet_count', ['class' => 'control-label']) ?>
		            		<div class="f-inline-size">
		            			<?= Html::textInput('pallet_count', null, ['class' 	=> 'uborder disabled help-20percent',
		            									   		   			 'disabled' => 'disabled']); ?> PP
								<?= Html::button('View', ['class' => 'btn btn-primary help-20percent',
													      'name'  => 'view-entries',
													      'onclick' => 'js: viewTransactionSummary(getFieldValueById("trxtransactiondetails-transaction_id")); return false;',]) ?>
		            		</div>
		            	</div>
		            	<div class="control-group" style="margin-bottom: 10px;">
		            		<?= Html::label('Total WT', 'total_weight', ['class' => 'control-label']) ?>
		            		<div class="f-inline-size">
		            			<?= Html::textInput('total_weight', null, ['class' 	=> 'uborder disabled help-20percent',
		            									   		   	 'disabled' => 'disabled']); ?> KG
		            		</div>
		            	</div>
	            	</div>
			</div>
		
		    <div class="form-group">
		    	<div class="one-column-button">
					<div class="submit-button ie6-submit-button">
		        		<?= Html::submitButton('Edit Receiving', ['class' => 'btn btn-primary',
		        												  'name'  => 'edit-receiving']) ?>
		        		<?= Html::submitButton('Cancel', ['class' => 'btn btn-primary cancel-button',
		        										  'name'  => 'cancel']) ?>
		        	</div>
		        </div>
		    </div>
		
		    <?php ActiveForm::end(); ?>
		</div>
	</div>
</div>

<script type="text/javascript">
	window.onload=function() {
		var remarks;
		getTransaction();
	}
</script>
