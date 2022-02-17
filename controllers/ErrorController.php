<?php

class errorController{
    
    public function index(){
        return '
        <div class="col-md-12 text-center">
        <h1> Error 404 </h1>
        <img class="img-fluid error-oops" src="'.base_url.'img/OOPS.png">
        </div>
        ';
                
    }
    
}
