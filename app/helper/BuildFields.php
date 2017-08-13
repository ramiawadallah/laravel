<?php 

function BuildFields($name , $value = null , $type="text" ,$other = null){
    $lang = \Mcamara\LaravelLocalization\Facades\LaravelLocalization::getSupportedLanguagesKeys();
    $out = "";
    
    if($other != null)
    {
        $others = "";
        foreach($other as $key => $o){
            $others .= "$key ='$o' ";
        }
    }else{
        $others = null;
    }

    foreach($lang as  $key => $lan){
        $newValue = $value != null ? $value[$lan] : null;
        $out .='<div class="form-group">';
        $out .='<div class="form-line">';
        $out .='<label for="'.$name.'" >'.ucfirst($name).' Language '.$lan.'</label >';
        if($type != 'textarea'){
            $out .='<input type = "'.$type.'" class="form-control"  name="'.$name.'['.$lan.']" id = "name" placeholder="'.$name.' in '.$lan.'" '.$others.' value="'.$newValue.'"  />';
        }else{
            $out .='<textarea  name="'.$name.'['.$lan.']" id = "name" class="form-control"   placeholder="'.$name.' in '.$lan.'" '.$others.'>'.$newValue.'</textarea>';
        }
        $out .='</div>';
        $out .='</div >';
    }

    return $out;
}

