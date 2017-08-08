<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Model
{
    public function add_user($data)
    {
        $qry = 'INSERT INTO `argali_users`(`username`, `email`, `password`, `date_added`)
                    VALUES ('
                        . $this->db->escape($data['username']) . ', '
                        . $this->db->escape($data['email']) . ', '
                        . $this->db->escape(password_hash($data['password'], PASSWORD_DEFAULT)) . ', '
                        . $this->db->escape(date('Y-m-d H:i:s'))
                    . ')';

        $this->db->query($qry);

        return $this->db->insert_id();
    }

    public function get($id)
    {
        $qry = 'SELECT *
                FROM `argali_users`
                WHERE `id` = ' . $id;

        return $this->db->query($qry)->row_array();
    }

    public function edit_user($id, $user)
    {
        $qry = 'UPDATE `argali_users`
                SET `username` = ' . $this->db->escape($user['username']);

                $qry .= ', `password` = ' . $this->db->escape($user['password']);
                $qry .= ', `email` = ' . $this->db->escape($user['email']);

        if ($user['password'])
        {
            $qry .= ', `password`= ' . $this->db->escape(password_hash($user['password'], PASSWORD_DEFAULT));
        }

        $qry .= ' WHERE `id` = ' . $id;

        $this->db->query($qry);
    }

    public function get_users()
    {
        $qry = 'SELECT * FROM `argali_users`';

        return $this->db->query($qry)->result_array();
    }

    public function remove_user($id)
    {
        $qry = 'DELETE FROM 
                `argali_users`';

        $qry .= ' WHERE `id` = ' . $id;
        
        $this->db->query($qry);
    }
}