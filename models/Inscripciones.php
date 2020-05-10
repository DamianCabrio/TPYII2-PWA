<?php

namespace app\models;

use yii\db\ActiveRecord;

class Inscripciones extends ActiveRecord{

    /**
     * @return array the validation rules.
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