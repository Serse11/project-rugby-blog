<?php 

class Service {

    public function moveFile(array $file): ?string {
        $file_path_image = null; 
        $folder =  dirname(__DIR__) . "/public/assets/images/upload";

        if (!file_exists($folder)) {
            mkdir($folder, 0777);
        }

        return $file_path_image;
    }

}