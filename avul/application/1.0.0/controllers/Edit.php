<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Edit extends CI_Controller 
{
    private $finputs;
    private $errors;
	public function _remap($id = NULL)
    {
        $data = array();

        if ($id < 1)
        {
            show_404(NULL, FALSE);
        }

        $id = (int)$id;

        $this->load->model('account/account', NULL, TRUE);

        $user = $this->account->get($id);

        if (!$user)
        {
            show_404(NULL, FALSE);
        }

        $data['user'] = $user;

        $data['reg_success'] = FALSE;

        if ($this->input->method() === 'post'
            && $this->_filter()
            && $this->_validate()
            )
        {
            $this->load->helper('url');

            $this->load->model('account/account', NULL, TRUE);

            $this->account->edit_user($id, $this->finputs);

            $data['reg_success'] = TRUE;
            redirect('accounts', 'location');
        }

        $data['inputs'] = $this->finputs;
        $data['errors'] = $this->errors;

        $data['csrf'] = array(
            'name' => md5(uniqid(mt_rand())),
            'hash' => md5(uniqid(mt_rand()))
        );

        $_SESSION['csrf'] = array($data['csrf']['name'], $data['csrf']['hash']);
        $this->session->mark_as_flash('csrf');
        session_write_close();
        $this->load->view('app/default/page/edit', $data);
    }

    private function _filter()
    {
        $this->finputs = array(
            'csrf'              => FALSE,
            'username'          => '',
            'password'          => '',
            'password-confirm'  => '',
            'email'             => ''
        );

        if (isset($_SESSION['csrf'])
            && ($this->input->post($_SESSION['csrf'][0]) === $_SESSION['csrf'][1])
            )
        {
            $this->finputs['csrf'] = TRUE;
        }

        foreach (array_keys($this->finputs) as $input)
        {
            if (is_string($this->input->post($input)))
            {
                $this->finputs[$input] = $this->input->post($input);
            }
        }

        return TRUE;
    }

    private function _validate()
    {
        $this->errors = array();
        
        foreach (array('username','password','password-confirm','email') as $input)
        {
            if (!$this->finputs[$input])
            {
                $this->errors[] = 'Please fill all required fields';
                return;
            }
        }

        if ($this->finputs['password']!=$this->finputs['password-confirm'])
        {
            $this->errors[] = 'Password mismatch';   
        }
        if (!$this->finputs['email'])
        {
            $this->errors[] = 'Please enter your e-mail address';
        }

        if ($this->errors)
        {
            return FALSE;
        }

        if (preg_match('/[^a-zA-Z0-9]/', $this->finputs['username'])
            || !preg_match('/[^0-9]/', $this->finputs['username'])
            )
        {
            $this->errors[] = 'Username does not appear to be valid. Allowed characters [a-zA-Z0-9]';
        }
        else if (strlen($this->finputs['username']) < 4
            || strlen($this->finputs['username']) > 32
            )
        {
            $this->errors[] = 'Username must be between 4 and 32 characters';
        }

        if (mb_strlen($this->finputs['email']) > 254
            || !filter_var($this->finputs['email'], FILTER_VALIDATE_EMAIL)
            )
        {
            $this->errors[] = 'E-mail address does not appear to be valid';
        }

        return !$this->errors;
    }
}
