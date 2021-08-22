<?php
App::uses('AppController', 'Controller');

class ComerciantesController extends AppController {

    public $paginate = array(
        'fields' => array(
            'Comerciante.id',
            'Comerciante.nome',
            'Comerciante.email',
        ),
        'conditions' => array(),
        'limit' => 10,        
        'order' => array('Comerciante.nome' => 'asc')    
    );

    public function setPaginateConditions() {
        $nome = '';
        if ($this->request->is('post')) {
            $nome = $this->request->data['Comerciante']['nome'];
            $this->Session->write('Comerciante.nome', $nome);
        } else {
            $nome = $this->Session->read('Comerciante.nome');
            $this->request->data('Comerciante.nome', $nome);
        }
        if (!empty($nome)) {
            $this->paginate['conditions']['Comerciante.nome LIKE'] = '%' . trim($nome) . '%';
        }
    }

    public function getEditData($id) {
        $fields = array(
            'Comerciante.id',
            'Comerciante.nome',
            'Comerciante.email',
        );
        $conditions = array('Comerciante.id' => $id);
        $findComerciantes = $this->Comerciante->find('first', compact('fields', 'conditions'));

        return $findComerciantes;
    }

}
