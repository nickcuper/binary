<?php
/* @var $this JobsController */
/* @var $model Jobs */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('bootstrap.widgets.BsActiveForm', array(
        //        'layout' => BsHtml::FORM_LAYOUT_HORIZONTAL,
        'enableAjaxValidation' => true,
        'id' => 'user_form',
    ));
    ?>



<?php echo $form->textFieldControlGroup($model, 'title', array('size' => 60, 'maxlength' => 255)); ?>



    <?php echo $form->textAreaControlGroup($model, 'text', array('rows' => 6, 'cols' => 50)); ?>

    <?php
    echo $form->dropDownListControlGroup($model, 'status', Jobs::getStatus());
    ?>




    <?php
    echo BsHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array(
        'color' => BsHtml::BUTTON_COLOR_PRIMARY
    ));
    ?>


<?php $this->endWidget(); ?>

</div><!-- form -->