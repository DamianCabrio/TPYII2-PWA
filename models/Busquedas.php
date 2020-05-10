<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "busquedas".
 *
 * @property int $idBusqueda
 * @property int $idRubro
 * @property string $empresa
 * @property string $titulo
 * @property string|null $descripcion
 *
 * @property Rubros $idRubro0
 * @property Inscripciones[] $inscripciones
 */
class Busquedas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'busquedas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idRubro', 'empresa', 'titulo'], 'required'],
            [['idRubro'], 'integer'],
            [['empresa', 'titulo', 'descripcion'], 'string', 'max' => 150],
            [['idRubro'], 'exist', 'skipOnError' => true, 'targetClass' => Rubros::className(), 'targetAttribute' => ['idRubro' => 'idRubro']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idBusqueda' => 'Id Busqueda',
            'idRubro' => 'Id Rubro',
            'empresa' => 'Empresa',
            'titulo' => 'Titulo',
            'descripcion' => 'Descripcion',
        ];
    }

    /**
     * Gets query for [[IdRubro0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdRubro0()
    {
        return $this->hasOne(Rubros::className(), ['idRubro' => 'idRubro']);
    }

    /**
     * Gets query for [[Inscripciones]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getInscripciones()
    {
        return $this->hasMany(Inscripciones::className(), ['idBusqueda' => 'idBusqueda']);
    }
}
