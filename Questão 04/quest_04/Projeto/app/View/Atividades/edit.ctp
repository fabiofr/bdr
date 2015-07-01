<!-- File: /app/View/Phones/edit.ctp -->

<h1>Edit Phone</h1>
<?php
echo $this->Form->create('Atividade');
echo $this->Form->input('titulo');
echo $this->Form->input('prioridade');
echo $this->Form->input('descricao', array('rows' => '3'));
echo $this->Form->input('id', array('type' => 'hidden'));
echo $this->Form->end('Salvar tarefa');
?>