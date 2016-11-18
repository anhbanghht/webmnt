@extends('layouts.sitedefault')
@section('titlepage')
Tất cả bài viết
@stop
@section('new_active')
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
				<?php foreach($items as $p):?>
                <!-- start single course -->
                <div class="col-lg-6 col-md-6 col-sm-6">
                  <div class="single_course wow fadeInUp">
                    <div class="singCourse_imgarea">
                      <img src="{{ URL::asset('uploads/images/'.$p->image) }}" />
                      <div class="mask">                         
                        <a href="{{route('mmt::detailpage',$p->id)}}" class="course_more">View Course</a>
                      </div>
                    </div>
                    <div class="singCourse_content">
                    <h3 class="singCourse_title"><a href="{{route('mmt::detailpage',$p->id)}}"><?php echo $p->title;?></a></h3>
                    <p><?php echo $p->description;?></p>
                    </div>
                  </div>
                </div>
                <!-- End single course -->
				<?php endforeach;?>
              </div>
              <!-- start previous & next button -->
              <div class="single_blog_prevnext">
					<?php echo $items->links(); ?>
              </div>
            </div>
          </div>
          <!-- End course content -->

          <!-- start course archive sidebar -->
          <div class="col-lg-4 col-md-4 col-sm-4">
            <div class="courseArchive_sidebar">
              <!-- start single sidebar -->
              <div class="single_sidebar">
                <h2>Sự kiện <span class="fa fa-angle-double-right"></span></h2>
                <ul class="news_tab">
					<?php $getdate=date('Y-m-d');?>
					<?php foreach($task as $t):?>
							<li>
								<div class="media">
								  <div class="media-body">
								   <a href="{{route('mmt::detailevent',$t->id)}}"><?php echo $t->task_name;?></a>
								  </div>
								</div>
							</li>
					<?php endforeach;?> 
                </ul>
				<a class="see_all" href="{{route('mmt::allevent')}}">Xem tất cả</a>
              </div>
              <!-- End single sidebar -->
              <!-- start single sidebar -->
              <div class="single_sidebar">
                <h2>Liên kết nhanh <span class="fa fa-angle-double-right"></span></h2>
                <ul>
                  <li><a href="#">Link 1</a></li>
                  <li><a href="#">Link 2</a></li>
                  <li><a href="#">Link 3</a></li>
                  <li><a href="#">Link 4</a></li>
                  <li><a href="#">Link 5</a></li>
                </ul>
              </div>
              <!-- End single sidebar -->
              <!-- start single sidebar -->
              <div class="single_sidebar">
                <h2>Sponsor Add <span class="fa fa-angle-double-right"></span></h2>
                <a class="side_add" href="#"><img src="img/side-add.jpg" alt="img"></a>
              </div>
              <!-- End single sidebar -->
            </div>
          </div>
          <!-- start course archive sidebar -->
        </div>
      </div>
    </section>
    <!--=========== END COURSE BANNER SECTION ================-->
@stop
