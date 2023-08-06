<?php date_default_timezone_set('Asia/Kolkata');
class Login_model extends CI_model
{
	public function validate_user()
	{
		$password = $this->input->post('password');
		$this->db->select('m_admin_id');
		$this->db->where('m_admin_email', $this->input->post('email'));
		$this->db->where('m_admin_pass', md5($password));
		$sql = $this->db->get('master_admin_tbl');
		if ($sql->num_rows() == 1) {
			return $sql->result();
		} else {
			return false;
		}
	}
	public function saveuser()
	{
		if ($_SERVER["REQUEST_METHOD"] === "POST") {
			$data = array(
				'm_admin_name' => $this->input->post('m_admin_name'),
				'm_admin_pass' => md5($this->input->post('password')),
				'm_admin_email' => $this->input->post('email'),
				'm_admin_contact' => $this->input->post('m_admin_contact'),
			);

			$this->db->insert('master_admin_tbl', $data);
			return true;
		}
		return false;
	}
}
