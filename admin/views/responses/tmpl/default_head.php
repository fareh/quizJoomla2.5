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
		<?php echo JText::_('reponse'); ?>
	</th>
	<th>
		<?php echo JText::_('valeur'); ?>
	</th>
    <th>
		<?php echo JText::_('Question'); ?>
	</th>
</tr>
