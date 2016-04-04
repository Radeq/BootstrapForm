<?php
namespace RadeqBootstrapForm2\Model;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Interfejs formularza
 */
interface InputInterface {
    /**
     * Zwraca typ formularza
     */
    public function getType();
    
    /**
     * Generuje pole
     * @return string
     */
    public function show();
}
