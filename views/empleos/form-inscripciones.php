<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $model app\models\ContactForm */

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

$this->title = 'Inscripciones';

$datosGuardados = isset($datosGuardados) ? $datosGuardados : false;
$busquedaNoExiste = isset($busquedaNoExiste) ? $busquedaNoExiste : false;
?>

<?php
if ($busquedaNoExiste) {
    ?>
    <div class='alert alert-danger'>
            Error. No se encontraron búsquedas.
    </div>
    <a href="ver-rubros">Volver al inicio</a>
    <?php
} elseif ($datosGuardados) {
    ?>

    <div class="modal-backdrop in"></div>

    <div class="modal fade in" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog"
         aria-labelledby="staticBackdropLabel" aria-hidden="true" style="display:block;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="staticBackdropLabel">Se ha inscripto correctamente</h3>
                </div>
                <div class="modal-body">
                    Su inscripcion ha sido completada con exito, si es elegido para el trabajo el empleador se pondra en contacto con usted.
                </div>
                <div class="modal-footer">
                    <a href="busquedas-por-rubro?id=<?= Html::encode($busqueda[0]->idRubro) ?>"
                       class="btn btn-info active" role="button" aria-pressed="true">Volver Atras</a>
                </div>
            </div>
        </div>
    </div>
    <?php
} else {
    ?>

    <div class="site-contact">
        <h1>Inscribirse a: "<?= Html::encode($busqueda[0]->descripcion) ?>"</h1>
        <p>
            Ingrese sus datos personales en el siguiente formulario para inscribirse en la búsqueda.
        </p>

        <div class="row">
            <div class="col-lg-5">

                <?php $form = ActiveForm::begin(['id' => 'inscripcion-form']); ?>

                <?= $form->field($model, 'nombre')->textInput(['autofocus' => true]) ?>
                <?= $form->field($model, 'apellido')->textInput(['autofocus' => true]) ?>


                <div class="form-group">
                    <?= Html::submitButton('Inscribirse', ['class' => 'btn btn-success', 'name' => 'contact-button']) ?>
                </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>
        <a href="busquedas-por-rubro?id=<?= Html::encode($busqueda[0]->idRubro) ?>">Volver Atras</a>
    </div>

    <?php
}

?>
