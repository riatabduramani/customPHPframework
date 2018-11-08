<?php
/**
 * Created by Riat Abduramani
 * Date: 11/2/2018
 * Time: 11:13 AM
 */

function removeExtension($file) {

    if(!empty($file)) {
        $path_parts = pathinfo($file, PATHINFO_FILENAME);
        $file = preg_replace('/[^A-Za-z0-9]/', "", $path_parts);
    }

    return $file;
}

