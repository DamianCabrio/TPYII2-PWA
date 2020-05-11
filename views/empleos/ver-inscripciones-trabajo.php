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
    <a href="busquedas-por-rubro?id=<?= Html::encode($busqueda[0]->idRubro) ?>">Volver Atras</a>
<?php
else:
    $mensaje = "Error al cargar la pagina: La busqueda insertada no existe";
    echo Html::tag('div', $mensaje, ['class' => 'alert alert-danger']);
    ?>
    <a href="ver-rubros">Volver Atras</a>
<?php endif; ?>

 