<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
 
// import Joomla controllerform library
jimport('joomla.application.component.controllerform');
 
/**
 * Quiz Controller
 */
class QuizControllerQuiz extends JControllerForm
{
	    function export()
    {
		
		$db =& JFactory::getDBO();
		$query = ' SELECT id , content, id_critere' . ' FROM #__question';	
        $db->setQuery($query);
		$allData = $db->loadAssocList();
		
		
 		@ob_clean();
		header("Pragma: public");
		header("Expires: 0"); // set expiration time
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		header("Content-Type: application/force-download");
		header("Content-Type: application/octet-stream");
		header("Content-Type: application/download");
		header("Content-Disposition: attachment; filename=" . date("Y/m/d") . "_quizs.csv");
		header("Content-Transfer-Encoding: binary");
		//echo($allData); exit;
		
		$eol= "\r\n";
		$before = '"';
		$separator = '";"';
		$after = '"';
		$exportFields = array("ID" , "CONTENT", "ID_CRITERE" );
		echo $before.implode($separator,$exportFields).$after.$eol;
		for($i=0,$a=count($allData);$i<$a;$i++){
			echo $before.$this->change(implode($separator,$allData[$i]),$this->detectEncoding($query),'UTF-8').$after.$eol;
		}
		exit;
		
		
		
    }
	
	function change($data,$input,$output){
		$input = strtoupper(trim($input));
		$output = strtoupper(trim($output));
		if($input == $output) return $data;
		if($input == 'UTF-8' && $output == 'ISO-8859-1'){
			$data = str_replace(array('€','"','"'),array('EUR','"','"'),$data);
		}
		if($input == 'UTF-8' && $output == 'ISO-8859-1'){
			return utf8_decode($data);
		}
		if($input == 'ISO-8859-1' && $output == 'UTF-8'){
			return utf8_encode($data);
		}
		return $data;
	}
	
	function detectEncoding(&$content){
		if(!function_exists('mb_check_encoding')) return '';
		$toTest = array('UTF-8');
		$lang =& JFactory::getLanguage();
		$tag = $lang->getTag();
		if($tag == 'el-GR'){
			$toTest[] = 'ISO-8859-7';
		}
		$toTest[] = 'ISO-8859-1';
		$toTest[] = 'ISO-8859-2';
		$toTest[] = 'Windows-1252';
		foreach($toTest as $oneEncoding){
			if(mb_check_encoding($content,$oneEncoding)) return $oneEncoding;
		}
		return '';
	}

}
