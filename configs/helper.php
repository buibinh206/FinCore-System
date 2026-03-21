<?php

if (!function_exists('debug')) {
    function debug($data)
    {
        echo '<pre>';
        print_r($data);
        die;
    }
}

if (!function_exists('upload_file')) {
    function upload_file($folder, $file)
    {
        $targetFile = $folder . '/' . time() . '-' . $file["name"];

        if (move_uploaded_file($file["tmp_name"], PATH_ASSETS_UPLOADS . $targetFile)) {
            return $targetFile;
        }

        throw new Exception('Upload file không thành công!');
    }
}

if (!function_exists('url')) {
    function url($action, $params = [])
    {
        $url = BASE_URL . $action;
        
        if (!empty($params)) {
            foreach ($params as $key => $value) {
                $url .= '/' . $value;
            }
        }
        
        return $url;
    }
}