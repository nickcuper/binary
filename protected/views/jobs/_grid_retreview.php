<h1>Requests from users</h1>
<?php
$this->widget('bootstrap.widgets.BsGridView', array(
    'dataProvider' => $retrieveProvider,
    'type' => BsHtml::GRID_TYPE_HOVER,
    'columns' => array(
        'email',
        'name',
        'phone_cell',
        'comment',
        array(
            'name' => 'cv_path',
            'header' => 'CV',
            'type' => 'raw',
            'value' => "CHtml::link('Download CV', array('/jobs/downloadfile/', 'id'=>\$data->users2jobs_id))"
        )
    ),
    'pager' => array('class' => 'bootstrap.widgets.BsPager', 'size' => BsHtml::PAGINATION_SIZE_DEFAULT),
));
?>