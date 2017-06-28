@extends('templates/backend/layout')

@section('title',$data['title'])
	
@section('mainBody')
	<div class="page-content-wrapper">
		<div class="page-content">
			<h3 class="page-title">Category Management<small> Edit Category</small></h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="{{route('admin.dashboard')}}">Dashboard</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<i class="fa fa-building"></i>
						<a href="{{route('categories.index')}}">Category List</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						Edit Category
					</li>
				</ul>
				<div class="page-toolbar">
				</div>
			</div>
            <div class="portlet light bordered">
				<div class="portlet-title">
					<div class="caption font-green-haze">
						<i class="icon-settings font-green-haze"></i>
						<span class="caption-subject bold uppercase"> Edit Category</span>
					</div>
					<div class="actions">
						<a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;" data-original-title="" title="">
						</a>
					</div>
				</div>
				<div class="portlet-body form">
					@if ($data['category'])
						{!!  Form::open( ['route'=> ['categories.update',$data['category']->id],'method' => 'PUT','class'=>"form-horizontal"] ) !!}
							<div class="form-body">			
								<div class="form-group form-md-line-input">
									<label class="col-md-2 control-label" for="name">Category Name</label>
									<div class="col-md-10">
										<div class="input-icon right">
											{{ Form::text('name',$data['category']->name, ['class'=> 'form-control','placeholder'=>'Enter Category Name','id'=>'name','onkeyup'=>"slugify(this,'slug')",'autocomplete'=>'off']) }}
											<div class="form-control-focus">
											</div>
											{{-- <span class="help-block">Category Name must be unique.</span> --}}
										</div>
										@if ($errors->first('name'))
				                            <p class="text-danger">
				                                {{ $errors->first('name') }}
				                            </p>
				                        @endif
									</div>
								</div>
								<div class="form-group form-md-line-input">
									<label class="col-md-2 control-label" for="name">Category Slug</label>
									<div class="col-md-10">
										<div class="input-icon right">
											{{ Form::text('slug',$data['category']->slug, ['class'=> 'form-control','placeholder'=>'Enter Category slug','id'=>'slug','autocomplete'=>'off']) }}
											<div class="form-control-focus">
											</div>
											{{-- <span class="help-block">Category Slug must be unique.</span> --}}
										</div>
										@if ($errors->first('slug'))
				                            <p class="text-danger">
				                                {{ $errors->first('slug') }}
				                            </p>
				                        @endif
									</div>
								</div>
								{{$data['categories']->where("parent",$data['category']->id)}}
								@if(!$data['categories']->where("parent",$data['category']->id)->first())
									<div class="form-group form-md-line-input">
										<label class="col-md-2 control-label" for="is_root">Is Subcategory?</label>
										<div class="col-md-10">
											<div class="md-checkbox-inline">
												<div class="md-checkbox">
													{{ Form::checkbox('is_root',1,$data['category']->parent,['class'=> 'md-check','id'=>'is_root','onclick'=>"show_hide('parent_div',this.checked)"]) }}
													<label for="is_root">
													<span class="inc"></span>
													<span class="check"></span>
													<span class="box"></span>Is Subcategory </label>
												</div>
											</div>
										</div>
									</div>
									<div class="form-group form-md-line-input" id="parent_div">
										<label class="col-md-2 control-label" for="parent">Parent Category</label>
										<div class="col-md-10">
											{{ Form::select('parent', $data['cat_select'] , $data['category']->parent?$data['category']->parent:null, ['placeholder' => 'Select Category','class'=>"form-control",'id'=>"parent"]) }}
											<div class="form-control-focus">
											</div>
											@if ($errors->first('parent'))
					                            <p class="text-danger">
					                                {{ $errors->first('parent') }}
					                            </p>
					                        @endif
										</div>
									</div>
								@endif
								<div class="form-actions margin-top-10">
									<div class="row">
										<div class="col-md-offset-2 col-md-10">
											<a href="{{route('categories.index')}}" class="btn default">Cancel</a>
											<button type="submit" class="btn blue">Submit</button>
										</div>
									</div>
								</div>
							</div>
						{!!  Form::close() !!}
					@else
						<script>
						 	window.location.href = '{{route('categories.index')}}';
						</script>
					@endif
				</div>
			</div>
		</div>
	</div>
@endsection			
@section('scripts')
<script type="text/javascript">
    if (document.getElementById("is_root").checked)
    	$("#parent_div").show();
    else
    	$("#parent_div").hide();
</script>
@endsection