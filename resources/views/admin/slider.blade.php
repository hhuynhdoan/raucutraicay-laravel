@extends('layouts.app_admin')
@section('title')
    Slider
@endsection
@section('content')
    

<div class="card"> 
    <div class="card-body">
      <h4 class="card-title">Sliders table</h4>
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
                    <th>Hinh anh</th>
                    <th>Mo ta 1</th>
                    <th>Mo ta 2</th>
                    <th>Trang thai</th>
                    <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($slider as $slid)
                    <tr>
                      <td>1</td>
                      <td><img src="{{asset('/storage/anh_sl/' . $slid->anh_sl)}}" alt=""></td>
                      <td>{{$slid->mota1}}</td>
                      <td>{{$slid->mota2}}</td>

                      @if ($slid->trangthai_sl == 1)

                      <td>
                        <label class="badge badge-success">Activated</label>
                      </td>

                      @else  
                      <td>
                        <label class="badge badge-danger">UnActivated</label>
                      </td>
                      @endif
                     
                      <td>
                        <button class="btn btn-outline-primary" onclick="window.location='{{url('/edit-slider/'.$slid->id)}}'">Edit</button>
                        <button class="btn btn-outline-danger" onclick="window.location='{{url('/delete-slider/'.$slid->id)}}'" id="delete">Delete</button>
                        @if ($slid->trangthai_sl == 1)
                          <button class="btn btn-outline-warning" onclick="window.location='{{url('/unactivate-slider/'.$slid->id)}}'">Unactivate</button>
                        @else
                          <button class="btn btn-outline-success"onclick="window.location='{{url('/activate-slider/'.$slid->id)}}'">Activate</button>
                        @endif
                       
                      </td>
                  </tr>
                  {{Form::hidden('')}}
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