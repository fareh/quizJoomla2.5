<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
?>
<h2> <span>Résultat</span> </h2>	
<div class="quiz-content" >
<div id="comments">
		<p style="font-size: 12px; font-weight: bold;">Le questionnaire est maintenant terminé, vous pouvez voir vos résultats ci dessous.<br>Si vous souhaitez commenter ces résultats, vous pouvez utiliser le fomulaire suivant : </p>
		<form method="post" action="">
			<textarea cols="50" rows="7" name="message" class="text_comment"></textarea>
			<input type="hidden" value="1" name="comments">
            <p>
			<input type="submit" value="Envoyer" name="submit" class="comment">
            </p>
		</form>
	</div>	
<?php




$db =& JFactory::getDBO();
if(!isset($_SESSION['__default']['res']))
{
	$url="index.php?option=com_quiz&view=quiz";
	 $url = JURI::base() . $url;
	header( 'Location: ' . $url );
}
$option = JRequest::getCmd('option', '');
$view   = JRequest::getCmd('view');
if($option =="com_quiz"  && $view =="result"){?>
<style>
.right-container{
	display:none;
}
.content-page {
width:970px;

}
</style>
<?php

}





$moy_globale =0;
function somme($cr){
	$somme=0;
	$somme+=$_SESSION['__default']['res'][0][$cr-1]["critere".$cr]["reactif"];
	$somme+=$_SESSION['__default']['res'][0][$cr-1]["critere".$cr]["gere"];
	$somme+=$_SESSION['__default']['res'][0][$cr-1]["critere".$cr]["efficient"];
	$somme+=$_SESSION['__default']['res'][0][$cr-1]["critere".$cr]["predictif"];
	$somme+=$_SESSION['__default']['res'][0][$cr-1]["critere".$cr]["leader"];
	return $somme;
}
 function pourcent($cr,$perf){
		return (somme($cr)!=0)?round($_SESSION['__default']['res'][0][$cr-1]["critere".$cr][$perf]*100/somme($cr), 2):"no value";
	   }
	   function psomme($div, $a , $b, $c, $d, $e){
		 return (( $a+$b+$c+$d+$e)!=0)?round(($div*100)/( $a+$b+$c+$d+$e), 2):"no value";
	   }
	   
	   
	   
function moyene_pond($cr){
	$somme=0;
	$somme+=pourcent($cr,"reactif");
	$somme+=pourcent($cr,"gere")*2;
	$somme+=pourcent($cr,"efficient")*3;
	$somme+=pourcent($cr,"predictif")*4;
	$somme+=pourcent($cr,"leader")*5;
	return  round($somme/100,2);
	
}

function moyene_pond_somme($a , $b, $c, $d, $e){
	$somme=0;
	$somme+=psomme($a, $a , $b, $c, $d, $e);
	$somme+=psomme($b, $a , $b, $c, $d, $e)*2;
	$somme+=psomme($c, $a , $b, $c, $d, $e)*3;
	$somme+=psomme($d, $a , $b, $c, $d, $e)*4;
	$somme+=psomme($e, $a , $b, $c, $d, $e)*5;
	return  round($somme/100,2);
	   }
	   	   
	   
$critere=isset($_GET['critere'])?$_GET['critere']:10;
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
				
			//echo"<pre>";print_r($_SESSION['__default']['res'][0]);echo"</pre>";
			
	

	
}

?>
<?php		

$reactif="0";
$gere="0";
$efficient="0";
$predictif="0";
$leader="0";
$i=1;

for($i=1;$i<11;$i++){
	$reactif+=$_SESSION['__default']['res'][0][$i-1]["critere".$i]["reactif"];
	$gere+=$_SESSION['__default']['res'][0][$i-1]["critere".$i]["gere"];
	$efficient+=$_SESSION['__default']['res'][0][$i-1]["critere".$i]["efficient"];
	$predictif+=$_SESSION['__default']['res'][0][$i-1]["critere".$i]["predictif"];
	$leader+=$_SESSION['__default']['res'][0][$i-1]["critere".$i]["leader"];
}


