<?php

class M_navigation extends CI_Model {

//generate id terakhir
  public function get_last_id()
  {
      $sql = "SELECT nav_id
              FROM com_menu
              ORDER BY nav_id DESC
              LIMIT 1";
      $query = $this->db->query($sql);
      if ($query->num_rows() > 0) {
          $result = $query->row_array();
          $query->free_result();
          // create next number
          $number = intval($result['nav_id']) + 1;
          if ($number > 9999) {
              return false;
          }
          return $number;
      } else {
          // create new number
          return '1';
      }
  }

    //get all
    public function get_all($limit = array())
    {
        $this->db->select('*');
        $this->db->from('com_menu');
        $this->db->limit($limit[0], $limit[1]); 
        $this->db->order_by('nav_id', 'ASC');
        $this->db->order_by('nav_no', 'ASC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
          $result = $query->result_array();
          $query->free_result();
          return $result;
        }
        return array();
    }

        //get all menu
        public function get_all_menu()
        {
            $this->db->select('*');
            $this->db->from('com_menu');
            $this->db->order_by('nav_id', 'ASC');
            $this->db->order_by('nav_no', 'ASC');
            $query = $this->db->get();
            if ($query->num_rows() > 0) {
              $result = $query->result_array();
              $query->free_result();
              return $result;
            }
            return array();
        }


    // //get by id
    // public function get_by_id($role_id)
    // {
    //     $this->db->select('com_role.*, com_group.group_name');
    //     $this->db->from('com_role');
    //     $this->db->join('com_group', 'com_role.group_id = com_group.group_id', 'inner');
    //     $this->db->where('com_role.role_id', $role_id);
    //     $query = $this->db->get();
    //     if ($query->num_rows() > 0) {
    //       $result = $query->row_array();
    //       $query->free_result();
    //       return $result;
    //     }
    //     return array();
    // }

    //count all
    public function count_all()
    {
        $this->db->select('*');
        $this->db->from('com_menu');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
          $result = $query->num_rows();
          return $result;
        }
        return 0;
    }

    //insert
    public function insert($table ,$params)
    {
      return $this->db->insert($table, $params);
    }

    //delete
    public function delete($table ,$where)
    {
      $this->db->where($where);
      return $this->db->delete($table);
    }

    //update
    public function update($table, $params, $where)
    {
      $this->db->set($params);
      $this->db->where($where);
      return $this->db->update($table);
    }
  
    
}