<?php

namespace app\controllers;

use yii\web\Controller;
use yii\data\Pagination;
use app\models\Inscripciones;
use Yii;

class InscripcionesController extends Controller
{
    public function actionFormInscripciones()
    {

        $inscripciones = new Inscripciones();

        // pregunta si se envió algo desde POST y si sus datos fueron validados
        if ($inscripciones->load(Yii::$app->request->post()) && $inscripciones->validate()) {
            // validar los datos recibidos en el modelo

            // los campos se tratan como objetos
            $inscripciones->idBusqueda = 1; //$datos['idBusqueda'];
            $inscripciones->fecha = date('Y-m-d');

            $inscripciones->save();
            
            // ['nombre de Modelo' => $var]
            return $this->render('form-inscripciones', ['datosGuardados' => true, 'model' => $inscripciones]);
        } else {
            // la página es mostrada inicialmente o hay algún error de validación

                                                //['nombre variable en VIEW', => $variableDatos]
            return $this->render('form-inscripciones', ['datosGuardados' => false, 'model' => $inscripciones]); // nombre de la variable que va a llevar en el view
        }
    }
}