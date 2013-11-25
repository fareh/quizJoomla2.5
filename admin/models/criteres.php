<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
// import the Joomla modellist library
jimport('joomla.application.component.modellist');
jimport( 'joomla.form.form' );
/**
 * QuizList Model
 */
class QuizModelCriteres extends JModelList
{
	
	
	public function __construct($config = array())
       {
          if (empty($config['filter_fields']))
            {
                $config['filter_fields'] = array(
                   'filter_id', 'filter_id',
                  'title', 'title',
                'state', 'state',
                 'created_by_alias', 'created_by_alias',
                 'created', 'created',
                  'map_count', 'map_count'
              );
          }
    
           parent::__construct($config);
       }
	/**
	 * Method to build an SQL query to load the list data.
	 *
	 * @return	string	An SQL query
	 */
	protected function getListQuery()
	{
		// Create a new query object.		
		$db = JFactory::getDBO();
		$query = $db->getQuery(true);
		// Select some fields
		$query->select('id,title,content');
		// From the hello table
		$query->from('#__critere');
		
		
		// Check for a search filter.
           if ($this->getState('filter.search'))
            {
               $query->where('( ' . $db->quoteName('title') . ' LIKE \'%' . $db->escape($this->getState('filter.search')) . '%\' )');
          }
    
           // If the model is set to check item state, add to the query.
            if (is_numeric($this->getState('filter.state')))
            {
                $query->where($db->quoteName('state') . ' = ' . (int) $this->getState('filter.state'));
           }
 
           // Add the list ordering clause.
          $query->order($db->escape($this->getState('list.ordering') . ' ' . $db->escape($this->getState('list.direction'))));
		return $query;
	}
	
  	protected function populateState($ordering = null, $direction = null)
     {
          // Load the filter state.
        $search = $this->getUserStateFromRequest($this->context . '.filter.search', 'filter_search');
          $this->setState('filter.search', $search);
         $params = JComponentHelper::getParams('com_quiz');
          $this->setState('params', $params);

         // List state information.
          parent::populateState('title', 'asc');
      }
}