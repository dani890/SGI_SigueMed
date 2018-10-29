<?php

Class AntecedenteNotaMedica_Model extends CI_Model{
    
    private $table;
    public $IdAntecedente;
    public $IdNotaMedica;
    public $DescripcionAntecedente;
    
    public function __construct() {
        parent::__construct();
        
        $this->table = "AntecedenteNotaMedica";
        $this->load->database();
    }
    
    public function LoadRow($row){
        $this->IdAntecedente = $row->IdAntecedente;
        $this->IdNotaMedica = $row->IdNotaMedica;
        $this->DescripcionAntecedente = $row->DescripcionAntecedente;
    }
    
    
    public function ConsultarAntecedenteNotaMedicaPorId($IdAntecedente){
        
        $condition = "IdAntecedente =" . $IdAntecedente;
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();
        
        if($query->num_rows() == 1){
            $row = $query->row();
            $this->LoadRow($row);
            return $query->row_array();
        }else{
            return false;
        }
               
    }
    
}

