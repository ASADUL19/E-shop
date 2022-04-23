<nav class="navbar navbar-expand-lg navbar-primary bg-primary">
  <div class="container">
    <a class="navbar-brand text-white" href="{{url('/')}}">E-Shop</a>
    <div class="search-bar">
      <form action="{{'searchproduct'}}" method="POST">
        @csrf
      <div class="input-group">
        <input type="search" id="tags" class="form-control" name="product_name" placeholder="Search Product" aria-label="Username" aria-describedby="basic-addon1">
        <button type="submit" class="input-group-text" id="basic-addon1"><i class="fa fa-search"></i></button>
      </div>
      </form>
    </div>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link active text-white" aria-current="page" href="{{url('/')}}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="{{url('category')}}">Category</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white position-relative" href="{{url('cart')}}">My Cart
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger cartcount">0</span>
          </a>
        </li>
         <li class="nav-item">
          <a class="nav-link text-white" href="{{url('order')}}">My Order</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white position-relative" href="{{url('wishlist')}}">My Wishlist
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger wishlistcount">0</span>
          </a>
        </li>
       
        <li class="nav-item">
          <a href="{{route('login')}}" class="nav-link  text-white">Login</a>
        </li>
         <li class="nav-item">
          <a href="{{route('login')}}" class="nav-link  text-white">Register</a>
        </li>
      </ul>
    </div>
  </div>
</nav>