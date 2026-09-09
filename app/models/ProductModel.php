<?php

defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class ProductModel extends Model
{
    protected $table = 'products';

    public function get_all_products()
    {
        return $this->db->table($this->table)
                        ->order_by('id', 'DESC')
                        ->get_all(PDO::FETCH_OBJ);
    }

    public function get_product($id)
    {
        return $this->db->table($this->table)
                        ->where('id', $id)
                        ->get(PDO::FETCH_OBJ);
    }

    public function create_product($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function update_product($id, $data)
    {
        return $this->db->table($this->table)
                        ->where('id', $id)
                        ->update($data);
    }

    public function delete_product($id)
    {
        return $this->db->table($this->table)
                        ->where('id', $id)
                        ->delete();
    }
}
