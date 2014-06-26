<?php
/* @var $this EmployeesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Employees',
);
?>

<h1>Employees Tree</h1>

<?php


$criteria=new CDbCriteria;
$criteria->order='t.root, t.lft'; // or 't.root, t.lft' for multiple trees
$criteria->limit=10; // or 't.root, t.lft' for multiple trees
$categories=  Employees::model()->findAll($criteria);
$level=0;
$result = array();
/*foreach($categories as $n=>$category)
{


    if($category->level==$level)
    {
            $pre    = '- ';
            $spacer = '  ';
            echo CHtml::closeTag('li')."\n";

    }
    else if($category->level>$level)
    {
            $pre    = '- ';
            $spacer = '-   ';
            echo CHtml::openTag('ul')."\n";
    }
    else
    {
        $pre    = '- ';
        $spacer = '  ';
        echo CHtml::closeTag('li')."\n";

        for($i=$level-$category->level;$i;$i--)
        {
            echo CHtml::closeTag('ul')."\n";
            echo CHtml::closeTag('li')."\n";
        }
    }
    for($i=1;$i<=$category->level;$i++)
    {
        $pre .='-';

    }
    echo CHtml::openTag('li');
    echo CHtml::encode($pre.$category->first_name);
    $level=$category->level;


}

for($i=$level;$i;$i--)
{
    echo CHtml::closeTag('li')."\n";
    echo CHtml::closeTag('ul')."\n";
}
*/
$this->renderPartial('_grid-tree',array('dataProvider' => $dataProvider));
?>
