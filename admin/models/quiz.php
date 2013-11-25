<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
 
// import Joomla modelform library
jimport('joomla.application.component.modeladmin');
 
/**
 * Quiz Model
 */
class QuizModelQuiz extends JModelAdmin
{
	
	
	
	 
	 public function getFilter()
       {
        $filter_id = (int) $this->getState('filter.id');
  
         // Get a FinderTableFilter instance.
            $filter = $this->getTable();
    
           // Attempt to load the row.
         $return = $filter->load($filter_id);
    
           // Check for a database error.
          if ($return === false && $filter->getError())
           {
              $this->setError($filter->getError());
             return false;
          }
  
            // Process the filter data.
           if (!empty($filter->data))
         {
               $filter->data = explode(',', $filter->data);
          }
         elseif (empty($filter->data))
           {
                $filter->data = array();
           }
   
          // Check for a database error.
           if ($this->_db->getErrorNum())
           {
            $this->setError($this->_db->getErrorMsg());
            return false;
        }
    
          return $filter;
       }
  
  
	/**
	 * Returns a reference to the a Table object, always creating it.
	 *
	 * @param	type	The table type to instantiate
	 * @param	string	A prefix for the table class name. Optional.
	 * @param	array	Configuration array for model. Optional.
	 * @return	JTable	A database object
	 * @since	1.6
	 */
	public function getTable($type = 'Quiz', $prefix = 'QuizTable', $config = array()) 
	{
		return JTable::getInstance($type, $prefix, $config);
	}
	/**
	 * Method to get the record form.
	 *
	 * @param	array	$data		Data for the form.
	 * @param	boolean	$loadData	True if the form is to load its own data (default case), false if not.
	 * @return	mixed	A JForm object on success, false on failure
	 * @since	1.6
	 */
	public function getForm($data = array(), $loadData = true) 
	{
		// Get the form.
		$form = $this->loadForm('com_quiz.quiz', 'quiz', array('control' => 'jform', 'load_data' => $loadData));
		if (empty($form)) 
		{
			return false;
		}
		return $form;
	}
	/**
	 * Method to get the data that should be injected in the form.
	 *
	 * @return	mixed	The data for the form.
	 * @since	1.6
	 */
	protected function loadFormData() 
	{
		// Check the session for previously entered form data.
		$data = JFactory::getApplication()->getUserState('com_quiz.edit.quiz.data', array());
		if (empty($data)) 
		{
			$data = $this->getItem();
		}
		return $data;
	}
}
