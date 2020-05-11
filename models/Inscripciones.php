<?php

namespace app\models;

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

            // name, email, subject and body are required. Una linea por cada regla
            [['nombre', 'apellido'], 'required', 'message' => 'Este campo es obligatorio.'],

            // Solo texto
            [['nombre', 'apellido'], 'match',
                'pattern' => '/^[a-zA-Z\s]+$/',
                'message' => 'Sólo se permiten letras.'],
        ];
    }

}
