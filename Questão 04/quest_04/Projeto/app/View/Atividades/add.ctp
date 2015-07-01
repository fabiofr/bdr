<!-- File: /app/View/Phones/add.ctp -->

<h1>adicionar Tarefa</h1>
<?php
echo $this->Form->create('Atividade');
echo $this->Form->input('titulo');
echo $this->Form->input('descricao', array('rows' => '3'));
echo $this->Form->input('prioridade');
echo $this->Form->end('Salvar tarefa');
?>