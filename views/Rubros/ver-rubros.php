<?php

use yii\helpers\Html;

$this->title = 'Rubros';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="ver-rubros-index">
    <div class="list-group">
        <?php foreach ($rubros as $rubro): ?>
            <a href="<?= "rubro?id=" . Html::encode($rubro->idRubro) ?>" class="list-group-item list-group-item-action text-center"><?= Html::encode($rubro->descripcion) ?></a>
        <?php endforeach; ?>
    </div>
</div>