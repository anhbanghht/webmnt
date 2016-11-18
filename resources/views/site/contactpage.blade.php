@extends('layouts.sitedefault')
@section('titlepage')
Liên Hệ
@stop
@section('contact_active')
	class="active"
@stop
@section('body')
<?php if(isset($error) && $error != ''):?>
<script>
	alert('<?php echo $error;?>');
</script>
<?php endif;?>
<!--=========== BEGIN COURSE BANNER SECTION ================-->
	<br/><br/><br/><br/>
    <!--=========== BEGIN GOOGLE MAP SECTION ================-->
    <section id="googleMap">
      <iframe width="100%" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed/v1/place?q=%C4%90%E1%BA%A1i%20H%E1%BB%8Dc%20C%C3%B4ng%20Ngh%C3%AA%20Th%C3%B4ng%20Tin%20v%C3%A0%20Truy%E1%BB%81n%20Th%C3%B4ng%20Th%C3%A1i%20Nguy%C3%AAn&amp;key=AIzaSyAN0om9mFmy1QN6Wf54tXAowK4eT0ZUPrU"></iframe>
    </section>
    <!--=========== END GOOGLE MAP SECTION ================-->
    
    <!--=========== BEGIN CONTACT SECTION ================-->
    <section id="contact">
      <div class="container">
       <div class="row">
          <div class="col-lg-12 col-md-12"> 
            <div class="title_area">
              <h2 class="title_two">Mạng Và Truyền Thông</h2>
              <span></span> 
              <p>Mạng và truyền thông là bộ môn thuộc trường ĐH Công nghệ thông tin và truyền thông Thái Nguyên</p>
            </div>
          </div>
       </div>
       <div class="row">
         <div class="col-lg-8 col-md-8 col-sm-8">
           <div class="contact_form wow fadeInLeft">
              <form class="submitphoto_form" action="{{ route('mmt::sendfeedback') }}" method="post">
				<input type="hidden" id="_token" name="_token" value="<?php echo csrf_token();?>" />
                <input type="text" name="name" class="wp-form-control wpcf7-text" placeholder="Tên">
                <input type="email" name="email" class="wp-form-control wpcf7-email" placeholder="Địa chỉ mail">          
                <input type="text" name="subject" class="wp-form-control wpcf7-text" placeholder="Chủ đề">
                <textarea name="message" class="wp-form-control wpcf7-textarea" cols="30" rows="10" placeholder="Nội dung phản hồi"></textarea>
                <input type="submit" value="Gửi" class="wpcf7-submit">
              </form>
           </div>
         </div>
         <div class="col-lg-4 col-md-4 col-sm-4">
           <div class="contact_address wow fadeInRight">
             <h3>Địa chỉ</h3>
             <div class="address_group">
               <p>Z115, Quyết Thắng, tp. Thái Nguyên, Thái Nguyên, Việt Nam - phòng 212. nhà C1, Trường đại học CNTT&TT</p>
               <p>Điện Thoại: 0280-625-5048</p>
               <p>Email: mangmaytinh@ictu.edu.vn</p>
             </div>
             <div class="address_group">
              <ul class="footer_social">
                <li><a href="#" class="soc_tooltip" title="" data-placement="top" data-toggle="tooltip" data-original-title="Facebook"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#" class="soc_tooltip" title="" data-placement="top" data-toggle="tooltip" data-original-title="Twitter"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#" class="soc_tooltip" title="" data-placement="top" data-toggle="tooltip" data-original-title="Google+"><i class="fa fa-google-plus"></i></a></li>
                <li><a href="#" class="soc_tooltip" title="" data-placement="top" data-toggle="tooltip" data-original-title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
                <li><a href="#" class="soc_tooltip" title="" data-placement="top" data-toggle="tooltip" data-original-title="Youtube"><i class="fa fa-youtube"></i></a></li>
                </ul>
             </div>
           </div>
         </div>
       </div>
      </div>
    </section>
    <!--=========== END CONTACT SECTION ================-->
@stop