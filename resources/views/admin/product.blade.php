@extends('layouts.app_admin')
@section('title')
    Products
@endsection
@section('content')
    
{{Form::hidden('', $increment=1)}}

<div class="card"> 
    <div class="card-body">
      <h4 class="card-title">Product table</h4>

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
      <div class="row">
        <div class="col-12">
          <div class="table-responsive">
            <table id="order-listing" class="table">
              <thead>
                <tr>
                    <th>ID</th>
                    <th>Anh</th>
                    <th>Ten San pham</th>
                    <th>Gia</th>
                    <th>Danh muc</th>
                    <th>Trang thai</th>
                    <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($product as $prod)
                    <tr>
                      <td>{{$increment}}</td>
                      <td><img src="{{asset('/storage/anh_sp/' . $prod->anh_sp)}}" alt=""></td>
                      <td>{{$prod->ten_sp}}</td>
                      <td>{{$prod->gia_sp}}.000 VND</td>
                      <td>{{$prod->ten_danhmuc}}</td>

                      @if ($prod->trangthai_sp == 1)

                      <td>
                        <label class="badge badge-success">Activated</label>
                      </td>

                      @else  
                      <td>
                        <label class="badge badge-danger">UnActivated</label>
                      </td>
                      @endif
                     
                      <td>
                        <button class="btn btn-outline-primary" onclick="window.location='{{url('/edit-product/'.$prod->id)}}'">Edit</button>
                        <button class="btn btn-outline-danger" onclick="window.location='{{url('/delete-product/'.$prod->id)}}'" id="delete">Delete</button>
                        @if ($prod->trangthai_sp == 1)
                          <button class="btn btn-outline-warning" onclick="window.location='{{url('/unactivate-product/'.$prod->id)}}'">Unactivate</button>
                        @else
                          <button class="btn btn-outline-success"onclick="window.location='{{url('/activate-product/'.$prod->id)}}'">Activate</button>
                        @endif
                       
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