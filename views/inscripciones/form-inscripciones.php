<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Inscripciones';
$this->params['breadcrumbs'][] = $this->title;


?>

<?php 

    if ($busquedaNoExiste) {
        echo "<div class='alert alert-danger'>
            Error. No se encontraron búsquedas.
        </div>";
    }else{
        ?>

        <div class="site-contact">
        <h1>Inscribirse a: "<?= Html::encode($busqueda[0]->descripcion) ?>"</h1>
            <p>
                Ingrese sus datos personales en el siguiente formulario para inscribirse en la búsqueda.
            </p>

            <div class="row">
                <div class="col-lg-5">

                    <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                        <input class="form-control my-5" type="hidden" value="<?php echo $busqueda[0]->idBusqueda; ?>" readonly="">
                        
                        <?= $form->field($model, 'nombre')->textInput(['autofocus' => true]) ?>
                        <?= $form->field($model, 'apellido')->textInput(['autofocus' => true]) ?>


                        <div class="form-group">
                            <?= Html::submitButton('Inscribirse', ['class' => 'btn btn-success', 'name' => 'contact-button']) ?>
                        </div>

                    <?php ActiveForm::end(); ?>

                </div>
            </div>

        <?php 
            if ($datosGuardados){
                echo "<div class='alert alert-success'>
                    Tus datos se han enviado correctamente.
                </div>
                
                <div>
                <a class='btn btn-info' href='/TPYII2-PWA/web/rubros/ver-rubros'>Volver A Rubros</a>
                </div>
                ";
            }
        ?>

    </div>

<?php
    }

?>
