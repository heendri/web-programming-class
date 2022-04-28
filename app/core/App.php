<?php
class App
{
    protected $controller = 'Home';
    protected $method  = 'index';
    protected $params = [];

    public function __construct()
    {
        $url = $this->parseURL();
        // var_dump($url);
        // var_dump($url[0]);

        // cek dulu apakah ada file controller yang sesuai dengan url
        // controller
        if (file_exists('../app/controllers/' . $url[0] . '.php')) {
            $this->controller = $url[0];
            unset($url[0]);
        }

        require_once '../app/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;

        // method
        // cek terlebih dahulu apakah method yang ada pada URL tersedia di class controller
        if (isset($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
                // var_dump($this->method);
            }
        }

        // params
        if (!empty($url)) {
            // var_dump($url);
            $this->params = array_values($url);
        }

        // jalankan controller dan method serta kirimkan params jika tersedia
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function parseURL()
    {
        if (isset($_GET['url'])) {
            // menghilangkan tanda / di akhir url
            $url = rtrim($_GET['url'], '/');
            // menghilangkan non alphanumeric character
            $url = filter_var($url, FILTER_SANITIZE_URL);
            // memecah url berdasarkan delimiter
            $url = explode('/', $url);
            return $url;
        }
    }
}
