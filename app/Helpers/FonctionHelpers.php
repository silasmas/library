<?php

use App\Models\livre;
use Illuminate\Support\Facades\Route;

if (!function_exists('livreDisponible')) {
    function livreDisponible($livre_id)
    {
        $livre=livre::find($livre_id);

        $qte=$livre->qte_init-$livre->qte_sortie;
        if ($qte>0) {
           return true;
        } else {
           return false;
        }

    }
}
if (!function_exists('favorisVIsible')) {
    function favorisVIsible($page)
    {
        if ($page==Route::current()->getName()) {
           return true;
        } else {
           return false;
        }

    }
}
if (!function_exists('favorisVIsible')) {
    function favorisVIsible($page)
    {
        if ($page==Route::current()->getName()) {
           return true;
        } else {
           return false;
        }

    }
}