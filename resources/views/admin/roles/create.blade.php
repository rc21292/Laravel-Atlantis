@extends('layouts.admin')
@section('title','Create Role')
@push('styles')
<link rel="stylesheet" href="{{asset('assets/css/chosen.css')}}" />
<style type="text/css">
  .chosen-choices {
    font-size: 14px;
    border-color: #ebedf2;
    padding: .6rem 1rem;
    height: inherit!important;
  }
</style>
@endpush
@section('content')
<div class="content">
  <div class="page-inner">
    <div class="page-header">
      <h4 class="page-title">{{ trans('global.create') }} {{ trans('cruds.role.title_singular') }}</h4>
      <ul class="breadcrumbs">
        <li class="nav-home">
          <a href="{{route('admin.home')}}">
            <i class="flaticon-home"></i>
          </a>
        </li>
        <li class="separator">
          <i class="flaticon-right-arrow"></i>
        </li>
        <li class="nav-item">
          <a href="#">User Management</a>
        </li>
        <li class="separator">
          <i class="flaticon-right-arrow"></i>
        </li>
        <li class="nav-item">
          <a href="{{route('admin.permissions.index')}}">Permissions</a>
        </li>
        <li class="separator">
          <i class="flaticon-right-arrow"></i>
        </li>
        <li class="nav-item">
          <a href="{{route('admin.roles.create')}}"> {{ trans('global.create') }} {{ trans('cruds.role.title_singular') }}</a>
        </li>
      </ul>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <div class="card-title">
              {{ trans('global.create') }} {{ trans('cruds.role.title_singular') }}
            </div>
          </div>

          <div class="card-body">
            <div class="row">
              <div class="col-md-6 col-lg-6">
                <form action="{{ route('admin.roles.store') }}" method="POST" enctype="multipart/form-data" id="role-form">
                  @csrf
                  <div class="form-group {{ $errors->has('name') ? 'has-error has-feedback' : '' }}">
                    <label for="name">{{ trans('cruds.role.fields.title') }}*</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($role) ? $role->name : '') }}">
                    @if($errors->has('name'))
                    <small id="emailHelp" class="form-text text-danger">{{ $errors->first('name') }}</small>
                    @endif
                    <p class="helper-block">
                      {{ trans('cruds.role.fields.title_helper') }}
                    </p>
                  </div>
                  <div class="form-group {{ $errors->has('permissions') ? 'has-error' : '' }}">
                    <label class="form-label">{{trans('cruds.role.fields.permissions') }}*</label>
                  </br>
                    <div class="selectgroup selectgroup-pills">
                      @foreach($permissions as $permission)
                      <label class="selectgroup-item">
                        <input type="checkbox" name="permission" value="{{$permission->id}}" class="selectgroup-input" {{ (in_array($id, old('permissions', [])) || isset($role) && $role->permissions()->pluck('name', 'id')->contains($id)) ? 'checked' : '' }}>
                        <span class="selectgroup-button">{{$permission->name}}</span>
                      </label>
                      @endforeach
                    </div>
                    @if($errors->has('permission'))
                    <em class="invalid-feedback">
                      {{ $errors->first('permission') }}
                    </em>
                    @endif
                  </div>
                </form>
              </div>
            </div>
          </div>
          <div class="card-action">
            <button type="submit" class="btn btn-success" form="role-form">{{ trans('global.save') }}</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@push('scripts')

<script src="{{asset('assets/js/chosen.jquery.min.js')}}"></script>
<script type="text/javascript">
  $(".select2").chosen();
</script>
@endpush