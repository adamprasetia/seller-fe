<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct()
   	{
    	parent::__construct();
		$this->db->like('domain', $_SERVER['SERVER_NAME']);
		$this->store = $this->db->get('store')->row();
		if(empty($this->store)){
			show_404();
		}
		$this->store->wa = str_replace(' ','',$this->store->phone);
		if(substr($this->store->wa,0,2)=='08'){
			$this->store->wa = substr_replace($this->store->wa, '628',0, 2);
		}
   	}

	public function index()
	{
		$this->load->library('user_agent');
		if($this->agent->is_mobile()){
			$this->db->select('name, image, cover_mobile as cover, teaser, desc, slug, price');
		}else{
			$this->db->select('name, image, cover as cover, teaser, desc, slug, price');
		}
		$this->db->where('store_id', $this->store->id);
		$this->db->where('headline', 'Y');
		$this->db->where('active', 'Y');
		$this->db->where('deleted_at', null);
		$content['headline'] = $this->db->order_by('rank asc')->get('item')->result();

		$this->db->where('store_id', $this->store->id);
		$this->db->where('active', 'Y');
		$this->db->where('deleted_at', null);
		$this->db->limit(4);
		$content['item'] = $this->db->order_by('rank asc')->get('item')->result();

		$this->db->where('store_id', $this->store->id);
		$content['store'] = $this->store;
		$content['category'] = $this->db->get('category')->result();

		$this->db->where('store_id', $this->store->id);
		$this->db->where('deleted_at', null);
		$this->db->order_by('published_at desc');
		$this->db->limit(3);
		$content['news'] = $this->db->get('news')->result();

		$this->db->where('store_id', $this->store->id);
		$this->db->where('deleted_at', null);
		$this->db->limit(3);
		$content['client'] = $this->db->get('client')->result();

		$data['content'] = $this->load->view('home_view', $content, TRUE);
		$data['meta'] = [
			'title'=>$this->store->title,
			'desc'=>$this->store->desc,
			'keyword'=>$this->store->keyword,
			'image'=>base_url($this->store->image),
		];
		$this->load->view('template_view', $data);
	}
}
