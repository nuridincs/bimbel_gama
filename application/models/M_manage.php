<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_manage extends CI_Model {
    public function getData($act="",$id=""){
        if($act == 'kegiatan'){
            $query = "SELECT * FROM app_kegiatan 
                      WHERE unix_id IS NOT NULL ORDER BY created_at DESC";
        }elseif($act == 'user'){
            $query = "SELECT a.*,b.categori
                    FROM app_users a
                    LEFT JOIN app_users_role b ON a.`id_user_role` = b.id
                    WHERE a.id_user_role = 1";
        }elseif($act == 'donatur'){
            
            $query = "SELECT a.id as id_trx,a.id_users,a.id_kegiatan,a.jumlah_donasi,a.unix_id,a.keterangan,a.id_bank_transfer,a.konfirmasi,a.bukti_donasi,a.verifikasi,a.created_at,b.*,c.`nama_kegiatan`,d.nama_bank
                        FROM app_trx_donatur a
                        LEFT JOIN app_users b ON a.`id_users` = b.id
                        LEFT JOIN app_kegiatan c ON c.id = a.`id_kegiatan`
                        LEFT JOIN app_bank d ON d.id = a.id_bank_transfer
                        WHERE c.unix_id IS NOT NULL";
        }elseif($act == 'bank'){
            $query = "SELECT * FROM app_bank";
        }elseif($act == 'kegiatanById'){
            $query = "SELECT * FROM app_kegiatan 
                      WHERE id=$id";
        }elseif($act == 'userById'){
            $query = "SELECT * FROM app_users 
                      WHERE id=$id";
        }elseif($act == 'bankById'){
            $query = "SELECT * FROM app_bank 
                      WHERE id=$id";
        }elseif($act == 'laporan_kegiatan'){
            $query = "SELECT td.*, ak.*,SUM(td.jumlah_donasi) AS total_terkumpul
                        FROM `app_trx_donatur` td
                        LEFT JOIN app_kegiatan ak ON ak.id = td.id_kegiatan
                        GROUP BY ak.id";
        }elseif($act == 'laporan_donasi'){
            $query = "SELECT td.*, ak.nama_kegiatan,ak.image,ak.`target_dana`,SUM(td.jumlah_donasi) AS total_terkumpul,
                    ab.`nama_bank`,us.fullname,us.email
                    FROM `app_trx_donatur` td
                    LEFT JOIN app_kegiatan ak ON td.id_kegiatan = ak.id 
                    LEFT JOIN app_bank ab ON td.`id_bank_transfer` = ab.id
                    LEFT JOIN app_users us ON td.`id_users` = us.id
                    GROUP BY ak.id";
        }elseif($act == 'konfirmasi'){
            $query = "SELECT td.*, ak.nama_kegiatan,ak.image,ak.`target_dana`,
                        ab.`nama_bank`,us.fullname,us.email
                        FROM `app_trx_donatur` td 
                        LEFT JOIN app_kegiatan ak ON ak.id = td.id_kegiatan 
                        LEFT JOIN app_bank ab ON td.`id_bank_transfer` = ab.id 
                        LEFT JOIN app_users us ON td.`id_users` = us.id
                        WHERE td.id_users = $id
                        ORDER BY td.`created_at` DESC";
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
