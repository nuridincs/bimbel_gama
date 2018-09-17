<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_site extends CI_Model {
    public function getData($act="",$id=""){
        if($act == 'jadwal'){
            $query = "SELECT * FROM app_jadwal 
                        ORDER BY created_at DESC";
        }elseif($act == 'user'){
            $query = "SELECT a.*,b.categori
                    FROM app_users a
                    LEFT JOIN app_users_role b ON a.`id_user_role` = b.id
                    WHERE a.id_user_role = 4";
        }elseif($act == 'materi'){
            $query = "SELECT * FROM app_materi 
                      ORDER BY created_at DESC";
        }elseif($act == 'instruktur'){
            $query = "SELECT * FROM app_instruktur 
                      ORDER BY created_at DESC";
        }elseif($act == 'peserta_didik'){
            $query = "SELECT * FROM app_list_peserta_didik
                      ORDER BY created_at DESC";
        }elseif($act == 'instrukturById'){
            $query = "SELECT * FROM app_instruktur 
                      WHERE id = $id";
        }elseif($act == 'materiById'){
            $query = "SELECT * FROM app_materi 
                      WHERE id = $id";
        }elseif($act == 'jadwalById'){
            $query = "SELECT * FROM app_jadwal 
                      WHERE id = $id";
        }elseif($act == 'userById'){
            $query = "SELECT a.*,b.categori
                    FROM app_users a
                    LEFT JOIN app_users_role b ON a.`id_user_role` = b.id
                    WHERE a.id_user_role = 4 AND a.id=$id";
        }
        // echo $query;die;
        $result = $this->db->query($query);
        return $result->result_array();
    }

    public function execute($table = "", $data = ""){
        // $query = "INSERT INTO $table VALUES($data)";
        $this->db->insert($table, $data);
        // $result = $this->db->query($query);
        // return $result->result_array();
    }
}
