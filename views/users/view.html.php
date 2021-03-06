<?php
/**
 * Created by PhpStorm.
 * User: zhangshaobo
 * Date: 15/11/5
 * Time: 09:38
 */

defined('_JEXEC') or die('Restricted access');

class HeartCareViewUsers extends JViewLegacy
{
    //display users的视图
    function display($tpl = null)
    {
        //获取application
        $app = JFactory::getApplication();
        $context = "heartcare.list.admin.user";

//        echo "<pre>";
//        var_dump($app);
//        echo "</pre>";

        //从model获得数据
        $this->items            = $this->get('Items');
        $this->pagination       = $this->get('Pagination');
        $this->state            = $this->get('State');
        $this->filter_order     = $app->getUserStateFromRequest($context.'filter_order', 'filter_order', 'registerDate', 'cmd');
        $this->filter_order_Dir = $app->getUserStateFromRequest($context.'filter_order_Dir', 'filter_order_Dir', 'asc', 'cmd');
        $this->filterForm       = $this->get('FilterForm');
        $this->activeFilters    = $this->get('ActiveFilters');

        //用户有什么权限,他能做什么
        $this->canDo = HeartCareHelper::getActions();

        //检查错误
        if (count($errors = $this->get('Errors')))
        {
            JError::raiseError(500, implode('<br />', $errors));

            return false;
        }

        //设置toolbar, 和sidebar
        HeartCareHelper::addSubmenu('users');
        $this->addToolBar();

        parent::display($tpl);

        //set the document
        $this->setDocument();
    }

    protected function addToolBar()
    {
        JToolbarHelper::title(JText::_('COM_HEARTCARE_MANAGER_USERS'));
        //JToolbarHelper::addNew('user.add');
        if($this->canDo->get('core.edit'))
        {
            JToolbarHelper::editList('user.edit','JTOOLBAR_EDIT');
        }

        if ($this->canDo->get('core.delete'))
        {
            JToolbarHelper::deleteList('','users.delete','JTOOLBAR_DELETE');
        }

        if ($this->canDo->get('core.admin'))
        {
            JToolbarHelper::divider();
            JToolbarHelper::preferences('com_heartcare');
        }
    }

    /**
     * Returns an array of fields the table can be sorted by
     *
     * @return  array  Array containing the field name to sort by as the key and display text as value
     *
     * @since   3.0
     */
    protected function getSortFields()
    {
        return array(
            'name' => JText::_('COM_USERS_HEADING_NAME'),
            'username' => JText::_('JGLOBAL_USERNAME'),
            'email' => JText::_('JGLOBAL_EMAIL'),
            'registerDate' => JText::_('COM_USERS_HEADING_REGISTRATION_DATE'),
            'id' => JText::_('JGRID_HEADING_ID'),
            'cb_is_doctor' => JText::_('COM_HEARTCARE_USER_IS_DOCTOR')
        );
    }

    protected function setDocument()
    {
        $document = JFactory::getDocument();
        $document->setTitle(JText::_('COM_HEARTCARE_ADMINISTRATION'));
    }
}

