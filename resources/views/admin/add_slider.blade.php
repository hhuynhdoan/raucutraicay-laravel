@extends('layouts.app_admin')
@section('title')
    Add Slider
@endsection
@section('content')
    
<div class="row grid-margin">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Add Slider</h4>

          @if(Session::has('status'))
            <div class="alert alert-success">
              {{Session::get('status')}}
            </div>
            
          @endif

           {!!Form::open(['action' => 'SliderController@saveslider', 'class' => 'cmxform', 'method' => 'POST', 'id' => 'commentForm', 'enctype' => 'multipart/form-data'])!!}
           {{csrf_field()}} 

              <div class="form-group">        
              {{Form::label('', 'Mo ta Slider 1', ['for'=>'cmane'])}}
              {{Form::text('mota1', '',['class'=>'form-control', 'minlength'=>'2'])}}
            </div>

            <div class="form-group">        
                {{Form::label('', 'Mo ta Slider 2', ['for'=>'cmane'])}}
                {{Form::text('mota2', '',['class'=>'form-control', 'minlength'=>'2'])}}
            </div>

            <div class="form-group">
                {{Form::label('', 'Hinh anh Slider', ['for'=>'cmane'])}}
                {{Form::file('anh_sl',['class'=>'form-control'])}}
            </div>
            {{Form::submit('Luu', ['class'=> 'btn btn-primary'])}}
              
          {!!Form::close()!!}
        </div>
      </div>
    </div>
  </div>

  @endsection

  @section('script')

  <script src="{{asset('backend/js/bt-maxLength.js')}}"></script>
      
  @endsection