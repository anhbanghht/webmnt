@extends('layouts.default')
@section('active_dashboard_calendar')
class="active"
@stop
@section('content')
<section class="style-default-bright">
	<div class="section-header">
		<h2 class="text-primary">Lịch làm việc</h2>
	</div>
	<div class="section-body">
		<iframe src="https://calendar.google.com/calendar/embed?showTitle=0&amp;showCalendars=0&amp;height=600&amp;wkst=2&amp;bgcolor=%23FFFFFF&amp;src=chienbinhbattuyeudoidentoi1992%40gmail.com&amp;color=%231B887A&amp;ctz=Asia%2FSaigon" style="border-width:0" width="100%" height="600px" frameborder="0" scrolling="no"></iframe>
	</div><!--end .section-body -->
</section>
@stop