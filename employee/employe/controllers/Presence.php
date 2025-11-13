<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Presence extends MX_Controller
{

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		if ($this->session->userdata('sias-employee') == FALSE) {
			redirect('employee/auth');
		}
		$this->usr_employee = $this->session->userdata("sias-employee");
		$this->load->model('PresenceModel');
	}

	//
	//-------------------------------LIST EMPLOYEE------------------------------//
	//

	public function list_employe_presence_all_day()
	{
		$data['nav_employe_aca'] = 'menu-item-open';
		$data['nav_employe_aca_nxt'] = 'menu-item-open';
		$data['sub_nav_employe_aca_pre'] = 'menu-item-open';
		$data['sub_nav_employe_aca_pre_day'] = 'menu-item-active';

		$data['schoolyear'] = $this->PresenceModel->get_schoolyear();

		$this->template->load('template_employee/template_employee', 'employe_list_presence_all_day', $data);
		//$this->template->load('template_admin/template_admin', 'under_dev', $data);
	}

	public function list_employe_presence_all_month()
	{
		$data['nav_employe_aca'] = 'menu-item-open';
		$data['nav_employe_aca_nxt'] = 'menu-item-open';
		$data['sub_nav_employe_aca_pre'] = 'menu-item-open';
		$data['sub_nav_employe_aca_pre_month'] = 'menu-item-active';

		$data['schoolyear'] = $this->PresenceModel->get_schoolyear();

		$this->template->load('template_employee/template_employee', 'employe_list_presence_all_month', $data);
		//$this->template->load('template_admin/template_admin', 'under_dev', $data);
	}

	public function list_employe_presence_personal()
	{
		$data['nav_employe_pre'] = 'menu-item-open';
		$data['sub_nav_employe_pre'] = 'menu-item-active';

		$data['schoolyear'] = $this->PresenceModel->get_schoolyear();
		$data['present'] = $this->PresenceModel->get_present_by_id($this->usr_employee[0]->id_pegawai);

		$this->template->load('template_employee/template_employee', 'employe_list_presence_personal', $data);
		//$this->template->load('template_admin/template_admin', 'under_dev', $data);
	}

	public function detail_employe_presence($id = '')
	{
		$id = paramDecrypt($id);

		$data['present'] = $this->PresenceModel->get_employe_present_id($id); //? 

		if ($data['present'] == FALSE or empty($id)) {
			$datas['title'] = 'ERROR | PAGE NOT FOUND';
			$this->load->view('error_404', $datas);
		} else {
			$this->template->load('template_employee/template_employee', 'employe_detail_presence', $data);
		}
	}

	public function get_data_presence_month()
	{
		// get all raw data
		$data = $this->PresenceModel->get_present_all_month($this->usr_employee[0]->level_jabatan, $this->usr_employee[0]->level_tingkat);

		// count data
		$totalRecords = $totalDisplay = count($data);

		// filter by general search keyword
		if (isset($_REQUEST['search'])) {
			$data         = $this->filterKeyword($data, $_REQUEST['search']);
			$totalDisplay = count($data);
		}

		if (isset($_REQUEST['columns']) && is_array($_REQUEST['columns'])) {
			foreach ($_REQUEST['columns'] as $column) {
				if (isset($column['search'])) {
					$data         = $this->filterKeyword($data, $column['search'], $column['data']);
					$totalDisplay = count($data);
				}
			}
		}

		// sort
		if (isset($_REQUEST['order'][0]['column']) && $_REQUEST['order'][0]['dir']) {
			$column = $_REQUEST['order'][0]['column'];
			$dir    = $_REQUEST['order'][0]['dir'];
			usort($data, function ($a, $b) use ($column, $dir) {
				$a = array_slice($a, $column, 1);
				$b = array_slice($b, $column, 1);
				$a = array_pop($a);
				$b = array_pop($b);

				if ($dir === 'asc') {
					return $a > $b ? true : false;
				}

				return $a < $b ? true : false;
			});
		}

		// pagination length
		if (isset($_REQUEST['length'])) {
			$data = array_splice($data, $_REQUEST['start'], $_REQUEST['length']);
		}

		// return array values only without the keys
		if (isset($_REQUEST['array_values']) && $_REQUEST['array_values']) {
			$tmp  = $data;
			$data = [];
			foreach ($tmp as $d) {
				$data[] = array_values($d);
			}
		}

		$result = [
			'recordsTotal'    => $totalRecords,
			'recordsFiltered' => $totalDisplay,
			'data'            => $data,
		];

		header('Content-Type: application/json');
		header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
		header('Access-Control-Allow-Headers: Content-Type, Content-Range, Content-Disposition, Content-Description');

		echo json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
	}

	public function get_data_presence_day()
	{
		$param = $this->input->post();
		$data = $this->security->xss_clean($param);
		// get all raw data
		$data = $this->PresenceModel->get_present_all_day($this->usr_employee[0]->level_jabatan, $this->usr_employee[0]->level_tingkat, $data['start_date'], $data['end_date']);
		
		// count data
		$totalRecords = $totalDisplay = count($data);

		// filter by general search keyword
		if (isset($_REQUEST['search'])) {
			$data         = $this->filterKeyword($data, $_REQUEST['search']);
			$totalDisplay = count($data);
		}

		if (isset($_REQUEST['columns']) && is_array($_REQUEST['columns'])) {
			foreach ($_REQUEST['columns'] as $column) {
				if (isset($column['search'])) {
					$data         = $this->filterKeyword($data, $column['search'], $column['data']);
					$totalDisplay = count($data);
				}
			}
		}

		// sort
		if (isset($_REQUEST['order'][0]['column']) && $_REQUEST['order'][0]['dir']) {
			$column = $_REQUEST['order'][0]['column'];
			$dir    = $_REQUEST['order'][0]['dir'];
			usort($data, function ($a, $b) use ($column, $dir) {
				$a = array_slice($a, $column, 1);
				$b = array_slice($b, $column, 1);
				$a = array_pop($a);
				$b = array_pop($b);

				if ($dir === 'asc') {
					return $a > $b ? true : false;
				}

				return $a < $b ? true : false;
			});
		}

		// pagination length
		if (isset($_REQUEST['length'])) {
			$data = array_splice($data, $_REQUEST['start'], $_REQUEST['length']);
		}

		// return array values only without the keys
		if (isset($_REQUEST['array_values']) && $_REQUEST['array_values']) {
			$tmp  = $data;
			$data = [];
			foreach ($tmp as $d) {
				$data[] = array_values($d);
			}
		}

		$result = [
			'recordsTotal'    => $totalRecords,
			'recordsFiltered' => $totalDisplay,
			'data'            => $data,
		];

		header('Content-Type: application/json');
		header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
		header('Access-Control-Allow-Headers: Content-Type, Content-Range, Content-Disposition, Content-Description');

		echo json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
	}

	//-------------------------REMOTE PRESENCE---------------------------------------------//
	//

	public function list_filter($list, $args = array(), $operator = 'AND')
	{
		if (!is_array($list)) {
			return array();
		}

		$util = $this->load->library("list_util", $list);

		return $util->filter($args, $operator);
	}


	public function filterArray($array, $allowed = [])
	{
		return array_filter(
			$array,
			function ($val, $key) use ($allowed) { // N.b. $val, $key not $key, $val
				return isset($allowed[$key]) && ($allowed[$key] === true || $allowed[$key] === $val);
			},
			ARRAY_FILTER_USE_BOTH
		);
	}

	public function filterKeyword($data, $search, $field = '')
	{
		$filter = '';
		if (isset($search['value'])) {
			$filter = $search['value'];
		}
		if (!empty($filter)) {
			if (!empty($field)) {
				if (strpos(strtolower($field), 'format') !== false) {
					// filter by date range
					$data = $this->filterByDateRange($data, $filter, $field);
				} else {
					// filter by column
					$data = array_filter($data, function ($a) use ($field, $filter) {
						return (bool) preg_match("/$filter/i", $a[$field]);
					});
				}
			} else {
				// general filter
				$data = array_filter($data, function ($a) use ($filter) {
					return (bool) preg_grep("/$filter/i", (array) $a);
				});
			}
		}

		return $data;
	}

	public function filterByDateRange($data, $filter, $field)
	{
		// filter by range
		if (!empty($range = array_filter(explode('|', $filter)))) {
			$filter = $range;
		}

		if (is_array($filter)) {
			foreach ($filter as &$date) {
				// hardcoded date format
				$date = date_create_from_format('d/m/Y', stripcslashes($date));
			}
			// filter by date range
			$data = array_filter($data, function ($a) use ($field, $filter) {
				// hardcoded date format
				$current = date_create_from_format('d/m/Y', $a[$field]);
				$from    = $filter[0];
				$to      = $filter[1];
				if ($from <= $current && $to >= $current) {
					return true;
				}

				return false;
			});
		}

		return $data;
	}
}
