<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Inscripciones';
$this->params['breadcrumbs'][] = $this->title;

//$idBusqueda = $request->get('idBusqueda');
$idBusqueda = 1;
?>
<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>

        <div class="alert alert-success">
            Thank you for contacting us. We will respond to you as soon as possible.
        </div>


    <?php else: ?>

        <p>
            Ingrese sus datos personales en el siguiente formulario para inscribirse en la búsqueda.
        </p>

        <div class="row">
            <div class="col-lg-5">

                <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                    <input class="form-control my-5" type="text" placeholder="ID de búsqueda: <?php echo $idBusqueda; ?>" readonly="">
                    
                    <?= $form->field($model, 'nombre')->textInput(['autofocus' => true]) ?>
                    <?= $form->field($model, 'apellido')->textInput(['autofocus' => true]) ?>


                    <div class="form-group">
                        <?= Html::submitButton('Inscribirse', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                    </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>

    <?php endif; ?>

    <?php 
        if ($datosGuardados){
            echo "<div class='alert alert-success'>
                Tus datos se han enviado correctamente.
            </div>";
        }
    ?>

</div>