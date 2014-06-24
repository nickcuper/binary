<?php
/* @var $this EmployeesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
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

<?php 
$template = '{update} {view} {delete}';
    $buttons = array(
        'update' => array(
            'imageUrl' => false,
            'label' => '<button type="button" class="btn btn-sm"><span class="glyphicon glyphicon-cog"></span> Update</button>',
            'visible' => '!Yii::app()->user->isGuest',
        ),
        'delete' => array(
            'imageUrl' => false,
            'label' => '<button type="button" class="btn btn-sm"><span class="glyphicon glyphicon-trash"></span> Delete</button>',
            'visible' => '!Yii::app()->user->isGuest',
        ),
        'view' => array(
           'imageUrl' => false,
           'label' => '<button type="button" class="btn btn-sm"><span class="glyphicon glyphicon-cog"></span> View</button>',
            
        )
    );

$this->widget('bootstrap.widgets.BsGridView', array(
    'dataProvider' => $dataProvider,
    'id' => 'employee-grid',
    'type' => BsHtml::GRID_TYPE_HOVER,
    'columns'=>array(
		'employee_id',
		'first_name',
                array(
                    'name' => 'last_name',
                    'class' => 'TreeGrid',
                    'value' => '$data->first_name',
                    
                ),
		'last_name',
		#'positions',
		'email',
		'phone',
		/*'notes',
		'date_register',
		*/
		array(
            'header' => 'Actions',
            'class' => 'CButtonColumn',
            'template' => $template,
            'buttons' => $buttons
        ),
	),
     'pager' => array('class' => 'bootstrap.widgets.BsPager','size' => BsHtml::PAGINATION_SIZE_DEFAULT),
)); 
?>
