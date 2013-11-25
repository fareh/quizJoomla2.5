function valider(){
	
	var rowCount = jQuery('#quiz_table tr').length;
	bool=false;

	ch=1;
	for(i=0;i<rowCount;i++){
			ch*=jQuery('input:radio[name=reponse_quiz'+i+']:checked').val();
		
	}
	//console.log(ch);
	if(jQuery.isNumeric(ch))
	{
		bool=true;
	}
	return bool;
	
}
	$(document).ready(function($){
		 jQuery.noConflict();
		 jQuery('.frm').trigger('reset');//init form
 jQuery(".demo_1").simpletooltip({ margin: 10 });//tooltip
		
		
		 $(function(){
       				 $(".frm input:radio").uniform();//uniform radio button
     		 });
		color = "#646567";
		$(".frm li").hover(function () {
							
							val=$(this).find('input:radio').val();
							switch(val)
								{
								case '1': active = "active1h";
										  activeb=" activeb1";
								break;
								case '2': active = "active2h";
								          activeb=" activeb2";
								break;
								case '3': active = "active3h";
								          activeb=" activeb3";
								break;
								case '4': active = "active4h";
								          activeb=" activeb4";
								break;
								case '5': active = "active5h";
								          activeb=" activeb5";
								break;
								}
								$(this).addClass(active);
							$(this).find('span').addClass(activeb);
						},
						function () {
							$(this).removeClass(active);
							$(this).find('span').removeClass(activeb);
						}
  				);

				/*$(".frm ul li label").click(function() {
					console.log($(this));
					id_ul=$(this).parent().parent('ul').attr('id');
					val=$(this).parent().find('input:radio').val();

							switch(val)
								{
								case '1': active = "active1h";
								 activebc=" active1c";
								break;
								case '2': active = "active2h";
								 activebc=" active2c";
								break;
								case '3': active = "active3h";
								 activebc=" active3c";
								break;
								case '4': active = "active4h";
								 activebc=" active4c";
								break;
								case '5': active = "active5h";  
								activebc=" active5c";
								break;
								}
							$(this).parent().parent("ul").find('label').removeAttr("class");
							$(this).addClass(active);
							
							$(this).parent().parent('ul').find('span').removeAttr('class');
							$(this).parent().find('span').addClass(activebc+' checked');
				});	*/
				$(".frm ul li label,.frm ul li input[type=radio]").click(function() {
					
					//id_ul=$(this).parent().parent('ul').attr('id');
					val=$(this).parent().find('input:radio').val();

							switch(val)
								{
								case '1': active = "active1h";
								 activebc=" active1c";
								break;
								case '2': active = "active2h";
								 activebc=" active2c";
								break;
								case '3': active = "active3h";
								 activebc=" active3c";
								break;
								case '4': active = "active4h";
								 activebc=" active4c";
								break;
								case '5': active = "active5h";  
								activebc=" active5c";
								break;
								}
								
									if ($(this).is("label")) {

							$(this).parent().find('input[type=radio]').attr('checked','checked')
							//label
							$(this).parents('ul').find('label').removeAttr("class");
							$(this).addClass(active);
						
							$(this).parents('ul').find('span').removeAttr('class');
							$(this).parent('li').find('span').addClass(activebc+' checked');
							}
							
							else {
					
							$(this).attr('checked','checked')
							//label
							$(this).parents('ul').find('label').removeAttr("class");
							$(this).parents('li').find('label').addClass(active);
							$(this).parents('ul').find('span').removeAttr('class');
							$(this).parent('span').addClass(activebc+' checked');
	
							}
				});	
				
				
	
	 $("#info_submit").click(function(event){
		 var toquiz= $('.radio_quiz').is(':checked');
		 
		if($('#name').val() != "" && toquiz == true )
			$('#quizfrmstart').submit();
		else
			alert("Attention, il est important de répondre à toutes les questions pour que l'étude soit fiable, merci de compléter les réponses manquantes.");
		} );
	
	
	
	
		
   $("#quiz_submit").click(function(event){
		
		if(valider() == true)
			$('#quizfrm').submit();
		else
			alert("Attention, il est important de répondre à toutes les questions pour que l'étude soit fiable, merci de compléter les réponses manquantes.")
		} );

 });