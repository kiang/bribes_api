<?php

App::uses('AppController', 'Controller');

class IssuesController extends AppController {

    public $name = 'Issues';
    public $paginate = array();
    public $helpers = array();

    public function beforeFilter() {
        parent::beforeFilter();
        if (isset($this->Auth)) {
            $this->Auth->allow('task', 'save', 't');
        }
    }

    function task() {
        $currentRound = $this->Issue->find('first', array(
            'fields' => array('round'),
            'order' => array(
                'Issue.round' => 'ASC',
            ),
        ));
        header('Content-Type: application/json; charset=utf-8');
        header('Access-Control-Allow-Origin: *');
        echo json_encode($this->Issue->find('first', array(
                    'conditions' => array(
                        'Issue.round' => $currentRound['Issue']['round'],
                    ),
                    'fields' => array('id', 'fid'),
                    'order' => array(
                        'Issue.date' => 'DESC',
                    ),
                    'limit' => 10,
                    'contain' => array(
                        'Point' => array(
                            'fields' => array(
                                'Issue_id', 'city', 'town', 'cunli', 'year', 'title', 'candidate',
                                'money', 'modified',
                            ),
                            'conditions' => array(
                                'Point.round' => $currentRound['Issue']['round'],
                            ),
                        ),
                    ),
        )), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_NUMERIC_CHECK);
        exit();
    }

    function save() {
        $json = file_get_contents('php://input');
        $saveCount = 0;
        if (!empty($json)) {
            $points = json_decode($json, true);
            if (isset($points[0]['Issue_id'])) {
                $issue = $this->Issue->read(null, $points[0]['Issue_id']);
            }
            if (!empty($issue)) {
                $sessID = $this->Session->id();
                $round = $issue['Issue']['round'] + 1;
                foreach ($points AS $point) {
                    $point['round'] = $round;
                    $point['sess_id'] = $sessID;
                    $this->Issue->Point->create();
                    if($this->Issue->Point->save($point)) {
                        ++$saveCount;
                    }
                }
            }
            if($saveCount > 0) {
                $this->Issue->id = $issue['Issue']['id'];
                $this->Issue->saveField('round', $round);
            }
        }
        header('Content-Type: application/json; charset=utf-8');
        header('Access-Control-Allow-Origin: *');
        echo json_encode(array('saveCount' => $saveCount));
        exit();
    }

    function index() {
        $this->paginate['Issue'] = array(
            'limit' => 20,
        );
        $this->set('items', $this->paginate($this->Issue));
    }

    function view($id = null) {
        if (!$id || !$this->data = $this->Issue->read(null, $id)) {
            $this->Session->setFlash(__('Please do following links in the page', true));
            $this->redirect(array('action' => 'index'));
        }
    }

    function admin_index() {
        $this->paginate['Issue'] = array(
            'limit' => 20,
        );
        $this->set('items', $this->paginate($this->Issue));
    }

    function admin_view($id = null) {
        if (!$id || !$this->data = $this->Issue->read(null, $id)) {
            $this->Session->setFlash(__('Please do following links in the page', true));
            $this->redirect(array('action' => 'index'));
        }
    }

    function admin_add() {
        if (!empty($this->data)) {
            $this->Issue->create();
            if ($this->Issue->save($this->data)) {
                $this->Session->setFlash(__('The data has been saved', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Something was wrong during saving, please try again', true));
            }
        }
    }

    function admin_edit($id = null) {
        if (!$id && empty($this->data)) {
            $this->Session->setFlash(__('Please do following links in the page', true));
            $this->redirect($this->referer());
        }
        if (!empty($this->data)) {
            if ($this->Issue->save($this->data)) {
                $this->Session->setFlash(__('The data has been saved', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Something was wrong during saving, please try again', true));
            }
        }
        $this->set('id', $id);
        $this->data = $this->Issue->read(null, $id);
    }

    function admin_delete($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Please do following links in the page', true));
        } else if ($this->Issue->delete($id)) {
            $this->Session->setFlash(__('The data has been deleted', true));
        }
        $this->redirect(array('action' => 'index'));
    }

}
