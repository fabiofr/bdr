<!-- File: /app/View/Atividades/index.ctp -->

<h1>Sistema gerenciador de tarefas </h1>
<p><?php echo $this->Html->link('Adicionar Tarefa', array('action' => 'add')); ?></p>

<p>
<?php echo $this->Html->link('Gerar JSON com todas as tarefas cadastradas', array('controller' => 'client', 'action' => 'request_index')); ?> </p>

<table>
    <tr>
        <th>Id</th>
        <th>Titulo</th>
		<th>Descrição</th>
        <th>Prioridade</th>
        <th>Opções</th>        
    </tr>

<!-- Here's where we loop through our $atividades array, printing out atividade info -->

    <?php foreach ($atividades as $atividade): ?>
    <tr>
        <td><?php echo $atividade['Atividade']['id']; ?></td>
        
		<td><?php echo $atividade['Atividade']['titulo']; ?></td>
		<td><?php echo $atividade['Atividade']['descricao']; ?></td>
		<td><?php echo $atividade['Atividade']['prioridade']; ?></td>
        <td>
            <?php
                echo $this->Form->postLink(
                    'Deletar',
                    array('action' => 'delete', $atividade['Atividade']['id']),
                    array('confirm' => 'Você tem certeza que deseja deletar esta tarefa?')
                );
            ?>
            <?php
                echo $this->Html->link(
                    'Editar', array('action' => 'edit', $atividade['Atividade']['id'])
                );
            ?>
        </td>
        
    </tr>
    <?php  endforeach; ?>

</table>