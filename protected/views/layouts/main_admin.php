<!doctype html>
<?php
echo H::ie();
echo CHtml::openTag('head');
$this->renderDynamic('H::meta',$this->title, $this->description, $this->keywords);
echo H::ico();

echo CHtml::closeTag('head');
echo CHtml::openTag('body');
echo $this->renderPartial('/global/upgrade_browser');
echo A::nav();
echo $content;
echo H::footer();
echo CHtml::closeTag('body');
?>
</html>
