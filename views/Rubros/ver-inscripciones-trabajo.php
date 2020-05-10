<?php

use yii\helpers\Html;

$this->title = 'Inscriptos';

if (count($busqueda) != 0):
?>

<h2>Inscriptos para: <?= Html::encode($busqueda[0]->titulo) ?></h2>

<table class="table table-hover table-striped">
    <thead>
    <tr>
        <th scope="col">Nombre</th>
        <th scope="col">Apellido</th>
        <th scope="col">Fecha de inscripcion</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($inscriptos as $inscripto): ?>
        <tr>
            <td><?= Html::encode($inscripto->nombre) ?></td>
            <td><?= Html::encode($inscripto->apellido) ?></td>
            <td><?= Html::encode($inscripto->fecha) ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<a href="busqueda.php?id=<?= Html::encode($busqueda[0]->idRubro) ?>">Volver Atras</a>
<?php
    else:?>
    <h1>Error al cargar la pagina</h1>
    <h5>La busqueda insertada no existe</h5>
        <a href="ver-rubros">Volver Atras</a>
<?php endif; ?>
