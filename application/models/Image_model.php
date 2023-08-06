<?php date_default_timezone_set('Asia/Kolkata');
class Image_model extends CI_model
{
    public function save()
    {
        $udata = $this->session->userdata('id');
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $captureCount = $_POST['captureCount'];
            $folderPath = "uploads/";
    
            for ($i = 1; $i <= $captureCount; $i++) {
                $img = $_POST["hdimg{$i}"];
                if ($img) {
                    $fetch_imgParts = explode(";base64,", $img);
                    $image_type_aux = explode("image/", $fetch_imgParts[0]);
                    $image_type = $image_type_aux[1];
    
                    $image_base64 = base64_decode($fetch_imgParts[1]);
                    $img_name = uniqid() . '.png';
    
                    $file = $folderPath . $img_name;
                    file_put_contents($file, $image_base64);
    
                    $data = array(
                        'im_img_name' => $img_name,
                        'm_id' => $udata->m_admin_id
                    );
    
                    $this->db->insert('master_img_tbl', $data);
                }
            }
            return true;
        }
        return false;
    }

    public function get_list()
    {
        $udata = $this->session->userdata('id');
        return $this->db->select('*')->where('m_id', $udata->m_admin_id)->get('master_img_tbl')->result();
    }

    public function delteimg(){
        $this->db->where('id', $this->input->get('id'));
        return$this->db->delete('master_img_tbl');
    }
    
}
