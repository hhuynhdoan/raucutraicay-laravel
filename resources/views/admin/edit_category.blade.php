@extends('layouts.app_admin')
@section('title')
    Add Category
@endsection
@section('content')
    
<div class="row grid-margin">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Edit Category</h4>
           {!!Form::open(['action' => 'CategoryController@updatecategory', 'class' => 'cmxform', 'method' => 'POST', 'id' => 'commentForm'])!!}
           {{csrf_field()}}  
              <div class="form-group">
                {{Form::hidden('id', $category->id)}}
              {{Form::label('', 'Danh muc san pham', ['for'=>'cmane'])}}
              {{Form::text('ten_danhmuc',$category->ten_danhmuc,['class'=>'form-control','minlength'=>'2'])}}
            </div>
            {{Form::submit('Cap nhat', ['class' => 'btn btn-primary'])}}
          {!!Form::close()!!}
        </div>
      </div>
    </div>
  </div>

  @endsection

  @section('script')

  {{-- <script src="backend/js/form-validation.js"></script> --}}
  <script src="{{asset('backend/js/bt-maxLength.js')}}"></script>
      
  @endsection