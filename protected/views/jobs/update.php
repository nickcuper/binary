<?php
/* @var $this JobsController */
/* @var $model Jobs */

$this->breadcrumbs=array(
	'Jobs'=>array('index'),
	$model->title=>array('view','id'=>$model->job_id),
	'Update',
);
?>

<h1>Update Jobs <?php echo $model->job_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>