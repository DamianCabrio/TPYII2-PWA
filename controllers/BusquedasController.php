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
       
        //Obtengo los parámetros de la petición usando request, (debe estar el use Yii)
        $request = Yii::$app->request;  
        //uso get o post segun como se hayan mandado los parametros
        //equivalente a: $id = isset($_GET['id']) ? $_GET['id'] : 0
        $id = $request->get('id',0);

        //controlo si recibio null o tiene un id
        if ($id == 0) {
            $error = true;
            $query = [];
            $rubro = null;
        }else{
            $rubro = Rubros::find()
                ->where(['idRubro' => $id ])
                ->all();

            //Controlo si no encontro un rubro con ese id?
             if(!empty($rubro)){

                //var_dump($model);// Imprime los datos almacenados en $model
                echo "No hay datos";
                $query = Busquedas::find()
                    ->where(['idRubro' => $id ])
                    ->orderBy('idBusqueda')
                    ->all();
                $error = false;

            }else{

                 $error = true;
                $query = [];
                $rubro = null;
            }
        }
        
        return $this->render('index', [
            'busquedas' => $query,
            'rubro' => $rubro,
            'error' => $error, //error es true o false si no encuentra rubro
            
        ]);
    }
}