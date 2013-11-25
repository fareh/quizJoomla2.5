<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
 
// Set some global property
$document = JFactory::getDocument();
//$document->addStyleDeclaration('.icon-48-QUIZ {background-image: url(../media/com_subscriber/images/tux-48x48.png);}');
 
// import joomla controller library
jimport('joomla.application.component.controller');
 
// Get an instance of the controller prefixed by Quiz
$controller = JController::getInstance('Quiz');
 
// Perform the Request task
$controller->execute(JRequest::getCmd('task'));
 
// Redirect if set by the controller
$controller->redirect();
