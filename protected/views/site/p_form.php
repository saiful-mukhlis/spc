<?php $box = $this->beginWidget('bootstrap.widgets.TbBox', array(
    'title' => 'Product Baru',
    'headerIcon' => 'icon-th-list',
    // when displaying a table, if we include bootstra-widget-table class
    // the table will be 0-padding to the box
    'htmlOptions' => array('class'=>'bootstrap-widget-table')
));?>
<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'p-form',
    'enableAjaxValidation' => false,
    'type' => 'horizontal' ,
    'htmlOptions' => array('enctype' => 'multipart/form-data'),
));
?>
<br/>
<div class="alert alert-block">
<button type="button" class="close" data-dismiss="alert">&times;</button>
<p class="help-block">
    Fields with <span class="required">*</span> are required.
</p>
</div>

<?php echo $form->textFieldRow($model, 'nama', array('class' => 'span6')); ?>

<?php  echo $form->fileFieldRow($model, 'img', array('class' => 'span6')); ?>



<?php

echo $form->select2Row($model, 'status', array(
    'asDropDownList' => true,
    'class' => 'span6',
    'data' => $model->getStatusData(),
    'empty' => '',
    'options' => array(
        'placeholder' => 'Pilih Status',
        'allowClear' => true,
    )
));
?>


<?php

echo $form->select2Row($model, 'rating', array(
    'asDropDownList' => true,
    'class' => 'span6',
    'data' => $model->getRatingData(),
    'empty' => '',
    'options' => array(
        'placeholder' => 'Pilih Rating',
        'allowClear' => true,
    )
));
?>

<?php echo $form->textAreaRow($model, 'ket', array('class' => 'span6')); ?>


<?php

echo $form->select2Row($model, 'bahanps', array(
    'asDropDownList' => true,
    'class' => 'span6',
    'multiple' => 'multiple',
    'data' => CHtml::listData(Bahan::model()->findAll(), 'id', 'nama'),
    'empty' => '',
    'options' => array(
        'placeholder' => 'Pilih Bahan',
        'allowClear' => true,
    )
));
?>

<?php $brandArray = CHtml::listData(Brand::model()->findAll(), 'id', 'nama'); ?>
<?php
if (is_array($brandArray) && count($brandArray) != 0) {
    echo $form->select2Row($model, 'brand', array(
        'asDropDownList' => true,
        'class' => 'span6',
        'data' => $brandArray,
        'empty' => '',
        'options' => array(
            'placeholder' => 'Pilih Merek',
            'allowClear' => true,
        )
    ));
}
?>


<?php // echo $form->textFieldRow($model,'brand',array('class'=>'span6')); ?>

<?php $brandArray = CHtml::listData(Motif::model()->findAll(), 'id', 'nama'); ?>
<?php
if (is_array($brandArray) && count($brandArray) != 0) {
    echo $form->select2Row($model, 'motifps', array(
        'asDropDownList' => true,
        'multiple' => 'multiple',
        'class' => 'span6',
        'data' => $brandArray,
        'empty' => '',
        'options' => array(
            'placeholder' => 'Pilih Motif',
            'allowClear' => true,
        )
    ));
}
?>

<?php $brandArray = CHtml::listData(Warna::model()->findAll(), 'id', 'nama'); ?>
<?php
if (is_array($brandArray) && count($brandArray) != 0) {
    echo $form->select2Row($model, 'warnaps', array(
        'asDropDownList' => true,
        'multiple' => 'multiple',
        'class' => 'span6',
        'data' => $brandArray,
        'empty' => '',
        'options' => array(
            'placeholder' => 'Pilih Warna',
            'allowClear' => true,
        )
    ));
}
?>

