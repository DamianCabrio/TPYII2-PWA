<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rubros".
 *
 * @property int $idRubro
 * @property string|null $descripcion
 *
 * @property Busquedas[] $busquedas
 */
class Rubros extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'rubros';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['descripcion'], 'string', 'max' => 30],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idRubro' => 'Id Rubro',
            'descripcion' => 'Descripcion',
        ];
    }

    /**
     * Gets query for [[Busquedas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBusquedas()
    {
        return $this->hasMany(Busquedas::className(), ['idRubro' => 'idRubro']);
    }
}
