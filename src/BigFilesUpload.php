<?php
/**
 * Created by PhpStorm.
 * User: Stoea_Leontin
 * Date: 02-May-18
 * Time: 4:04 PM
 */

namespace Codern;


class BigFilesUpload
{

    /**
     *
     */
    function getAllowedUploadFileTypesJSON(){
        $extensions = $this->getConfig('accepted_files_to_upload');
        $allowedExtensions = array();
        foreach ($extensions as $fileType => $ext){
            $newExt['title'] = $fileType;
            $newExt['extensions'] = implode(',', $ext);
            $allowedExtensions[] = $newExt;
        }
        return json_encode($allowedExtensions);
    }
}