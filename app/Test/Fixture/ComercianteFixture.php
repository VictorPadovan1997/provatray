<?php
class ComercianteFixture extends CakeTestFixture {
    
    public $name = 'Comerciante';
    public $import = array('model' => 'Comerciante', 'records' => false);

    public function init() {
        $this->records = array(
            array(
                'id' => 1,
                'nome' => 'Victor',
                'email' => 'v@gmail.com',
            )
        );
        parent::init();
    }

}
?>