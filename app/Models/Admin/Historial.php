<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Historial extends Model
{
    Protected $table = "historial";
        protected $fillable = ['paciente_id','consulta_id', 't_sangre', 'vivienda', 'agua', 'alcantarillado', 'luz',
        'p_h_a','p_varices','p_diabetes','p_renal','p_pulmonar','p_hepatopatia','p_mamaria','p_genitales','p_cardiopatias','p_gastrointestinal','p_its','p_chagas','p_detalles',
        'f_h_a','f_varices','f_diabetes','f_renal','f_pulmonar','f_hepatopatia','f_mamaria','f_genitales','f_cardiopatias','f_gastrointestinal','f_its','f_chagas','f_detalles',
        'np_fisica','np_alcoholismo','np_tabaquismo','np_sustancias','np_detalles',
        'o_alergias','o_cirugias','o_traumatismos','o_medicamentos','o_transfusionales','o_detalles',
        'g_embarazos','g_gestante','g_c_mama','g_detalles'
    ];
}
