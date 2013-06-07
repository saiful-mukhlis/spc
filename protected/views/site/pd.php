<style>
    .w {
        width: 20%;
    }
</style>
<h1>Product <?php echo $model->nama;?></h1>

<div class="span6">
<?php
    if($model->img==NULL){
        echo CHtml::image(Yii::app()->baseUrl.'/img/product/p/no image.jpg', $model->nama, array('width'=>600, 'height'=>600));
    }else if(file_exists(Yii::app() -> getBasePath() . '/../img/product/p/'.$model->img))  {
        echo CHtml::image(Yii::app()->baseUrl.'/img/product/p/'.$model->img, $model->nama, array('width'=>600, 'height'=>600));
    }else{
        echo CHtml::image(Yii::app()->baseUrl.'/img/product/p/file kosong.png', $model->nama, array('width'=>600, 'height'=>600));
    }

?>
</div>
<div class="span5">
    <?php $box = $this->beginWidget('bootstrap.widgets.TbBox', array(
        'title' => 'Data Product',
        'headerIcon' => 'icon-th-list',
        // when displaying a table, if we include bootstra-widget-table class
        // the table will be 0-padding to the box
        'htmlOptions' => array('class' => 'bootstrap-widget-table'),
        'headerButtons' => array(
            array(
                'class' => 'bootstrap.widgets.TbButtonGroup',
                'type' => 'primary', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                'buttons' => array(
                    array('label' => 'Action', 'url' => '#'), // this makes it split :)
                    array('items' => array(
                        array('label' => 'Edit', 'url' => '#'),
                        '---',
                        array('label' => 'Hapus', 'url' => '#'),
                    )),
                )
            ),

        )
    ));?>
    <table class="table">
        <tbody>
        <tr class="odd">
            <td class="w"><?php echo $model->getAttributeLabel('nama')?></td>
            <td><?php echo $model->nama;?></td>
        </tr>
        <tr class="even">
            <td><?php echo $model->getAttributeLabel('status')?></td>
            <td><?php echo $model->status;?></td>
        </tr>
        <tr class="odd">
            <td><?php echo $model->getAttributeLabel('rating')?></td>
            <td><?php echo $model->rating;?></td>
        </tr>
        <tr class="even">
            <td><?php echo $model->getAttributeLabel('ket')?></td>
            <td><?php echo $model->ket;?></td>
        </tr>
        <?php
        if($brand!=null):
        ?>
        <tr class="odd">
            <td><?php echo $brand->getAttributeLabel('nama')?></td>
            <td><?php echo $brand->nama;?></td>
        </tr>
        <?php
        endif;
        ?>
        </tbody>
    </table>
    <?php $this->endWidget();?>
</div>
<?php
if (is_array($bahan) && count($bahan) != 0):
    ?>
    <div class="span5">
        <?php $box = $this->beginWidget('bootstrap.widgets.TbBox', array(
            'title' => 'Bahan',
            'headerIcon' => 'icon-th-list',
            // when displaying a table, if we include bootstra-widget-table class
            // the table will be 0-padding to the box
            'htmlOptions' => array('class' => 'bootstrap-widget-table'),
            'headerButtons' => array(
                array(
                    'class' => 'bootstrap.widgets.TbButtonGroup',
                    'type' => 'primary', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                    'buttons' => array(
                        array('label' => 'Action', 'url' => '#'), // this makes it split :)
                        array('items' => array(
                            array('label' => 'Edit', 'url' => '#'),
                        )),
                    )
                ),
            )
        ));?>
        <table class="table">
            <tbody>
            <?php
            $i = 0;
            foreach ($bahan as $v) {
                $i++;
                if ($i % 2 == 0) {
                    echo '<tr class="even"><td class="w">' . $v->bahan->nama . '</td></tr>';
                } else {
                    echo '<tr class="odd"><td class="w">' . $v->bahan->nama . '</td></tr>';
                }
            }
            ?>
            </tbody>
        </table>
        <?php $this->endWidget();?>
    </div>
<?php
endif;
?>




