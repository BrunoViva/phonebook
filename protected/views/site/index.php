<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<h1>Welcome to <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>

<p>A simple Web Application that provides a storage for names and related numbers.</p>

<?php
	if (Yii::app()->request->url == '/phonebook/index.php') {
		echo CHtml::link('Access', 'index.php/contacts');
	} else {
		echo CHtml::link('Access', '../contacts');
	}
?>