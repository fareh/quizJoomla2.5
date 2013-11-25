<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted Access');
?>
<?php foreach($this->items as $i => $item): ?>
	<tr class="row<?php echo $i % 2; ?>">
    <td>
			<?php echo JHtml::_('grid.id', $i, $item->id); ?>
		</td>
		<td>
			<?php echo $item->id; ?>
		</td>
		
		<td>
			<?php echo $item->content; ?>
		</td>
        <td>
			<?php echo $item->valeur; ?>
		</td>
         <td>
         	
          <?php $db =& JFactory::getDBO();
			$query1 = "
  SELECT content
    FROM ".$db->nameQuote('#__question')."
    WHERE ".$db->nameQuote('id')." = ".$item->id_question.";
  ";
  $db->setQuery($query1);
$result = $db->loadResult();
print_r($result);
			?>
		</td>
	</tr>
<?php endforeach; ?>
