<?
class Dat_hang extends CI_Controller {
    var $_breadcrumb = array();

    function __construct() {
        parent::__construct();
        $this->_breadcrumb = array_merge($this->_breadcrumb, array("Trang chủ" => site_url()));
    }

    public function index() {
        $this->_breadcrumb = array_merge($this->_breadcrumb, array("Đặt hàng" => site_url($this->util->slug($this->router->fetch_class()))));
        
        $carts = $this->cart->contents();
        setcookie('basa_cart', json_encode($carts), time() + (86400 * 30), "/");
        
        $view_data = array();
		$view_data['carts'] 		= $this->cart->contents();
		$view_data['breadcrumb'] 	= $this->_breadcrumb;
        $view_data['total']         = $this->cart->total();

		$tmpl_content = array();
		$tmpl_content["content"]   = $this->load->view("checkout/index", $view_data, TRUE);
		$this->load->view("layout/view", $tmpl_content);
    }
}