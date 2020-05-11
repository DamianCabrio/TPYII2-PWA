<?php

use yii\helpers\Html;

$this->title = 'Rubros';
?>

<div class="ver-rubros-index">
    <h2>Rubros disponibles</h2>
    <div class="list-group">
        <?php foreach ($rubros as $rubro): ?>
            <a href="<?= "busquedas-por-rubro?id=" . Html::encode($rubro->idRubro) ?>"
               class="list-group-item list-group-item-action text-center"><?= Html::encode($rubro->descripcion) ?></a>
        <?php endforeach; ?>
    </div>

</div>