<?php
if (is_array($motif) && count($motif) != 0):
    ?>
    <div class="span6">
        <?php $box = $this->beginWidget('bootstrap.widgets.TbBox', array(
            'title' => 'Motif',
            'headerIcon' => 'icon-th-list',
            // when displaying a table, if we include bootstra-widget-table class
            // the table will be 0-padding to the box
            'htmlOptions' => array('class' => 'bootstrap-widget-table'),
            'headerButtons' => array(
                array(
                    'class' => 'bootstrap.widgets.TbButtonGroup',
                    'type' => 'primary', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                    'buttons' => array(
                        array('label' => 'Action', 'url' => '#'), // this makes it split :)
                        array('items' => array(
                            array('label' => 'Action', 'url' => '#'),
                            array('label' => 'Another action', 'url' => '#'),
                            array('label' => 'Something else', 'url' => '#'),
                            '---',
                            array('label' => 'Separate link', 'url' => '#'),
                        )),
                    )
                ),
                array(
                    'class' => 'bootstrap.widgets.TbButtonGroup',
                    'buttons' => array(
                        array('label' => 'Left', 'url' => '#'),
                        array('label' => 'Middel', 'url' => '#'),
                        array('label' => 'Right', 'url' => '#')
                    ),
                ),
            )
        ));?>
        <table class="table">
            <tbody>
            <?php
            $i = 0;
            foreach ($motif as $v) {
                $i++;
                if ($i % 2 == 0) {
                    echo '<tr class="even"><td class="w">' . $v->motif->nama . '</td></tr>';
                } else {
                    echo '<tr class="odd"><td class="w">' . $v->motif->nama . '</td></tr>';
                }
            }
            ?>
            </tbody>
        </table>
        <?php $this->endWidget();?>
    </div>
<?php
endif;
?>



<?php
if (is_array($warna) && count($warna) != 0):
    ?>
    <div class="span6">
        <?php $box = $this->beginWidget('bootstrap.widgets.TbBox', array(
            'title' => 'Warna',
            'headerIcon' => 'icon-th-list',
            // when displaying a table, if we include bootstra-widget-table class
            // the table will be 0-padding to the box
            'htmlOptions' => array('class' => 'bootstrap-widget-table'),
            'headerButtons' => array(
                array(
                    'class' => 'bootstrap.widgets.TbButtonGroup',
                    'type' => 'primary', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                    'buttons' => array(
                        array('label' => 'Action', 'url' => '#'), // this makes it split :)
                        array('items' => array(
                            array('label' => 'Action', 'url' => '#'),
                            array('label' => 'Another action', 'url' => '#'),
                            array('label' => 'Something else', 'url' => '#'),
                            '---',
                            array('label' => 'Separate link', 'url' => '#'),
                        )),
                    )
                ),
                array(
                    'class' => 'bootstrap.widgets.TbButtonGroup',
                    'buttons' => array(
                        array('label' => 'Left', 'url' => '#'),
                        array('label' => 'Middel', 'url' => '#'),
                        array('label' => 'Right', 'url' => '#')
                    ),
                ),
            )
        ));?>
        <table class="table">
            <tbody>
            <?php
            $i = 0;
            foreach ($warna as $v) {
                $i++;
                if ($i % 2 == 0) {
                    echo '<tr class="even"><td class="w">' . $v->warna->nama . '</td></tr>';
                } else {
                    echo '<tr class="odd"><td class="w">' . $v->warna->nama . '</td></tr>';
                }
            }
            ?>
            </tbody>
        </table>
        <?php $this->endWidget();?>
    </div>
<?php
endif;
?>



