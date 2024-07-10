<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Perumahan extends CI_Controller
{
    public $load;
    public $m_produk;
    public $uri;
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_produk');
    }

    function index()
    {
        $perumahan = '';
        $data['_title'] = 'Di Jual Rumah Murah';
        $data['_url'] = base_url('Perumahan');
        $data['_script'] = 'produk/produk_js';
        $data['_view'] = 'produk/produk';
        // $data['data_foto_slide'] = $this->m_produk->m_data_fotoslide();
        $data['data_perum'] = $this->m_produk->m_data_perum($perumahan);
        $data['data_tipe'] = $this->m_produk->m_data_tipe($perumahan);
        $this->load->view('layout/index', $data);
    }
    function murah()
    {
        $lokasi = preg_replace("![^a-z0-9]+!i", " ", $this->uri->segment(3));

        $key_lokasi = ", perumahan di " . $lokasi . ", perumahan murah di " . $lokasi . ", rumah murah di " . $lokasi . ", jual rumah murah di " . $lokasi . ", di jual rumah murah di " . $lokasi;
        $data['_keyword'] = 'di jual rumah, rumah murah, perumahan murah, di jual rumah murah' . $key_lokasi;

        $data['_title'] = 'Di Jual Rumah Murah Di ' . $lokasi;
        $data['_description'] = "Rumah Di jual di ". $lokasi.". Banyak pilihan ✔ Rentang harga beragam ✔ Desain menarik ✔ Pencarian mudah ✔";
        $data['_url'] = base_url('Perumahan/murah/') . $lokasi;
        $data['_script'] = 'produk/produk_js';
        $data['_view'] = 'produk/produk';
        // $data['data_foto_slide'] = $this->m_produk->m_data_fotoslide();
        $data['data_perum'] = $this->m_produk->m_data_perum($lokasi);
        $data['data_tipe'] = $this->m_produk->m_data_tipe($lokasi);
        $this->load->view('layout/index', $data);
    }
}
