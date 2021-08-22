<?php
class ComercianteTest extends CakeTestCase {

    public $fixtures = array('app.comerciante');
    public $Comerciante = null;

    public function setUp() {
        $this->Comerciante = ClassRegistry::init('Comerciante');
    }

    public function testExisteModel() {
        $this->assertTrue(is_a($this->Comerciante, 'Comerciante'));
    }

    public function testEmpty() {
        $data = array('nome' => null);
        $saved = $this->Comerciante->save($data);
        $this->assertFalse($saved);

        $data = array('nome' => '');
        $saved = $this->Comerciante->save($data);
        $this->assertFalse($saved);

        $data = array('nome' => '   ');
        $saved = $this->Comerciante->save($data);
        $this->assertFalse($saved);
    }
    
}
?>