<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Font Nunito -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,500;0,600;0,700;0,800;0,900;0,1000;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900;1,1000&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
    integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Font Poppins -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <!-- css native -->
  <link rel="stylesheet" href="{{ asset('front/search-page.css') }}">
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
  </script>
  <title>ZenIT</title>
</head>

<body>
  <section>
    <!-- navbar -->
    @include('layouts.sidebar')
    <!-- end navbar -->
    <div class="content">
      <div class="filter-content">
        <div class="filter">
          <div class="header-filter">
            <p>Filter</p>
          </div>
          <div class="major">
            <div class="header-major">
              <p>Major</p>
            </div>
            <div class="list-major">
                <ul>
                    @foreach($menu_categories as $menu_category)
                        <li><a class="dropdown-item" href="{{ route('shop.index', $menu_category->slug) }}">{{ $menu_category->name }}</a></li>
                        <ul>
                                @foreach($menu_category->children as $children)
                                <li><a class="dropdown-item" style="color: #b4b4b4" href="{{ route('shop.index', $children->slug) }}">{{ $children->name }}</a></li>
                                @endforeach
                        </ul>
                        @endforeach


                    </ul>
            </div>
          </div>
          <div class="price-filter">
            <div class="header-price">
              <p>Price</p>
            </div>
            <div class="price-inp">
                <div class="min-price">
                <form action="">
                <label for="min">Min</label>
                <input type="number" name="min" id="min">
              </div>

              <div class="max-price">
                <label for="max">Max</label>
                <input type="number" name="max" id="max">

                <button type="submit" style="display: none"></button>
              </div>
            </div>
            </form>
          </div>
          <div class="category-filter">
            <div class="header-category">
              <p>Category</p>
            </div>
            <ul class="menu-category">
                @foreach($menu_tags as $menu_tag)
                <li><a class="dropdown-item" href="{{ route('shop.tag', $menu_tag->slug) }}">{{ $menu_tag->name }}</a></li>
                @endforeach
            </ul>
          </div>
        </div>
      </div>
      <div class="main-content">
        <div class="product-content">
          <div class="header-product-content">
            <!-- <ul class="breadcrumb">
              <li><a href="loginseller.html">Home</a></li>
              <li>explore</li>
            </ul> -->
            <div class="title-content">
              <p>Explore</p>
            </div>
            <div class="filter-product">
              <div class="filter-label">
                <div class="label-menu">
                  <p>Broadcast</p>
                </div>
                <div class="label-menu">
                  <p>Broadcast</p>
                </div>
                <div class="label-menu">
                  <p>Broadcast</p>
                </div>
              </div>
              <div class="filter-dropdown">
                <label for="filter"><i class="fa fa-bars" aria-hidden="true"></i></label>
                <select name="filter" id="filter" class="option-filter">
                  <option value="popular">Popular</option>
                </select>
              </div>
            </div>

            <div class="product">
                <div class="row-top-product">
                  @forelse($products as $product)
                <div class="card-product">
                  <div class="img-card">
                    <img src="{{ $product->gallery->first()->getUrl() }}" alt="">
                  </div>
                  <div class="desc-product">
                    <div class="category-product">
                      <p>{{ $product->category['name'] }}</p>
                    </div>
                    <div class="name-product">
                        <p><a href="{{ route('product.show', $product->slug) }}">{{ $product->name }}</a></p>
                    </div>
                    <div class="row-price">
                      <div class="price">
                        <p>Rp. {{ $product->price }}</p>
                      </div>
                      <div class="other-btn">
                        <div class="btn-detail">
                          <button><i class="fa-solid fa-cart-shopping"></i></button>
                          <button><i class="fa fa-heart" aria-hidden="true"></i></button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                @empty
                <div class="col">
                    <h5 class="text-center">Product Empty</h5>
                </div>
                @endforelse
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</body>

</html>
