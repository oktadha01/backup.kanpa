<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Detail extends CI_Controller
{
    public $load;
    public $m_detail;
    public $input;
    public $uri;
    public $db;
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_detail');
    }

    function perum()
    {


        $tittle = $this->uri->segment(3);
        $luas_bangunan = $this->uri->segment(5);
        $luas_tanah = $this->uri->segment(6);
        $key_lokasi = "";
        $key_tipe_lokasi = "";
        $key_tipe = "";
        $nm_perum = preg_replace("![^a-z0-9]+!i", " ", $tittle);
        $sql = "SELECT perum.*, tipe.kategori_tipe, tipe.id_tipe_perum FROM perum, tipe WHERE perum.id_perum = tipe.id_tipe_perum AND perum.nm_perum = '$nm_perum' ";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $perum) {
                $logo = $perum->logo;
                $meta_deskripsi = $perum->meta_deskripsi;
                $lokasi = $perum->lokasi;
                // $kategori_tipe .= $perum->kategori_tipe;
                $key_tipe .= $perum->kategori_tipe . ',';
            }
        }
        $arr_lokasi = explode(',', $lokasi);
        $arr_tipe = explode(',', $key_tipe);
        foreach ($arr_lokasi as $lokasi) {
            foreach ($arr_tipe as $tipe) {
                $key_lokasi .= ", perumahan di " . $lokasi . ", perumahan murah di " . $lokasi . ", rumah murah di " . $lokasi . ", jual rumah murah di " . $lokasi . ", di jual rumah murah di " . $lokasi;
                $key_tipe_lokasi .= ", perumahan " . $tipe . " di " . $lokasi . ", rumah " . $tipe . " di " . $lokasi . ", jual rumah " . $tipe . " di " . $lokasi . ", di jual rumah " . $tipe . " di " . $lokasi;
            }
        }

        $key_lokasi = rtrim($key_lokasi, '');
        // $key_tipe = rtrim($key_tipe, '');
        $key_perum = $nm_perum . ', perum ' . $nm_perum . ', perumahan ' . $nm_perum;

        $data['_keyword'] = 'di jual rumah, rumah murah, perumahan murah, di jual rumah murah' . $key_lokasi . $key_tipe_lokasi . ', ' . $key_perum;
        $data['_title'] = 'Di Jual Perumah Murah Di ' . $lokasi . ' | ' . $nm_perum . ' || Type ' . $luas_bangunan . '/' . $luas_tanah;
        $data['_metafoto'] = $logo;
        $data['_description'] = 'Di Jual Perumah Murah Di ' . $lokasi . ', ' . $meta_deskripsi . ' | PT Kanpa';
        $data['_url'] = base_url('Detail/perum/') . $tittle . '/tipe/' . $luas_bangunan . '/' . $luas_tanah;

        $data['_script'] = 'detail/detail_js';
        $data['_view'] = 'detail/detail';
        $data['detail_perum'] = $this->m_detail->m_detail_perum($nm_perum);
        $data['detail_fasilitas'] = $this->m_detail->m_detail_fasilitas($nm_perum);
        $data['detail_lokasi_terdekat'] = $this->m_detail->m_detail_lokasi_terdekat($nm_perum);
        $data['detail_tipe'] = $this->m_detail->m_detail_tipe($nm_perum);
        $data['detail_marketing'] = $this->m_detail->m_detail_marketing($nm_perum);
        $data['detail_cs'] = $this->m_detail->m_detail_cs();
        // $data['data_view'] = $this->m_detail->m_view_tipe($nm_perum, $luas_bangunan, $luas_tanah);
        $this->load->view('layout/index', $data);
    }
    function detail_tipe()
    {
        $luas_bangunan =  $this->input->post('luas-bangunan');
        $luas_tanah =  $this->input->post('luas-tanah');
        $nm_perum =  $this->input->post('nm-perum');
        $data['_view'] = 'detail/detail_tipe';
        $data['data_detail_tipe'] = $this->m_detail->m_data_detail_tipe($nm_perum, $luas_bangunan, $luas_tanah);
        $data['data_view'] = $this->m_detail->m_view_tipe($nm_perum, $luas_bangunan, $luas_tanah);
        $this->load->view('detail/detail_tipe', $data);
    }
}
