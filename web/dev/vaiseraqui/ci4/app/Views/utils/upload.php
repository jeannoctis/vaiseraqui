<?

//$this->load->library('tinypng', array('api_key' => 'YzPnCNc6bT3XJc8qDJmP8tmL4cHbYSRb'));

$mystuff = new App\Libraries\Tinypng();

$this->tinypng->

$testarConexao = $this->tinypng->testConnection();

if ($testarConexao === "Authenticated") {
    $testarConexao = TRUE;
} else {
    $testarConexao = FALSE;
}

if (!empty($_FILES["{$nomeArquivo}"]['name'])) {
    // unlink("./uploads/" . $this->tabela . $complemento . "/" . $data['resultado']->{"{$nomeArquivo}"});
    // Pass the full path and post data to the set_newstudent model
    $config['upload_path'] = "./uploads/{$this->tabela}/";
    $config['file_name'] = date("d-m-Y") . "-" . time() . t5f_sanitize_filename($_FILES["{$nomeArquivo}"]['name']);
    $config['allowed_types'] = 'gif|jpg|png|jpeg|svg|pdf|doc|docx';
    $config['max_size'] = 2500;

    $this->upload->initialize($config);

    //$this->load->library('upload', $config);

    if (!$this->upload->do_upload("{$nomeArquivo}")) {
        $error = array('error' => $this->upload->display_errors('<p>', '</p>'));
        print_r($error);
    } else {
        $_POST["{$nomeArquivo}"] = $config['file_name'];

        //  if($this->tinypng->testConnection() == "Authenticated") {
        if ($testarConexao) {
            $this->tinypng->fileCompress('./uploads/' . $this->tabela . '/' . $_POST["{$nomeArquivo}"], './uploads/' . $this->tabela . '/' . $_POST["{$nomeArquivo}"]);
        }
        //  }
        $image['img'] = $this->upload->data("{$nomeArquivo}");
    }
}
?>