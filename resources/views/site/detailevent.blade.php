@extends('layouts.sitedefault')
@section('titlepage')
Tất cả bài viết
@stop
@section('event_active')
	class="active"
@stop
@section('body')
<br/><br/><br/><br/>
<!--=========== BEGIN COURSE BANNER SECTION ================-->
    <section id="courseArchive">
      <div class="container">
        <div class="row">
          <!-- start course content -->
          <div class="col-lg-8 col-md-8 col-sm-8">
            <div class="courseArchive_content">
              <div class="row">
				<!-- start single blog -->
                <div class="col-lg-12 col-12 col-sm-12">
                  <div class="single_blog">
                    <!-- start events slider -->
                    <!-- End events slider -->
                    <h2 class="blog_title"><a href="{{route('mmt::detailevent',$item->id)}}"><?php echo $item->task_name;?></a></h2>
                    <div class="blog_commentbox">
                      <p><i class="fa fa-clock-o"></i>Thời gian: 
						<?php 
							if($item->alltime==0): 
								echo $item->start."-".$item->end.",".date('d m Y',strtotime($item->date)); 
							else: 
								echo date('d m Y',strtotime($item->start))."-".date('d m Y',strtotime($item->end));
							endif;
						?>
					  </p>
                      <p><i class="fa fa-map-marker"></i>Địa điểm: <?php echo $item->location;?></p>                      
                    </div>
                    <p><?php echo $item->description;?></p>
                    <p>Người Thực Hiện:</p>
                    <ul>
						<?php foreach($teacher as $t):?>
							<li><span class="fa fa-angle-double-right"></span><?php echo Helps::getTeacher($t->teacherid)->teacher_name;?></li>
						<?php endforeach;?>
                    </ul>
                    
                  </div>
                  
                </div>
                <!-- End single blog -->   
              </div>
            </div>
          </div>
          <!-- End course content -->

          <!-- start course archive sidebar -->
        </div>
      </div>
    </section>
    <!--=========== END COURSE BANNER SECTION ================-->
@stop
