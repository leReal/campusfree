<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/njorku_candt_plat.css" >

<script src="../../../css/ga.js" async="" type="text/javascript"></script><script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-22584490-1']);
  _gaq.push(['_setDomainName', '.njorku.com']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
<h1>Bienvenue dans la plateforme <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>

 <!-- platform_content-->
	  <div id="platform_content">

		 <!-- candidate_landing_profile_displayy-->
	  <div class="candidate_landing_profile_display">

	  <!-- candidate_landing_profile_display_info-->
	  <div class="candidate_landing_profile_display_info">

	  <h2>Bienvenu(e) dans <?php echo CHtml::encode(Yii::app()->name); ?></h2>

	  <table cellpadding="10" width="750">
  <tbody><tr>
    <td width="50%"><img src="<?php echo Yii::app()->request->baseUrl; ?>/css/landing_page_cv_icon.png">
	<h3><?php echo CHtml::link('Informez efficacement',
                        'index.php/paiement');?>
        </h3><br>
	<p>
        Précisez avec soins les étudiants à qui vous voulez transmettre une information ainsi que le canal d'envoie de l'information (mail, sms).
	</p>

	</td>
    <td width="50%"><a href="http://www.njorku.com/candidate/profile"><img src="<?php echo Yii::app()->request->baseUrl; ?>/css/evaluationgrid.png"></a>
	<h3><?php echo CHtml::link('Multi-filière et multi-classe',
                        'index.php/Examens');?></h3><br>

	<p>Epouse parfaitement la structure de l'établissement (département, filière, niveau, classe)</p>

	</td>
  </tr>
  <tr>
    <td><a href="http://www.njorku.com/candidate/email_alerts"><img src="<?php echo Yii::app()->request->baseUrl; ?>/css/confidential.png"></a>
	<h3><?php echo CHtml::link('Maîtrisez l\'accès aux informations','index.php/site/administration');?></h3><br>
	<p>Définissez les permissions des utilisateurs en précisant non seulement les informations qu'ils peuvent voir mais aussi les actions qu'ils peuvent mêner.</p>

	</td>
    <td><a href="http://www.njorku.com/candidate/sms_alerts"><img src="<?php echo Yii::app()->request->baseUrl; ?>/css/decisionnel.png"></a>
	<h3><?php echo CHtml::link('Reporting et décisionnel','#');?></h3><br>
	<p>Ayez une vue globale et précise de votre établissement grace à des états statistiques et des rapports.</p>

	</td>
  </tr>
</tbody></table>


	  </div>
	  <!-- end of candidate_landing_profile_display_info-->

	  </div>
	  <!-- end of candidate_landing_profile_display-->
	  </div>
	  <!-- end of platform_content-->