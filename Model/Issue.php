<?php

App::uses('AppModel', 'Model');

class Issue extends AppModel {

    var $name = 'Issue';
    var $validate = array(
        'round' => array(
            'numberFormat' => array(
                'rule' => 'numeric',
                'message' => 'Wrong format',
                'allowEmpty' => true,
            ),
        ),
    );
    var $actsAs = array(
    );
    var $hasMany = array(
        'Point' => array(
            'foreignKey' => 'Issue_id',
            'dependent' => false,
            'className' => 'Point',
        ),
    );

    function afterSave($created, $options = array()) {
        
    }

}
