<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
 $document =& JFactory::getDocument();

 $document->addScript(JURI::base() . 'components/com_quiz/js/jquery1.7.js');
  $document->addScript(JURI::base() . 'components/com_quiz/js/tinyvalidation.js');
  $document->addScript(JURI::base() . 'components/com_quiz/js/jquery.uniform.js');
 

$document->addScript(JURI::base() . 'components/com_quiz/js/jquery.simpletooltip-min.js');
$document->addScript(JURI::base() . 'components/com_quiz/js/jquery.simpletooltip.js');
$document->addStyleSheet(JURI::base() . 'components/com_quiz/css/uniform.default.css');
$document->addStyleSheet(JURI::base() . 'components/com_quiz/css/quiz.css');
$document->addStyleSheet(JURI::base() . 'components/com_quiz/css/tooltip.css');

$document->addScript(JURI::base() . 'components/com_quiz/js/quiz.js');
$document->addScript(JURI::base() . 'components/com_quiz/js/swfobject.js');
// import joomla controller library
jimport('joomla.application.component.controller');
 
// Get an instance of the controller prefixed by HelloWorld
$controller = JController::getInstance('Quiz');
 
// Perform the Request task
$controller->execute(JRequest::getCmd('task'));
 
// Redirect if set by the controller
$controller->redirect();
