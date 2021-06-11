@extends('layouts.app_admin')
@section('title')
    Edit Product
@endsection
@section('content')
    
<div class="row grid-margin">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Edit Product</h4>
          
          @if(Session::has('status'))
          <div class="alert alert-success">
            {{Session::get('status')}}
          </div>
          
        @endif

        @if (Session::has('status1'))
          <div class="alert alert-danger">
            {{Session::get('status1')}}
          </div>
            
        @endif

           {!!Form::open(['action' => 'ProductController@updateproduct', 'class' => 'cmxform', 'method' => 'POST', 
                          'id' => 'commentForm', 'enctype' => 'multipart/form-data'])!!}
           {{csrf_field()}} 
              {{Form::hidden('id', $product->id)}}
              <div class="form-group">        
              {{Form::label('', 'Ten San pham', ['for'=>'cmane'])}}
              {{Form::text('ten_sp', $product->ten_sp,['class'=>'form-control', 'minlength'=>'2'])}}
            </div>

            <div class="form-group">
                {{Form::label('', 'Gia San pham', ['for'=>'cmane'])}}
                {{Form::number('gia_sp', $product->gia_sp,['class'=>'form-control'])}}  
            </div>

            <div class="form-group">
                {{Form::label('', 'Phan Loai san pham')}}
                {{Form::select('ten_danhmuc', $category, $product->ten_danhmuc, ['class'=>'form-control'])}}
            </div>

            <div class="form-group">
                {{Form::label('', 'Hinh anh San pham', ['for'=>'cmane'])}}
                {{Form::file('anh_sp',['class'=>'form-control'])}}
            </div>

            {{-- <div class="from-group">
                {{Form::label('', 'Trang thai San pham', ['for'=>'cmane'])}}
                {{Form::checkbox('trangthai_sp','' ,'true',['class'=>'form-control'])}}
            </div> --}}
            {{Form::submit('Cap nhat', ['class'=> 'btn btn-primary'])}}
              
          {!!Form::close()!!}
        </div>
      </div>
    </div>
  </div>

  @endsection

  @section('script')


  <script src="{{asset('backend/js/bt-maxLength.js')}}"></script>
      
  @endsection