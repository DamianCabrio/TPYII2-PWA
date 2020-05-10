<?php

namespace app\controllers;

use yii\web\Controller;
use yii\data\Pagination;
use app\models\Inscripciones;
use app\models\Busquedas;
use Yii;

class InscripcionesController extends Controller
{
    public function actionFormInscripciones()
    {
        // se obtienen los datos enviados por GET
        $request = Yii::$app->request;
        $idBusqueda = $request->get('idBusqueda', 0);

        $inscripciones = new Inscripciones();

        $queryBusquedaTrabajoQuery = Busquedas::find();
        $busqueda = $queryBusquedaTrabajoQuery->where(["idBusqueda" => $idBusqueda])->all();

        if (count($busqueda) == 0) {
            return $this->render('form-inscripciones', ['busquedaNoExiste' => true]);
        }

        

        // pregunta si se envió algo desde POST y si sus datos fueron validados
        if ($inscripciones->load(Yii::$app->request->post()) && $inscripciones->validate()) {
            // validar los datos recibidos en el modelo

            // los campos se tratan como objetos
            $inscripciones->idBusqueda = $idBusqueda;
            $inscripciones->fecha = date('Y-m-d');

            $inscripciones->save();
            
            // ['nombre de Modelo' => $var]
            return $this->render('form-inscripciones', ['datosGuardados' => true, 'model' => $inscripciones, 'busquedaNoExiste' => false, 'idBusqueda' => $idBusqueda]);
        } else {
            // la página es mostrada inicialmente o hay algún error de validación

                                                //['nombre variable en VIEW', => $variableDatos]
            return $this->render('form-inscripciones', ['datosGuardados' => false, 'model' => $inscripciones, 'busquedaNoExiste' => false, 'idBusqueda' => $idBusqueda]); // nombre de la variable que va a llevar en el view
        }
    }
}