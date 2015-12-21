<?php
/**
 * Created by PhpStorm.
 * User: zhangshaobo
 * Date: 15/12/14
 * Time: 19:14
 */

defined('_JEXEC') or die('Restricted Access');

use Joomla\Registry\Registry;

class HeartCareModelDevice extends JModelAdmin
{
    public function getTable($type = 'Device', $prefix = 'HeartCareTable', $config = array())
    {
        return JTable::getInstance($type, $prefix, $config);
    }

    /**
     * Abstract method for getting the form from the model.
     *
     * @param   array $data Data for the form.
     * @param   boolean $loadData True if the form is to load its own data (default case), false if not.
     *
     * @return  mixed  A JForm object on success, false on failure
     *
     * @since   12.2
     */
    public function getForm($data = array(), $loadData = true)
    {
        //是从forms中找到device对应
        $form = $this->loadForm(
            'com_heartcare.device',
            'device',
            array(
                'control' => 'jform',
                'load_data' => $loadData
            )
        );


        if (empty($form))
        {
            return false;
        }

        return $form;
    }

    /**
     * Method to get the data that should be injected in the form.
     * 获得应该键入到form中的数据.
     * @return  array  The default data is an empty array.
     *
     * @since   1.6
     */
    protected function loadFormData()
    {
        $data = JFactory::getApplication()->getUserState(
            'com_heartcare.device.edit.data',
            array()
        );

        if (empty($data))
        {
            $data = $this->getItem();
        }

        return $data;
    }

    /**
     * Method to get a single record.
     *
     * @param   integer  $pk  The id of the primary key.
     *
     * @return  mixed  Object on success, false on failure.
     */
    public function getItem($pk = null)
    {
        if ($item = parent::getItem($pk))
        {
            // Convert the images field to an array.
            $registry = new Registry;
            $registry->loadString($item->images);
            $item->images = $registry->toArray();
        }

        return $item;
    }
}