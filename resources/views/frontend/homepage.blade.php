@extends('layouts.tamplate')

@section('content')

<div class="content">
    <div class="header-content">
        <div class="left-row">
            <div class="best-quality">
                <div class="box-quality">
                    <div class="row-left">
                        <iconify-icon icon="ic:sharp-verified-user" style="font-size: 60px; color:  #5874AF ;">
                        </iconify-icon>
                        <p>Best <br> Quality</p>
                    </div>
                    <div class="row-right"></div>
                </div>
            </div>
            <div class="secure-payment">
                <div class="box-payment">
                    <div class="row-left"></div>
                    <div class="row-right">
                        <iconify-icon icon="ci:credit-card" style="font-size: 60px; color:  #5874AF"></iconify-icon>
                        <p>Secure <br> Payment</p>
                    </div>
                </div>
            </div>
            <div class="other-box">
                <div class="box-other">
                    <div class="row-left">
                        <iconify-icon icon="akar-icons:gear" style="font-size: 60px; color:  #5874AF ;"></iconify-icon>
                        <p>Tried & <br> Tested</p>
                    </div>
                    <div class="row-right"></div>
                </div>
            </div>
        </div>
        <div class="middle-row">
            <h1>Our Quality Ask Be</h1>
            <div class="middle-title">
                <h1>Different</h1>
            </div>
            <div class="box-top-left"></div>
            <div class="box-bottom-left"></div>
            <div class="box-top-right"></div>
            <div class="box-bottom-right"></div>
            <div class="btn-explore">
                <a href="search-page.html">
                    <button>Explore Now!</button>
                </a>
            </div>
        </div>
        <div class="right-row">
            <div class="secure-payment">
                <div class="box-payment">
                    <div class="row-left"></div>
                    <div class="row-right">
                        <iconify-icon icon="ci:credit-card" style="font-size: 60px; color:  #5874AF"></iconify-icon>
                        <p>Secure <br> Payment</p>
                    </div>
                </div>
            </div>
            <div class="best-quality">
                <div class="box-quality">
                    <div class="row-left">
                        <iconify-icon icon="ic:sharp-verified-user" style="font-size: 60px; color:  #5874AF ;">
                        </iconify-icon>
                        <p>Best <br> Quality</p>
                    </div>
                    <div class="row-right"></div>
                </div>
            </div>
            <div class="secure-payment">
                <div class="box-payment">
                    <div class="row-left"></div>
                    <div class="row-right">
                        <iconify-icon icon="akar-icons:gear" style="font-size: 60px; color:  #5874AF ;"></iconify-icon>
                        <p>Tried & <br> Tested</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="sorted">
        <h3>We Sorted Our Product By</h3>
        <div class="jurusan">
            <div class="bc">
                <img src="{{ asset('front/assets/bc.png') }}" alt="">
            </div>
            <div class="mm">
                <img src="{{ asset('front/assets/mm.png') }}" alt="">
            </div>
            <div class="rpl">
                <img src="{{ asset('front/assets/rpl.png') }}" alt="">
            </div>
            <div class="tjkt">
                <img src="{{ asset('front/assets/tjkt.png') }}" alt="">
            </div>
            <div class="te">
                <img src="{{ asset('front/assets/te.png') }}" alt="">
            </div>
        </div>
    </div>
    <div class="featured-product">
        <h1>Featured Product</h1>
        <h2>This Week</h2>
        <div class="product">
            <div class="img-product">
                <img src="{{ asset('front/assets/web2.jpg') }}" alt="">
            </div>
            <div class="desc-product">
                <div class="name-product">
                    <h3>Template Website</h3>
                </div>
                <div class="price-featured">
                    <p>Rp. 150.000</p>
                </div>
                <div class="description">
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quod, repellendus molestias. Accusamus
                        doloremque ad minima harum explicabo voluptates iste vitae magni. Itaque dolorum reprehenderit
                        odit voluptatum provident magnam modi tempore.</p>
                </div>
                <div class="btn-featured">
                    <a href="checkout-delivery.html"><button class="btn-buy"><i class="fa-solid fa-bag-shopping"></i>Buy
                            Now</button></a>
                    <button class="btn-cart"><i class="fa-solid fa-cart-shopping"></i>Add to cart</button>
                </div>
            </div>
        </div>
    </div>
    <div class="our-product">
        <h1>Our Product</h1>
        <div class="our-category">
            <button>Software</button>
            <button>Electronics</button>
            <button>Hardware</button>
            <button>Movies</button>
            <button>Design</button>
        </div>

        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1.0" />
            <meta http-equiv="X-UA-Compatible" content="ie=edge" />
            <title>Document</title>
            <link rel="stylesheet" href="{{ ('style.css') }}" />
        </head>

        <body>
            <div id="wrapper">
                <div id="carousel">
                    <div id="content">
                        <div class="product-carousel">
                            <div class="row-top-product">
                                @foreach($products as $product)


                                <div class="card-product">
                                    <div class="img-card">
                                        <img src="{{ $product->gallery->first()->getUrl() }}" alt="">
                                    </div>
                                    <div class="desc-product">
                                        <div class="category-product">
                                            <p>{{ $product->desc }}</p>
                                        </div>
                                        <div class="name-product">
                                            <a href="{{ route('product.show', $product->slug) }}">{{ $product->name }}</a>
                                        </div>
                                        <div class="row-price">
                                            <div class="price">
                                                <p>Rp.{{ $product->price }}</p>
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
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <button id="prev">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path fill="none" d="M0 0h24v24H0V0z" />
                        <path d="M15.61 7.41L14.2 6l-6 6 6 6 1.41-1.41L11.03 12l4.58-4.59z" />
                    </svg>
                </button>
                <button id="next">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path fill="none" d="M0 0h24v24H0V0z" />
                        <path d="M10.02 6L8.61 7.41 13.19 12l-4.58 4.59L10.02 18l6-6-6-6z" />
                    </svg>
                </button>
            </div>
            <script src="{{ asset('js/push.min.js') }}"></script>
            <script>



                Push.create("Hi!", {
                    body: "Hi Aku sayang Kamu",
                    timeout: 4000,
                    onClick: function () {
                        window.focus();
                        this.close();
                    }
                });



              </script>

        </body>
        <script src="app.js"></script>

        </html>

        <div class="our-btn">
            <a href="search-page.html">
                <button>All Category</button>
            </a>
        </div>
    </div>
