<?php

if ( ! function_exists("is_own")) {
    function is_own($id)
    {
        return auth()->user()->id == $id;
    }
}

if ( ! function_exists("user")) {
    function user()
    {
        return auth()->user();
    }
}
