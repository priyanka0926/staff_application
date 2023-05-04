<?php
    class staff_model extends CI_model
    {
        public function insert_entry($data)
        {
            return $this->db->insert('user',$data);
        }

        public function get_entries()
        {
            $query = $this->db->get('user');
            if(count($query->result()) >0)
            {
                return $query->result();
            }
        }

    }


?>