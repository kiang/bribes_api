<?php

App::uses('AppModel', 'Model');

class Point extends AppModel {

    var $name = 'Point';
    var $validate = array(
        'year' => array(
            'numberFormat' => array(
                'rule' => 'numeric',
                'message' => 'Wrong format',
                'allowEmpty' => true,
            ),
        ),
        'money' => array(
            'numberFormat' => array(
                'rule' => 'numeric',
                'message' => 'Wrong format',
                'allowEmpty' => true,
            ),
        ),
    );
    var $actsAs = array(
    );
    var $belongsTo = array(
        'Issue' => array(
            'foreignKey' => 'Issue_id',
            'className' => 'Issue',
        ),
    );

    function afterSave($created, $options = array()) {
        
    }

}
