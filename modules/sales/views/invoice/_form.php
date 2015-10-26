<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\sales\models\Invoice */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="invoice-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->hiddenInput(['id_model'=> $model->id])->label(false); ?>

    <?= $form->field($model, 'invoice_no')->textInput() ?>

    <?= $form->field($model, 'companyName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date')->textInput() ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_user')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>


<?php
if(!$model->isNewRecord)
{

?>

<div id="grid"></div>

<script>

    var id = $("#invoice-id").val();

    console.log(id);

    var remoteDataSource = new kendo.data.DataSource({
        pageSize: 20,
         transport: {
             read: {
                 url: '?r=sales/invoicedetail/index&id=' + id,
                 dataType: "json"
             }
         },
         schema: {
             model: {
                 id: "id",
                 fields: {
                     Id: { editable: false, type: "number" },
                     id_product: { validation: { required: true} },
                     count: { type: "number", validation: { required: true} },
                     price: { type: "number", validation: { required: true} },
                 }
             }
         }
     });

    $('#grid').kendoGrid({
        dataSource: remoteDataSource,
        scrollable: true,
        sortable: true,
        filterable: true,
        pageable: {
            refresh: true,
            pageSizes: true,
            buttonCount: 5
        },
        columns: [
                {
                    field: "id",
                    title: "Id"
                },
                {
                    field: "id_product",
                    title: "Product"
                },
                {
                    field: "count",
                    title: "Count"
                },
                {
                    field: "price",
                    title: "Price"
                },
                {
                    command: ["edit", "destroy"],
                    width: "200px"
                }
        ]
    });
</script>


<?php
}
?>
