<header class="header_section">
    <nav class="navbar navbar-expand-lg custom_nav-container ">
      <a class="navbar-brand" href="index.html">
        <span>
          Giftos
        </span>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class=""></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav  ">
          <li class="nav-item active">
            <a class="nav-link" href="{{url('/')}}">Home<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="shop.html">
              Shop
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="why.html">
              Why Us
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="testimonial.html">
              Testimonial
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.html">Contact Us</a>
          </li>
        </ul>

        @if (Route::has('login'))

        @auth

        <a href="{{url('myorders')}}" style="color: rgb(83, 81, 81);" class="mr-3 text-uppercase">My Orders</a>

        <a href="{{url('mycart')}}" class="mr-3">
          <i class="fa fa-shopping-bag" style="color: black !important" aria-hidden="true"></i>
          <span>({{$count}})</span>
        </a>

        <form method="POST" action="{{ route('logout') }}" class="p-2 mr-3">
          @csrf

          <input class="btn btn-success" type="submit" value="Logout" />
        </form>

        @else

        <div class="user_option">
          <a href="{{url('/login')}}">
            <i class="fa fa-user" aria-hidden="true"></i>
            <span>
              Login
            </span>
          </a>

          <a href="{{url('/register')}}">
            <i class="fa fa-vcard" aria-hidden="true"></i>
            <span>
              Register
            </span>
          </a>

            @endauth

          @endif

        </div>
      </div>
    </nav>
  </header> 

