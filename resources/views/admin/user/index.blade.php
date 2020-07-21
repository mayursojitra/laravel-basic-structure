@extends('layouts.admin-main')
@section('admin-page-title')
User
@endsection
@section('stylesheet')
<!-- Data Table Css -->
<link rel="stylesheet" type="text/css" href="{{ asset('assets/bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/pages/data-table/css/buttons.dataTables.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/pages/data-table/extensions/buttons/css/buttons.dataTables.min.css')}}">
<!-- Style.css -->
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">
@endsection
@section('content')
<div class="main-body">
	<div class="page-wrapper">
		<div class="page-header">
			<div class="page-header-title">
				<h4>Users</h4>
			</div>
			<div class="page-header-breadcrumb">
				<ul class="breadcrumb-title">
					<li class="breadcrumb-item">
						<a href="{{ route('admin.dashboard') }}">
							<i class="icofont icofont-home"></i>
						</a>
					</li>
					<li class="breadcrumb-item"><a href="#!">User</a>
					</li>
				</ul>
			</div>
		</div>
		<div class="create-category-block mb-2">
			<div>
				<a href=" {{route('admin.user.create')}} " class="m-b-10 btn btn-primary waves-effect waves-light float-left">Create User</a>
			</div>
		</div>
		<div class="clearfix"></div>
		<div class="page-body">
			<!-- Server Side Processing table start -->
			<div class="card">
				<div class="card-header">
					<h5>Available User List</h5>
					<div class="card-header-right">
						<i class="icofont icofont-rounded-down"></i>
						<i class="icofont icofont-refresh"></i>
						<i class="icofont icofont-close-circled"></i>
					</div>
				</div>
				<div class="card-block">
					<div class="dt-responsive table-responsive">
						<table id="dt-admin-user" class="table table-striped table-bordered nowrap">
							<thead>
								<tr>
									<th class="no-filter">No</th>
									<th>Name</th>
									<th>Email</th>
									<th>Mobile</th>
									<th>Status</th>
									<th>Action</th>
								</tr>
							</thead>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('scripts')
<!-- DataTables -->
{{-- <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script> --}}
<!-- data-table js -->
<script src="{{asset('assets/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('assets/pages/data-table/extensions/buttons/js/buttons.flash.min.js')}}"></script>
<script src="{{asset('assets/pages/data-table/extensions/buttons/js/jszip.min.js')}}"></script>
<script src="{{asset('assets/pages/data-table/extensions/buttons/js/pdfmake.min.js')}}"></script>
<script src="{{asset('assets/pages/data-table/extensions/buttons/js/vfs_fonts.js')}}"></script>
<script src="{{asset('assets/pages/data-table/extensions/buttons/js/buttons.colVis.min.js')}}"></script>
<script src="{{asset('assets/bower_components/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('assets/bower_components/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('assets/bower_components/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/bower_components/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('assets/bower_components/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>
{{-- <script src="assets/pages/data-table/extensions/buttons/js/extension-btns-custom.js"></script> --}}
{{-- <script src="{{asset('/vendor/datatables/buttons.server-side.js')}}"></script> --}}
<script>
	$(document).ready(function(){

		$(function(){
			$('#dt-admin-user').DataTable({
				dom: 'Bfrtip',
				buttons: [
					'pageLength','copy','excel', 'pdf','print'
				],
				lengthMenu : [
					[10,100,250,500,-1],
					['10','100','250','500','Show all']
				],
				processing:true,
				serverSide:true,
				ajax:'{{route("admin.user.get")}}',
				columns:[
				{data : 'DT_RowIndex' , name:'id',searchable: false},
				{data : 'name' , name:'name'},
				{data : 'email', name:'email'},
				{data : 'mobile', name:'mobile'},
				{data : 'status' , name:'status',orderable: false, searchable: false},
				{data:  'actions', name:'actions',orderable: false, searchable: false}
				]
			});
			$('#dt-admin-user').on('click','.btn-delete',function(e){
				Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.value) {
                        e.preventDefault();
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        var url = $(this).data('remote');
                        $.ajax({
                            url:url,
                            type:'get',
                            dataType:'json',
                            data:{method:'get',submit:true},
                            success:function(data){
                                if(data = "success"){
									Swal.fire({
										title: 'Deleted!',
										text: 'User has been Deleted.',
										type: 'success',
										time: 1500
									})
								}else{
									Swal.fire({
										title: 'Error!',
										text: 'Something Went Wrong.',
										type: 'error',
										time: 1500
									})
								}
                            }
                        }).always(function (data) {
                            $('#dt-admin-user').DataTable().draw(false);
                        });
                    }
                })
			});

			$('#dt-admin-user').on('click','.btn-change-status',function(e){
				$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
				});
				var url = $(this).data('remote');
				$.ajax({
					url:url,
					type:'get',
					dataType:'json',
					data:{method:'get',submit:true},
					success:function(data){
						if(data = "success"){
							toastr.success("Status changed successfully","Success");
						}else{
							toastr.error("Something went Wrong","Error");
						}
					}
				}).always(function (data) {
					$('#dt-admin-user').DataTable().draw(false);
				});
			})
		});        
	});
</script>
@stack('scripts')
@endsection