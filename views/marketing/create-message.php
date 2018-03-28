<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model app\model_extended\MailList */
/* @var $form yii\widgets\ActiveForm */

$field_template = <<<TEMPLATE
<label><h5>{label}</h5></label>
<div class="input-group input-group-icon">
     {input} 
    <span class="input-group-addon">
        <span class="icon"><i class="fa fa-envelope-open"></i></span>
    </span>
</div>
    {error}{hint}
TEMPLATE;

$ajaxUrl = \yii\helpers\Url::to(['marketing/update-list']);

$ajaxScript = <<<AJAX
$("#update-lists").click(function(){
$("#statusList").empty();
var _list_id = $('#list_name').val() 

if(_list_id.length==0){
alert('Please specify list to send emails');

return false;
}
  $.ajax({
       url: '/marketing/update-list',
       dataType: 'json',
       method:'GET',
       data: {list_id: _list_id},
       success: function(data) {
           // process data
            $('#batch-id').val(data.id);
            
            $('#statusList').append('<li class="list-group-item active">Batch Status : '+data.status+'</li>');
       }
    });
 
});

$("#batch-status").click(function(){
var _batch_id = $('#batch-id').val() 
$("#statusList").empty();
  $.ajax({
       url: '/marketing/batch-status',
       dataType: 'json',
       method:'GET',
       data: {batch_id: _batch_id},
       success: function(data) {
           //-----process data-----//
           //console.log(data);
           if(data.status==='finished'){
                //clear
                $('#send-campaign').prop("disabled",false);
                
           }
           //------------END------------//
           $('#statusList').append('<li class="list-group-item active">Batch Status : '+data.status+'</li>');
           $('#statusList').append('<li class="list-group-item">Finished Operations : <span class="badge">'+data.finished_operations+'</span></li>');
           //$('#status').text(data.status) 
           //$('#batch-id').val(data.id);
       }
    });
 
});

$("#add-customers").click(function(){
var _list_id = $('#list_name').val();

if(_list_id.length==0){
alert('Please specify list to send emails');

return false;
}

  $('#send-campaign').prop("disabled",true);
  $.ajax({
       url: '/marketing/add-customers',
       dataType: 'json',
       method:'GET',
       data: {list_id: _list_id},
       success: function(data) {
           //-----process data-----//
           console.log(data.status);
           if(data.status==='finished'){
                //clear
                $('#send-campaign').prop("disabled",false);
           }
           //------------END------------//
           $('#statusList').append('<li class="list-group-item">Batch Status : '+data.status+'</li>');
           $('#statusList').append('<li class="list-group-item">Finished Operations : <span class="badge">'+data.finished_operations+'</span></li>');
           //$('#status').text(data.status) 
           $('#batch-id').val(data.id);
       }
    });
 
});

$("#compose-sms").click(function(){
  // this function will get executed every time the #sms element is clicked (or tab-spacebar changed)
    if($(this).is(":checked")) // "this" refers to the element that fired the event
    {
        alert('home is checked');
    }
});
AJAX;


echo $this->registerJs($ajaxScript);
?>

<div>
    <h1>How to send email campaigns</h1>
    <ol>
        <li>Select the <span class="label label-primary">Customer Category</span> from the dropdown list</li>
        <li>Click on update list to update the mailing list
            <mark>(This is important in order for new customer who had not
                ordered and ordered in between last campaign to be moved to the correct list)
            </mark>
        </li>
        <li>
            <mark>
                Click on check status button
                until the Batch Status message says <span class="label label-danger">finished</span>
            </mark>
        </li>
        <li>Proceed to <span class="label label-success">Add Customers</span> tab</li>
        <li>Click on add customers to campaign to add new customers&nbsp; after the update
            <mark>
                (Click on check status button
                until the Batch Status message says <span class="label label-danger">finished</span>)
            </mark>
        </li>
        <li>Compose your message</li>
        <li>Click on <span class="label label-primary">Send Message</span></li>
        <li>Login to mailchimp to monitor the sending status and user response</li>
    </ol>
</div>
<?php $form = ActiveForm::begin(); ?>
<?php
$tabs = [
    [
        'tabtitle' => 'Update Selected List',
        'tabcontent' => $this->render('wizard/update-lists', [
            'model' => $model,
            'form' => $form,
            'field_template' => $field_template
        ]),
    ],
    [
        'tabtitle' => 'Add Customers to list',
        'tabcontent' => $this->render('wizard/create-subscribers', [
            'model' => $model,
            'form' => $form,
            'field_template' => $field_template
        ]),
    ],
    [
        'tabtitle' => 'Compose Message',
        'tabcontent' => $this->render('wizard/compose-message', [
            'model' => $model,
            'form' => $form,
            'field_template' => $field_template
        ]),
    ],
    [
        'tabtitle' => 'Send Message',
        'tabcontent' => Html::submitButton(Yii::t('app', 'Send Message'), ['class' => 'btn btn-success btn-lg btn-block', 'disabled' => true, 'id' => 'send-campaign']),
    ],
];

?>
<ul class="list-group" id="statusList">
    <!-- add list items with jquery -->
</ul>

<?= $form->errorSummary($model) ?>


<?= \chd7well\wizard\Wizard::widget(['tabs' => $tabs]); ?>
<?= Html::textInput('batch_id', null, ['id' => 'batch-id', 'class' => 'form-control', 'readonly' => true, 'placeholder' => 'List Number']) ?>
<?= Html::button('Check Status', ['id' => 'batch-status', 'class' => 'btn btn-danger btn-block', 'style' => 'margin-bottom:10px;']) ?>
<?php ActiveForm::end(); ?>

