<?php
// src/Controller/LfgController.php

namespace App\Controller;

use App\Controller\AppController;

class LfgController extends AppController
{

    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('Flash'); // Include the FlashComponent
    }

    public function index()
    {
        $this->set('lfg_all', $this->Lfg->find('all'));
		$this->set('webroot', '');
		
		$lfg = $this->Lfg->newEntity();
        if ($this->request->is('post')) {
            $lfg = $this->Lfg->patchEntity($lfg, $this->request->data);
            if ($this->Lfg->save($lfg)) {
                $this->Flash->success(__('Your lfg has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to add your lfg.'));
        }
        $this->set('lfg', $lfg);

        // Just added the categories list to be able to choose
        // one category for an lfg
        $categories = $this->Lfg->Categories->find('treeList');
        $this->set(compact('categories'));
    }

    public function view($id)
    {
        $lfg = $this->Lfg->get($id);
        $this->set(compact('lfg'));
    }

    public function add()
    {
        	
		$this->autoRender = false;  

	    if($this->RequestHandler->isAjax()) {
	
		    echo "<h2>Hello</h2>";
		    print_r($this->data);
		    $this->layout = 'ajax';
		
		    if(!empty($this->data)) {	
		    	$fields = array('phone' => 8, 'modified' => false);
		        $this->User->id = 6;
		        $this->User->save($fields, false, array('phone'));	
		    }
		}	
			
			
        /*$lfg = $this->Lfg->newEntity();
        if ($this->request->is('post')) {
            $lfg = $this->Lfg->patchEntity($lfg, $this->request->data);
            if ($this->Lfg->save($lfg)) {
                $this->Flash->success(__('Your lfg has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to add your lfg.'));
        }
        $this->set('lfg', $lfg);
*/
        // Just added the categories list to be able to choose
        // one category for an lfg
        /*$categories = $this->Lfg->Categories->find('treeList');
        $this->set(compact('categories'));*/
    }
	
	public function edit($id = null)
    {
		$lfg = $this->Lfg->get($id);
		if ($this->request->is(['post', 'put'])) {
			$this->Lfg->patchEntity($lfg, $this->request->data);
			if ($this->Lfg->save($lfg)) {
				$this->Flash->success(__('Your lfg has been updated.'));
				return $this->redirect(['action' => 'index']);
			}
			$this->Flash->error(__('Unable to update your lfg.'));
		}

		$this->set('lfg', $lfg);
	}
	
	public function delete($id)
	{
		$this->request->allowMethod(['post', 'delete']);

		$lfg = $this->Lfg->get($id);
		if ($this->Lfg->delete($lfg)) {
			$this->Flash->success(__('The lfg with id: {0} has been deleted.', h($id)));
			return $this->redirect(['action' => 'index']);
		}
	}
}