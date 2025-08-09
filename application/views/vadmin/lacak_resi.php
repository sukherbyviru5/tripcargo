<?php 
if ($paket->num_rows() > 0) {
    foreach ($paket->result() as $k) {
        if ($k->p_nama == null) {
            $nama = $this->app_model->find_nama_pel($k->pel_id);
            $dept = $this->app_model->find_dept_pel($k->pel_id);
            $telp = $this->app_model->find_telp_pel($k->pel_id);
            $kec = $this->app_model->find_kec($k->kec);
            $kokab = $this->app_model->find_kokab($k->kokab);
            $prov = $this->app_model->find_prov($k->prov);
            $email = $k->p_email;
        } else {
            $nama = $k->p_nama;
            $dept = $k->p_dept;
            $telp = $k->p_telp;
            $kec = $this->app_model->find_kec($k->p_kec_id);
            $kokab = $this->app_model->find_kokab($k->p_kokab_id);
            $prov = $this->app_model->find_prov($k->p_prov_id);
            $email = $k->p_email;
        }
        echo "<br>";
        echo "<div class='alert alert fade in'>
                Status : <strong>" . $this->app_model->find_status_paket($k->resi) . "</strong>
              </div>";
        echo "<br>";
        echo "<table id='dt_basic' class='table table-striped table-bordered table-hover' width='100%'>
                <thead>
                    <tr>
                        <th style='data-class=\"expand\"; width=\"15%\"> Resi:</th>
                        <th style='data-class=\"expand\"'> <strong>" . $k->resi . "</strong></th>
                    </tr>
                    <tr>
                        <th style='vertical-align: text-top; data-class=\"expand\"'> Pengirim</th>
                        <th style='font-weight: normal; data-class=\"expand\"'>" . $dept . " <br> " . $nama . " <br> " . $kokab . "</th>
                    </tr>
                    <tr>
                        <th style='vertical-align: text-top; data-class=\"phone\"'> Penerima</th>
                        <th style='font-weight: normal; data-class=\"phone\"'>" . $k->penerima . " <br> " . $k->dept2 . " <br> " . 
                        $this->app_model->find_kokab(($k->kec_id ? substr($k->kec_id, 0, 4) : '')) . " <br> " . 
                        $this->app_model->find_prov(($k->kec_id ? substr($k->kec_id, 0, 2) : '')) . "</th>
                    </tr>
                    <tr>
                        <th style='data-class=\"phone\"'> Koli & Berat</th>
                        <th style='font-weight: normal; data-class=\"phone\"'>" . $k->koli . " Koli (" . $k->berat . " Kg)</th>
                    </tr>
                </thead>
              </table>";

        // Informasi tracking
        $resi = $this->input->post('resi');
        $this->db->select('*');
        $this->db->from('lacak');
        $this->db->like('resi', $resi);
        $this->db->order_by('tgl', 'ASC');
        $query = $this->db->get();

        echo "<table id='dt_basic' class='table table-striped table-bordered table-hover' width='100%'>
                <thead>
                    <tr>
                        <th style='display:none; data-hide=\"phone\"; width:30px;'>No</th>
                        <th data-class='expand'><i class='fa fa-calendar text-muted hidden-md hidden-sm hidden-xs'></i> Tanggal</th>
                        <th data-class='phone'><i class='fa fa-fw fa-map-o text-muted hidden-md hidden-sm hidden-xs'></i> Posisi</th>
                        <th data-class='phone'><i class='fa fa-fw fa-comments text-muted hidden-md hidden-sm hidden-xs'></i> Keterangan</th>
                    </tr>
                    <tr>
                        <th style='display:none; data-hide=\"phone\"; width:30px;'>No</th>
                        <th style='font-weight: normal; data-class=\"expand\"'>" . date('d M Y H:i:s', strtotime($k->tglkirim)) . "</th>
                        <th style='font-weight: normal; data-class=\"phone\"'>ID" . $this->app_model->find_id_admin($k->user_id) . " [" . $this->app_model->find_area_admin($k->user_id) . "]</th>
                        <th style='font-weight: normal; data-class=\"phone\"'>Input " . $this->app_model->find_nama_admin($k->user_id) . "</th>
                    </tr>
                </thead>
                <tbody>";

        $no = 1;
        foreach ($query->result() as $r) {
            if ($r->manifast_id != 0) {
                $this->db->from('manifast_head');
                $this->db->where('id', $r->manifast_id);
                $query = $this->db->get();
                $manifast = $query->result_array();
            }

            echo "<tr>
                    <td style='display:none'>" . $no . "</td>
                    <td style='font-weight: normal'>" . date('d M Y H:i:s', strtotime($r->tgl)) . "</td>
                    <td style='font-weight: normal'>" . $this->app_model->find_kec($r->kec_id) . " <br> " . 
                    $this->app_model->find_kokab(($r->kec_id ? substr($r->kec_id, 0, 4) : '')) . "</td>
                    <td style='font-weight: normal'>";

            if (isset($r->ket) && !empty($r->ket)) {
                if (substr($r->ket, 4, 20) == "On Proses" && substr($r->ket, 4, 20) != "Proses") {
                    if (isset($manifast) && !empty($manifast)) {
                        echo $manifast[0]['nom'] . " / " . $manifast[0]['sortir'] . " / " . $manifast[0]['users_id'] . " / " . $manifast[0]['creator'] . "<br>";
                        echo "Tujuan: " . $manifast[0]['tujuan'] . "<br>";
                        echo "Catatan: " . $manifast[0]['remake'] . "<br>";
                    }
                }
                if (substr($r->ket, 4, 20) == "Delivered") {
                    echo $this->app_model->find_status_paket($k->resi) . "<br>";
                    echo substr($r->diterima ?? '', 0, 20);
                }
            }
            echo "</td></tr>";
            $no++;
        }
        echo "</tbody></table>";
        echo "</div>";
    }
} else {
    echo "<br><br>";
    echo "<div class='alert alert-danger fade in'>
            <button class='close' data-dismiss='alert'>×</button>
            <strong>Error!</strong> Nomor Resi tidak ditemukan.
          </div>";
}
?>