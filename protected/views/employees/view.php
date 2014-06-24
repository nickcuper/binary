<?php
/* @var $this EmployeesController */
/* @var $model Employees */

$this->breadcrumbs = array(
    'Employees' => array('index'),
    $model->employee_id,
);
?>

<h1>View Employees #<?php echo $model->employee_id; ?></h1>

<?php
$this->widget('bootstrap.widgets.BsDetailView', array(
    'data' => $model,
    'attributes' => array(
        'employee_id',
        'first_name',
        'last_name',
        'positions',
        'email',
        'phone',
        'notes',
        array(
            'name' => 'date_register',
            'value' => $model->date_register ? date("Y-m-d H:i:s", $model->date_register) : '',
            'type' => 'raw',
        )
    ),
));

 echo BsHtml::buttonGroup(array(
    array(
        'label' => 'Create New',
        'url' => Yii::app()->createAbsoluteUrl('employees/create'),
        'type' => BsHtml::BUTTON_TYPE_LINK
    ),
    array(
        'label' => 'Add Subordinates',
        'url' => Yii::app()->createAbsoluteUrl('employees/create', array('parent_id' => $model->employee_id)),
        'type' => BsHtml::BUTTON_TYPE_LINK
    ),
    array(
        'label' => 'Update',
        'url' => Yii::app()->createAbsoluteUrl('employees/update', array('id' => $model->employee_id)),
        'type' => BsHtml::BUTTON_TYPE_LINK
    ),
));
?>

<h2>List of Subordinates</h2>
<?php
$this->widget('bootstrap.widgets.BsGridView', array(
    'dataProvider' => $dataProvider,
    'id' => 'employee-grid',
    'type' => BsHtml::GRID_TYPE_HOVER,
    'columns' => array(
        'employee_id',
        'first_name',
        'last_name',
        'email',
        'phone',
    ),
    'pager' => array('class' => 'bootstrap.widgets.BsPager', 'size' => BsHtml::PAGINATION_SIZE_DEFAULT),
));
?>
