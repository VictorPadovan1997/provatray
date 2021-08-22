<?php
App::uses('AppModel', 'Model');

class Venda extends AppModel {

    public $belongsTo = array(
        'Comerciante'
    );

    public $validate = array(
        'comissao' => array(
            'notBlank' => array(
                'rule' => 'notBlank',
                'message' => 'Informe a comissao',
            ),
        ),
        'valor_da_venda' => array(
            'notBlank' => array(
                'rule' => 'notBlank',
                'message' => 'Informe o valor da venda.',
            ),
        ),
        'data_da_venda' => array(
            'notBlank' => array(
                'rule' => 'notBlank',
                'message' => 'Informe o valor da venda.',
            ),
        )
    );

    public function beforeSave($options = array()) {
        $continue = true;
        $dataDaVenda = $this->data['Venda']['data_da_venda'];
        $valorDaVenda = $this->data['Venda']['valor_da_venda'];
        if (!empty($this->data['Venda']['data_da_venda'])) {
            $this->data['Venda']['data_da_venda'] = $this->sqlDate($this->data['Venda']['data_da_venda']);
        }
        
        if (!empty($valorDaVenda)) {
            $tamanho = strlen($valorDaVenda);
            $this->data['Venda']['valor_da_venda'] = $this->formatacaoMascaraDinheiroDecimal($tamanho, $valorDaVenda);
        }
    
        return $continue;
    }

    public function somaQuantidadeTotalVenda() {
        $this->virtualFields = array(
            'somaTotal' => "SUM(Venda.valor_da_venda)"
        );
        $fields = array(
            'Venda.somaTotal',
        );
        $somaTotal = $this->find('first', compact('fields'));
        $somaTotal['Venda']['somaTotal'] = number_format($somaTotal['Venda']['somaTotal'],2,",",".");
        
        return $somaTotal;
    }

    public function sendEmail($somaTotal, $findDaVenda, $emailDoCliente) {
        App::uses('CakeEmail', 'Network/Email');
        $Email = new CakeEmail();
        $Email->config('gmail'); 
        $Email->emailFormat('html');
        $Email->to($emailDoCliente);
        $Email->from(array('victorpadovan1997@gmail.com' => 'ProvaTray'));
        $Email->subject('Relatorio de Vendas.');
        $Email->template('default');
        $Email->viewVars(
            array(
                'findDaVenda'=> $findDaVenda,
                'somaTotal' => $somaTotal,
            )
        );

        $Email->send();
    }

}

?>