$moyf="";
      $moyf.="moyp_s:".moyene_pond_somme($reactif , $gere, $efficient, $predictif, $leader).";";
	  for($i=2;$i<11;$i++){
	
		$moyf.="moyc".($i-1).":".moyene_pond($i).";";
	  }
$Session = & JFactory :: getSession ();
$id_name=$Session->get('id_name');
$query="select * from #__quiz_result where id_user=$id_name ";
$db->setQuery($query);
$db->query();
$num_rows = $db->getNumRows();
if($num_rows == 0)
$query = " INSERT INTO #__quiz_result (`id`, `result`, `id_user`) VALUES (NULL, '$moyf','$id_name') ";
else
$query = "UPDATE #__quiz_result SET `result` = '$moyf' WHERE  `id_user` =$id_name";



$db->setQuery($query);
$db->query();
?>
<table cellspacing="0" cellpadding="0" border="0" id="table_result">
  <colgroup  width="205">
  <col width="100">
  <col width="50">
  <col width="50">
  <col width="50">
  <col width="50">
  <col width="50">
  <col width="50">
  <col width="50">
  <col width="50">
  <col width="50">
  <col width="50">
  </colgroup>
  <tbody>
    <tr>
      <th>Résultats du scoring</th>
      <th>Maturité de l'entité évaluée</th>
      <th>Critère 1 : Implication DG</th>
      <th>Critère 2 : Vision processus</th>
      <th>Critère 3 : Alignement du SI</th>
      <th>Critère 4 : Satisfaction Client</th>
      <th>Critère 5 : Performance économique</th>
      <th>Critère 6 : Maîtrise Risques &amp; conformité</th>
      <th>Critère 7 : Optimisation : Plans d'action &amp; Mesure</th>
      <th>Critère 8 : Reconstruction Innovation</th>
      <th>Critère 9 : Animation &amp; Compétences</th>
    </tr>
    <tr>
      <td>Nbre de réponses de Niveau 1 : Réactif</td>
      <td><?php echo $reactif; ?></td>
      
      <?php for($i=2;$i<11;$i++){
	
	echo "<td>".$_SESSION['__default']['res'][0][$i-1]["critere".$i]["reactif"]."</td>";
}?>
     
    </tr>
    <tr>
      <td>Nbre de réponses de Niveau 2 : Géré</td>
      <td><?php echo $gere; ?></td>
        <?php for($i=2;$i<11;$i++){
	
	echo "<td>".$_SESSION['__default']['res'][0][$i-1]["critere".$i]["gere"]."</td>";
}?>
     
    </tr>
    <tr>
      <td>Nbre de réponses de Niveau 3 : Efficient</td>
      <td><?php echo $efficient; ?></td>
     
       <?php for($i=2;$i<11;$i++){
	
	echo "<td>".$_SESSION['__default']['res'][0][$i-1]["critere".$i]["efficient"]."</td>";
}?>
    </tr>
    <tr>
      <td>Nbre de réponses de Niveau 4 : Prédictif</td>
      <td><?php echo $predictif; ?></td>
       <?php for($i=2;$i<11;$i++){
	
	echo "<td>".$_SESSION['__default']['res'][0][$i-1]["critere".$i]["predictif"]."</td>";
}?>
    </tr>
    <tr>
      <td>Nbre de réponses de Niveau 5 : Leader</td>
      <td><?php echo $leader; ?></td>
      
      <?php for($i=2;$i<11;$i++){
	
	echo "<td>".$_SESSION['__default']['res'][0][$i-1]["critere".$i]["leader"]."</td>";
}?>
    </tr>
    <tr>
      <td>% de réponses de Niveau 1 : Réactif</td>
      <td><?php echo psomme($reactif, $reactif , $gere, $efficient, $predictif, $leader) ;?></td>
