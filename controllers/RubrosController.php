<?php

namespace app\controllers;

use yii\web\Controller;
use app\models\Rubros;

class RubrosController extends Controller
{
    public function listarRubros()
    {
        

        $rubros = Rubros::find()->orderBy('descripcion')->all();

        return $this->render('index', [
            'rubros' => $rubros,
        ]);
    }
}