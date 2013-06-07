<?php
$this->widget('ext.xupload.XUpload', array(
    'url' => Yii::app()->createUrl("site/upload", array("parent_id" => 1)),
    'model' => $img,
    'attribute' => 'file',
    'multiple' => true,
));
?>