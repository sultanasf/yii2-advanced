<?php

use app\models\Item;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var frontend\models\ItemSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Items';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="item-index container">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="mt-4 justify-content-center row g-3">
        <?php foreach ($items as $item) { ?>
            <div class="mb-2 col-4">
                <div class="card">
                    <img src="<?= Yii::getAlias('@web/') . 'uploads/' . $item->image_url ?>" alt="gambar1" class="card-img-top" height="175px">
                    <div class="card-body">
                        <h5 class="card-title text-center"><?= $item->name ?></h5>
                        <p class="card-text text-center"><?= $item->price ?></p>
                        <p class="text-center">
                            <?php if (Yii::$app->user->isGuest) { ?>
                                <!-- User is not logged in -->
                                <?= Html::a('Order Item', ['site/login'], ['class' => 'btn btn-success']) ?>
                            <?php } else { ?>
                                <!-- User is logged in -->
                                <?= Html::a('Order Item', ['beli', 'id' => $item->id], ['class' => 'btn btn-success']) ?>
                            <?php } ?>
                        </p>
                    </div>
                </div>
            </div>
        <?php } ?>

    </div>


</div>