<?php
if (is_array($ukuran) && count($ukuran) != 0):
    ?>
    <div class="span6">
        <?php $box = $this->beginWidget('bootstrap.widgets.TbBox', array(
            'title' => 'Ukuran',
            'headerIcon' => 'icon-th-list',
            // when displaying a table, if we include bootstra-widget-table class
            // the table will be 0-padding to the box
            'htmlOptions' => array('class' => 'bootstrap-widget-table'),
            'headerButtons' => array(
                array(
                    'class' => 'bootstrap.widgets.TbButtonGroup',
                    'type' => 'primary', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                    'buttons' => array(
                        array('label' => 'Action', 'url' => '#'), // this makes it split :)
                        array('items' => array(
                            array('label' => 'Action', 'url' => '#'),
                            array('label' => 'Another action', 'url' => '#'),
                            array('label' => 'Something else', 'url' => '#'),
                            '---',
                            array('label' => 'Separate link', 'url' => '#'),
                        )),
                    )
                ),
                array(
                    'class' => 'bootstrap.widgets.TbButtonGroup',
                    'buttons' => array(
                        array('label' => 'Left', 'url' => '#'),
                        array('label' => 'Middel', 'url' => '#'),
                        array('label' => 'Right', 'url' => '#')
                    ),
                ),
            )
        ));?>
        <table class="table">
            <thead>
            <tr>
                <th>No</th>
                <th>Ukuran</th>
                <th>Ket. Harga 1</th>
                <th>Harga 1</th>
                <th>Diskon 1(%)</th>
                <th>Diskon 1(Rp)</th>
                <th>Ket. Harga 2</th>
                <th>Harga 2</th>
                <th>Diskon 2(%)</th>
                <th>Diskon 2(Rp)</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $i = 0;
            foreach ($ukuran as $v) {
                $i++;
                if ($i % 2 == 0) {
                    echo '<tr class="even">
                    <td>' . $i . '</td>
                    <td>' . $v->ukuran->nama . '</td>
                    <td>' . $v->kethg1 . '</td>
                    <td>' . $v->hg1 . '</td>
                    <td>' . $v->diskonphg1 . '</td>
                    <td>' . $v->diskonhg1 . '</td>
                    <td>' . $v->kethg2 . '</td>
                    <td>' . $v->hg2 . '</td>
                    <td>' . $v->diskonphg2 . '</td>
                    <td>' . $v->diskonhg2 . '</td>
                    </tr>';
                } else {
                    echo '<tr class="odd">
                    <td>' . $i . '</td>
                    <td>' . $v->ukuran->nama . '</td>
                    <td>' . $v->kethg1 . '</td>
                    <td>' . $v->hg1 . '</td>
                    <td>' . $v->diskonphg1 . '</td>
                    <td>' . $v->diskonhg1 . '</td>
                    <td>' . $v->kethg2 . '</td>
                    <td>' . $v->hg2 . '</td>
                    <td>' . $v->diskonphg2 . '</td>
                    <td>' . $v->diskonhg2 . '</td>
                    </tr>';
                }
            }
            ?>
            </tbody>
        </table>
        <?php $this->endWidget();?>
    </div>
<?php
endif;
?>



<div class="span12">
    <?php $box = $this->beginWidget('bootstrap.widgets.TbBox', array(
        'title' => 'Image Product',
        'headerIcon' => 'icon-th-list',
        // when displaying a table, if we include bootstra-widget-table class
        // the table will be 0-padding to the box
        'htmlOptions' => array('class' => 'bootstrap-widget-table'),
        'headerButtons' => array(
            array(
                'class' => 'bootstrap.widgets.TbButtonGroup',
                'type' => 'primary', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                'buttons' => array(
                    array('label' => 'Action', 'url' => '#'), // this makes it split :)
                    array('items' => array(
                        array('label' => 'Action', 'url' => '#'),
                        array('label' => 'Another action', 'url' => '#'),
                        array('label' => 'Something else', 'url' => '#'),
                        '---',
                        array('label' => 'Separate link', 'url' => '#'),
                    )),
                )
            ),
            array(
                'class' => 'bootstrap.widgets.TbButtonGroup',
                'buttons' => array(
                    array('label' => 'Left', 'url' => '#'),
                    array('label' => 'Middel', 'url' => '#'),
                    array('label' => 'Right', 'url' => '#')
                ),
            ),
        )
    ));?>


    <?php
    $this->widget('ext.xupload.XUpload', array(
        'url' => Yii::app()->createUrl("site/upload", array("parent_id" => 1)),
        'model' => $model,
        'attribute' => 'file',
        'multiple' => false,
    ));
    ?>


    <?php $this->endWidget();?>
</div>