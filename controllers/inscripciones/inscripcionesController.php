<?php

namespace app\controllers;

use yii\web\Controller;
use yii\data\Pagination;
use app\models\Inscripciones;

class InscripcionesController extends Controller
{
    public function actionFormInscripciones()
    {

        // se crea la instancia y se prepara para guardar los datos
        $inscripciones = new Inscripciones();
        $inscripciones->nombre = 'Esteban';
        $inscripciones->correo = 'esteban@ejemplo.com';
        $inscripciones->save();
        

        //$query = Inscripciones::find();
        //$query = Inscripciones::save();

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