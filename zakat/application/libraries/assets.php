 <?php
	defined('BASEPATH') or exit('No direct script access allowed');

	class Assets
	{
		protected $ci;

		public function __construct()
		{
			$this->ci = &get_instance();
		}

		public function get($dir)
		{
			return "http://localhost/zakat/assets/" . $dir;
		}
	}
 
 /* End of file assets.php */
 /* Location: ./application/libraries/assets.php */
