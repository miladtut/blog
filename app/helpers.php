<?php
function upload($image){
    $image->store ('/','uploads');
    $img = 'uploads/'.$image->hashName();
    return $img;
}
