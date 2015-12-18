<?php
/**
 * Created by PhpStorm.
 * User: zhangshaobo
 * Date: 15/12/18
 * Time: 08:38
 */
defined('_JEXEC') or die('Restricted access');
?>

<form action="<?php echo JRoute::_('index.php?option=com_heartcare&view=device&layout=edit&id=' . (int)$this->item->id); ?>"
      method="post" name="adminForm" id="adminForm">
    <div class="form-horizontal">
        <fieldset class="adminform">
            <legend><?php echo JText::_('COM_HEARTCARE_DEVICE_DETAILS'); ?></legend>
            <div class="row-fluid">
                <div class="span6">
                    <?php foreach ($this->form->getFieldset() as $field): ?>
                        <div class="control-group">
                            <?php if ($field->fieldname != 'service'):?>
                                <div>
                                    <div class="control-label"><?php echo $field->label; ?></div>
                                    <div class="controls"><?php echo $field->input; ?></div>
                                </div>
                            <?php endif;?>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="span6">
                    <?php foreach ($this->form->getFieldset() as $field): ?>

                        <?php if ($field->fieldname == 'service'):?>
                            <div>
                                <div><?php echo $field->label; ?></div>
                                <br>
                                <div><?php echo $field->input; ?></div>
                            </div>
                        <?php endif;?>
                    <?php endforeach; ?>
                </div>

            </div>
        </fieldset>
    </div>
    <input type="hidden" name="task" value="device.edit" />
    <?php echo JHTML::_( 'form.token' ); ?>
</form>