<?php $ukuranArray = CHtml::listData(Ukuran::model()->findAll(), 'id', 'nama'); ?>
<?php
if (is_array($ukuranArray) && count($ukuranArray) != 0):
    ?>
    <?php ob_start(); ?>
    <?php
    echo $form->select2Row($model, 'ukuranid_1', array(
        'asDropDownList' => true,
        'class' => 'span6',
        'data' => $ukuranArray,
        'empty' => '',
        'options' => array(
            'placeholder' => 'Pilih Ukuran',
            'allowClear' => true,
        )
    ));
    ?>

    <?php echo $form->textFieldRow($model, 'kethg1_1', array('class' => 'span6')); ?>

    <?php echo $form->textFieldRow($model, 'hg1_1', array('class' => 'span6')); ?>

    <?php echo $form->textFieldRow($model, 'diskonphg1_1', array('class' => 'span6')); ?>

    <?php echo $form->textFieldRow($model, 'kethg2_1', array('class' => 'span6')); ?>

    <?php echo $form->textFieldRow($model, 'hg2_1', array('class' => 'span6')); ?>

    <?php echo $form->textFieldRow($model, 'diskonphg2_1', array('class' => 'span6')); ?>

    <?php $c1 = ob_get_clean(); ?>

    <?php ob_start(); ?>
    <?php
    echo $form->select2Row($model, 'ukuranid_2', array(
        'asDropDownList' => true,
        'class' => 'span6',
        'empty' => 'Pilih Ukuran',
        'data' => $ukuranArray,
        'empty' => '',
        'options' => array(
            'placeholder' => 'Pilih Ukuran',
            'allowClear' => true,
        )
    ));
    ?>

    <?php echo $form->textFieldRow($model, 'kethg1_2', array('class' => 'span6')); ?>

    <?php echo $form->textFieldRow($model, 'hg1_2', array('class' => 'span6')); ?>

    <?php echo $form->textFieldRow($model, 'diskonphg1_2', array('class' => 'span6')); ?>

    <?php echo $form->textFieldRow($model, 'kethg2_2', array('class' => 'span6')); ?>

    <?php echo $form->textFieldRow($model, 'hg2_2', array('class' => 'span6')); ?>

    <?php echo $form->textFieldRow($model, 'diskonphg2_2', array('class' => 'span6')); ?>

    <?php $c2 = ob_get_clean(); ?>

    <?php ob_start(); ?>
    <?php
    echo $form->select2Row($model, 'ukuranid_3', array(
        'asDropDownList' => true,
        'class' => 'span6',
        'empty' => 'Pilih Ukuran',
        'data' => $ukuranArray,
        'empty' => '',
        'options' => array(
            'placeholder' => 'Pilih Ukuran',
            'allowClear' => true,
        )
    ));
    ?>

    <?php echo $form->textFieldRow($model, 'kethg1_3', array('class' => 'span6')); ?>

    <?php echo $form->textFieldRow($model, 'hg1_3', array('class' => 'span6')); ?>

    <?php echo $form->textFieldRow($model, 'diskonphg1_3', array('class' => 'span6')); ?>

    <?php echo $form->textFieldRow($model, 'kethg2_3', array('class' => 'span6')); ?>

    <?php echo $form->textFieldRow($model, 'hg2_3', array('class' => 'span6')); ?>

    <?php echo $form->textFieldRow($model, 'diskonphg2_3', array('class' => 'span6')); ?>

    <?php $c3 = ob_get_clean(); ?>

    <?php ob_start(); ?>
    <?php
    echo $form->select2Row($model, 'ukuranid_4', array(
        'asDropDownList' => true,
        'class' => 'span6',
        'empty' => 'Pilih Ukuran',
        'data' => $ukuranArray,
        'empty' => '',
        'options' => array(
            'placeholder' => 'Pilih Ukuran',
            'allowClear' => true,
        )
    ));
    ?>

    <?php echo $form->textFieldRow($model, 'kethg1_4', array('class' => 'span6')); ?>

    <?php echo $form->textFieldRow($model, 'hg1_4', array('class' => 'span6')); ?>

    <?php echo $form->textFieldRow($model, 'diskonphg1_4', array('class' => 'span6')); ?>

    <?php echo $form->textFieldRow($model, 'kethg2_4', array('class' => 'span6')); ?>

    <?php echo $form->textFieldRow($model, 'hg2_4', array('class' => 'span6')); ?>

    <?php echo $form->textFieldRow($model, 'diskonphg2_4', array('class' => 'span6')); ?>

    <?php $c4 = ob_get_clean(); ?>

    <?php
    echo '<hr/>';
    ?>
    <?php
    $this->widget('bootstrap.widgets.TbTabs', array(
        'type' => 'tabs', // 'tabs' or 'pills'
        'tabs' => array(
            array(
                'label' => 'Ukuran 1',
                'content' => $c1,
                'active' => true
            ),
            array(
                'label' => 'Ukuran 2',
                'content' => $c2
            ),
            array(
                'label' => 'Ukuran 3',
                'content' => $c3
            ),
            array(
                'label' => 'Ukuran 4',
                'content' => $c4
            )
        )
    ));

    ?>
<?php endif; ?>

<div class="form-actions">
    <?php

    $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType' => 'submit',
        'type' => 'primary',
        'label' => 'Create'
    ));
    ?>
</div>

<?php $this->endWidget(); ?>
<?php $this->endWidget();?>