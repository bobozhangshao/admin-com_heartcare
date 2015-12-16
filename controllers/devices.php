<?php
/**
 * Created by PhpStorm.
 * User: zhangshaobo
 * Date: 15/12/14
 * Time: 19:07
 */
defined('_JEXEC') or die('Restricted access');

class HeartCareControllerDevices extends JControllerAdmin
{
    public function getModel($name = 'Device', $prefix = 'HeartCareModel', $config = array('ignore_request' => true))
    {
        $model = parent::getModel($name, $prefix, $config);
        return $model;
    }

}