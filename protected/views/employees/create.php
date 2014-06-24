<?php
/* @var $this EmployeesController */
/* @var $model Employees */

$this->breadcrumbs=array(
	'Employees'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Employees', 'url'=>array('index')),
	array('label'=>'Manage Employees', 'url'=>array('admin')),
);
?>

<h1>Create Employees <?php echo (isset($supervisor) ? '['.$supervisor->first_name .' '. $supervisor->last_name.']': ''); ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>