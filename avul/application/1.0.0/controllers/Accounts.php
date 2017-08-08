<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Accounts extends CI_Controller 
{
    
	public function _remap()
    {
        $data = array();

        $this->load->model('account/account', NULL, TRUE);

        $data['reg_success'] = FALSE;

        if($this->input->get('id') && $this->input->get('action')=='delete')
        {
        	$user_id = $this->input->get('id', TRUE);
            $this->account->remove_user($user_id);
            $data['reg_success'] = TRUE;
        }
        
        $data['item'] = $this->account->get_users();
        $this->load->view('app/default/page/view', $data);
    }
}