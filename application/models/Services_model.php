<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Services_model
 * Model untuk mengelola data pada tabel 'services'.
 * Mendukung operasi CRUD dan DataTables server-side.
 */
class Services_model extends CI_Model {

    private $table = 'services'; // Nama tabel di database
    // Konfigurasi untuk DataTables
    private $column_order = array(null, 'title', 'description', 'icon', null); // Kolom yang bisa di-sorting
    private $column_search = array('title', 'description'); // Kolom yang bisa dicari
    private $order = array('id' => 'desc'); // Urutan default

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    /**
     * ========================================================================
     * METODE UNTUK DATATABLES SERVER-SIDE
     * ========================================================================
     */

    private function _get_datatables_query() {
        $this->db->from($this->table);
        $i = 0;
        // Proses pencarian (search)
        foreach ($this->column_search as $item) {
            if (isset($_POST['search']['value']) && $_POST['search']['value']) {
                if ($i === 0) {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
                if (count($this->column_search) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }
        // Proses pengurutan (order)
        if (isset($_POST['order'])) {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    public function get_datatables() {
        $this->_get_datatables_query();
        if (isset($_POST['length']) && $_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result(); // Mengembalikan hasil sebagai array of objects
    }

    public function count_filtered() {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all() {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
    
    /**
     * ========================================================================
     * METODE CRUD STANDAR
     * ========================================================================
     */

     public function get_all() {
        $query = $this->db->get($this->table);
        return $query->result();
    }

    public function create($data) {
        return $this->db->insert($this->table, $data);
    }

    public function get_by_id($id) {
        return $this->db->get_where($this->table, ['id' => $id])->row();
    }

    public function update($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update($this->table, $data);
    }

    public function delete($id) {
        $this->db->where('id', $id);
        return $this->db->delete($this->table);
    }
}
