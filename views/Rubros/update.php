<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Rubros */

$this->title = 'Update Rubros: ' . $model->idRubro;
$this->params['breadcrumbs'][] = ['label' => 'Rubros', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idRubro, 'url' => ['view', 'id' => $model->idRubro]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="rubros-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
