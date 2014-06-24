<?php
Yii::app()->clientScript->registerCoreScript('jquery');

$form = $this->beginWidget('bootstrap.widgets.BsActiveForm', array(
    'action' => Yii::app()->createAbsoluteUrl('jobs/applyJob'),
    'enableAjaxValidation' => true,
    'id' => 'applyjob',
    'htmlOptions' => array(
        'enctype' => 'multipart/form-data',
    ),

));
?>

<?php
echo $form->textFieldControlGroup($model, 'name', array(
    'prepend' => BsHtml::icon(BsHtml::GLYPHICON_USER)
));
?>
<?php
echo $form->textFieldControlGroup($model, 'phone_cell', array(
    'prepend' => BsHtml::icon(BsHtml::GLYPHICON_PHONE)
));
?>
<?php
echo $form->emailFieldControlGroup($model, 'email', array(
    'prepend' => BsHtml::icon(BsHtml::GLYPHICON_ENVELOPE)
));
?>
<input type="hidden" maxlength="255" id="Users2jobs_ajax" name="Users2jobs[cv_path]" value="">
<input type="hidden" maxlength="255" id="Users2jobs_cv_path" name="ajax" value="applyjob">
<input type="hidden"  id="Users2jobs_job_id" name="Users2jobs[job_id]" value="<?php echo $model->job_id;?>">

<?php $this->widget('ext.EAjaxUpload.EAjaxUpload',
                 array(
                       'id'=>'EAjaxUpload',
                       'config'=>array(
                                       'action'=>$this->createUrl('jobs/uploadFileByAjax'),
                                       'template'=>'<div class="qq-uploader"><div class="qq-upload-drop-area"><span>Drop files here to upload</span></div><div class="qq-upload-button">Select You CV</div><ul class="qq-upload-list"></ul></div>',
                                       'debug'=>false,
                                       'allowedExtensions'=>array("jpg","jpeg","gif","png"),
                                       'sizeLimit'=>10*1024*1024,// maximum file size in bytes
                                       'minSizeLimit'=>10*10,// minimum file size in bytes
                                       'onComplete'=>"js:function(id, fileName, responseJSON){jQuery('#Users2jobs_cv_path').val(fileName) }",
                                       'messages'=>array(
                                                        'typeError'=>"{file} has invalid extension. Only {extensions} are allowed.",
                                                         'sizeError'=>"{file} is too large, maximum file size is {sizeLimit}.",
                                                         'minSizeError'=>"{file} is too small, minimum file size is {minSizeLimit}.",
                                                         'emptyError'=>"{file} is empty, please select files again without it.",
                                                         'onLeave'=>"The files are being uploaded, if you leave now the upload will be cancelled."
                                                       ),
                                       'showMessage'=>"js:function(message){ alert(message); }"
                                      )
                      )); ?>
<?php
echo BsHtml::ajaxSubmitButton('Submit', Yii::app()->createAbsoluteUrl('jobs/applyJob'), array(
    'color' => BsHtml::BUTTON_COLOR_DEFAULT,
));
?>
<?php
$this->endWidget();
?>



