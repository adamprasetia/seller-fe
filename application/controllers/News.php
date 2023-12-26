<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News extends CI_Controller {

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
		if($this->input->get('search', true)){
			$this->db->like('title', $this->input->get('search', true));
		}
		$this->load->library('user_agent');
		$content['store'] = $this->store;
        
		$this->db->where('store_id', $this->store->id);
		$this->db->where('status', 'PUBLISH');
        $this->db->order_by('published_at desc');
		$this->db->limit(9);
		$content['news'] = $this->db->order_by('published_at asc')->get('news')->result();
		$this->db->where('store_id', $this->store->id);
		$data['content'] = $this->load->view('news_view', $content, TRUE);
        $data['meta'] = [
            'title'=>'News | '.$this->store->title,
            'desc'=>$this->store->desc,
            'keyword'=>$this->store->keyword,
            'image'=>base_url($this->store->image),
        ];	

		$this->load->view('template_view', $data);
	}

	public function detail($slug)
	{
		$this->db->where('store_id', $this->store->id);
		$content['store'] = $this->store;
		$content['news'] = $this->db->where('slug', $slug)
        ->where('status', 'PUBLISH')
        ->where('deleted_at', null)
        ->get('news')->row();
        if(empty($content['news'])){
            show_404();
        }
		$this->db->where('store_id', $this->store->id);
		$content['category'] = $this->db->get('category')->result();

		$this->db->where('store_id', $this->store->id);
		$this->db->where('status', 'PUBLISH');
		$this->db->where('slug !=', $slug);
        $this->db->order_by('published_at desc');
		$this->db->limit(3);
		$content['news_lain'] = $this->db->order_by('published_at asc')->get('news')->result();

		$this->db->where('store_id', $this->store->id);
		$this->db->where('active', 'Y');
		$this->db->where('deleted_at', null);
		$this->db->where('slug !=', $slug);
		$this->db->limit(3);
		$content['item'] = $this->db->order_by('rank asc')->get('item')->result();


		$data['content'] = $this->load->view('news_detail_view', $content, TRUE);
		$data['meta'] = [
			'title'=>$content['news']->title,
			'desc'=>$content['news']->desc,
			'image'=>base_url($content['news']->image),
		];
		$this->load->view('template_view', $data);
	}

}
