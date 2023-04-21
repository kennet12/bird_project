<?
class Dat_hang extends CI_Controller {
    var $_breadcrumb = array();

    function __construct() {
        parent::__construct();
        $this->_breadcrumb = array_merge($this->_breadcrumb, array("Trang chủ" => site_url()));
        $this->_breadcrumb = array_merge($this->_breadcrumb, array("Đặt hàng" => site_url($this->util->slug($this->router->fetch_class()))));
    }

    public function index() {
       
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
    public function mua_hang() {
        if (empty($_POST)) {
            $this->session->set_flashdata("error", "Đặt hàng không thành công");
			redirect(site_url("dat-hang/that-bai"), "back");  
        }

        $carts = $this->cart->contents();
        if (empty($_POST['email']) || 
            empty($_POST['fullname']) || 
            empty($_POST['phone']) || 
            empty($_POST['address']) ||
            empty($carts)||
            empty($_COOKIE['basa_cart'])) {
            $this->cart->destroy();
            setcookie('basa_cart', null, -1, '/');
            $this->session->set_flashdata("error", "Đặt hàng không thành công");
            redirect(site_url("dat-hang/that-bai"), "back");     
        }
        $order_id = $this->m_order->get_next_value();

        $data = [];
        $data["email"] = $_POST['email'];
        $data["fullname"] = $_POST['fullname'];
        $data["phone"] = $_POST['phone'];
        $data["address"] = $_POST['address'];
        $data["message"] = !empty($_POST['message'])?$_POST['message']:'';
        $this->m_order->add($data);

        foreach($carts as $cart) {
            $data = [];
            $data["order_id"] = $order_id;
            $data["product_id"] = $cart['id'];
            $data["qty"] = $cart['qty'];
            $data["price"] = $cart['price'];
            $data["name"] = $cart['name'];
            $data["thumbnail"] = $cart['thumbnail'];
            $this->m_order_detail->add($data);
        }
        $cart = $this->cart->destroy();
        setcookie('basa_cart', null, -1, '/');

        redirect(site_url("dat-hang/thanh-cong"), "back");   
    }

    public function thanh_cong() {
        $this->_breadcrumb = array_merge($this->_breadcrumb, array("Mua Hàng" => site_url("dat-hang/mua-hang")));
        $view_data = array();
		$view_data['carts'] 		= $this->cart->contents();
		$view_data['breadcrumb'] 	= $this->_breadcrumb;
        $view_data['total']         = $this->cart->total();

		$tmpl_content = array();
		$tmpl_content["content"]   = $this->load->view("checkout/success", $view_data, TRUE);
		$this->load->view("layout/view", $tmpl_content);
    }

    public function that_bai() {
        $this->_breadcrumb = array_merge($this->_breadcrumb, array("Mua Hàng" => site_url("dat-hang/mua-hang")));
        
        $view_data = array();
		$view_data['carts'] 		= $this->cart->contents();
		$view_data['breadcrumb'] 	= $this->_breadcrumb;
        $view_data['total']         = $this->cart->total();

		$tmpl_content = array();
		$tmpl_content["content"]   = $this->load->view("checkout/failure", $view_data, TRUE);
		$this->load->view("layout/view", $tmpl_content);
    }
}