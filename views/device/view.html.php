<?php
/**
 * Created by PhpStorm.
 * User: zhangshaobo
 * Date: 15/12/14
 * Time: 19:54
 */

defined('_JEXEC') or die('Restricted access');

class HeartCareViewDevice extends JViewLegacy
{
    //view form
    protected $form;
    protected $item;
    protected $state;

    public function display($tpl = null)
    {
        $this->form = $this->get('Form');
        //item就是一个用户的对象实例
        $this->item = $this->get('Item');
        $this->state = $this->get('State');

        //check errors
        if(count($errors = $this->get('Errors')))
        {
            JError::raiseError(500, implode('<br />', $errors));

            return false;
        }

        $this->addToolBar();

        parent::display($tpl);

        $this->setDocument();

    }


    protected function addToolBar()
    {
        $input = JFactory::getApplication()->input;

        //隐藏Joomla 管理主菜单
        $input->set('hidemainmenu', true);


        $title = JText::_('COM_HEARTCARE_MANAGER_HEARTCARE_DEVICE_EDIT');

        JToolbarHelper::title($title, 'device');
        JToolbarHelper::apply('device.apply');
        JToolbarHelper::save('device.save');
        JToolbarHelper::cancel('device.cancel','JTOOLBAR_CLOSE');
    }


    //设置浏览器title
    protected function setDocument()
    {
        $document = JFactory::getDocument();
        $document->setTitle(JText::_('COM_HEARTCARE_DEVICE_EDITING'));
    }
}