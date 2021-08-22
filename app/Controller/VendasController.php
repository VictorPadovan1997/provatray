<?php
App::uses('AppController', 'Controller');

class VendasController extends AppController {
    
    public $uses = array('Venda', 'Comerciante');
    public $paginate = array(
        'fields' => array(
            'Venda.id',
            'Venda.comissao',
            'Venda.valor_da_venda',
            'Comerciante.nome',
            'venda.data_da_venda'
        ),
        'conditions' => array(),
        'limit' => 10,        
        'order' => array(
            'Venda.nome' => 'asc',
        )    
    );

    public function index() {
        parent::index();
        $this->enviaEmail();
    }

    public function setPaginateConditions() {
        $nome = '';
        if ($this->request->is('post')) {
            $nome = $this->request->data['Venda']['nome'];
            $this->Session->write('Venda.nome', $nome);
        } else {
            $nome = $this->Session->read('Venda.nome');
            $this->request->data('Venda.nome', $nome);
        }
        if (!empty($nome)) {
            $this->paginate['conditions']['Venda.nome LIKE'] = '%' . trim($nome) . '%';
        }
    }

    public function add() {
        parent::add();
        $this->buscaComerciantes();
    }

    public function getEditData($id) {
        $fields = array(
            'Venda.id',
            'Venda.comissao',
            'Venda.valor_da_venda',
            'Comerciante.nome',
            'venda.data_da_venda',
        );
        $this->buscaComerciantes();
        $conditions = array('Venda.id' => $id);
        $contain = array('Vendedor');
        $findVenda = $this->Venda->find('first', compact('fields', 'conditions', 'contain'));
        if (!empty($findVenda['Venda']['data_da_venda'])) {
            $findVenda['Venda']['data_da_venda'] = date('d/m/Y', strtotime($findVenda['Venda']['data_da_venda']));
        }

        return $findVenda;
    }

    public function enviaEmail($id = null) {
        $horaAtual = date('H:i');
        if ($horaAtual == '18:00') {
            $dataAtual = date('Y-m-d');
            $conditions = array(
                'Venda.data_da_venda' => $dataAtual,
            );
            $findDaVenda = $this->Venda->find('all', compact('conditions'));
            if (!empty($findDaVenda)) {
                $emailDoCliente = 'victorpadovan1997@gmail.com';
                $somaTotalDeVendas = $this->Venda->somaQuantidadeTotalVenda();
                $resultadoDaSoma = $somaTotalDeVendas['Venda']['somaTotal'];
                $this->Venda->sendEmail($resultadoDaSoma, $findDaVenda, $emailDoCliente);
            }
        }
    }

}
