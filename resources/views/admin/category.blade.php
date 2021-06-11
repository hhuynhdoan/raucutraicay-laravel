@extends('layouts.app_admin')
@section('title')
    Categories
@endsection
@section('content')

{{Form::hidden('', $increment=1)}}

<div class="card"> 
    <div class="card-body">
      <h4 class="card-title">Categories table</h4>
      @if(Session::has('status'))
            <div class="alert alert-success">
              {{Session::get('status')}}
            </div>
            
          @endif
      <div class="row">
        <div class="col-12">
          <div class="table-responsive">
            <table id="order-listing" class="table">
              <thead>
                <tr>
                    <th>ID</th>
                    <th>Ten Danh muc</th>
                    <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($category as $cate)
                <tr>
                  <td>{{$increment}}</td>
                  <td>{{$cate->ten_danhmuc}}</td>
                  <td>
                    <button class="btn btn-outline-primary" onclick="window.location='{{url('/edit-category/'.$cate->id)}}'">Edit</button>
                    <button class="btn btn-outline-danger" onclick="window.location='{{url('/delete/'.$cate->id)}}'" id="delete">Delete</button>
                    {{-- <a href="/delete/{{$cate->id}}" class="btn btn-outline-danger" id="delete">Delete</a> --}}
                  </td>
              </tr>
              {{Form::hidden('', $increment=$increment + 1)}}
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  @endsection

  @section('script')
  <script src="{{asset('backend/js/data-table.js')}}"></script>
  @endsection