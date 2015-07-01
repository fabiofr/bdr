<?php

class RestAtividadesController extends AppController {
	public $uses = array('Atividade');
    public $helpers = array('Html', 'Form');
	public $components = array('RequestHandler');


	public function index() {
		$atividades = $this->Atividade->find('all');		
        $this->set(array(
            'atividades' => $atividades,
            '_serialize' => array('atividades')
        ));
    }

	public function add() {
		$this->Atividade->create();
		if ($this->Atividade->save($this->request->data)) {
			 $message = 'Created';
		} else {
			$message = 'Error';
		}
		$this->set(array(
			'message' => $message,
			'_serialize' => array('message')
		));
    }
	
	public function view($id) {
        $atividade = $this->Atividade->findById($id);
        $this->set(array(
            'atividade' => $atividade,
            '_serialize' => array('atividade')
        ));
    }

	
	public function edit($id) {
        $this->Atividade->id = $id;
        if ($this->Atividade->save($this->request->data)) {
            $message = 'Salvo';
        } else {
            $message = 'Erro';
        }
        $this->set(array(
            'message' => $message,
            '_serialize' => array('message')
        ));
    }
	
	public function delete($id) {
        if ($this->Atividade->delete($id)) {
            $message = 'Deletado';
        } else {
            $message = 'Erro';
        }
        $this->set(array(
            'message' => $message,
            '_serialize' => array('message')
        ));
    }
}