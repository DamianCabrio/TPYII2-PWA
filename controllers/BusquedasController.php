<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\data\Pagination;
use app\models\Busquedas;
use app\models\Rubros;


class BusquedasController extends Controller
{
    public function actionIndex()
    {
       

        $request = Yii::$app->request; //como controlar q nos sea nulo 
        $id = $request->get('id');

        $rubro = Rubros::find()
            ->where(['idRubro' => $id ])
            ->all();

        //si no me trajo nada ?

        $query = Busquedas::find()
            ->where(['idRubro' => $id ])
            ->orderBy('idBusqueda')
            ->all();

        /*$pagination = new Pagination([
            'defaultPageSize' => 6,
            'totalCount' => $query->count(),
        ]);*/

        /*$busquedas = $query->orderBy('idBusqueda')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();*/

        return $this->render('index', [
            'busquedas' => $query,
            'rubro' => $rubro,
            //'error' => $error, //hacer true o false si no encuentra rubro
            //'pagination' => $pagination,
        ]);
    }
}