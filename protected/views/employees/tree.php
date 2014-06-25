<?php
/* @var $this EmployeesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Employees',
);
?>

<h1>Employees List</h1>

<?php
$this->widget('bootstrap.widgets.BsGridView', array(
    'dataProvider' => $dataProvider,
    'id' => 'employee-grid',
    'type' => BsHtml::GRID_TYPE_HOVER,
    'columns'=>array(
		'employee_id',
		'name',
		'first_name',
		'last_name',
		'positions',
		'email',
		'phone',
		'date_register',
	),
     'pager' => array('class' => 'bootstrap.widgets.BsPager','size' => BsHtml::PAGINATION_SIZE_DEFAULT),
));
?>
