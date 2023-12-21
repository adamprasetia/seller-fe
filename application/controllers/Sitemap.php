<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sitemap extends CI_Controller {

	function __construct()
   	{
        parent::__construct();
        $this->load->library('xml_writer');
        $this->db->like('domain', $_SERVER['SERVER_NAME']);
		$this->store = $this->db->get('store')->row();
		if(empty($this->store)){
			show_404();
		}

   	}
    public function index()
    {
        # Initiate class
		$xml = new Xml_writer();
		$xml->setRootName('sitemapindex',array('xmlns'=>'http://www.sitemaps.org/schemas/sitemap/0.9'));
        $xml->initiate();
        $module = ['produk'];
        foreach ($module as $row) {            
            $xml->startBranch('sitemap');
            $xml->addNode('loc', base_url().$row.'/sitemap.xml');
            $xml->addNode('lastmod',date('c',time()));
            $xml->endBranch('sitemap');
        }
		$xml->getXml(TRUE);
    }
   	public function produk()
   	{
		$data	= $this->db->select('slug')->where('store_id', $this->store->id)->where('deleted_at', null)->get('item')->result();

		# Initiate class
		$xml = new Xml_writer();
		$xml->setRootName('urlset', array('xmlns'=>'http://www.sitemaps.org/schemas/sitemap/0.9'));
		$xml->initiate();

		foreach ($data as $row) 
		{
			$xml->startBranch('url');	
				$xml->addNode('loc', base_url($row->slug));
			$xml->endBranch('url');	
		}

		$xml->getXml(TRUE);
	}
}
