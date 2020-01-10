<?php

App::uses('AppController', 'Controller');

class IssuesController extends AppController {

    public $name = 'Issues';
    public $paginate = array();
    public $helpers = array();

    public function beforeFilter() {
        parent::beforeFilter();
        if (isset($this->Auth)) {
            $this->Auth->allow('task');
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
        echo json_encode($this->Issue->find('all', array(
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
                    'conditions' => array(
                        'Point.round' => $currentRound['Issue']['round'],
                    ),
                ),
            ),
        )));
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
