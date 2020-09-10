<?php

namespace App\Http\Controllers;

class WSController
{
    public function upload()
    {
        $filename = $_FILES["file"]["name"];
        $arquivo = $_FILES["file"]["tmp_name"];

        $path = dirname(__FILE__) . DIRECTORY_SEPARATOR;
        $destino = $path . basename($filename, '.zip');

        mkdir($destino, 0777); // Cria diretorio

        $zip = new \ZipArchive();
        $zip->open($arquivo); // abre o arquivo
        $message = ($zip->extractTo($destino) == TRUE) ? 'Sucesso.' : 'Error.'; // Extrai o arquivo
        $zip->close(); // fecha o arquivo
        unlink($arquivo); // remove o arquivo
        return response()->json(['success' => 'ok']);
    }
}
