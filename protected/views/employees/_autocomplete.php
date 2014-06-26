<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
Yii::app()->clientScript->registerScript('autocomplete-details','

    $(function(){
        $("#ajax-add-subordinates").click(function(){
            $.post("/employees/addsubordinates",{employee_id:$("#parent_id").val(),parent_id: '.$model->employee_id.'}, function(){
                $.fn.yiiGridView.update("employee-grid");
            })
        });
    });

', CClientScript::POS_READY);?>
<br/><br/>
<?php
    $this->beginWidget('bootstrap.widgets.BsPanel', array(
        'title' => 'Search Subordinates'
    ));
?>
<div class="col-xs-5">
<?php    $this->widget('CAutoComplete', array(
            'model' => 'Employees',
            'name' => 'first_name',
            'url' => array('employees/autocomplete', 'employee_id' => $model->employee_id),
            'minChars' => 3,
            'matchCase'=>false,
            'value' => '',
            'htmlOptions' => array('class' => 'form-control'),
            'methodChain'=>".result(function(event,item){\$(\"#parent_id\").val(item[1]);})",
    ));
     echo CHtml::hiddenField('parent_id');?>
</div>
<?php

    echo BsHtml::linkButton('Add To Subordinates', array(
        'color' => BsHtml::BUTTON_COLOR_PRIMARY,
        'id' => 'ajax-add-subordinates'
    ));
    $this->endWidget();