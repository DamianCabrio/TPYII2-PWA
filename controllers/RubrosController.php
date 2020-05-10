<?php

namespace app\controllers;

use Yii;
use app\models\Rubros;
use app\models\Inscripciones;
use app\models\Busquedas;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RubrosController implements the CRUD actions for Rubros model.
 */
class RubrosController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function actionVerRubros(){
        $query = Rubros::find();
        $rubros = $query->orderBy('descripcion')->all();

        return $this->render('ver-rubros', ['rubros' => $rubros]);
    }

    public function actionVerInscripcionesTrabajo(){
        $request = Yii::$app->request;
        $idBusqueda = $request->get('id');

        $queryBusquedaTrabajoQuery = Busquedas::find();
        $busqueda = $queryBusquedaTrabajoQuery->where(["idBusqueda" => $idBusqueda])->all();

        $queryInscriptosTrabajo = Inscripciones::find();
        $inscriptos = $queryInscriptosTrabajo->where(["idBusqueda" => $idBusqueda])->all();

        return $this->render('ver-inscripciones-trabajo', ['busqueda' => $busqueda, "inscriptos" => $inscriptos]);
    }

    /**
     * Finds the Rubros model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Rubros the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Rubros::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
