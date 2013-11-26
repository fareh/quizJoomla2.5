<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
?>

<h2 class="first"> <span>Questionnaire</span> </h2>
<div class="legends">
    <div class="field blue legend">
        <label>5 : Leader</label>
    </div>
    <div class="field cyan legend">
        <label>4 : Prédictif</label>
    </div>
    <div class="field green legend">
        <label>3 : Efficient</label>
    </div>
    <div class="field yellow legend">
        <label>2 : Géré</label>
    </div>
    <div class="field red legend">
        <label>1 : Réactif</label>
    </div>
    <div class="field legend">
        <label class="niv_rep">Niveau des réponses : </label>
    </div>
</div>
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
     class="frm center quiz-form" id="quizfrmstart">
    <h3>Merci de saisir le nom de votre entreprise</h3>
    <div class="">
        <label for="radio quiz" class="lab-radio"> Répondez-vous à cette évaluation au titre de la totalité de votre entreprise (oui) ou d'un sous-ensemble (non) de celle-ci ? </label>
        <div class="groupe-radio"> <span class="radio-quiz">
            <input type="radio" id="oui" name="reponse_quiz" value="3" />
            <label for="oui" >Oui</label>
            </span> <span class="radio-quiz">
            <input type="radio" id="non" name="reponse_quiz" value="4" />
            <label for="non" >Non</label>
            </span> </div>
    </div>
    <div class="filed-text">
        <label for="entreprise"> Nom de l'entreprise (1) :</label>
        <input type="text" name="entreprise" id="entreprise" value="" data-validate="notEmpty" />
    </div>
    <div class="filed-text">
        <label for="perimetre"> Nom du périmètre couvert par la réponse au questionnaire s'il est un sous-ensemble de l'entreprise (1et 2) :</label>
        <input type="text" name="perimetre" id="perimetre" value=""  data-validate="notEmpty" />
    </div>
    <div class="filed-text">
        <label for="secteur"> Secteur économique (1):</label>
        <input type="text" name="secteur" id="secteur" value="" data-validate="notEmpty" />
    </div>
    <div class="filed-text">
        <label for="questionnaire"> Effectif du périmètre couvert par le questionnaire(1) :</label>
        <input type="text" name="questionnaire" id="questionnaire" value="" data-validate="notEmpty" />
    </div>
    <h3>Coordonnées de la personne qui a conduit la construction des réponses :</h3>
    <div class="filed-text">
        <label for="name"> Nom (1) :</label>
        <input type="text" name="name" id="name" value="" data-validate="notEmpty" />
    </div>
    <div class="filed-text">
        <label for="mail"> Mail (1) :</label>
        <input type="text" name="mail" id="mail" value="" data-validate="email, notEmpty" />
    </div>
    <div class="filed-text">
        <label for="tel"> Tél(1) :</label>
        <input type="text" name="tel" id="tel" value="" data-validate="notEmpty, phone" />
    </div>
    <p> (1) Merci de bien vouloir rempli tous les champs de manière à nous permettre une synthèse de qualité, voire à vous demander des informations complémentaires, sachant que l'anonymat est strictement respecté.</p>
    <p> (2) La réponse au questionnaire peut fort bien couvrir toute l'entreprise ou une partie de celle-ci dans la mesure où cette partie constitue un sous-ensemble de l'entreprise suffisamment important et dont le Responsable a décidé de mettre en place un pilotage par les processus.</p>
    <p class="orange-text">Et si ce questionnaire vous pose problème ? N'hésitez pas à nous contacter<br />
    </p>
    <p> <span class="bold">Hugues Morley-Pegge </span>06 64 36 99 08 (pilote de l'observatoire).<br />
    </p>
    <p><span class="bold"> Didier Vanoverberghe </span>06 84 95 68 10<br />
    </p>
    <p> <span class="bold"> Mimoun Attias </span>06 74 95 00 83<br />
    </p>
    <p> <span class="bold"> Bruno Citti </span>06 73 03 55 43<br />
    </p>
    <p> <span class="bold"> Michel Raquin </span>06 86 53 75 53</p>
    <p>
        <input type="submit" name="info_submit" id="info_submit" value="Commencer" class="start"/>
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
<div class="critere">
    <h3>
        <?php  echo $critere_list[0]->title.":&nbsp;".$critere_list[0]->content;  ?>
    </h3>
</div>
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
            <td class="quiz choice"><div style="line-height:20px;"> <a class="demo_1" href="#tooltip_1"></a>
                    <h3 class="question"><?php echo ($k+1).":".$question->content; ?></h3>
                </div>
                <ul id="<?php echo $question->id; ?>">
                    <?php

	$reponse_list = $this->ListeReponse($question->id,$db);
	
	foreach ($reponse_list as $reponse)
	{?>
                    <li>
                        <input type="radio" id="<?php echo $reponse->id; ?>" name="reponse_quiz<?php  echo $k; ?>" value="<?php echo $reponse->valeur; ?>" validate="required:true"  />
                        <label for="<?php echo $reponse->id; ?>" ><?php echo $reponse->content; ?></label>
                        &nbsp; </li>
                    <?php }
		?>
                </ul></td>
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

			$entreprise=$_POST['entreprise'];
			$perimetre=$_POST['perimetre'];
			$secteur=$_POST['secteur'];
			$questionnaire=$_POST['questionnaire'];
			$name=$_POST['name'];
			$mail=$_POST['mail'];
			$tel=$_POST['tel'];
	$query = " INSERT INTO #__quiz_name (`id`, `entreprise`, `perimetre`, `secteur`, `questionnaire`, `name`, `mail`, `tel`) VALUES (NULL,'$entreprise', '$perimetre', '$secteur', '$questionnaire', '$name', '$mail', '$tel')";
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
