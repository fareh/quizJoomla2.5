<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted Access');
?>
<tr>
<th width="20">
		<input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count($this->items); ?>);" />
	</th>			
	<th width="5">
		<?php echo JText::_('id'); ?>
	</th>
    <th>
		<?php echo JText::_('Nom de l\'entreprise '); ?>
	</th>
    <th>
		<?php echo JText::_('Secteur économique'); ?>
	</th>
    <th>
		<?php echo JText::_('Name'); ?>
	</th>
    <th>
		<?php echo JText::_('Mail '); ?>
	</th>
    <th>
		<?php echo JText::_('Tél'); ?>
	</th>
</tr>
