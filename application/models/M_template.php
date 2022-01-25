<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_template extends CI_Model
{
    public function insert($tabel, $data)
    {
        $this->db->insert($tabel, $data);
        return $this->db->insert_id();
    }
    public function insert_id($tabel, $data)
    {
        $this->db->insert($tabel, $data);
        return $this->db->insert_id();
    }
    public function update($tabel, $where, $data)
    {
        $this->db->where($where);
        return $this->db->update($tabel, $data);
    }
    public function delete($tabel, $where)
    {
        $this->db->where($where);
        return $this->db->delete($tabel);
    }
    public function view_where($tabel, $where)
    {
        $this->db->where($where);
        return $this->db->get($tabel);
    }
    public function view($tabel)
    {
        return $this->db->get($tabel);
    }
    public function view_order($tabel, $column, $order)
    {
        $this->db->order_by($column, $order);
        return $this->db->get($tabel);
    }
    public function query($query)
    {
        return $this->db->query($query);
    }
    public function join($tabel, $using, $with)
    {
        $this->db->select('*');
        $this->db->from($tabel);
        $this->db->join($with, $using);
        $query = $this->db->get();
        return $query;
    }
    public function join_where($tabel, $with, $using, $join = null, $where)
    {
        $this->db->select('*');
        $this->db->from($tabel);
        if ($join == null) {
            $this->db->join($with, $using);
        } else {
            $this->db->join($with, $using, $join);
        }
        $this->db->where($where);
        $query = $this->db->get();
        return $query;
    }
}
