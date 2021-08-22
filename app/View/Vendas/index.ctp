<?php
$this->extend('/Common/index');
$this->assign('title', 'Vendas');

$searchFields = $this->Form->input('Venda.nome', array(
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

$nomeSort = $this->Paginator->sort('Vendedor.nome', 'Vendedor');
$titulos = array($nomeSort, 'Comissão', 'Valor Da Venda', 'Data', 'Ações');
$tableHeaders = $this->Html->tableHeaders($titulos);
$this->assign('tableHeaders', $tableHeaders);

$detalhe = array();
foreach ($vendas as $venda) {
    $dataDaVenda = $venda['Venda']['data_da_venda'];
    $year = substr($dataDaVenda, 0, 4);
    $month = substr($dataDaVenda, 5, 2);
    $day = substr($dataDaVenda, 8, 2);
    $dataDaVenda  =  $day . '/' . $month . '/' . $year;
    $atualizaConteudo = array('update' => '#content');
    $vendaId = $venda['Venda']['id'];
    $editLink = $this->Js->link('Alterar', '/vendas/edit/' . $vendaId, $atualizaConteudo);
    $deleteLink = $this->Js->link('Excluir', '/vendas/delete/' . $vendaId, $atualizaConteudo);
    $detalhe[] = array(
        $venda['Comerciante']['nome'],
        $venda['Venda']['comissao'],
        $venda['Venda']['valor_da_venda'],
        $dataDaVenda, 
        $editLink . '  ' . $deleteLink
    );
}

$tableCells = $this->Html->tableCells($detalhe);
$this->assign('tableCells', $tableCells);
