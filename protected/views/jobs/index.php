<?php
/* @var $this JobsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = array(
    'Jobs',
);

?>

<h1>Jobs List</h1>

<?php
if (Yii::app()->user->isGuest) {
    $template = '{apply}';
    $buttons = array(
        'apply' => array(
            'imageUrl' => false,
            'label' => '<button type="button" class="btn btn-sm"><span class="glyphicon glyphicon-ok"></span> Apply Now</button>',
            'url' => 'Yii::app()->createUrl("jobs/showmodal", array("id"=>$data->job_id) )',

            'htmlOptions' => array('data-id' => '$data->job_id'),
            'click' => "function(){
                                    $.get(
                                        $(this).attr('href'),

                                        function(data) {
                                              $('.modal-body').html(data);
                                              $('#demo_modal').modal('show');
                                        }
                                    );
                                    return false;
                              }
                     ",
        ),
    );
} else {
    $template = '{update} {retrieve} {delete}';
    $buttons = array(
        'update' => array(
            'imageUrl' => false,
            'label' => '<button type="button" class="btn btn-sm"><span class="glyphicon glyphicon-cog"></span> Update</button>',
        ),
        'delete' => array(
            'imageUrl' => false,
            'label' => '<button type="button" class="btn btn-sm"><span class="glyphicon glyphicon-trash"></span> Delete</button>',
        ),
        'retrieve' => array(
            'imageUrl' => false,
            'visible' => '!$data->status',
            'label' => '<button type="button" class="btn btn-sm"><span class="glyphicon glyphicon-refresh"></span> Retrieve</button>',
            'url' => 'Yii::app()->createUrl("jobs/retrieve", array("id"=>$data->job_id) )',
            'click' => "function(){
                                    $.get(
                                        $(this).attr('href'),
                                        function(data) {
                                            $.fn.yiiGridView.update('job-grid');
                                        }
                                    );
                                    return false;
                              }
                     ",
        )
    );
}

$this->widget('bootstrap.widgets.BsGridView', array(
    'dataProvider' => $dataProvider,
    'id' => 'job-grid',
    'type' => BsHtml::GRID_TYPE_HOVER,
    'columns' => array(
        array(
            'name' => 'job_id',
            'header' => 'Id',
        ),
        array(
            'name' => 'title',
            'header' => 'Title',
            'value' => "CHtml::link('<b>'.\$data->title.'</b>', Yii::app()->createAbsoluteUrl('jobs/view/', array('id' => \$data->job_id)))",
            'type' => 'raw',
        ),
        array(
            'name' => 'status',
            'header' => 'Status',
            'value' => "Jobs::getStatusNameById(\$data->status)",
            'type' => 'raw',
        ),
        array(
            'name' => 'date_created',
            'header' => 'Create',
            'value' => "(\$data->date_created) ? date('Y-m-d H:i:s', \$data->date_created) : ''",
            'type' => 'raw',
        ),
        array(
            'header' => 'Actions',
            'class' => 'CButtonColumn',
            'template' => $template,
            'buttons' => $buttons
        ),
    ),
    'pager' => array('class' => 'bootstrap.widgets.BsPager','size' => BsHtml::PAGINATION_SIZE_DEFAULT),
));

$this->widget('bootstrap.widgets.BsModal', array(
    'id' => 'demo_modal',
    'header' => 'Apply Job',
    'content' => '',
    'footer' => array(
        BsHtml::button('Close', array(
            'data-dismiss' => 'modal'
        ))
    )
));
?>
