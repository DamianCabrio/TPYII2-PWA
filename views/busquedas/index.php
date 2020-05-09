<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
//use yii\bootstrap\Dropdown;
?>
<h1>Busquedas Por Rubro: <?= $rubro[0]->descripcion ?></h1>



<!--Cargo en la tabla todas las busquedas del rubro elegido-->
<table class="table">
	<thead>
		<th scope="col">#id</th>
      	<th scope="col">Titulo</th>
      	<th scope="col">Empresa</th>
      	<th scope="col">Descripcion</th>
      	<th scope="col">Accion</th>
      	
	</thead>
	<tbody>
		<?php foreach ($busquedas as $busqueda): ?>
		    <tr>
		        <td><?= $busqueda->idBusqueda ?></td>
		        <td><?= $busqueda->titulo ?></td>
		        <td><?= $busqueda->empresa ?></td>
		        <td><?= $busqueda->descripcion ?></td>
		        <td><a href="index.php?idBusqueda=<?= $busqueda->idBusqueda ?>" class="btn btn-primary active" role="button" aria-pressed="true">Inscribirse</a>
		        <a href="index.php?idBusqueda=<?= $busqueda->idBusqueda ?>" class="btn btn-primary ml-1" role="button" aria-pressed="true">Ver Inscriptos</a></td>
		    </tr>
		<?php endforeach; ?>
	</tbody>
</table>

