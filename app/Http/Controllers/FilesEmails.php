<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FilesEmails extends Controller
{
    //
    public function uploadfile(Request $request)
    {
        $Entrada = $_POST["txtEntradaTemp"];
        $target_file = basename($_FILES["fl_adjuntos"]["name"]);
        $target_dir = "files/entradas/adjuntos/".$Entrada;

        if (!file_exists($target_dir)) {
            mkdir($target_dir);
        }

        if (move_uploaded_file($_FILES["fl_adjuntos"]["tmp_name"], $target_dir ."/".$target_file)) 
        {
            echo "The file ". basename( $_FILES["fl_adjuntos"]["name"]). " has been uploaded.";
        } 
        else 
        {
            echo "Sorry, there was an error uploading your file. file: " . basename( $_FILES["fl_adjuntos"]["name"]);
        }
        echo "<script>location.href= '/entradas/".$Entrada."';</script>";
    }
    public function downloadFile($dir, $filename)
    {
        return response()->download("files/entradas/adjuntos/".$dir."/".$filename);
        echo "<script>location.href= '/entradas/".$dir."';</script>";
    }
    public function deleteFile($dir, $filename)
    {
        $file = "files/entradas/adjuntos/".$dir."/".$filename;
        if(file_exists($file)) {
            unlink($file);
        } 
        echo "<script>location.href= '/entradas/".$dir."';</script>";
    }
}
