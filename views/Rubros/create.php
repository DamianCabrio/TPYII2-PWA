<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Rubros */

$this->title = 'Create Rubros';
$this->params['breadcrumbs'][] = ['label' => 'Rubros', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rubros-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
