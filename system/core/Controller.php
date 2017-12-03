<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');
 
class Controller
{
    // Đối tượng view
    protected $view     = NULL;
     
    // Đối tượng model
    protected $model    = NULL;
     
    // Đối tượng library
    protected $library  = NULL;
     
    // Đối tượng helper
    protected $helper   = NULL;
     
    // Đối tượng config
    protected $config   = NULL;

    // Đối tượng database
    protected $database   = NULL;
     
    /**
     * Hàm khởi tạo
     * 
     * @desc    Load các thư viện cần thiết
     */
    public function __construct($is_controller = true) 
    {
        // Loader cho config
        require_once PATH_SYSTEM . '/core/loader/Config_Loader.php';
        $this->config   = new Config_Loader();
        $this->config->load('config');
        // Loader Library
        require_once PATH_SYSTEM . '/core/loader/Library_Loader.php';
        $this->library = new Library_Loader();
        // Load Helper
        require_once PATH_SYSTEM . '/core/loader/Helper_Loader.php';
        $this->helper = new Helper_Loader();
        // Load View
        require_once PATH_SYSTEM . '/core/loader/View_Loader.php';
        $this->view = new View_Loader();
        //Load Database
        require_once PATH_SYSTEM . '/core/connector/MySql_Connector.php';
        $database = new MySql_Connector();
        $this->database = $database->getConnection();

    }

}