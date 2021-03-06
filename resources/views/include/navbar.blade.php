

<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
      <a class="navbar-brand" href="{{URL::to('/')}}">Vegefoods</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
      </button>


    <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active"><a href="{{URL::to('/')}}" class="nav-link">Home</a></li>
          <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="{{URL::to('/shop')}}" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Shop</a>
          <div class="dropdown-menu" aria-labelledby="dropdown04">
              <a class="dropdown-item" href="{{URL::to('/shop')}}">Shop</a>
              <a class="dropdown-item" href="wishlist.html">Wishlist</a>
            <a class="dropdown-item" href="{{URL::to('/cart')}}">Cart</a>
            <a class="dropdown-item" href="{{URL::to('/checkout')}}">Checkout</a>
          </div>
        </li>
          <li class="nav-item"><a href="about.html" class="nav-link">About</a></li>
          <li class="nav-item"><a href="blog.html" class="nav-link">Blog</a></li>
          <li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li>
        <li class="nav-item"><a href="{{URL::to('/login')}}" class="nav-link">Log In</a></li>
        <li class="nav-item"><a href="{{URL::to('/signup')}}" class="nav-link">Sign Up</a></li>
          <li class="nav-item cta cta-colored"><a href="{{URL::to('/cart')}}" class="nav-link"><span class="icon-shopping_cart"></span>[{{Session::has('cart')?Session::get('cart')->totalQty:0}}]</a></li>

        </ul>
      </div>
    </div>
  </nav>
<!-- END nav -->
