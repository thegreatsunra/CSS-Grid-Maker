<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Generate extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$framework = '960';
		
		if ($framework == 'default')
		{
			$delimiter = '-';
			$grid_slug = '.span';
			$column_number = 12;
			$column_width = 60;
			$gutter_width = 20;
			$width_unit = 'px';
			$gutter_number = ($column_number - 1);
			$container_width = (($column_width * $column_number) + ($gutter_width * $gutter_number));
			$split_gutters = FALSE;
		}
		
		if ($framework == 'fluid')
		{
			$delimiter = '-';
			$grid_slug = '.span';
			$column_number = 12;
			$column_width = 6.382978723404255;
			$gutter_width = 2.127659574468085;
			$width_unit = '%';
			$gutter_number = ($column_number - 1);
			$container_width = (($column_width * $column_number) + ($gutter_width * $gutter_number));
			$split_gutters = FALSE;
		}
		
		if ($framework == 'blueprint')
		{
			$delimiter = '-';
			$grid_slug = '.span';
			$column_number = 24;
			$column_width = 30;
			$gutter_width = 10;
			$width_unit = 'px';
			$gutter_number = ($column_number - 1);
			$container_width = (($column_width * $column_number) + ($gutter_width * $gutter_number));
			$split_gutters = FALSE;
		}
			
		if ($framework == '960')
		{
			$delimiter = '_';
			$grid_slug = '.grid';
			$column_number = 12;
			$column_width = 60;
			$gutter_width = 20;
			$width_unit = 'px';
			$gutter_number = ($column_number - 1);
			$container_width = (($column_width * $column_number) + ($gutter_width * $gutter_number) + $gutter_width);
			$split_gutters = TRUE;
		}
		
		$gutter_number = ($column_number - 1);
		$data['css'] = ".container{width:$container_width$width_unit;margin:0 auto 0 auto;}\n";
		for ($i = 1; $i <= $column_number; $i++)
		{
			$data['css'] .= $grid_slug . $delimiter . $i;
			if ($i != $column_number) {$data['css'] .= ',';}
		}
		
		$data['css'] .= '{display:inline;position:relative;float:left;';
		
		if ($split_gutters == TRUE)
		{
			$data['css'] .= 'margin-left:' . ($gutter_width / 2) . $width_unit . ';margin-right:' . ($gutter_width / 2) . $width_unit;
		} else 
		{
			$data['css'] .= 'margin-right:' . $gutter_width . $width_unit;
		}
		$data['css'] .= ";}\n";

		for ($i = 1; $i <= $column_number; $i++)
		{
			$data['css'] .= $grid_slug . $delimiter . $i . "{width:" . (($column_width * $i) + ($gutter_width * ($i - 1))) . $width_unit . ";";
			if (($i == $column_number) && ($split_gutters == FALSE))
			{
				$data['css'] .= 'margin-right:0;';
			}
			$data['css'] .= "}\n";
		}
	
		if ($split_gutters != TRUE) {
			$data['css'] .= ".last{margin-right:0 !important;}\n";
		}
	
	
		$this->load->view('generate_css', $data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */