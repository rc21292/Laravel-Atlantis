@extends('layouts.admin')
@section('title','Show User')
@section('content')

<div class="content">
  <div class="page-inner">
    <div class="page-header">
      <h4 class="page-title">{{ trans('global.show') }} {{ trans('cruds.user.title_singular') }}</h4>
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
          <a href="{{route('admin.users.index')}}">Users</a>
        </li>
        <li class="separator">
          <i class="flaticon-right-arrow"></i>
        </li>
        <li class="nav-item">
          <a href="{{route('admin.users.show', $user->id)}}">{{ trans('global.show') }} {{ trans('cruds.user.title_singular') }}</a>
        </li>
      </ul>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.user.title') }}
          </div>

          <div class="card-body">
            <div class="mb-2">
              <table class="table table-bordered table-striped">
                <tbody>
                  <tr>
                    <th>
                      {{ trans('cruds.user.fields.id') }}
                    </th>
                    <td>
                      {{ $user->id }}
                    </td>
                  </tr>
                  <tr>
                    <th>
                      {{ trans('cruds.user.fields.name') }}
                    </th>
                    <td>
                      {{ $user->name }}
                    </td>
                  </tr>
                  <tr>
                    <th>
                      {{ trans('cruds.user.fields.email') }}
                    </th>
                    <td>
                      {{ $user->email }}
                    </td>
                  </tr>
                  <tr>
                    <th>
                      Roles
                    </th>
                    <td>
                      @foreach($user->roles()->pluck('name') as $role)
                      <span class="label label-info label-many">{{ $role }}</span>
                      @endforeach
                    </td>
                  </tr>
                </tbody>
              </table>
              <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                {{ trans('global.back_to_list') }}
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection