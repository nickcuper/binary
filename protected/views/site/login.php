<?php
$this->pageTitle = Yii::app()->name . ' - Login';
$this->breadcrumbs = array(
    'Login',
);
?>

<?php
$form = $this->beginWidget('bootstrap.widgets.BsActiveForm', array(
    'enableAjaxValidation' => true,
    'id' => 'login-form',
    'htmlOptions' => array(
        'class' => 'form-signin',
    )
));
?>

<?php echo $form->textFieldControlGroup($model, 'username'); ?>

<?php echo $form->passwordFieldControlGroup($model, 'password'); ?>

<p class="hint">
    Hint: You may login with <tt>demo/demo</tt>.
</p>

<?php
echo BsHtml::submitButton('Login', array(
    'color' => BsHtml::BUTTON_COLOR_PRIMARY,
    'class' => 'btn-lg btn-primary btn-block'
));
?>
<?php $this->endWidget(); ?>
</div><!-- form -->
