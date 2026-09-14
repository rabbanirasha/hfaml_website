<?php

if (! function_exists('ceiling_excel')) {
    function ceiling_excel($number, $significance = 1)
    {
        if (! is_numeric($number) || ! is_numeric($significance)) {
            return false;
        }

        return ceil($number / $significance) * $significance;
    }
}