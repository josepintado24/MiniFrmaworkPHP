<?php
class Controller
{
    public function cargarModelo(){
        $model=get_class($this)."Model";
    }
}
