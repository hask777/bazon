<?php

function isActiveCategory($category, $output = 'active')
{
   return  request()->category == $category ? $output : '';
}