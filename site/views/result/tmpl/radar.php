<?php $v = explode("-", $_GET["v"]); ?>
{
  "elements": [
    {
      "type": "area",
      "width": 1,

      "colour": "#0000A0",
      "fill": "#0000FF",
      "fill-alpha": 0.4,
      "loop": true,
      "values": [
        <?php
			foreach($v as $k => $p)
			{
				if($k == 8)
				{
					echo($p);
				}
				else
				{
					echo($p.", ");
				}
			}
		?>
      ]
    }
  ],
  "title": {
    "text": "Les 9 critères de performance",
	"style": "font-size:20px;font-weight:bold;text-decoration:underline;color:#000000;margin-bottom:20px"
  },
  "radar_axis": {
    "max": 5,
    "colour": "#C0C0C0",
    "grid-colour": "#C0C0C0",
    "labels": {
      "labels": [
        "0",
        "1",
        "2",
        "3",
        "4",
        "5"
      ],
      "colour": "#000000"
    },
    "spoke-labels": {
      "labels": [
        "Critère 1 : Implication DG",
        "Critère 2 : Vision processus",
        "Critère 3 : Alignement du SI",
        "Critère 4 : Satisfaction Client",
        "Critère 5 : Performance économique",
        "Critère 6 : Maîtrise Risques\n& conformité",
        "Critère 7 : Optimisation :\nPlans d'action & Mesure",
        "Critère 8 : Reconstruction\n/ Innovation",
        "Critère 9 : Animation & Compétences"
      ],
      "colour": "#000000"
    }
  },
  "tooltip": {
    "mouse": 1
  },
  "bg_colour": "#FFFFFF"
}