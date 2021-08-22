<?php
$this->extend('/Common/form');
$this->assign('title', 'Novo Vendedor');

$formFields = $this->element('formCreate');
$formFields .=  $this->Html->tag('hr');
$formFields .= $this->Form->hidden('Comerciante.id');
$formFields .= $this->Html->div('form-row',
    $this->Form->input('Comerciante.nome', array(
        'label' => array('text' => 'Nome'),
        'placeholder' => array('Digite o nome...'),
        'div' => array(
            'class' => 'form-group col-md-4 ',
        ),
    )) .  
    $this->Form->input('Comerciante.email', array(
        'placeholder' => array('Digite o email...'),
        'label' => array('text' => 'Email'),
        'div' => array(
            'class' => 'form-group col-md-4 offset-2',
        ),
    ))
);

$this->assign('formFields', $formFields);

