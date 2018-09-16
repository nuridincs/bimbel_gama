<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_site extends CI_Model {
    public function getData($act="",$id=""){
        $decode_id = base64_decode($id);
        if($act == 'kegiatan'){
            if($id == 6){
                $limit = 'LIMIT 6';
            }else{
                $limit = "";
            }
            $query = "SELECT * FROM app_kegiatan 
                      WHERE unix_id IS NOT NULL
                      ORDER BY created_at DESC
                      $limit";
        }elseif($act == 'detail_kegiatan'){
            $query = "SELECT * FROM app_kegiatan 
                      WHERE id=$decode_id";
        }elseif($act == 'bank'){
            $query = "SELECT * FROM app_bank 
                      WHERE status=1";
        }elseif($act == 'trx_donasi'){
            $query = "SELECT td.*,ak.`nama_kegiatan`,ak.image,ak.`unix_id`,ab.`no_rekening`,ab.`nama_bank`,ab.`nama_pemilik`,ab.`cabang`,ab.logo_bank,sum(td.jumlah_donasi + ak.unix_id) AS total_donasi,us.fullname,us.email
                    FROM app_trx_donatur td
                    LEFT JOIN app_kegiatan ak ON td.`id_kegiatan` = ak.id
                    LEFT JOIN app_bank ab ON td.`id_bank_transfer` = ab.id
                    LEFT JOIN app_users us ON td.`id_users` = us.id
                    WHERE td.id = '$id'";
        }elseif($act == 'history_trx'){
            $query = "SELECT MAX(id) as id FROM history_trx";
        }
        // echo $query;
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
