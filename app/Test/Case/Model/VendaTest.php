<?php
class VendaTest extends CakeTestCase {

    public $fixtures = array('app.venda');
    public $Venda = null;

    public function setUp() {
        $this->Venda = ClassRegistry::init('Venda');
    }

    public function testExisteModel() {
        $this->assertTrue(is_a($this->Venda, 'Venda'));
    }

    public function testEmptyComissao() {
        $data = array('comissao' => null);
        $saved = $this->Venda->save($data);
        $this->assertFalse($saved);

        $data = array('comissao' => '');
        $saved = $this->Venda->save($data);
        $this->assertFalse($saved);

        $data = array('comissao' => '   ');
        $saved = $this->Venda->save($data);
        $this->assertFalse($saved);
    }

    public function testEmptyValor() {
        $data = array('valor_da_venda' => null);
        $saved = $this->Venda->save($data);
        $this->assertFalse($saved);

        $data = array('valor_da_venda' => '');
        $saved = $this->Venda->save($data);
        $this->assertFalse($saved);
    }
    
}
?>