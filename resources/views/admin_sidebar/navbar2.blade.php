<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link" href="{{URL::to('/admin')}}">
          {{-- <i class="fas fa-laptop-house"></i> --}}
          <span class="menu-title">  Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
          {{-- <i class="fas fa-plus"></i> --}}
          <span class="menu-title">Creation</span>
          {{-- <i class="menu-arrow"></i> --}}
        </a>
        <div class="collapse" id="form-elements">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"><a class="nav-link" href="{{URL::to('/addcategory')}}">Add Category</a></li>
            <li class="nav-item"><a class="nav-link" href="{{URL::to('/addproduct')}}">Add Product</a></li>
            <li class="nav-item"><a class="nav-link" href="{{URL::to('/addslider')}}">Add Slider</a></li>
            
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
          {{-- <i class="far fa-eye"></i> --}}
          <span class="menu-title">View</span>
          {{-- <i class="menu-arrow"></i> --}}
        </a>
        <div class="collapse" id="tables">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{URL::to('/category')}}">Category</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{URL::to('/product')}}">Product</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{URL::to('/slider')}}">Slider</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{URL::to('/order')}}">Order</a></li>
          </ul>
        </div>
      </li>
    </ul>
  </nav>