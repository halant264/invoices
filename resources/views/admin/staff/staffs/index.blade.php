@extends('admin.layouts.app')

@section('content')


<div class="aiz-titlebar text-left mt-2 mb-3">
    <div class="row align-items-center">
        <div class="col-auto">
            <h1 class="h3">جميع المستخدمين</h1>
        </div>
        @can('add_staff')
            <div class="col text-left">
                <a href="{{ route('certificate.create') }}" class="btn btn-circle btn-info">
                    <span>انشاء شهادة</span>
                </a>
            </div>
        @endcan
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h5 class="mb-0 h6">المستخدمين</h5>
    </div>
    <div class="card-body">
        <table class="table aiz-table mb-0 text-right">
            <thead>
                <tr>
                    <th data-breakpoints="lg" width="10%">#</th>
                    <th>{{translate('Name')}}</th>
                    <th data-breakpoints="lg">{{translate('Email')}}</th>
                    <th data-breakpoints="lg">{{translate('Role')}}</th>
                    <th width="10%">{{translate('Options')}}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($staffs as $key => $staff)
                        <tr>
                            <td>{{ $staff->id }}</td>
                            <td>{{$staff->name}}</td>
                            <td>{{$staff->email}}</td>
                            <td>
								@if ($staff->role != null)
									{{ $staff->role->name }}
								@endif
							</td>
                            <td class="text-right">
                                @can('edit_staff')
                                    <a class="btn btn-soft-primary btn-icon btn-circle btn-sm" href="{{route('staffs.edit', encrypt($staff->id))}}" title="{{ translate('Edit') }}">
                                        <i class="las la-edit"></i>
                                    </a>
                                @endcan
                                @can('delete_staff')
                                    <a href="#" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete" data-href="{{route('staffs.destroy', $staff->id)}}" title="{{ translate('Delete') }}">
                                        <i class="las la-trash"></i> 
                                    </a>
                                @endcan
                            </td>
                        </tr>
                   
                @endforeach
            </tbody>
        </table>
        <div class="aiz-pagination">
            {{ $staffs->appends(request()->input())->links() }}
        </div>
    </div>
</div>

@endsection

@section('modal')
    @include('admin.modals.delete_modal')
@endsection
