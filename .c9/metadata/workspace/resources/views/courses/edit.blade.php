{"filter":false,"title":"edit.blade.php","tooltip":"/resources/views/courses/edit.blade.php","undoManager":{"mark":20,"position":20,"stack":[[{"start":{"row":42,"column":43},"end":{"row":42,"column":80},"action":"remove","lines":["btn btn-flat btn-primary ink-reaction"],"id":2},{"start":{"row":42,"column":43},"end":{"row":42,"column":71},"action":"insert","lines":["btn ink-reaction btn-primary"]}],[{"start":{"row":4,"column":4},"end":{"row":16,"column":29},"action":"remove","lines":["<div class=\"section-body contain-lg\">","        <!-- BEGIN INTRO -->","    \t\t<div class=\"row\">","    \t\t\t<div class=\"col-lg-12\">","    \t\t\t\t<h1 class=\"text-primary\">Sửa thông tin Khóa học</h1>","    \t\t\t</div><!--end .col -->","    \t\t</div><!--end .row -->","    \t<!-- END INTRO -->","    \t<div class=\"row\">","           <div class=\"col-md-12\">","        \t\t<form class=\"form\" method=\"post\">","        \t\t    {{ csrf_field() }}","        \t\t\t<div class=\"card\">"],"id":3},{"start":{"row":4,"column":4},"end":{"row":20,"column":12},"action":"insert","lines":["<div class=\"section-body contain-lg\">","    \t<div class=\"row\">","           <div class=\"col-md-12\">","        \t\t<form class=\"form\" method=\"post\" enctype=\"multipart/form-data\">","        \t\t    {{ csrf_field() }}","        \t\t\t<div class=\"card card-underline\">","        \t\t\t\t<div class=\"card-head card-head-lg\">","\t\t\t\t\t\t\t<header>Thêm khóa học</header>","\t\t\t\t\t\t\t<div class=\"tools\">","\t\t\t\t\t\t\t\t<div class=\"btn-group\">","\t\t\t\t\t\t\t\t    @if( \\Auth::user()->has_permission( 'courses::' ) )","\t            \t\t\t\t        <a href=\"{{route('courses::')}}\" class=\"btn btn-icon-toggle btn-primary\" data-toggle=\"tooltip\" data-placement=\"top\" data-original-title=\"Danh sách khóa học\"><span class=\"md md-format-list-bulleted\"></span></a>","\t            \t\t\t\t    @endif","\t\t\t\t\t\t\t\t\t<a class=\"btn btn-icon-toggle btn-primary\" href=\"{{ URL::previous() }}\"  data-toggle=\"tooltip\" data-placement=\"top\" data-original-title=\"Trở lại\"><i class=\"fa fa-undo\"></i></a>","\t\t\t\t\t\t\t\t</div>","\t\t\t\t\t\t\t</div>","\t\t\t\t\t\t</div>"]}],[{"start":{"row":11,"column":16},"end":{"row":11,"column":19},"action":"remove","lines":["hêm"],"id":4}],[{"start":{"row":11,"column":15},"end":{"row":11,"column":16},"action":"remove","lines":["T"],"id":5}],[{"start":{"row":11,"column":15},"end":{"row":11,"column":16},"action":"insert","lines":["S"],"id":6}],[{"start":{"row":11,"column":16},"end":{"row":11,"column":17},"action":"insert","lines":["u"],"id":7}],[{"start":{"row":11,"column":16},"end":{"row":11,"column":17},"action":"remove","lines":["u"],"id":8},{"start":{"row":11,"column":16},"end":{"row":11,"column":17},"action":"insert","lines":["ư"]}],[{"start":{"row":11,"column":17},"end":{"row":11,"column":18},"action":"insert","lines":["a"],"id":9}],[{"start":{"row":11,"column":17},"end":{"row":11,"column":18},"action":"remove","lines":["a"],"id":10},{"start":{"row":11,"column":16},"end":{"row":11,"column":17},"action":"remove","lines":["ư"]},{"start":{"row":11,"column":16},"end":{"row":11,"column":17},"action":"insert","lines":["ử"]},{"start":{"row":11,"column":17},"end":{"row":11,"column":18},"action":"insert","lines":["a"]}],[{"start":{"row":11,"column":18},"end":{"row":11,"column":19},"action":"insert","lines":[" "],"id":11}],[{"start":{"row":11,"column":19},"end":{"row":11,"column":20},"action":"insert","lines":["t"],"id":12}],[{"start":{"row":11,"column":20},"end":{"row":11,"column":21},"action":"insert","lines":["h"],"id":13}],[{"start":{"row":11,"column":21},"end":{"row":11,"column":22},"action":"insert","lines":["o"],"id":14}],[{"start":{"row":11,"column":21},"end":{"row":11,"column":22},"action":"remove","lines":["o"],"id":15},{"start":{"row":11,"column":21},"end":{"row":11,"column":22},"action":"insert","lines":["ô"]}],[{"start":{"row":11,"column":22},"end":{"row":11,"column":23},"action":"insert","lines":["n"],"id":16}],[{"start":{"row":11,"column":23},"end":{"row":11,"column":24},"action":"insert","lines":["g"],"id":17}],[{"start":{"row":11,"column":24},"end":{"row":11,"column":25},"action":"insert","lines":[" "],"id":18}],[{"start":{"row":11,"column":25},"end":{"row":11,"column":26},"action":"insert","lines":["t"],"id":19}],[{"start":{"row":11,"column":26},"end":{"row":11,"column":27},"action":"insert","lines":["i"],"id":20}],[{"start":{"row":11,"column":27},"end":{"row":11,"column":28},"action":"insert","lines":["n"],"id":21}],[{"start":{"row":46,"column":90},"end":{"row":47,"column":91},"action":"remove","lines":["","        \t\t\t\t\t\t<a class=\"btn ink-reaction btn-primary\" href=\"{{ URL::previous() }}\">back</a>"],"id":22}]]},"ace":{"folds":[],"scrolltop":540,"scrollleft":0,"selection":{"start":{"row":46,"column":90},"end":{"row":46,"column":90},"isBackwards":false},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":{"row":82,"mode":"ace/mode/php"}},"timestamp":1464596572894,"hash":"4d3afdecd38884217f9e6a2c2b7c7014e074de86"}