<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class TreeHelper {

    /**
     * Add space for name for level(root)
     * @param type $level
     * @param type $name
     * @param type $txt
     * @return type
     */
    public static function addGap($level=1, $name, $txt='- ')
    {
        if ($level == 1) return '<b>'.$name.'</b>';

        for($i=1;$i<$level;$i++) {
            $txt .= $txt;
        }
        return $txt.$name;
    }

}
