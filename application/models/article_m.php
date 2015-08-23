 <?php 
class Article_m extends MY_Model 
{
	protected $_table_name = "articles";
	protected $_order_by = 'pubdate desc, id desc';
	protected $_timestamps = TRUE;

	public $rules = array(
		'pubdate' => array(
			'field' => 'pubdate', 
			'label' => 'Publication date', 
			'rules' => 'trim|required|exact_length[10]|xss_clean'
		), 
		'title' => array(
			'field' => 'title', 
			'label' => 'Title', 
			'rules' => 'trim|required|max_length[100]|xss_clean'
		), 
		'slug' => array(
			'field' => 'slug', 
			'label' => 'Slug', 
			'rules' => 'trim|required|max_length[100]|url_title|xss_clean'
		), 
		'body' => array(
			'field' => 'body', 
			'label' => 'Body', 
			'rules' => 'trim|required'
		)
	);

	public function get_new (){
		$article = new stdClass();
		$article->title = '';
		$article->slug = '';
		$article->body = '';
		$article->pubdate = date('Y-m-d');
		return $article;
	}

	public function set_published() {
		$this->db->where('pubdate <= ', date('Y-m-d'));
	}

	public function set_filtered($str_search){
		$where = "(title LIKE '%{$str_search}%' OR body LIKE '%{$str_search}%')";
		$this->db->where($where);
	}

	public function apply_search() {
		if ($this->input->post() ) {
			//save the value of keyword into session, in case the value is blank, list all
			$search_term = trim($this->input->post('keyword'));
			$this->session->set_userdata('search_term', $search_term);
			$this->article_m->set_filtered($search_term);

		} else if($this->session->userdata('search_term') != '') {
			$search_term = $this->session->userdata('search_term');
			$this->article_m->set_filtered($search_term);
		}
	}

	public function get_recent($limit = 3) {
		//Fetch a limited number of recent articles
		$limit = (int) $limit;
		$this->set_published();
		$this->db->limit($limit);
		return parent::get();
	}
}