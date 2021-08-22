<?php
class VendaFixture extends CakeTestFixture {
    
    public $name = 'Venda';
    public $import = array('model' => 'Venda', 'records' => false);

    public function init() {
        $this->records = array(
            array(
                'id' => 1,
                'comerciante_id' => 1,
                'comissao' => '33.00',
                'data_da_venda' => '2020-05-10',
            )
        );
        parent::init();
    }

}
?>