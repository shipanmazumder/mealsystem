<?php
if (!function_exists('setMessage')) {

    function setMessage($key,$class,$message) {
       session()->flash($key, $message);
       session()->flash("class", $class);
        // session()->flash($key,'<div class="alert alert-'.$class.'">'.$message.'</div>');
        return true;
    }

}