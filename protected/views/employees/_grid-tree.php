<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
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
    'id' => 'tree-grid',
    'type' => BsHtml::GRID_TYPE_HOVER,
    'columns'=>array(
		'employee_id',
                array(
                    'header' => 'Name',
                    'name' => 'first_name',
                    'value' => 'TreeHelper::addGap($data->level, $data->first_name . " " . $data->last_name)',
                    'type'=>'raw'
                ),
		'positions',
		'email',
		'phone',
                array(
                    'header' => 'Actions',
                    'class' => 'CButtonColumn',
                    'template' => '{update} {view} {delete}',
                    'buttons' => $buttons
                ),
	),
    'pager' => array('class' => 'bootstrap.widgets.BsPager','size' => BsHtml::PAGINATION_SIZE_DEFAULT),
));