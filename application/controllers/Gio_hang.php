<?
class Gio_hang extends CI_Controller {
    var $_breadcrumb = array();

    function __construct() {
        parent::__construct();
        $this->_breadcrumb = array_merge($this->_breadcrumb, array("Trang chủ" => site_url()));
    }

    public function index() {
        $this->_breadcrumb = array_merge($this->_breadcrumb, array("Giỏ hàng" => site_url($this->util->slug($this->router->fetch_class()))));
        
        $view_data = array();
		$view_data['carts'] 		= $this->cart->contents();
		$view_data['breadcrumb'] 	= $this->_breadcrumb;

		$tmpl_content = array();
		$tmpl_content["content"]   = $this->load->view("cart/index", $view_data, TRUE);
		$this->load->view("layout/view", $tmpl_content);
    }

    public function them() {
        $productId = $_POST['productId'];
        $qty = $_POST['qty'];

        if (empty($productId) || empty($qty)) {
            echo json_encode(false);
        } else {
            $product = $this->m_product->load($productId);
            if (!empty($product)) {
                $info = new stdClass();
                $info->product_id = $product->id;
                $image = $this->m_product_gallery->items($info,1);
                $product->image = !empty($image)?$image[0]->thumbnail:null;

                $data = array(
                    'id'        => $product->id,
                    'qty'       => $qty,
                    'price'     => $product->price,
                    'name'      => $product->title,
                    'thumbnail' => $product->image
                );
                $this->cart->insert($data);
                $carts = $this->cart->contents();
                echo json_encode($carts); 
            } else {
                echo json_encode(false); 
            }
        }
    }

    public function cap_nhat() {
        
    }

    public function xoa() {
        $rowId = $_POST['rowId'];
        if (empty($rowId)) {
            echo json_encode(false);
        } else {
            if($this->cart->remove($rowId)) {
                $carts = $this->cart->contents();
                echo json_encode($carts); 
            } else {
                echo json_encode(false);
            }
        }
    }
}