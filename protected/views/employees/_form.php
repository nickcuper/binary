<?php
/* @var $this EmployeesController */
/* @var $model Employees */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('bootstrap.widgets.BsActiveForm', array(
        'id' => 'employees-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => false,
    ));
    ?>
    
    <?php echo $form->errorSummary($model); ?>
    
    <?php echo $form->textFieldControlGroup($model, 'first_name', array('size' => 60, 'maxlength' => 64)); ?>

    <?php echo $form->textFieldControlGroup($model, 'last_name', array('size' => 60, 'maxlength' => 64)); ?>

    <?php echo $form->textFieldControlGroup($model, 'positions', array('size' => 60, 'maxlength' => 255)); ?>

    <?php echo $form->emailFieldControlGroup($model, 'email', array('size' => 60, 'maxlength' => 255)); ?>

    <?php echo $form->textFieldControlGroup($model, 'phone', array('size' => 32, 'maxlength' => 32)); ?>

    <?php echo $form->textAreaControlGroup($model, 'notes', array('rows' => 6, 'cols' => 50)); ?>


    <?php
    echo BsHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array(
        'color' => BsHtml::BUTTON_COLOR_PRIMARY
    ));
    ?>

<?php $this->endWidget(); ?>

</div><!-- form -->