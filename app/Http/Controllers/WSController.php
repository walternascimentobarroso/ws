<?php

namespace App\Http\Controllers;

class WSController extends Controller
{
    public function hash()
    {
        $filename = $_FILES["file"]["name"];
        $arquivo = $_FILES["file"]["tmp_name"];
        $message = md5($filename);
        unlink($arquivo); // remove o arquivo
        return response()->json(['success' => 'ok', 'message' => $message]);
    }

    public function optimization()
    {
        // $script = env('DESTINO_SCRIPT');
        // exec($script, $output);
        exec('bash -c "exec nohup setsid $script > /dev/null 2>&1 &"');
        $output = env('DESTINO_SCRIPT');

        return response()->json(['success' => 'ok', 'message' => $output]);
    }

    public function upload()
    {
        ini_set("memory_limit", "2048M");
        ini_set("post_max_size", "2048M");
        ini_set("upload_max_filesize", "2048M");
        set_time_limit(0);
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

        return response()->json(['success' => 'ok', 'message' => $message]);
    }

    public function urlVideo()
    {
        $filename = env('DESTINO_POOLING_TXT');
        $arquivo = fopen($filename, 'r'); // Abre o Arquvio no Modo r (para leitura)
        while (!feof($arquivo)) { // Lê o conteúdo do arquivo
            $output = fgets($arquivo); //Mostra uma linha do arquivo
        }
        return response()->json(['success' => 'ok', 'message' => $output]);
    }
}
