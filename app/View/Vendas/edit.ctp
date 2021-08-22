<?php
$this->extend('/Common/form');
$this->assign('title', 'Alterar Venda');

$formFields = $this->element('formCreate');
$formFields .=  $this->Html->tag('hr');
$formFields .= $this->Form->hidden('Venda.id');
$formFields .= $this->Html->div('form-row',
    $this->Form->input('Venda.Comerciante_id', array(
        'type' => 'select',
        'label' => array('text' => 'Selecione o Vendedor'),
        'div' => array('class' => 'form-group col-md-4'),
        'options' => $findComerciantes
    )) .
    $this->Form->input('Venda.valor_da_venda', array(
        'data-mask' => '#.##0,00',
        'maxlength'=> '10',
        'data-mask-reverse'=> true,
        'label' => array('text' => 'Valor da Venda'),
        'placeholder' => array('Ex: 1500,00'),
        'div' => array(
            'class' => 'form-group col-md-4 offset-2',
        ),
    )) .  
    $this->Form->input('Venda.comissao', array(
        'label' => array('text' => 'Comissão'),
        'div' => array(
            'class' => 'form-group col-md-4',
        ),
    )) . 
    $this->Form->input('Venda.data_da_venda', array(
        'data-mask'=> '00/00/0000',
        'placeholder' => array('Ex: 10/05/2020'),
        'label' => array('text' => 'Data da Venda'),
        'div' => array(
            'class' => 'form-group col-md-4 offset-2',
        ),
    ))
);

$this->assign('formFields', $formFields);
