
<section class="slice-sm footer-top-bar bg-white">
    <div class="container sct-inner">
        <div class="row no-gutters">
            <div class="col-lg-3 col-md-6">
                <div class="footer-top-box text-center">
                    <a href="{{ route('sellerpolicy') }}">
                        <i class="la la-file-text"></i>
                        <h4 class="heading-5">{{__('Seller Policy')}}</h4>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="footer-top-box text-center">
                    <a href="{{ route('returnpolicy') }}">
                        <i class="la la-mail-reply"></i>
                        <h4 class="heading-5">{{__('Return Policy')}}</h4>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="footer-top-box text-center">
                    <a href="{{ route('supportpolicy') }}">
                        <i class="la la-support"></i>
                        <h4 class="heading-5">{{__('Support Policy')}}</h4>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="footer-top-box text-center">
                    <a href="{{ route('profile') }}">
                        <i class="la la-dashboard"></i>
                        <h4 class="heading-5">{{__('My Profile')}}</h4>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- FOOTER -->
<footer id="footer" class="footer">
    <div class="footer-top">
        <div class="container">
            <div class="row cols-xs-space cols-sm-space cols-md-space">
                @php
                    $generalsetting = \App\GeneralSetting::first();
                @endphp
                <div class="col-lg-5 col-xl-4 text-center text-md-left">
                    <div class="col">
                        <a href="{{ route('home') }}" class="d-block">
                            @if($generalsetting->logo != null)
                                <img loading="lazy"  src="{{ asset($generalsetting->logo) }}" alt="{{ env('APP_NAME') }}" height="44">
                            @else
                                <img loading="lazy"  src="{{ asset('frontend/images/logo/logo.png') }}" alt="{{ env('APP_NAME') }}" height="44">
                            @endif
                        </a>
                        <p class="mt-3">{{ $generalsetting->description }}</p>
                        <div class="d-inline-block d-md-block">
                            <form class="form-inline" method="POST" action="{{ route('subscribers.store') }}">
                                @csrf
                                <div class="form-group mb-0">
                                    <input type="email" class="form-control" placeholder="{{__('Your Email Address')}}" name="email" required>
                                </div>
                                <button type="submit" class="btn btn-base-1 btn-icon-left">
                                    {{__('Subscribe')}}
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 offset-xl-1 col-md-4">
                    <div class="col text-center text-md-left">
                        <h4 class="heading heading-xs strong-600 text-uppercase mb-2">
                            {{__('Contact Info')}}
                        </h4>
                        <ul class="footer-links contact-widget">
                            <li>
                               <span class="d-block opacity-5">{{__('Address')}}:</span>
                               <span class="d-block">{{ $generalsetting->address }}</span>
                            </li>
                            <li>
                               <span class="d-block opacity-5">{{__('Phone')}}:</span>
                               <span class="d-block">{{ $generalsetting->phone }}</span>
                            </li>
                            <li>
                               <span class="d-block opacity-5">{{__('Email')}}:</span>
                               <span class="d-block">
                                   <a href="mailto:{{ $generalsetting->email }}">{{ $generalsetting->email  }}</a>
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4">
                    <div class="col text-center text-md-left">
                        <h4 class="heading heading-xs strong-600 text-uppercase mb-2">
                            {{__('Useful Link')}}
                        </h4>
                        <ul class="footer-links">
                            @foreach (\App\Link::all() as $key => $link)
                                <li>
                                    <a href="{{ $link->url }}" title="">
                                        {{ $link->name }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="col-md-4 col-lg-2">
                    <div class="col text-center text-md-left">
                       <h4 class="heading heading-xs strong-600 text-uppercase mb-2">
                          {{__('My Account')}}
                       </h4>

                       <ul class="footer-links">
                            @if (Auth::check())
                                <li>
                                    <a href="{{ route('logout') }}" title="Logout">
                                        {{__('Logout')}}
                                    </a>
                                </li>
                            @else
                                <li>
                                    <a href="{{ route('user.login') }}" title="Login">
                                        {{__('Login')}}
                                    </a>
                                </li>
                            @endif
                            <li>
                                <a href="{{ route('purchase_history.index') }}" title="Order History">
                                    {{__('Order History')}}
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('wishlists.index') }}" title="My Wishlist">
                                    {{__('My Wishlist')}}
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('orders.track') }}" title="Track Order">
                                    {{__('Track Order')}}
                                </a>
                            </li>
                        </ul>
                    </div>
                    @if (\App\BusinessSetting::where('type', 'vendor_system_activation')->first()->value == 1)
                        <div class="col text-center text-md-left">
                            <div class="mt-4">
                                <h4 class="heading heading-xs strong-600 text-uppercase mb-2">
                                    {{__('Be a Seller')}}
                                </h4>
                                <a href="{{ route('shops.create') }}" class="btn btn-base-1 btn-icon-left">
                                    {{__('Apply Now')}}
                                </a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="footer-bottom py-3 sct-color-3">
        <div class="container">
            <div class="row row-cols-xs-spaced flex flex-items-xs-middle">
                <div class="col-md-4">
                    <div class="copyright text-center text-md-left">
                        <ul class="copy-links no-margin">
                            <li>
                                © {{ date('Y') }} {{ $generalsetting->site_name }}
                            </li>
                            <li>
                                <a href="{{ route('terms') }}">{{__('Terms')}}</a>
                            </li>
                            <li>
                                <a href="{{ route('privacypolicy') }}">{{__('Privacy policy')}}</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <ul class="text-center my-3 my-md-0 social-nav model-2">
                        @if ($generalsetting->facebook != null)
                            <li>
                                <a href="{{ $generalsetting->facebook }}" class="facebook" target="_blank" data-toggle="tooltip" data-original-title="Facebook">
                                    <i class="fa fa-facebook"></i>
                                </a>
                            </li>
                        @endif
                        @if ($generalsetting->instagram != null)
                            <li>
                                <a href="{{ $generalsetting->instagram }}" class="instagram" target="_blank" data-toggle="tooltip" data-original-title="Instagram">
                                    <i class="fa fa-instagram"></i>
                                </a>
                            </li>
                        @endif
                        @if ($generalsetting->twitter != null)
                            <li>
                                <a href="{{ $generalsetting->twitter }}" class="twitter" target="_blank" data-toggle="tooltip" data-original-title="Twitter">
                                    <i class="fa fa-twitter"></i>
                                </a>
                            </li>
                        @endif
                        @if ($generalsetting->youtube != null)
                            <li>
                                <a href="{{ $generalsetting->youtube }}" class="youtube" target="_blank" data-toggle="tooltip" data-original-title="Youtube">
                                    <i class="fa fa-youtube"></i>
                                </a>
                            </li>
                        @endif
                        @if ($generalsetting->google_plus != null)
                            <li>
                                <a href="{{ $generalsetting->google_plus }}" class="google-plus" target="_blank" data-toggle="tooltip" data-original-title="Google Plus">
                                    <i class="fa fa-google-plus"></i>
                                </a>
                            </li>
                        @endif
                    </ul>
                </div>
                <div class="col-md-4">
                    <div class="text-center text-md-right">
                        <ul class="inline-links">
                            @if (\App\BusinessSetting::where('type', 'paypal_payment')->first()->value == 1)
                                <li>
                                    <img loading="lazy" alt="paypal" src="{{ asset('frontend/images/icons/cards/paypal.png')}}" height="20">
                                </li>
                            @endif
                            @if (\App\BusinessSetting::where('type', 'stripe_payment')->first()->value == 1)
                                <li>
                                    <img loading="lazy" alt="stripe" src="{{ asset('frontend/images/icons/cards/stripe.png')}}" height="20">
                                </li>
                            @endif
                            @if (\App\BusinessSetting::where('type', 'sslcommerz_payment')->first()->value == 1)
                                <li>
                                    <img loading="lazy" alt="sslcommerz" src="{{ asset('frontend/images/icons/cards/sslcommerz.png')}}" height="20">
                                </li>
                            @endif
                            @if (\App\BusinessSetting::where('type', 'instamojo_payment')->first()->value == 1)
                                <li>
                                    <img loading="lazy" alt="instamojo" src="{{ asset('frontend/images/icons/cards/instamojo.png')}}" height="20">
                                </li>
                            @endif
                            @if (\App\BusinessSetting::where('type', 'razorpay')->first()->value == 1)
                                <li>
                                    <img loading="lazy" alt="razorpay" src="{{ asset('frontend/images/icons/cards/rozarpay.png')}}" height="20">
                                </li>
                            @endif
                            @if (\App\BusinessSetting::where('type', 'paystack')->first()->value == 1)
                                <li>
                                    <img loading="lazy" alt="paystack" src="{{ asset('frontend/images/icons/cards/paystack.png')}}" height="20">
                                </li>
                            @endif
                            @if (\App\BusinessSetting::where('type', 'cash_payment')->first()->value == 1)
                                <li>
                                    <img loading="lazy" alt="cash on delivery" src="{{ asset('frontend/images/icons/cards/cod.png')}}" height="20">
                                </li>
                            @endif
                            @if (\App\Addon::where('unique_identifier', 'offline_payment')->first() != null && \App\Addon::where('unique_identifier', 'offline_payment')->first()->activated)
                                @foreach(\App\ManualPaymentMethod::all() as $method)
                                  <li>
                                    <img loading="lazy" alt="{{ $method->heading }}" src="{{ asset($method->photo)}}" height="20">
                                </li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
    <!--=============================FOOTER START  ============================ -->
    {{-- <footer id="footer" class="footer-bg-color position-relative padding_top pt-5" style="--r1: 130%; --r2: 71.5%">
        <div class="container">
          <div class="row">
            <div class="col-lg-4 col-12">
              <div class="footer-logo-box text_white">
                <div class="header-logo">
                  <a
                    class="
                      footer-logo
                      navbar-brand
                      text-white
                      font-weight-bold
                      text-uppercase
                      font-weight-bolder
                      mb-4
                      p-0
                    "
                    href="index.html"
                  >
                    <img src="template/img/logo.png" alt="image" />
                  </a>
                </div>
                <p class="text-white font-weight-normal">
                  Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                  Sequi, quia accusantium eum aperiam ea eaque ab dignissimos
                  totam pariatur debitis corporis laborum earum illo alias
                  cumque harum quasi, rem commodi.
                </p>
                <ul class="d-flex">
                  <li class="logo-bg">
                    <a href="https://www.facebook.com" class="text-white"
                      ><i class="fa fa-facebook" aria-hidden="true"></i
                    ></a>
                  </li>
                  <li class="feature_in_bg ml-3">
                    <a
                      href="https://www.instagram.com"
                      class="text-white"
                      =""
                      =""
                      ><i class="fa fa-instagram" aria-hidden="true"></i
                    ></a>
                  </li>
                  <li class="logo-bg ml-3">
                    <a href="https://www.google.com" class="text-white" ="" =""
                      ><i class="fa fa-google-plus" aria-hidden="true"></i
                    ></a>
                  </li>
                  <li class="logo-bg ml-3">
                    <a href="https://np.linkedin.com" class="text-white" ="" =""
                      ><i class="fa fa-linkedin" aria-hidden="true"></i
                    ></a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-lg-2 col-6">
              <div class="footer-title text_white footer_after">
                <h4 class="mb-2 mb-md-4 text-white">Quick Links</h4>
                <ul class="text-white">
                  <li class="mb-2">
                    <a href="index.html" class="text-white">Home</a>
                  </li>
                  <li class="mb-2">
                    <a href="product.html" class="text-white">Products</a>
                  </li>
                  <li class="mb-2">
                    <a href="checkout.html" class="text-white">Checkout</a>
                  </li>
                  <li class="mb-2">
                    <a href="cart.html" class="text-white">Cart</a>
                  </li>
                  <li class="mb-2">
                    <a href="blog.html" class="text-white">Blog</a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-lg-2 col-6">
              <div class="footer-title text_white footer_after">
                <h4 class="text-white mb-2 mb-md-4">Links</h4>
                <ul>
                  <li class="mb-2">
                    <a href="" class="text-white">Links 1</a>
                  </li>
                  <li class="mb-2">
                    <a href="" class="text-white">Links 2</a>
                  </li>
                  <li class="mb-2">
                    <a href="" class="text-white">Links 3</a>
                  </li>
                  <li class="mb-2">
                    <a href="" class="text-white">Links 4</a>
                  </li>
                  <li class="mb-2">
                    <a href="" class="text-white">Links 5</a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-lg-4 col-12 mt-4 mt-lg-0">
              <div class="footer-title text_white footer_after">
                <h4 class="text-white mb-2 mb-md-4">Find Us</h4>
                <ul>
                  <li class="text-white mb-2">
                    <span class="pr-3"
                      ><i class="fa fa-map-marker" aria-hidden="true"></i></span
                    >Kathmandu, Nepal
                  </li>
                  <li class="text-white mb-2">
                    <a href="tel:+61283870907, +61452145677" class="text-light"
                      ><span class="pr-3"
                        ><i class="fa fa-phone" aria-hidden="true"></i
                      ></span>
                      +61283870907, +61452145677</a
                    >
                  </li>
                  <li>
                    <a href="mailto:niuto@gmail.com" class="text-white"
                      ><span class="pr-3"
                        ><i
                          class="fa fa-envelope-square"
                          aria-hidden="true"
                        ></i></span
                      >niuto@gmail.com</a
                    >
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <hr />
          <div class="row">
            <div class="col-md-12 text-center pb-3 pt-2">
              <p class="mb-0 text-white text-center font-weight-normal">
                Copyright All Right Reserved 2021.
                <span class="testimonial-title">Power by NEXT NEPAL </span>
              </p>
            </div>
          </div>
        </div>
    </footer> --}}
      <!--=============================FOOTER END  ============================ -->