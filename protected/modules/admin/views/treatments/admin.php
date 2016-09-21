<div class="row">
    <div class="col-sm-6 m-bottom-sm">
        <h4 class="no-margin"><?php echo $this->pageTitle; ?></h4>
    </div><!-- ./col -->
    <div class="col-sm-6 text-right">
        <?php echo Functions::getGridBottons($model,array('add','publish','unpublish','delete')); ?>
    </div><!-- ./col -->
</div><!-- .row -->
<?php
$this->widget('booster.widgets.TbExtendedGridView', array(
    'id' => Yii::app()->controller->id.'-grid',
    'type' => 'striped bordered',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'summaryText' => '',
    'template' => "{items}{pager}",
    'enableSorting' => false,    
    'selectableRows' => 2,
    'bulkActions' => array(
        'actionButtons' => array(
        ),
        'checkBoxColumnConfig' => array(
            'name' => 'id',
            'id' => 'id',
            'value' => '$data->id',
        ),
    ),
    'columns' => array(
        array(
            'header' => 'Sr.No.',
            'type' => 'raw',
            'value' => '$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
            'htmlOptions' => array('style' => 'width:5%;'),
        ),
        array(
            'name' => 'title',
            'value' => '$data->title',
            'htmlOptions' => array('style' => 'width:30%;'),
        ),
        array(
            'name' => 'description',
            'value' => '$data->description',
            'htmlOptions' => array('style' => 'width:40%;'),
        ),
        array(
            'header' => 'Created On',
            'value' => 'Functions::formatDate($data->created_on,"d/m/Y")',
            'htmlOptions' => array('style' => 'width:10%;'),
        ),
        array(
            'header' => 'Status',
            'value' => 'Functions::displayStatus($data->status)',
            'type' => 'raw',
            'htmlOptions' => array('class' => 'center50'),
        ),
        array(
            'header' => 'Edit',
            'value' => 'CHtml::link(CHtml::image(Yii::app()->theme->baseUrl . "/images/edit.png"), "#", array("onclick"=>"update(\'$data->id\');"))',
            'type' => 'raw',
            'htmlOptions' => array('style' => 'text-align: center;'),
            'headerHtmlOptions' => array('style' => 'text-align: center;'),
        )
    ),
));
?>