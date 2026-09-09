<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class UserModel extends Model
{
    protected $table = 'users';

    public function get_by_username($username)
    {
        return $this->db->table($this->table)
                        ->where('username', $username)
                        ->get(PDO::FETCH_OBJ);
    }

    public function username_exists($username)
    {
        return (bool) $this->get_by_username($username);
    }

    public function create_user($data)
    {
        return $this->db->table($this->table)->insert($data);
    }
}
