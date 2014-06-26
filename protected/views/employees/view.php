<?php
/* @var $this EmployeesController */
/* @var $model Employees */

$this->breadcrumbs = array(
    'Employees' => array('index'),
    $model->employee_id,
);
?>

<?php
$parent = $model->parent()->find();
$this->widget('bootstrap.widgets.BsDetailView', array(
    'data' => $model,
    'attributes' => array(
        'employee_id',
        array(
            'name' => 'root',
            'value' => ($parent) ? CHtml::link($parent->first_name.' '.$parent->last_name,array('employees/view', 'id'=>$parent->employee_id)) : 'Not found',
            'type' => 'raw',
        ),
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

if (!Yii::app()->user->isGuest)
{
    echo BsHtml::buttonGroup(array(
        array(
            'label' => 'Add Employee',
            'url' => Yii::app()->createAbsoluteUrl('employees/create'),
            'type' => BsHtml::BUTTON_TYPE_LINK
        ),
        array(
            'label' => 'Update Employee',
            'url' => Yii::app()->createAbsoluteUrl('employees/update', array('id' => $model->employee_id)),
            'type' => BsHtml::BUTTON_TYPE_LINK
        ),
        array(
            'label' => 'Create Subordinate',
            'url' => Yii::app()->createAbsoluteUrl('employees/create', array('parent_id' => $model->employee_id)),
            'type' => BsHtml::BUTTON_TYPE_LINK
        ),
    ));
    $this->renderPartial('_autocomplete', array('model' => $model));

}
?>

<h2>List of Subordinates</h2>

<?php $this->renderPartial('_grid', array('dataProvider' => $dataProvider)); ?>
