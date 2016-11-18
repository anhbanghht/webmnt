@extends('layouts.sitedefault')
@section('titlepage')
 Trang Chủ
@stop
@section('home_active')
	class="active"
@stop
@section('slide-body')
<!--=========== BEGIN SLIDER SECTION ================-->
    <section id="slider">
      <div class="row">
        <div class="col-lg-12 col-md-12">
          <div class="slider_area">
            <!-- Start super slider -->
            <div id="slides">
              <ul class="slides-container"> 
              <?php foreach($slide as $s):?>
                <li>
                  <img src="{{ URL::asset('uploads/images/'.$s->image)}}" alt="img">
                   <div class="slider_caption">
                    <h2><?php echo $s->title;?></h2>
                    <p><?php echo $s->description;?></p>
                    <a class="slider_btn" href="{{route('mmt::detailpage',$s->id)}}">Xem chi tiết</a>
                  </div>
                  </li>
                <!-- Start single slider-->
                <?php endforeach;?>
              </ul>
              <nav class="slides-navigation">
                <a href="#" class="next"></a>
                <a href="#" class="prev"></a>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--=========== END SLIDER SECTION ================-->
@stop
@section('body')
<!--=========== BEGIN ABOUT US SECTION ================-->
    <section id="aboutUs">
      <div class="container">
        <div class="row">
        <!-- Start about us area -->
        <div class="col-lg-6 col-md-6 col-sm-6">
          <div class="aboutus_area wow fadeInLeft">
            <h2 class="titile">Giới Thiệu</h2>
			<?php echo Helps::getCustomerTableOnly(1,'site_introduce')->content;?>
		</div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6">
          <div class="newsfeed_area wow fadeInRight">
            <ul class="nav nav-tabs feed_tabs" id="myTab2">
              <li class="active"><a href="#news" data-toggle="tab">Tin tức mới nhất</a></li>
              <li><a href="#notice" data-toggle="tab">Thông báo</a></li>
              <li><a href="#events" data-toggle="tab">Sự kiện</a></li>         
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
              <!-- Start news tab content -->
              <div class="tab-pane fade in active" id="news">                
                <ul class="news_tab">
				<?php foreach($new as $n):?>
					<li>
						<div class="media">
						  <div class="media-left">
							<a class="news_img" href="{{route('mmt::detailpage',$n->id)}}">
							  <img class="media-object" src="{{ URL::asset('uploads/images/'.$n->image) }}" alt="img">
							</a>
						  </div>
						  <div class="media-body">
						   <a href="{{route('mmt::detailpage',$n->id)}}"><?php echo $n->title;?></a>
						   <span class="feed_date"><?php echo date('d.m.Y',strtotime($n->created_at));?></span>
						  </div>
						</div>                    
					</li>
				<?php endforeach;?>
                </ul>                
                <a class="see_all" href="{{route('mmt::allarticle')}}">Xem tất cả</a>
              </div>
              <!-- Start notice tab content -->  
              <div class="tab-pane fade " id="notice">
                <ul class="news_tab">
				<?php foreach($notes as $n):?>
					<li>
						<div class="media">
						  <div class="media-body">
						   <a href="{{route('mmt::detailnotes',$n->id)}}"><?php echo $n->title;?></a>
						   <span class="feed_date"><?php echo date('d.m.Y',strtotime($n->created_at));?></span>
						  </div>
						</div>                    
					</li>
				<?php endforeach;?>
                </ul>                
                <a class="see_all" href="{{route('mmt::allnotes')}}">Xem tất cả</a>              
              </div>
              <!-- Start events tab content -->
              <div class="tab-pane fade " id="events">
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
                <a class="see_all" href="{{route('mmt::allevent')}}">See All</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      </div>
    </section>
    <!--=========== END ABOUT US SECTION ================--> 

    <!--=========== BEGIN WHY US SECTION ================-->
    <section id="whyUs">
      <!-- Start why us top -->
      <div class="row">        
        <div class="col-lg-12 col-sm-12">
          <div class="whyus_top">
            <div class="container">
              <!-- Why us top titile -->
              <div class="row">
                <div class="col-lg-12 col-md-12"> 
                  <div class="title_area">
                    <h2 class="title_two">Why Us</h2>
                    <span></span> 
                  </div>
                </div>
              </div>
              <!-- End Why us top titile -->
              <!-- Start Why us top content  -->
              <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3">
                  <div class="single_whyus_top wow fadeInUp">
                    <div class="whyus_icon">
                      <span class="fa fa-desktop"></span>
                    </div>
                    <h3>Technology</h3>
                    <p>when an unknown printer took a galley of type and scrambled it to make a type specimen book</p>
                  </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3">
                  <div class="single_whyus_top wow fadeInUp">
                    <div class="whyus_icon">
                      <span class="fa fa-users"></span>
                    </div>
                    <h3>Best Tutor</h3>
                    <p>when an unknown printer took a galley of type and scrambled it to make a type specimen book</p>
                  </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3">
                  <div class="single_whyus_top wow fadeInUp">
                    <div class="whyus_icon">
                      <span class="fa fa-flask"></span>
                    </div>
                    <h3>Practical Training</h3>
                    <p>when an unknown printer took a galley of type and scrambled it to make a type specimen book</p>
                  </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3">
                  <div class="single_whyus_top wow fadeInUp">
                    <div class="whyus_icon">
                      <span class="fa fa-support"></span>
                    </div>
                    <h3>Support</h3>
                    <p>when an unknown printer took a galley of type and scrambled it to make a type specimen book</p>
                  </div>
                </div>
              </div>
              <!-- End Why us top content  -->
            </div>
          </div>
        </div>        
      </div>
      <!-- End why us top -->

      <!-- Start why us bottom -->
      <div class="row">        
        <div class="col-lg-12 col-sm-12">
          <div class="whyus_bottom">            
            <div class="slider_overlay"></div>
            <div class="container">               
              <div class="skills">                
                <!-- START SINGLE SKILL-->
                <div class="col-lg-3 col-md-3 col-sm-3">
                 <div class="single_skill wow fadeInUp">
                   <div id="myStat" data-dimension="150" data-text="35%" data-info="" data-width="10" data-fontsize="25" data-percent="35" data-fgcolor="#999" data-bgcolor="#fff"  data-icon="fa-task"></div>
                    <h4>Repeate Learners</h4>                      
                  </div>
                </div>
                <!-- START SINGLE SKILL-->
                <div class="col-lg-3 col-md-3 col-sm-3">
                  <div class="single_skill wow fadeInUp">
                    <div id="myStathalf2" data-dimension="150" data-text="90%" data-info="" data-width="10" data-fontsize="25" data-percent="90" data-fgcolor="#999" data-bgcolor="#fff"  data-icon="fa-task"></div>
                    <h4>Success Rate</h4>
                  </div>
                </div>
                <!-- START SINGLE SKILL-->
                <div class="col-lg-3 col-md-3 col-sm-3">                 
                  <div class="single_skill wow fadeInUp">
                    <div id="myStat2" data-dimension="150" data-text="100%" data-info="" data-width="10" data-fontsize="25" data-percent="100" data-fgcolor="#999" data-bgcolor="#fff"  data-icon="fa-task"></div>
                    <h4>Student Engagement</h4>
                  </div>
                </div>
                <!-- START SINGLE SKILL-->
                <div class="col-lg-3 col-md-3 col-sm-3">                 
                  <div class="single_skill wow fadeInUp">
                    <div id="myStat3" data-dimension="150" data-text="65%" data-info="" data-width="10" data-fontsize="25" data-percent="65" data-fgcolor="#999" data-bgcolor="#fff"  data-icon="fa-task"></div>
                    <h4>Certified Courses</h4>
                  </div>
                </div>
              </div>
            </div>            
          </div>
        </div>        
      </div>
      <!-- End why us bottom -->
    </section>
    <!--=========== END WHY US SECTION ================-->

    <!--=========== BEGIN OUR COURSES SECTION ================-->
    <section id="ourCourses">
      <div class="container">
       <!-- Our courses titile -->
        <div class="row">
          <div class="col-lg-12 col-md-12"> 
            <div class="title_area">
              <h2 class="title_two">Our Courses</h2>
              <span></span> 
            </div>
          </div>
        </div>
        <!-- End Our courses titile -->
        <!-- Start Our courses content -->
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="ourCourse_content">
              <ul class="course_nav">
                <li>
                  <div class="single_course">
                    <div class="singCourse_imgarea">
                      <img src="{{ URL::asset('public/default/img/course-1.jpg')}}" />
                      <div class="mask">                         
                        <a href="#" class="course_more">View Course</a>
                      </div>
                    </div>
                    <div class="singCourse_content">
                    <h3 class="singCourse_title"><a href="#">Introduction To Matrix</a></h3>
                    <p class="singCourse_price"><span>$20</span> Per One Month</p>
                    <p>when an unknown printer took a galley of type and scrambled it to make a type specimen book</p>
                    </div>
                    <div class="singCourse_author">
                      <img src="{{ URL::asset('public/default/img/author.jpg')}}" alt="img">
                      <p>Richard Remus, Teacher</p>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="single_course">
                    <div class="singCourse_imgarea">
                      <img src="{{ URL::asset('public/default/img/course-2.jpg')}}" />
                      <div class="mask">                         
                        <a href="#" class="course_more">View Course</a>
                      </div>
                    </div>
                    <div class="singCourse_content">
                    <h3 class="singCourse_title"><a href="#">Introduction To Matrix</a></h3>
                    <p class="singCourse_price"><span>$20</span> Per One Month</p>
                    <p>when an unknown printer took a galley of type and scrambled it to make a type specimen book</p>
                    </div>
                    <div class="singCourse_author">
                      <img src="{{ URL::asset('public/default/img/author.jpg')}}" alt="img">
                      <p>Richard Remus, Teacher</p>
                    </div>
                  </div>
                </li> 
                <li>
                  <div class="single_course">
                    <div class="singCourse_imgarea">
                      <img src="{{ URL::asset('public/default/img/course-1.jpg')}}" />
                      <div class="mask">                         
                        <a href="#" class="course_more">View Course</a>
                      </div>
                    </div>
                    <div class="singCourse_content">
                    <h3 class="singCourse_title"><a href="#">Introduction To Matrix</a></h3>
                    <p class="singCourse_price"><span>$20</span> Per One Month</p>
                    <p>when an unknown printer took a galley of type and scrambled it to make a type specimen book</p>
                    </div>
                    <div class="singCourse_author">
                      <img src="{{ URL::asset('public/default/img/author.jpg')}}" alt="img">
                      <p>Richard Remus, Teacher</p>
                    </div>
                  </div>
                </li>  
                <li>
                  <div class="single_course">
                    <div class="singCourse_imgarea">
                      <img src="{{ URL::asset('public/default/img/course-2.jpg')}}" />
                      <div class="mask">                         
                        <a href="#" class="course_more">View Course</a>
                      </div>
                    </div>
                    <div class="singCourse_content">
                    <h3 class="singCourse_title"><a href="#">Introduction To Matrix</a></h3>
                    <p class="singCourse_price"><span>$20</span> Per One Month</p>
                    <p>when an unknown printer took a galley of type and scrambled it to make a type specimen book</p>
                    </div>
                    <div class="singCourse_author">
                      <img src="{{ URL::asset('public/default/img/author.jpg')}}" alt="img">
                      <p>Richard Remus, Teacher</p>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="single_course">
                    <div class="singCourse_imgarea">
                      <img src="{{ URL::asset('public/default/img/course-1.jpg')}}" />
                      <div class="mask">                         
                        <a href="#" class="course_more">View Course</a>
                      </div>
                    </div>
                    <div class="singCourse_content">
                    <h3 class="singCourse_title"><a href="#">Introduction To Matrix</a></h3>
                    <p class="singCourse_price"><span>$20</span> Per One Month</p>
                    <p>when an unknown printer took a galley of type and scrambled it to make a type specimen book</p>
                    </div>
                    <div class="singCourse_author">
                      <img src="{{ URL::asset('public/default/img/author.jpg')}}" alt="img">
                      <p>Richard Remus, Teacher</p>
                    </div>
                  </div>
                </li> 
                <li>
                  <div class="single_course">
                    <div class="singCourse_imgarea">
                      <img src="{{ URL::asset('public/default/img/course-2.jpg')}}" />
                      <div class="mask">                         
                        <a href="#" class="course_more">View Course</a>
                      </div>
                    </div>
                    <div class="singCourse_content">
                    <h3 class="singCourse_title"><a href="#">Introduction To Matrix</a></h3>
                    <p class="singCourse_price"><span>$20</span> Per One Month</p>
                    <p>when an unknown printer took a galley of type and scrambled it to make a type specimen book</p>
                    </div>
                    <div class="singCourse_author">
                      <img src="{{ URL::asset('public/default/img/author.jpg')}}" alt="img">
                      <p>Richard Remus, Teacher</p>
                    </div>
                  </div>
                </li>                
              </ul>
            </div>
          </div>
        </div>
        <!-- End Our courses content -->
      </div>
    </section>
    <!--=========== END OUR COURSES SECTION ================-->  

    <!--=========== BEGIN OUR TUTORS SECTION ================-->
    <section id="ourTutors">
      <div class="container">
       <!-- Our courses titile -->
        <div class="row">
          <div class="col-lg-12 col-md-12"> 
            <div class="title_area">
              <h2 class="title_two">Our Tutors</h2>
              <span></span> 
            </div>
          </div>
        </div>
        <!-- End Our courses titile -->

        <!-- Start Our courses content -->
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="ourTutors_content">
              <!-- Start Tutors nav -->
              <ul class="tutors_nav">
				<?php foreach($teachers  as $t):?>
                <li>
                  <div class="single_tutors">
                    <div class="tutors_thumb">
						<?php if($t->avatar!=''):?>
							<img src="{{ URL::asset($t->avatar)}}" />
						<?php else:?>
							<img src="{{ URL::asset('public/default/img/avatar_default.png')}}" />
						<?php endif;?>
                    </div>
                    <div class="singTutors_content">
                      <h3 class="tutors_name"><?php echo $t->teacher_name;?><h3>
                      <span><?php echo $t->subject;?></span>
                      <p><?php echo $t->description;?></p>
                    </div>
                    <div class="singTutors_social">
                      <ul class="tutors_socnav">
                        <li><a class="fa fa-facebook" href="javascript:void(0)"></a></li>
                        <li><a class="fa fa-twitter" href="javascript:void(0)"></a></li>
                        <li><a class="fa fa-instagram" href="javascript:void(0)"></a></li>
                        <li><a class="fa fa-google-plus" href="javascript:void(0)"></a></li>
                      </ul>
                    </div>
                  </div>
                </li> 
				<?php endforeach;?>
              </ul>
            </div>
          </div>
        </div>
        <!-- End Our courses content -->
      </div>
    </section>
    <!--=========== END OUR TUTORS SECTION ================-->

    <!--=========== BEGIN STUDENTS TESTIMONIAL SECTION ================-->
    <section id="studentsTestimonial">
      <div class="container">
       <!-- Our courses titile -->
        <div class="row">
          <div class="col-lg-12 col-md-12"> 
            <div class="title_area">
              <h2 class="title_two">What our Student says</h2>
              <span></span> 
            </div>
          </div>
        </div>
        <!-- End Our courses titile -->

        <!-- Start Our courses content -->
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="studentsTestimonial_content">              
              <div class="row">
                <!-- start single student testimonial -->
                <div class="col-lg-4 col-md-4 col-sm-4">
                  <div class="single_stsTestimonial wow fadeInUp">
                    <div class="stsTestimonial_msgbox">
                      <p>when an unknown printer took a galley of type and scrambled it to make a type specimen book</p>
                    </div>
                    <img class="stsTesti_img" src="{{ URL::asset('public/default/img/author.jpg')}}" alt="img">
                    <div class="stsTestimonial_content">
                      <h3>Johnathan Doe</h3>                      
                      <span>Ex. Student</span>
                      <p>Software Department</p>
                    </div>
                  </div>
                </div>
                <!-- End single student testimonial -->
                <!-- start single student testimonial -->
                <div class="col-lg-4 col-md-4 col-sm-4">
                  <div class="single_stsTestimonial wow fadeInUp">
                    <div class="stsTestimonial_msgbox">
                      <p>when an unknown printer took a galley of type and scrambled it to make a type specimen book.scrambled it to make a type specimen book</p>
                    </div>
                    <img class="stsTesti_img" src="{{ URL::asset('public/default/img/author.jpg')}}" alt="img">
                    <div class="stsTestimonial_content">
                      <h3>Johnathan Doe</h3>                      
                      <span>Ex. Student</span>
                      <p>Software Department</p>
                    </div>
                  </div>
                </div>
                <!-- End single student testimonial -->
                <!-- start single student testimonial -->
                <div class="col-lg-4 col-md-4 col-sm-4">
                  <div class="single_stsTestimonial wow fadeInUp">
                    <div class="stsTestimonial_msgbox">
                      <p>when an unknown printer took a galley of type and scrambled it to make a type specimen book</p>
                    </div>
                    <img class="stsTesti_img" src="{{ URL::asset('public/default/img/author.jpg')}}" alt="img">
                    <div class="stsTestimonial_content">
                      <h3>Johnathan Doe</h3>                      
                      <span>Ex. Student</span>
                      <p>Software Department</p>
                    </div>
                  </div>
                </div>
                <!-- End single student testimonial -->
              </div>
            </div>
          </div>
        </div>
        <!-- End Our courses content -->
      </div>
    </section>
    <!--=========== END STUDENTS TESTIMONIAL SECTION ================-->   
@stop
