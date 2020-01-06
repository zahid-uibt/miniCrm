@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
               @if(Session::has('msg'))
                    <div class="alert alert-success">
                        {{ Session::get('msg') }}
                    </div>
                @endif
            <div class="card">
                <div class="card-header">{{ trans('app.view_employees') }}</div>
                
                <div class="card-body">
                <table class="table table-bordered">
                 <thead>               
                    <tr>
                        <th>{{ trans('app.first_name') }}</th>
                        <th>{{ trans('app.last_name') }}</th>
                        <th>{{ trans('app.company_name') }}</th>
                        <th>{{ trans('app.email') }}</th>
                        <th>{{ trans('app.phone') }}</th>
                        <th>{{ trans('app.action') }}</th>
                    </tr>
                  </thead>
                  <tbody>
                   @foreach($employees as $e)
                    <tr>
                        <td>{{$e->first_name}}</td>
                        <td>{{$e->last_name}}</td>
                        <td>{{$e->company->name}}</td>
                        <td>{{$e->email}}</td>
                        <td>{{$e->phone}}</td>
                        <td>
                        <a href="{{ route('employee.edit',$e->id)}}" class="btn btn-primary">{{ trans('app.edit') }}</a>
                          <form action="{{ route('employee.destroy', $e->id)}}" method="post" style="padding-top: 5px;">
                           @csrf
                           @method('DELETE')
                          <button class="btn btn-danger" type="submit">{{ trans('app.delete') }}</button>
                          </form>
                        </td>
                    </tr>
                    @endforeach
                    
                  </tbody>
                    
                    
                    </table>
                    {{ $employees->links() }}
                  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
