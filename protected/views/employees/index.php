<?php
/* @var $this EmployeesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = array(
    'Employees',
);
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#employees-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Employees List</h1>

<?php $this->renderPartial('_grid', array('dataProvider' => $dataProvider)); ?>
