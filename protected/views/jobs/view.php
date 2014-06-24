<?php
/* @var $this JobsController */
/* @var $model Jobs */

$this->breadcrumbs = array(
    'Jobs' => array('index'),
    $model->title,
);
?>

<h1><?php echo $model->title; ?></h1>

<?php
$this->widget('bootstrap.widgets.BsDetailView', array(
    'data' => $model,
    'attributes' => array(
        'job_id',
        'title',
        'text',

        array(
            'name' => 'status',
            'value' => Jobs::getStatusNameById($model->status),
            'type' => 'raw',
            ),
        array(
            'name' => 'date_created',
            'value' => $model->date_created ? date("Y-m-d H:i:s", $model->date_created) : '',

            'type' => 'raw',
            )
    ),
));
?>
<?php
if (!Yii::app()->user->isGuest) {
    echo BsHtml::buttonGroup(array(
    array(
        'label' => 'Create New',
        'url' => Yii::app()->createAbsoluteUrl('jobs/create'),
        'type' => BsHtml::BUTTON_TYPE_LINK
    ),
    array(
        'label' => 'Update',
        'url' => Yii::app()->createAbsoluteUrl('jobs/update', array('id' => $model->job_id)),
        'type' => BsHtml::BUTTON_TYPE_LINK
    ),
));


    $this->renderPartial('_grid_retreview', array('retrieveProvider' => $retrieveProvider));
}
else
{
    echo BsHtml::ajaxLink('Apply Now', Yii::app()->createAbsoluteUrl('jobs/showmodal',array('id' => $model->job_id)), array(
        'cache' => true,
        'data' => array(
            'id' => $model->job_id
        ),
        'type' => 'GET',
        'success' => 'js:function(data){
                    $(".modal-body").html(data);
                    $("#demo_modal").modal("show");
                }'
    ), array(
        'icon' => BsHtml::GLYPHICON_OK
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
}
?>