</div>

<footer>
    <div class="footer">
        <div class="konten">
            <div class="kategori">
                <ul>
                    <li>
                        <p>Kategori</p>
                    </li>
                    <li><a href="">RPL</a></li>
                    <li><a href="">TJKT</a></li>
                    <li><a href="">BRC</a></li>
                    <li><a href="">TE</a></li>
                    <li><a href="">Animasi</a></li>
                </ul>
            </div>
            <div class="help-center">
                <ul>
                    <li>
                        <p>Help Center</p>
                    </li>
                    <li><a href="">FAQS</a></li>
                    <li><a href="">Terms & Conditions</a></li>
                    <li><a href="">Privacy Policy</a></li>
                </ul>
            </div>
            <div class="school-info">
                <ul>
                    <li>
                        <p>School Info</p>
                    </li>
                    <li><a
                            href="https://smktarunabhakti.net/index.php/whytarbak-before-import/identitas-sekolah-before-import/">About
                            Us</a>
                    </li>
                    <li><a
                            href="https://smktarunabhakti.net/index.php/struktur-kurikulum-sekolah-menengah-kejuruan-madrasah-aliyah-kejuruan-before-import/">Curicullum</a>
                    </li>
                    <li><a
                            href="https://smktarunabhakti.net/index.php/kurikulum-before-import/kompetensi-keahlian-smk-taruna-bhakti-before-import/">Subject</a>
                    </li>
                </ul>
            </div>

            <div class="logo-copyright">
                <img src="{{ asset('front/assets/logoTb.png') }}" alt="">
                <p>Copyright ©2022 SMK Taruna Bhakti </p>
            </div>
        </div>
        <div class="sosmed">
            <p>Contact Us</p>
            <ul>
                <li>
                    <a href="https://www.instagram.com/smktarunabhakti.depok/">
                        <img src="{{ asset('front/assets/instagram.png') }}" alt="">
                    </a>
                </li>
                <li>
                    <a href="https://www.youtube.com/c/SMKTarunaBhaktiDepok">
                        <img src="{{ asset('front/assets/youtube.png') }}" alt="">
                    </a>
                </li>
                <li>
                    <a href="https://www.facebook.com/smktarunabhaktidepok">
                        <img src="{{ asset('front/assets/facebook.png') }}" alt="">
                    </a></li>

                <li>
                    <a href="https://mail.google.com/mail/u/0/?hl=en#inbox">
                        <img src="{{ asset('front/assets/email.png') }}" alt="">
                    </a>
                </li>
            </ul>
        </div>
    </div>
</footer>

@endsection
