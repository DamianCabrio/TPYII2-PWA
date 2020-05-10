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
            // name, email, subject and body are required
            [['nombre', 'apellido'], 'required'],
        ];
    }
    
}