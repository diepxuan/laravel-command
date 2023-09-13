<?php

if (!function_exists("ductnCliRunning")) {
    function ductnCliRunning()
    {
        return defined("DUCTNCLI") && DUCTNCLI;
    }
}
