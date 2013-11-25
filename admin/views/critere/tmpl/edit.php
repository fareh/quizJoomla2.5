<?php
// No direct access
defined('_JEXEC') or die('Restricted access');
JHtml::_('behavior.tooltip');
?>
<form action="<?php echo JRoute::_('index.php?option=com_quiz&view=criteres&layout=edit&id='.(int) $this->item->id); ?>" method="post" name="adminForm" id="critere-form">
	<fieldset class="adminform">
		<legend><?php echo JText::_( 'COM_QUIZ_QUIZ_DETAILS' ); ?></legend>
		<ul class="adminformlist">
        <?php // print_r($this->form->getFieldset('critere'));  exit ;?>
<?php foreach($this->form->getFieldset() as $field): ?>
			<li><?php echo $field->label;echo $field->input;?></li>
<?php endforeach; ?>
		</ul>
	</fieldset>
	<div>
		<input type="hidden" name="task" value="critere.edit" />
        <input type="hidden" name="return" value="<?php echo JFactory::getApplication()->input->get('return', '', 'cmd');?>" />
		<?php echo JHtml::_('form.token'); ?>
	</div>
</form>
