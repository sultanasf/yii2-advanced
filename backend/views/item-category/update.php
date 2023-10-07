<?php
//Created By SoeltanASF
use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ItemCategory $model */

$this->title = 'Update Item Category: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Item Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="item-category-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>