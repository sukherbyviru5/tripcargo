<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Log_model extends CI_Model {

    private $table = 'log';
        
    var $column_order = array('id', 'tanggal','type','catatan');
    var $column_search = array('tanggal','type','catatan'); 
    var $order = array('tanggal' => 'desc'); 


    private function _get_datatables_query($start_date = null, $end_date = null, $type = null)
    {
        $this->db->from($this->table);

        if (!empty($start_date) && !empty($end_date)) {
            $this->db->where('tanggal >=', $start_date);
            $this->db->where('tanggal <=', $end_date);
        }

        if (!empty($type)) {
            $this->db->where('type', $type);
        }

        $i = 0;
        foreach ($this->column_search as $item) {
            if (!empty($_POST['search']['value'])) {
                if ($i === 0) {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
                if (count($this->column_search) - 1 == $i) {
                    $this->db->group_end();
                }
            }
            $i++;
        }

        // Handle ordering
        if (isset($_POST['order'])) {
            $this->db->order_by(
                $this->column_order[$_POST['order']['0']['column']],
                $_POST['order']['0']['dir']
            );
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    public function get_datatables($start_date = null, $end_date = null, $type = null)
    {
        $this->_get_datatables_query($start_date, $end_date, $type);
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered($start_date = null, $end_date = null, $type = null)
    {
        $this->_get_datatables_query($start_date, $end_date, $type);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }


    public function add_log($type, $catatan)
    {
        $data = [
            'type'    => $type,
            'catatan' => $catatan,
            'tanggal' => date('Y-m-d H:i:s')
        ];
        return $this->db->insert($this->table, $data);
    }

    // Helper untuk ambil user aktif
    private function userInfo()
    {
        $username = $this->session->userdata('username');
        $level    = $this->session->userdata('level');
        return $username." (".$level.")";
    }

    // -----------------------------
    // Histori tarif
    // -----------------------------
    public function log_tarif($aksi, $asal, $tujuan, $harga_lama = null, $harga_baru = null)
    {
        $user = $this->userInfo();
        if ($aksi == 'tambah') {
            $catatan = "Tgl ".date('d-m-Y')." $user menambahkan tarif dari $asal ke $tujuan Rp. ".number_format($harga_baru,0,',','.')." /kg";
        } elseif ($aksi == 'edit') {
            $catatan = "Tgl ".date('d-m-Y')." $user mengubah tarif dari $asal ke $tujuan dari Rp. ".number_format($harga_lama,0,',','.')." menjadi Rp. ".number_format($harga_baru,0,',','.')." /kg";
        }
        return $this->add_log('TARIF', $catatan);
    }

    // -----------------------------
    // Histori resi
    // -----------------------------
    public function log_resi($aksi, $no_resi, $asal, $tujuan, $berat, $total)
    {
        $user = $this->userInfo();
        if ($aksi == 'input') {
            $catatan = "Tgl ".date('d-m-Y')." $user input resi $no_resi dari $asal ke $tujuan Total Berat {$berat}kg Rp. ".number_format($total,0,',','.');
        } elseif ($aksi == 'edit') {
            $catatan = "Tgl ".date('d-m-Y')." $user edit resi $no_resi dari $asal ke $tujuan Total Berat {$berat}kg Rp. ".number_format($total,0,',','.');
        }
        return $this->add_log('RESI', $catatan);
    }

    // -----------------------------
    // Histori manifest
    // -----------------------------
    public function log_manifest($aksi, $no_manifest)
    {
        $user = $this->userInfo();
        if ($aksi == 'input') {
            $catatan = "Tgl ".date('d-m-Y')." $user input manifest $no_manifest";
        } elseif ($aksi == 'hapus') {
            $catatan = "Tgl ".date('d-m-Y')." $user hapus manifest $no_manifest";
        }
        return $this->add_log('MANIFEST', $catatan);
    }
}
