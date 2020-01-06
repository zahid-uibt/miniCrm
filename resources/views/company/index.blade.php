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
                <div class="card-header">{{ trans('app.all_company') }}</div>
                
                <div class="card-body">
                <table class="table table-bordered">
                 <thead>               
                    <tr>
                        <th>{{ trans('app.company_name') }}</th>
                        <th>{{ trans('app.email') }}</th>
                        <th>{{ trans('app.website') }}</th>
                        <th>{{ trans('app.logo') }}</th>
                        <th>{{ trans('app.action') }}</th>
                    </tr>
                  </thead>
                  <tbody>
                   @foreach($companies as $c)
                    <tr>
                        <td>{{$c->name}}</td>
                        <td>{{$c->email}}</td>
                        <td>{{$c->website}}</td>
                        <td><img src="/storage/{{$c->logo}}" style="width:50px;height:50px;" alt="logo not available"></td>
                        <td>
                        <a href="{{ route('company.edit',$c->id)}}" class="btn btn-primary">{{ trans('app.edit') }}</a>
                          <form action="{{ route('company.destroy', $c->id)}}" method="post" style="display: inline-block;padding-left: 5px;">
                           @csrf
                           @method('DELETE')
                          <button class="btn btn-danger" type="submit">{{ trans('app.delete') }}</button>
                          </form>
                        </td>
                    </tr>
                    @endforeach
                    
                  </tbody>
                    
                    
                    </table>
                    {{ $companies->links() }}
                  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