<?php for($i=2;$i<11;$i++){
	
	echo "<td>".pourcent($i,"reactif")."%</td>";
}?>
      
    </tr>
    <tr>
      <td>% de réponses de Niveau 2 : Géré</td>
     <td><?php echo psomme($gere, $reactif , $gere, $efficient, $predictif, $leader) ;?></td>
      <?php for($i=2;$i<11;$i++){
	
	echo "<td>".pourcent($i,"gere")."%</td>";
}?>
    </tr>
    <tr>
      <td>% de réponses de Niveau 3 : Efficient</td>
       <td><?php echo psomme($efficient, $reactif , $gere, $efficient, $predictif, $leader) ;?></td>
      <?php for($i=2;$i<11;$i++){
	
	echo "<td>".pourcent($i,"efficient")."%</td>";
}?>
    </tr>
    <tr>
      <td>% de réponses de Niveau 4 : Prédictif</td>
       <td><?php echo psomme($predictif, $reactif , $gere, $efficient, $predictif, $leader) ;?></td>
       <?php for($i=2;$i<11;$i++){
	
	echo "<td>".pourcent($i,"predictif")."%</td>";
}?>
    </tr>
    <tr>
      <td>% de réponses de Niveau 5 : Leader</td>
      <td><?php echo psomme($leader, $reactif , $gere, $efficient, $predictif, $leader) ;?></td>
        <?php for($i=2;$i<11;$i++){
	
	echo "<td>".pourcent($i,"leader")."%</td>";
}?>
    </tr>
    <tr>
      <td>Moyenne pondérée</td>
      <?php  echo"<td>".moyene_pond_somme($reactif , $gere, $efficient, $predictif, $leader)."</td>" ?>
      <?php 
	  
	  $tab_pnd=array();
	  for($i=2;$i<11;$i++){
	
	echo "<td>".moyene_pond($i)."%</td>";
	$tab_pnd[]=moyene_pond($i);
	$moy_globale +=moyene_pond($i);
}?>
    </tr>
    <tr>
      <td>Niveau de maturité atteint</td>
      <?php
		$tab=color(moyene_pond_somme($reactif , $gere, $efficient, $predictif, $leader));
		echo" <td style='background-color:$tab[0]; color: white; font-size: 12px;'>$tab[1]</td>";
      
      
      ?>
   
   
    <?php for($i=2;$i<11;$i++){
		$tab=color(moyene_pond($i));
		echo" <td style='background-color:$tab[0]; color: white; font-size: 12px;'>$tab[1]</td>";
      }
      
      ?>
      
     

    </tr>
    <tr>
      <td>Niveau confirmé de maturité</td>
     <?php $tab=color($moy_globale/9);
		echo" <td style='background-color:$tab[0]; color: white; font-size: 12px;'>$tab[1]</td>";
		?>
    </tr>
  </tbody>
</table>
<?php 
function color($i)
{
	  $color="#E22022";
		$niveau= "Réactif";
switch ($i) {
    case ($i>=1 && $i<1.80):
        $color="#E22022";
		$niveau= "Réactif";
        break;
    case ($i>=1.80 && $i<2.80):
        $color="#E1901D";
		$niveau= "Géré";
        break;
    case ($i>=2.80 && $i<3.80):
          $color="#60BC29"; 
		  $niveau= "Efficient";
        break;
	 case ($i>=3.80 && $i<4.80):
          $color="#1DAEE1";
		  $niveau= "Prédictif";
        break;
    case ($i>=4.80 && $i<5):
         $color="#0556DB";
		  $niveau= "Leader";
        break;
}
return array($color,$niveau);
}

?>




<script type="text/javascript">
	swfobject.embedSWF(
	"<?php echo JURI::base() ; ?>open-flash-chart.swf", "my_chart",
	"920", "450", "7.0.0", "expressInstall.swf",
	{"data-file":"<?php echo JURI::base() ; ?>radar.php?v=<?php echo implode("-",$tab_pnd) ;?>"} );
</script>
<div id="my_chart"></div>
</div>