<?php

Class CatalogoRespuestaSeguimiento_Model extends CI_Model{
    
    private $table;
    public $IdRespuestaSeguimiento;
    public $DescripcionRespuestaSeguimiento;
    
    public function __construct() {
        parent::__construct();
        
        $this->table = "CatalogoRespuestaSeguimiento";
        $this->load->database();
    }
    
    private function LoadRow($row){
        $this->IdRespuestaSeguimiento = $row->IdRespuestaSeguimiento;
        $this->DescripcionRespuestaSeguimiento = $row->DescripcionRespuestaSeguimiento;
    }
    
    public function ConsultarCatalogoRespuestaSeguimietoPorId($IdRespuestaSeguimiento){
        $condition = "IdRespuestaSeguimiento =" . $IdRespuestaSeguimiento;
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
