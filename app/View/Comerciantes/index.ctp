<?php
$this->extend('/Common/index');
$this->assign('title', 'Comerciantes');

$searchFields = $this->Form->input('Comerciante.nome', array(
    'required' => false,
    'label' => array(
        'text' => 'Nome',
        'class' => 'sr-only',
    ),
    'class' => 'form-control mb-2 mr-sm-2',
    'div' => false,
    'placeholder' => 'Nome...'
));
$this->assign('searchFields', $searchFields);

$nomeSort = $this->Paginator->sort('Comerciante.nome', 'Vendedor');
$titulos = array($nomeSort, 'Email', '');
$tableHeaders = $this->Html->tableHeaders($titulos);
$this->assign('tableHeaders', $tableHeaders);

$detalhe = array();
foreach ($comerciantes as $vendedor) {
    $atualizaConteudo = array('update' => '#content');
    $vendaId = $vendedor['Comerciante']['id'];
    $editLink = $this->Js->link('Alterar', '/comerciantes/edit/' . $vendaId, $atualizaConteudo);
    $deleteLink = $this->Js->link('Excluir', '/comerciantes/delete/' . $vendaId, $atualizaConteudo);
    $detalhe[] = array(
        $vendedor['Comerciante']['nome'],
        $vendedor['Comerciante']['email'],
        $editLink . '  ' . $deleteLink
    );
}

$tableCells = $this->Html->tableCells($detalhe);
$this->assign('tableCells', $tableCells);
