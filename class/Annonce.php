<?php

// cette clase va permetre de valider les données de l'annonce




Class AnnonceValidator{

    private $data;
    private $errors = [];
    private static $fields = ['title', 'category', 'brand', 'size', 'price', 'description'];

    public function __construct($post_data){
        $this->data = $post_data;
    }

    public function validateForm(){
        foreach(self::$fields as $field){
            if(!array_key_exists($field, $this->data)){
                trigger_error("$field is not present in data");
                return;
            }
        }
        $this->validateTitle();
        $this->validateCategory();
        $this->validateBrand();
        $this->validateSize();
        $this->validatePrice();
        $this->validateDescription();
        return $this->errors;
    }

    private function validateTitle(){
        $val = trim($this->data['title']);
        if(empty($val)){
            $this->addError('title', 'Le titre ne peut pas être vide');
        }else{
            if(!preg_match('/^[a-zA-Z0-9\s]+$/', $val)){
                $this->addError('title', 'Le titre ne peut contenir que des lettres, des chiffres et des espaces');
            }
        }
    }

    private function validateCategory(){
        $val = trim($this->data['category']);
        if(empty($val)){
            $this->addError('category', 'La catégorie ne peut pas être vide');
        }else{
            if(!preg_match('/^[a-zA-Z0-9\s]+$/', $val)){
                $this->addError('category', 'La catégorie ne peut contenir que des lettres, des chiffres et des espaces');
            }
        }
    }

    private function validateBrand(){
        $val = trim($this->data['brand']);
        if(empty($val)){
            $this->addError('brand', 'La marque ne peut pas être vide');
        }else{
            if(!preg_match('/^[a-zA-Z0-9\s]+$/', $val)){
                $this->addError('brand', 'La marque ne peut contenir que des lettres, des chiffres et des espaces');
            }
        }
    }

    private function validateSize(){
        $val = trim($this->data['size']);
        if(empty($val)){
            $this->addError('size', 'La taille ne peut pas être vide');
        }else{
            if(!preg_match('/^[a-zA-Z0-9\s]+$/', $val)){
                $this->addError('size', 'La taille ne peut contenir que des lettres, des chiffres et des espaces');
            }
} 






?>  
