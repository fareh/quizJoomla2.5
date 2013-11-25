<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
?>
<h2> <span>Questionnaire</span> </h2>		
		
<div class="legends">	<div class="field blue legend">		<label>5 : Leader</label>	</div>	<div class="field cyan legend">		<label>4 : Prédictif</label>	</div>	<div class="field green legend">		<label>3 : Efficient</label>	</div>	<div class="field yellow legend">		<label>2 : Géré</label>	</div>	<div class="field red legend">		<label>1 : Réactif</label>	</div>	<div class="field legend">		<label class="niv_rep">Niveau des réponses : </label>	</div></div>


<div id="tooltip_1" class="tooltip">
				
				<p>Une seule réponse est permise par question, chaque réponse correspond à un et seul niveau de maturité. Ce niveau de maturité vous est indiqué par le code couleur de réaffichage (Rouge pour Réactif, Orange pour Géré, Vert pour Efficient, Bleu clair pour Prédictif et Bleu roi pour Leader.</p>
                </div>


<?php		
				 
$db = JFactory::getDBO();
$critere=0;
if(isset($_GET['critere']))
$critere=$_GET['critere'];
$Session = & JFactory :: getSession ();
if($critere == 0){
	
	
	$Session->clear('res');
	if(!isset($_SESSION['__default']['res'])){
	$res = array();
	$all=array();
	$res1['critere1']= array('reactif' => 0, 'gere' =>0,'efficient'=>0,'predictif'=>0,'leader'=>0);
	$res2['critere2']= array('reactif' => 0, 'gere' =>0,'efficient'=>0,'predictif'=>0,'leader'=>0);
	$res3['critere3']= array('reactif' => 0, 'gere' =>0,'efficient'=>0,'predictif'=>0,'leader'=>0);
	$res4['critere4']= array('reactif' => 0, 'gere' =>0,'efficient'=>0,'predictif'=>0,'leader'=>0);
	$res5['critere5']= array('reactif' => 0, 'gere' =>0,'efficient'=>0,'predictif'=>0,'leader'=>0);
	$res6['critere6']= array('reactif' => 0, 'gere' =>0,'efficient'=>0,'predictif'=>0,'leader'=>0);
	$res7['critere7']= array('reactif' => 0, 'gere' =>0,'efficient'=>0,'predictif'=>0,'leader'=>0);
	$res8['critere8']= array('reactif' => 0, 'gere' =>0,'efficient'=>0,'predictif'=>0,'leader'=>0);
	$res9['critere9']= array('reactif' => 0, 'gere' =>0,'efficient'=>0,'predictif'=>0,'leader'=>0);
	$res10['critere10']= array('reactif' => 0, 'gere' =>0,'efficient'=>0,'predictif'=>0,'leader'=>0);
	$all[]=array($res1,$res2,$res3,$res4,$res5,$res6,$res7,$res8,$res9,$res10);
	$Session ->set('res', $all);
	
	}
	?>
	 <form action="index.php?option=com_quiz&view=quiz&critere=<?php echo $critere+1; ?>" method="post" 
     class="frm center" id="quizfrmstart">
     <h3>Merci de saisir le nom de votre entreprise</h3>
      <h3>Répondez-vous à cette évaluation au titre de la totalité de votre entreprise (oui) ou d'un sous-ensemble (non) de celle-ci ? </h3>
    <ul>  
    <li>
	  <input type="radio" id="oui" name="reponse_quiz" value="3" class="radio_quiz" />
        <label for="oui" >Oui</label>
        
		</li>
         <li>
	  <input type="radio" id="non" name="reponse_quiz" value="4"  class="radio_quiz" />
        <label for="non" >Nom</label>
        
		</li>
        </ul>
     <input type="text" name="name" id="name" value="" />
     <p>
   <input type="button"  name="info_submit" id="info_submit" value="Commencer" class="start"/>
   </p>
	 </form>
<?php	
}
				
elseif($critere <= 9)
	{ 
			////////////////////////Critere//////////////////////////	
			$critere_list=$this->ListeCritere($critere,$db);				
			////////////////////////Liste question/////////////////////
			$question_list=$this->ListeQuestion($critere_list[0]->id,$db);
					?>
	
 <div class="critere"><h3><?php  echo $critere_list[0]->title.":&nbsp;".$critere_list[0]->content;  ?></h3></div>
 <?php
 $action=($critere==9)?"index.php?option=com_quiz&view=result&critere=".($critere+1):"index.php?option=com_quiz&view=quiz&critere=".($critere+1);
 ?>
   <form action="<?php echo $action; ?>" method="post" id="quizfrm" class="frm">
    <table cellpadding="0" cellspacing="0" border="0" style="width: 100%;" id="quiz_table">
    <input type="hidden" value="<?php  echo $critere_list[0]->id; ?>" name="critere_id" />
       <input type="hidden" value="<?php echo  count($question_list); ?>" name="question_nb" />
<?php

	foreach ($question_list as $k=> $question)
	{
		?>
	<tr>
		<td class="quiz choice">
        <div style="line-height:20px;">
        <a class="demo_1" href="#tooltip_1"></a>
        <h3 class="question"><?php echo ($k+1).":".$question->content; ?></h3>
        </div>
        <ul id="<?php echo $question->id; ?>">
        <?php

	$reponse_list = $this->ListeReponse($question->id,$db);
	
	foreach ($reponse_list as $reponse)
	{?>
    <li>
	  <input type="radio" id="<?php echo $reponse->id; ?>" name="reponse_quiz<?php  echo $k; ?>" value="<?php echo $reponse->valeur; ?>" validate="required:true"  />
        <label for="<?php echo $reponse->id; ?>" ><?php echo $reponse->content; ?></label>&nbsp;	
		</li>
	<?php }
		?>
        
        </ul>
        
        
     </td>
		
	</tr>
	<?php
	}
?>
</table>
<input type="button"  name="quiz_submit" value="> Suivant"  id="quiz_submit"/>
</form>

<?php
	}//end if
	$db =& JFactory::getDBO();
if(isset($_POST['name']))
{
	$name=$_POST['name'];
	$query = " INSERT INTO #__quiz_name (`id`, `name`) VALUES (NULL, '$name')";
	$db->setQuery($query);
	$db->query();
	$Session->set('id_name',$db->insertid());
	
}
if(isset($_POST['critere_id']))
{

	$_SESSION['__default']['res'][0][$critere-1]["critere".$critere]['reactif']=0;
	$_SESSION['__default']['res'][0][$critere-1]["critere".$critere]['gere']=0;
	$_SESSION['__default']['res'][0][$critere-1]["critere".$critere]['efficient']=0;
	$_SESSION['__default']['res'][0][$critere-1]["critere".$critere]['predictif']=0;
	$_SESSION['__default']['res'][0][$critere-1]["critere".$critere]['leader']=0;		
	//echo "nb question:".$_POST['question_nb'];
	for($i=0;$i<$_POST['question_nb'];$i++){

			switch ($_POST["reponse_quiz".$i]) {
							
								case 1:
							
									$_SESSION['__default']['res'][0][$critere-1]["critere".$critere]['reactif']=	
									$_SESSION['__default']['res'][0][$critere-1]["critere".$critere]['reactif']+1;
								break;
							case 2:
								$_SESSION['__default']['res'][0][$critere-1]["critere".$critere]['gere']=	
								$_SESSION['__default']['res'][0][$critere-1]["critere".$critere]['gere']+1;
								break;
							case 3:
								$_SESSION['__default']['res'][0][$critere-1]["critere".$critere]['efficient']=	
								$_SESSION['__default']['res'][0][$critere-1]["critere".$critere]['efficient']+1;
								break;
							case 4:
							$_SESSION['__default']['res'][0][$critere-1]["critere".$critere]['predictif']=	
							$_SESSION['__default']['res'][0][$critere-1]["critere".$critere]['predictif']+1;
							case 5:
							$_SESSION['__default']['res'][0][$critere-1]["critere".$critere]['leader']=
							$_SESSION['__default']['res'][0][$critere-1]["critere".$critere]['leader']+1;
								break;
								}//switch
				
				}//for
				
		
			
	

	
}



?>






