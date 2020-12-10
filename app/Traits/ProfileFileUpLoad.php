<?php

namespace App\Traits;

trait FileSaver {

    public function fileUpLoad($file, $model, $database_field, $baseDirectory){
        if($file){
            try {
                $imageName = time() . "_" . $file->getClientOrginalName();
                $directory = 'Profile-Img/';
                $file->move($directory, $imageName);
                $model->update([
                    $database_field=>$directory . $imageName
                ]);
            }catch (\Exception $exception){

            }
        }


    }
}


?>
