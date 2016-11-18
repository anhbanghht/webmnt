<script>
$('#assigntable').DataTable({
	"dom": 'CT<"clear">lfrtip',
	"tableTools": {
		"sSwfPath": "../public/assets/js/libs/DataTables/extensions/TableTools/swf/copy_csv_xls_pdf.swf"
	},
	"order": [],
	"colVis": {
		"buttonText": "Columns",
		"overlayFade": 0,
		"align": "right"
	},
	"language": {
		"lengthMenu": '_MENU_ entries per page',
		"search": '<i class="fa fa-search"></i>',
		"paginate": {
			"previous": '<i class="fa fa-angle-left"></i>',
			"next": '<i class="fa fa-angle-right"></i>'
		}
	}
});
</script>
<table id="assigntable" class="table table-striped table-hover assigns-table display" cellspacing="0">
	<thead>
		<tr>
			<th>{{ trans('languages.id') }}</th>
			<th>{{ trans('languages.work') }}</th>
			<th>{{ trans('languages.year') }}</th>
			<th>{{ trans('languages.semester') }}</th>
			<th>{{ trans('languages.type') }}</th>
			<th>{{ trans('languages.description') }}</th>
			<th>{{ trans('languages.note') }}</th>
		</tr>
	</thead>
	<tbody>
		
		<?php foreach($items as $item):?>
			<tr class="list-work">	
				<td><span><?php echo $item->id; ?></span></td>
				<td><a href="{{route('assign::listassign',$item->id)}}"><?php echo $item->work_name; ?></a></td>
				<td><?php echo $item->year; ?></td>
				<td><?php $semester=Helps::getCustomerTableOnly($item->semesterid,'semesters'); echo ($semester) ? $semester->semester_name :''; ?></td>
				<td><?php $work_type=Helps::getCustomerTableOnly($item->typeid,'work_types'); echo ($work_type) ? $work_type->type_name :''; ?></td>
				<td><?php echo $item->description; ?></td>
				<td><?php echo $item->notes; ?></td>
			</tr>
		<?php endforeach;?>
	</tbody>
</table>