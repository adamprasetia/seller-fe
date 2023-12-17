<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct()
   	{
    	parent::__construct();
		$this->store = $this->db->get('store')->row();
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
		$this->db->where('hidden <>', 'Y');
		$content['headline'] = $this->db->order_by('rank asc')->get('item')->result();
		$this->db->where('store_id', $this->store->id);
		$content['item'] = $this->db->order_by('rank asc')->get('item')->result();
		$this->db->where('store_id', $this->store->id);
		$content['store'] = $this->store;
		$content['category'] = $this->db->get('category')->result();
		$data['content'] = $this->load->view('home_view', $content, TRUE);
		$data['meta'] = [
			'title'=>$this->store->title,
			'desc'=>$this->store->desc,
			'keyword'=>$this->store->keyword,
			'image'=>base_url($this->store->image),
		];
		$this->load->view('template_view', $data);
	}

	public function produk($slug='')
	{
		$this->db->where('store_id', $this->store->id);
		$this->db->where('hidden <>', 'Y');
		$this->load->library('user_agent');
		if(!empty($slug)){
			$category = $this->db->where('slug', $slug)->get('category')->row();
			$this->db->where('category_id', $category->id);
		}
		if($this->agent->is_mobile()){
			$this->db->select('name, image, cover_mobile as cover, teaser, desc, slug, price');
		}else{
			$this->db->select('name, image, cover as cover, teaser, desc, slug, price');
		}
		$content['store'] = $this->store;
		$content['item'] = $this->db->order_by('rank asc')->get('item')->result();
		$this->db->where('store_id', $this->store->id);
		$content['category'] = $this->db->get('category')->result();
		$data['content'] = $this->load->view('produk_view', $content, TRUE);
		if($slug){
			$data['meta'] = [
				'title'=>$category->title,
				'desc'=>$category->desc,
			];
		}else{
			$data['meta'] = [
				'title'=>'Produk | '.$this->store->title,
				'desc'=>$this->store->desc,
				'keyword'=>$this->store->keyword,
				'image'=>base_url($this->store->image),
			];	
		}

		$this->load->view('template_view', $data);
	}

	public function detail($slug)
	{
		$this->db->where('store_id', $this->store->id);
		$content['store'] = $this->store;
		$content['item'] = $this->db->where('slug', $slug)->get('item')->row();
		$data['content'] = $this->load->view('detail_view', $content, TRUE);
		$data['meta'] = [
			'title'=>$content['item']->name,
			'desc'=>$content['item']->teaser,
			'keyword'=>$content['item']->keyword,
			'image'=>base_url($content['item']->image),
		];
		$this->load->view('template_view', $data);
	}

}
