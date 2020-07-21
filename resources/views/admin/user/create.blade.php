@extends('layouts.admin-main')
@section('admin-page-title')
	User
@endsection

@section('stylesheet')
    <link rel=stylesheet href="{{ asset('assets/pages/advance-elements/css/bootstrap-datetimepicker.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/bower_components/datedropper/css/datedropper.min.css') }}" />
@endsection

@section('content')
<div class="main-body">
	<div class="page-wrapper">
		<div class="page-header">
			<div class="page-header-title">
				<h4>User</h4>
			</div>
			<div class="page-header-breadcrumb">
				<ul class="breadcrumb-title">
					<li class="breadcrumb-item">
						<a href="{{ route('admin.dashboard') }}">
							<i class="icofont icofont-home"></i>
						</a>
					</li>
					<li class="breadcrumb-item"><a href=" {{route('admin.user.index')}} ">User</a>
					</li>
					<li class="breadcrumb-item"><a href="#!">Create User</a>
					</li>
				</ul>
			</div>
		</div>
		<div class="create-category-block mb-2">
			<div>
				<a href=" {{route('admin.user.index')}} " class="m-b-10 btn btn-primary waves-effect waves-light float-left">Users List</a>
			</div>
		</div>
		<div class="clearfix"></div>
		<div class="page-body">
			<div class="row">
				<div class="col-sm-12">
					<!-- Register your self card start -->
					<div class="card">
						<div class="card-header">
							<h5>Create new User Here,</h5>
                            {{-- <div class="card-header-right">
                                <i class="icofont icofont-rounded-down"></i>
                                <i class="icofont icofont-refresh"></i>
                                <i class="icofont icofont-close-circled"></i>
                            </div> --}}
                        </div>
                        <div class="row">
                        	<div class="col-lg-8 offset-lg-2">
                        		@include('includes.errors')
                        	</div>
                        </div>
                        <div class="card-block">
                        	<div class=>
                        		<form action=" {{route('admin.user.store')}} " method="post" enctype="multipart/form-data" >
                        			@csrf
									<?php $count = 1; ?>
                        			<div class="admin-form">
                        				<!-- start name -->
                        				<div class="row mb-3">
                        					<label class="col-lg-2">Name</label>
                        					<div class="col-lg-10">
                        						<div class="m-b-10">
                        							<input type="text" class="form-control" value="{{old('name')}}"  id="name" placeholder="Name" name="name" tabindex="{{ $count++ }}" required>
                        						</div>
                        					</div>
                                        </div>
                        				<div class="row mb-3">
                        					<label class="col-lg-2">Email</label>
                        					<div class="col-lg-10">
                        						<div class="m-b-10">
                        							<input type="email" class="form-control" value="{{old('email')}}"  id="email" placeholder="Email" name="email" tabindex="{{ $count++ }}" required>
                        						</div>
                        					</div>
                        				</div>
                        				<div class="row mb-3">
                        					<label class="col-lg-2">Mobile number</label>
                        					<div class="col-lg-10">
                        						<div class="m-b-10">
                        							<input type="number" class="form-control" value="{{old('mobile')}}"  id="mobile" placeholder="Mobile Number " name="mobile" tabindex="{{ $count++ }}" required>
                        						</div>
                        					</div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-lg-2">Birth Date</label>
                                            <div class="col-lg-10">
                                                <div class="m-b-10">
                                                    <input type="text" class="form-control date-picker" value="{{old('dob')}}"  id="dob" name="dob" tabindex="{{ $count++ }}">
                                                </div>
                                            </div>
                                        </div>
                        				<div class="row mb-3">
                        					<label class="col-lg-2">Password</label>
                        					<div class="col-lg-10">
                        						<div class="m-b-10">
                        							<input type="password" class="form-control" value="{{old('password')}}"  id="password" placeholder="password" name="password" tabindex="{{ $count++ }}" required>
                        						</div>
                        					</div>
                        				</div>
                        				<div class="row mb-3">
                        					<label class="col-lg-2">Confirm Password</label>
                        					<div class="col-lg-10">
                        						<div class="m-b-10">
                        							<input type="password" class="form-control" value="{{old('password_confirmation')}}"  id="password_confirmation" placeholder="Confirm password" name="password_confirmation" tabindex="{{ $count++ }}" required>
                        						</div>
                        					</div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-lg-2">Profile Image </label>
                                            <div class="col-lg-10">
                                                <div class="m-b-10">
                                                    <input type="file" class="form-control" value="{{old('profile_photo')}}"  id="profile_photo" name="profile_photo" tabindex="{{ $count++ }}" >
                                                </div>
                                            </div>
                                        </div>
                        				<div class="row mb-3">
                        					<div class="form-radio" style="width: 100%;">
                        						<label class="col-lg-2 float-left">Status</label>
                        						<div class="col-lg-10">
                        							<div class="row m-b-10">
                        								<div class="col-lg-3 radio radio-inline">
                        									<label><input type="radio" name="status" value="active" tabindex="{{ $count++ }}"   checked ><i class="helper" style="top:-6px"></i>Enable</label>
                        								</div>
                        								<div class="col-lg-2 radio radio-inline">
                        									<label><input type="radio" name="status" value="disable" tabindex="{{ $count++ }}"  @if (old('status') == "disable") checked @endif><i class="helper" style="top:-6px"></i>Disable</label>
                        								</div>
                        							</div>
                        						</div>
                        					</div>
                        				</div>
                        			</div>
                        			<!-- end /.content -->
                        			<div class="j-footer row">
                        				<button type="submit" tabindex="17" class="btn btn-primary offset-lg-2 mt-3 waves-effect waves-light">Create new User</button>
                        			</div>
                        			<!-- end /.footer -->

                        		</form>
                        	</div>
                        </div>
                    </div>
                    <!-- Register your self card end -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<!-- Bootstrap date-time-picker js -->
<script type="text/javascript" src="{{ asset('assets/pages/advance-elements/moment-with-locales.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/bower_components/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/pages/advance-elements/bootstrap-datetimepicker.min.js') }}"></script>
<script type="text/javascript" src="{{asset('assets/pages/advance-elements/select2-custom.js')}}"></script>
<!-- Select 2 js -->
<script type="text/javascript" src="{{asset('assets/bower_components/select2/js/select2.full.min.js')}}"></script>
<!-- Multiselect js -->
<script type="text/javascript" src="{{asset('assets/bower_components/bootstrap-multiselect/js/bootstrap-multiselect.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/bower_components/multiselect/js/jquery.multi-select.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/jquery.quicksearch.js')}}"></script>

<script type="text/javascript">
    $(function () {
        //time picker
        $('.date-picker').datetimepicker({
            format: 'Y-MM-DD'
        });
    });
</script>
@endsection
