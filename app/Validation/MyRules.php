<?php

namespace App\Validation;

class MyRules
{
    public function file_required($file, $field, array $data): bool
    {
        //echo '<br>';
        //var_dump($_FILES);echo "<br>";
        $archivo = $_FILES[$field];
        if ($archivo['name'] == '' && $archivo['type'] == '') {
            return false;
        } else {
            return true;
        }
    }
}
