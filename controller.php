<?php
/**
 * Created by PhpStorm.
 * User: zhangshaobo
 * Date: 15/10/8
 * Time: 下午2:33
 */

defined('_JEXEC') or die('Restricted access');
class HeartCareController extends JControllerLegacy
{
    protected $default_view = 'users';

    public function display($cachable = false, $urlparams = array())
    {
        $view   =$this->input->get('view','banners');
        $layout =$this->input->get('layout', 'default');
        $id     =$this->input->getInt('id');

        //check for edit form
        if ($view == 'user' && $layout == 'edit' && !$this->checkEditId('com_heartcare.edit.user', $id))
        {
            // Somehow the person just went to the form - we don't allow that.
            $this->setError(JText::sprintf('JLIB_APPLICATION_ERROR_UNHELD_ID', $id));
            $this->setMessage($this->getError(), 'error');
            $this->setRedirect(JRoute::_('index.php?option=com_heartcare&view=users', false));

            return false;
        }
        elseif ($view == 'device' && $layout == 'edit' && !$this->checkEditId('com_heartcare.edit.device', $id))
        {
            // Somehow the person just went to the form - we don't allow that.
            $this->setError(JText::sprintf('JLIB_APPLICATION_ERROR_UNHELD_ID', $id));
            $this->setMessage($this->getError(), 'error');
            $this->setRedirect(JRoute::_('index.php?option=com_heartcare&view=devices', false));

            return false;
        }


        return parent::display();
    }
}