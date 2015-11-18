<?php
/**
 * Created by PhpStorm.
 * User: tushar
 * Date: 18/11/15
 * Time: 1:27 PM
 */

function do_upload()
{
    $ci=CI::get_instance();
    $config['upload_path']          = './uploads/';
    $config['allowed_types']        = 'gif|jpg|png';
    $config['max_size']             = 1000;
    $config['max_width']            = 1920;
    $config['max_height']           = 768;
    $config['encrypt_name'] = TRUE;
    $ci->load->library('upload', $config);

    if ( ! $ci->upload->do_upload('userfile'))
    {
        $error = array('error' => $ci->upload->display_errors());
        return null;
    }
    else
    {
        $data = array('upload_data' => $ci->upload->data());
        return $data['upload_data']['file_name'];

    }
}