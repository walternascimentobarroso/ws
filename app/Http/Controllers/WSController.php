<?php

namespace App\Http\Controllers;

class WSController extends Controller
{
    public function upload()
    {
        $filename = $_FILES["file"]["name"];
        $arquivo = $_FILES["file"]["tmp_name"];

        $path = env('DESTINO_PATH');
        $destino = $path . basename($filename, '.zip');

        mkdir($destino, 0777); // Cria diretorio

        $zip = new \ZipArchive();
        $zip->open($arquivo); // abre o arquivo
        $message = ($zip->extractTo($destino) == TRUE) ? 'Sucesso.' : 'Error.'; // Extrai o arquivo
        $zip->close(); // fecha o arquivo
        unlink($arquivo); // remove o arquivo

        return response()->json(['success' => $message]);
    }
}
