<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "inscripciones".
 *
 * @property int $idInscripcion
 * @property int $idBusqueda
 * @property string|null $fecha
 * @property string|null $apellido
 * @property string|null $nombre
 *
 * @property Busquedas $idBusqueda0
 */
class Inscripciones extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'inscripciones';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idBusqueda'], 'required'],
            [['idBusqueda'], 'integer'],
            [['fecha'], 'safe'],
            [['apellido', 'nombre'], 'string', 'max' => 150],
            [['idBusqueda'], 'exist', 'skipOnError' => true, 'targetClass' => Busquedas::className(), 'targetAttribute' => ['idBusqueda' => 'idBusqueda']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idInscripcion' => 'Id Inscripcion',
            'idBusqueda' => 'Id Busqueda',
            'fecha' => 'Fecha',
            'apellido' => 'Apellido',
            'nombre' => 'Nombre',
        ];
    }

    /**
     * Gets query for [[IdBusqueda0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdBusqueda0()
    {
        return $this->hasOne(Busquedas::className(), ['idBusqueda' => 'idBusqueda']);
    }
}
