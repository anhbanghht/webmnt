{"filter":false,"title":"educationprogram.php","tooltip":"/app/educationprogram.php","undoManager":{"mark":2,"position":2,"stack":[[{"start":{"row":0,"column":0},"end":{"row":24,"column":2},"action":"insert","lines":["<?php","","namespace App;","","use Illuminate\\Database\\Eloquent\\Model;","use Illuminate\\Database\\Eloquent\\SoftDeletes;","","class chuongtrinh extends Model{","    ","    use SoftDeletes; ","    ","    protected $table = 'chuongtrinhdaotao'; ","    ","    protected $dates = ['deleted_at','updated_at','created_at','startdate']; ","    ","    protected $primaryKey = 'id_ct'; ","    ","    public $incrementing = false;","    ","    //kết nối vs bảng khác","    // public function Monhoc(){","    //     return $this->hasMany('App\\monhoc','id_monhoc','id_monhoc');","    // }","}","?>"],"id":1}],[{"start":{"row":11,"column":24},"end":{"row":11,"column":41},"action":"remove","lines":["chuongtrinhdaotao"],"id":2},{"start":{"row":11,"column":24},"end":{"row":11,"column":40},"action":"insert","lines":["educationprogram"]}],[{"start":{"row":17,"column":33},"end":{"row":22,"column":8},"action":"remove","lines":["","    ","    //kết nối vs bảng khác","    // public function Monhoc(){","    //     return $this->hasMany('App\\monhoc','id_monhoc','id_monhoc');","    // }"],"id":3}]]},"ace":{"folds":[],"scrolltop":106.00001430511475,"scrollleft":0,"selection":{"start":{"row":17,"column":33},"end":{"row":17,"column":33},"isBackwards":false},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":{"row":6,"state":"php-start","mode":"ace/mode/php"}},"timestamp":1461751705031,"hash":"c94d7e8e291e9e1b337445aa107115640719fd1e"}