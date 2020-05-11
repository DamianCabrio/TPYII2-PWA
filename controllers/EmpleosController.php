<?php

namespace app\controllers;

use app\models\Busquedas;
use app\models\Rubros;
use app\models\Inscripciones;
use Yii;
use yii\web\Controller;


class EmpleosController extends Controller
{

    public function actionIndex()
    {
        return $this->render('index');
    }


    public function actionBusquedasPorRubro()
    {
        //Obtengo los parámetros de la petición usando request, (debe estar el use Yii)
        $request = Yii::$app->request;
        //uso get o post segun como se hayan mandado los parametros
        //equivalente a: $id = isset($_GET['id']) ? $_GET['id'] : 0
        $id = $request->get('id', 0);

        //controlo si recibio null o tiene un id
        if ($id == 0) {
            $error = true;
            $query = [];
            $rubro = null;
        } else {
            $rubro = Rubros::find()
                ->where(['idRubro' => $id])
                ->all();

            //Controlo si no encontro un rubro con ese id?
            if (!empty($rubro)) {
                $query = Busquedas::find()
                    ->where(['idRubro' => $id])
                    ->orderBy('idBusqueda')
                    ->all();
                $error = false;

            } else {

                $error = true;
                $query = [];
                $rubro = null;
            }
        }

        return $this->render('busquedas-por-rubro', [
            'busquedas' => $query,
            'rubro' => $rubro,
            'error' => $error, //error es true o false si no encuentra rubro

        ]);
    }

    public function actionFormInscripciones()
    {
        //Obtengo el id de busqueda del URL
        $request = Yii::$app->request;
        $idBusqueda = $request->get('idBusqueda', -1);

        //Comprueba que la busqueda obtenida exista en la base de datos
        $queryBusquedaTrabajoQuery = Busquedas::find();
        $busqueda = $queryBusquedaTrabajoQuery->where(["idBusqueda" => $idBusqueda])->all();

        if (count($busqueda) == 0 || $idBusqueda == -1 || !isset($idBusqueda)) {
            return $this->render('form-inscripciones', ['busquedaNoExiste' => true]);
        }else{
            $inscripciones = new Inscripciones();

            //Si el formulario ya fue enviado se ejecuta este if y se guardan los datos en la base de datos
            if ($inscripciones->load(Yii::$app->request->post()) && $inscripciones->validate()) {
                $inscripciones->fecha = date('Y-m-d');
                $inscripciones->idBusqueda = $idBusqueda;
                $inscripciones->save();

                return $this->render('form-inscripciones', ['datosGuardados' => true, 'model' => $inscripciones, 'busqueda' => $busqueda]);
            } else {
                return $this->render('form-inscripciones', ['model' => $inscripciones, 'busqueda' => $busqueda]); // nombre de la variable que va a llevar en el view
            }
        }
    }

    public function actionVerRubros()
    {
        $query = Rubros::find();
        $rubros = $query->orderBy('descripcion')->all();

        return $this->render('ver-rubros', ['rubros' => $rubros]);
    }

    public function actionVerInscripcionesTrabajo()
    {
        $request = Yii::$app->request;
        $idBusqueda = $request->get('id');

        $queryBusquedaTrabajoQuery = Busquedas::find();
        $busqueda = $queryBusquedaTrabajoQuery->where(["idBusqueda" => $idBusqueda])->all();

        $queryInscriptosTrabajo = Inscripciones::find();
        $inscriptos = $queryInscriptosTrabajo->where(["idBusqueda" => $idBusqueda])->all();

        return $this->render('ver-inscripciones-trabajo', ['busqueda' => $busqueda, "inscriptos" => $inscriptos]);
    }
}