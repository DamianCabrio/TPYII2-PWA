<?php

namespace app\controllers;

use yii\web\Controller;
use yii\data\Pagination;
use app\models\Inscripciones;

class InscripcionesController extends Controller
{
    public function actionFormInscripciones()
    {

        // guardado de la fecha actual
        date_default_timezone_set('America/Buenos_Aires');
        $fecha = date('d-m-Y h:i:s');

        //$query = Inscripciones::find();
        $query = Inscripciones::save();

        $pagination = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => $query->count(),
        ]);

        /*$countries = $query->orderBy('name')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();*/

        return $this->render('form-inscripciones', [
            'inscripciones' => $inscripciones,
            'pagination' => $pagination,
        ]);
    }
}