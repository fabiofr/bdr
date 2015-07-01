<?php

class AtividadesController extends AppController {
    public $helpers = array('Html', 'Form');
	//public $components = array('RequestHandler');
	
	public $paginate = array(
        'fields' => array('id', 'titulo', 'descricao', 'prioridade'),        
        'order' => array('prioridade' => 'asc')
    );

    public function index() {
    	 
         //$this->set('atividades', $this->Atividade->find('all'));
         $this->set('atividades', $this->paginate("Atividade"));
    }
	
	public function add() {
        if ($this->request->is('post')) {
            $this->Atividade->create();
            if ($this->Atividade->save($this->request->data)) {
                $this->Session->setFlash(__('Tarefa cadastrada com sucesso.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('Não foi possisvel cadastrar sua tarefa.'));
        }
    }

    public function view($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Tarefa invalida'));
        }

        $atividade = $this->Atividade->findById($id);
        if (!$atividade) {
            throw new NotFoundException(__('Tarefa invalida'));
        }
        $this->set('atividade', $atividade);
    }
	
	public function edit($id = null) {
		if (!$id) {
			throw new NotFoundException(__('Tarefa invalida'));
		}

		$atividade = $this->Atividade->findById($id);
		if (!$atividade) {
			throw new NotFoundException(__('Tarefa invalida'));
		}

		if ($this->request->is(array('atividade', 'put'))) {
			$this->Atividade->id = $id;
			if ($this->Atividade->save($this->request->data)) {
				$this->Session->setFlash(__('Sua tarefa foi atualizada.'));
				return $this->redirect(array('action' => 'index'));
			}
			$this->Session->setFlash(__('Não foi possivel atualizar a tarefa.'));
		}

		if (!$this->request->data) {
			$this->request->data = $atividade;
		}
	}
	
	public function delete($id) {
		if ($this->request->is('get')) {
			throw new MethodNotAllowedException();
		}

		if ($this->Atividade->delete($id)) {
			$this->Session->setFlash(
				__('A tarefa com id: %s foi deletada.', h($id))
			);
			return $this->redirect(array('action' => 'index'));
		}
	}
}