<?php
Yii::import('zii.widgets.grid.CGridView');
Yii::import('extensions.bootstrap.widgets.BsGridView');

class TreeGrid extends BsGridView {

    private $_spaceCount = 0;

    protected function renderDataCellContent($row, $data)
    {
        //
$value = '';
        echo $value === null ? $this->grid->nullDisplay : $value;

    }

}

?>
