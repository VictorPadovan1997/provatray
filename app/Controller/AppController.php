<?php
App::uses('Controller', 'Controller');

class AppController extends Controller {

    public $layout = 'bootstrap';
    public $helpers = array('Js' => array('Jquery')); 

    public function index() {
        $this->setPaginateConditions();
        try {
            $this->set($this->getControllerName(), $this->paginate());        
        } catch (NotFoundException $e) {
            $this->redirect('/' . $this->getControllerName());
        }        
    }

    public function add() {
        if (!empty($this->request->data)) {
            $this->{$this->getModelName()}->create();
            if ($this->{$this->getModelName()}->save($this->request->data)) {
                $this->Flash->bootstrap('Gravado com sucesso!', array('key' => 'success'));
                $this->redirect('/' . $this->getControllerName());
            }
        }
    }

    public function edit($id = null) {
        if (!empty($this->request->data)) {
            if ($this->{$this->getModelName()}->save($this->request->data)) {
                $this->Flash->bootstrap('Alterado com sucesso!', array('key' => 'success'));
                $this->redirect('/' . $this->getControllerName());
            }
        } else {
            $this->request->data = $this->getEditData($id);
        }
    }

    public function delete($id) {
        $this->{$this->getModelName()}->delete($id);
        $this->Flash->bootstrap('Excluído com sucesso!', array('key' => 'warning'));
        $this->redirect('/' . $this->getControllerName());
    }

    public function getControllerName() {
        return $this->request->params['controller'];
    }

    public function getModelName() {
        return $this->modelClass;
    }

    public function buscaComerciantes() {
        $fields = array(
            'Comerciante.id',
            'Comerciante.nome',
        );
        $findComerciantes = $this->Comerciante->find('list', compact('fields'));
        $this->set('findComerciantes', $findComerciantes);
    }

}