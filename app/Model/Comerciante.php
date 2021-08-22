<?php
App::uses('AppModel', 'Model');

class Comerciante extends AppModel {

    public $validate = array(
        'nome' => array(
            'notBlank' => array(
                'rule' => 'notBlank',
                'message' => 'Informe o nome',
            ),
        ),
        'email' => array(
            'notBlank' => array(
                'rule' => 'notBlank',
                'message' => 'Informe o email',
            ),
        )
    );
}

?> 