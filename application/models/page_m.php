<?php 
class Page_m extends MY_Model {

	protected $_table_name = 'pages';
	protected $_order_by = 'order';
	protected $_timestamps = FALSE;
	
	public $rules = array(
		'parent_id' => array(
			'field' => 'parent_id', 
			'label' => 'Parent', 
			'rules' => 'trim|intval'
		), 
		'template' 	=> array(
			'field' => 'template',
			'label' => 'Template',
			'rules' => 'trim|required|xss_clean'
		),
		'title' => array(
			'field' => 'title', 
			'label' => 'Title', 
			'rules' => 'trim|required|max_length[100]|xss_clean'
		), 
		'slug' => array(
			'field' => 'slug', 
			'label' => 'Slug', 
			'rules' => 'trim|required|max_length[100]|url_title|callback__unique_slug|xss_clean'
		), 
		'body' => array(
			'field' => 'body', 
			'label' => 'Body', 
			'rules' => 'trim|required'
		)
	);

	public function get_new(){
		$page = new stdClass();
		$page->title = '';
		$page->slug = '';
		$page->body = '';
		$page->order = '';
		$page->parent_id = 0;
		$page->template = 'pagea';
		return $page;


	}

	public function get_archive_link(){
		$page = parent::get_by(array('template' => 'news_archive'), TRUE);
		return isset($page->slug) ? $page->slug : '';
	}

	public function delete($id) {
		//delete a page
		parent::delete($id);
		//reset parent ID for its children
		$this->db->set(array(
			'parent_id' => 0
		))->where('parent_id', $id)->update($this->_table_name);
	}

	public function get_nested() {
		//order by parent_id so the parent page is always listed before the child page
		$this->db->order_by('parent_id','asc');
		$pages = $this->db->get('pages')->result_array();
		
		$array = array();
		foreach ($pages as $page) {
			if (! $page['parent_id']) {
				//this page has no parent
				$array[$page['id']] = $page;
			}
			else {
				//this is a child page
				$array[$page['parent_id']]['children'][] = $page;
			}
		}
		return $array;
	}

	public function save_order($pages) {
		if (count($pages)) {
			foreach ($pages as $order => $page) {
				//dump($page);
				if ($page['item_id'] != '') {
					$data = array('parent_id' => (int)$page['parent_id'], 'order' => $order );
					$this->db->set($data)->where($this->_primary_key, $page['item_id'])->update($this->_table_name);
					//echo '<pre>'.$this->db->last_query().'</pre>';
				}
			}
		}
	}

	public function get_with_parent($id = NULL, $single = FALSE){
		$this->db->select('pages.*, p.slug as parent_slug, p.title as parent_title');
		$this->db->join('pages as p', 'pages.parent_id = p.id', 'left');
		return parent::get($id, $single);

	}

	public function get_no_parents() {
		//Fetch pages without parents
		$this->db->select('id, title');
		$this->db->where('parent_id', 0);
		$pages = parent::get();

		//Return key => value pair array
		$array = array(
			0 => 'No parent'
		);
		if ( count($pages) ) {
			foreach($pages as $page) {
				$array[$page->id] = $page->title ; 
			}
		}
		return $array;
	}


}