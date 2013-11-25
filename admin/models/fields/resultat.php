<?php
// No direct access to this file
defined('_JEXEC') or die;
 
// import the list field type
jimport('joomla.form.helper');
JFormHelper::loadFieldClass('list');
 
/**
 * Quiz Form Field class for the Quiz component
 */
class JFormFieldResultat extends JFormFieldList
{
	/**
	 * The field type.
	 *
	 * @var		string
	 */
	protected $type = 'Resultat';
 
	/**
	 * Method to get a list of options for a list input.
	 *
	 * @return	array		An array of JHtml options.
	 */
	protected function getOptions() 
	{
		$db = JFactory::getDBO();
		$query = $db->getQuery(true);
	/*	$query->select('id,result,id_user');
		$query->from('#__quiz_result');*/
		$query->select('u.id, u.result, u.id_user, a.name');
        $query->from('#__quiz_result AS u');
        $query->leftJoin('#__quiz_name AS a ON a.id = u.id_user');
		$db->setQuery((string)$query);
		$messages = $db->loadObjectList();
		$options = array();
		if ($messages)
		{
			foreach($messages as $message) 
			{
				$options[] = JHtml::_('select.option', $message->id, $message->result, $message->id_user);
			}
		}
		$options = array_merge(parent::getOptions(), $options);
		return $options;
	}
}
