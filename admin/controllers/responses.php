<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
// import Joomla controlleradmin library
jimport('joomla.application.component.controlleradmin');
/**
 * Quizs Controller
 */
class QuizControllerResponses extends JControllerAdmin
{
    /**
     * Proxy for getModel.
     * @since	1.6
     */
    public function getModel($name = 'Response', $prefix = 'QuizModel')
    {
        $model = parent::getModel($name, $prefix, array(
            'ignore_request' => true
        ));
        return $model;
    }
}
