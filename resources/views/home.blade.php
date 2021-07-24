@extends('layouts.app')

@section('content')
<style type="text/css">
    /* Set the size of the div element that contains the map */
    #map {
      height: 400px;
      /* The height is 400 pixels */
      width: 100%;
      /* The width is the width of the web page */
    }
  </style>
<div class="user-profile">
    <div class="row">
      <!-- user profile first-style start-->
      <div class="col-sm-12">
        <div class="card hovercard text-center">

          <div class="cardheader" id="company_cover">
            <div class="icon-wrapper float-right"><i class="icofont icofont-pencil-alt-5"></i></div>
          </div>
          <div class="user-image">
            <div class="avatar">
                @if (!@empty($company->logo_path))

                        <img src="{{ asset('company_image/'.$company->logo_path )}}" alt="Image description">
                        @else
                        <img alt="" src="../assets/images/user/7.jpg">
                        @endif

            </div>
            <div class="icon-wrapper"><i class="icofont icofont-pencil-alt-5"></i></div>
          </div>
          <div class="info">
            <div class="row">
              <div class="col-sm-6 col-lg-4 order-sm-1 order-xl-0">
                <div class="row">
                  <div class="col-md-6">
                    <div class="ttl-info text-left">
                      <h6><i class="fa fa-envelope"></i>   Email</h6><span>{{ Auth::user()->email }}</span>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="ttl-info text-left">
                      <h6><i class="fa fa-calendar"></i> Joined</h6><span> {{ $company->created_at->format('l jS \\of F Y') }}</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-12 col-lg-4 order-sm-0 order-xl-1">
                <div class="user-designation">
                  <div class="title"><a target="_blank" href="">{{ Auth::user()->name }}</a></div>
                  <div class="desc mt-2">{{ $company->city }}</div>
                </div>
              </div>
              <div class="col-sm-6 col-lg-4 order-sm-2 order-xl-2">
                <div class="row">
                  <div class="col-md-6">
                    <div class="ttl-info text-left">
                      <h6><i class="fa fa-phone"></i>   Contact Us</h6><span> {{ $company->country }} {{ $company->phone_number }} </span>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="ttl-info text-left">
                      <h6><i class="fa fa-location-arrow"></i>   Location</h6><span>  {{ $company->address }}</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <hr>
          </div>
        </div>
      </div>


      <div class="col-sm-12">
        <div class="card">
          <div class="card-header">
            <h5>Contact Details</span>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-8">
                <form action="{{ url('company_detail/'.$company->user_id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    {{ method_field('PUT') }}

                   <div class="form-group m-form__group">
                    <label>Name</label>
                    <div class="input-group">
                      <input class="form-control @error('city') is-invalid @enderror" name="name" value="{{ Auth::user()->name }}" required autocomplete="city"   type="text" >
                      @error('name')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                       @enderror
                    </div>
                  </div>
                  <div class="form-group m-form__group">
                    <label>Email</label>
                    <div class="input-group">
                      <input class="form-control @error('city') is-invalid @enderror" name="email" value="{{ Auth::user()->email }}" required autocomplete="city"   type="email" >
                      @error('email')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                       @enderror
                    </div>
                  </div>
                  <div class="form-group m-form__group">
                    <label>Company Name</label>
                    <div class="input-group">
                      <input id="name"  class="form-control @error('name') is-invalid @enderror" name="namee" value="{{ $company->name }}" required autocomplete="name"  type="text" placeholder="Company Name">
                      @error('namee')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                       @enderror
                    </div>
                  </div>
                  <div class="form-group m-form__group">
                    <label>City</label>
                    <div class="input-group">
                      <input id="city"  class="form-control @error('city') is-invalid @enderror" name="city" value="{{ $company->city }}" required autocomplete="city"   type="text">
                      @error('city')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                       @enderror
                    </div>
                  </div>
                  <div class="form-group m-form__group">
                    <label>Address</label>
                    <div class="input-group">
                      <textarea class="form-control" id="exampleFormControlTextarea4" rows="3" name="address" placeholder="Address">{{ $company->address }}</textarea>
                      @error('address')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                       @enderror
                    </div>
                  </div>


                    <div class="form-group m-form__group">
                        <label>Description</label>
                        <div class="input-group">
                          <textarea class="form-control" id="exampleFormControlTextarea4" rows="3" name="description" placeholder="Description">{{ $company->description }}</textarea>
                          @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                         @enderror
                        </div>
                      </div>

                  <div class="form-group m-form__group">
                    <label>Currency</label>
                    <div class="input-group">
                      <select class="js-example-basic-single col-sm-12" name="currency">
                        <optgroup label="Currency">
                          <option value="AED" @if ($company->currency=='AED')
                            selected
                        @endif>AED</option>
                          <option value="USD" @if ($company->currency=='USD')
                            selected
                        @endif>USD</option>
                          <option value="SAR" @if ($company->currency=='SAR')
                            selected
                        @endif>SAR</option>
                          <option value="PKR" @if ($company->currency=='PKR')
                            selected
                        @endif>PKR</option>
                        </optgroup>
                      </select>
                      @error('currency')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                       @enderror
                    </div>
                </div>

                  <div class="form-group m-form__group">
                    <label>Country</label>
                    <div class="input-group">
                      <select class="js-example-basic-single col-sm-12" name="country">
                        <optgroup label="Country">
                          <option value="AED"  @if ($company->country=='AED')
                            selected
                        @endif>Autralia</option>
                          <option value="USD"  @if ($company->country=='USD')
                            selected
                        @endif>USA</option>
                          <option value="SAR"  @if ($company->country=='SAR')
                            selected
                        @endif>Saudia</option>
                          <option value="PKR"  @if ($company->country=='PKR')
                            selected
                        @endif>Pakistan</option>
                        </optgroup>
                      </select>
                      @error('country')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                       @enderror
                    </div>
                  </div>
                  <div class="form-group m-form__group">
                    <label>Phone Number</label>
                    <div class="input-group">
                        <input id="phone_number"  class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ $company->phone_number }}" required autocomplete="phone_number"   type="text" placeholder="Phone Number">
                        @error('phone_number')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                         @enderror
                    </div>
                  </div>
                  <div class="form-group m-form__group">
                    <label>Whatsapp Number</label>
                    <div class="input-group">
                      <input id="whatsapp_number"  class="form-control @error('whatsapp_number') is-invalid @enderror" name="whatsapp_number" value="{{ $company->whatsapp_number }}" required autocomplete="whatsapp_number"   type="text" placeholder="Whatsapp Number">
                      @error('whatsapp_number')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                       @enderror
                    </div>
                  </div>
                  <div class="form-group m-form__group">
                    <label>latitude</label>
                    <div class="input-group">
                      <input id="latitude"  class="form-control @error('latitude') is-invalid @enderror" name="latitude" value="{{ $company->latitude }}" required autocomplete="latitude"   type="text" placeholder="latitude">
                      @error('latitude')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                       @enderror
                    </div>
                  </div>
                  <div class="form-group m-form__group">
                    <label>longitude</label>
                    <div class="input-group">
                      <input id="longitude"  class="form-control @error('longitude') is-invalid @enderror" name="longitude" value="{{ $company->longitude }}" required autocomplete="longitude"   type="text" placeholder="longitude">
                      @error('longitude')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                       @enderror
                    </div>
                  </div>
                  <div class="form-group m-form__group">
                    <label>website</label>
                    <div class="input-group">
                      <input id="website"  class="form-control @error('website') is-invalid @enderror" name="website" value="{{ $company->website }}" required autocomplete="website"   type="url" placeholder="website">
                      @error('website')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                       @enderror
                    </div>
                  </div>
                  <div class="form-group m-form__group">
                    <label>business_hours</label>
                    <div class="input-group">
                      <input id="business_hours"  class="form-control @error('business_hours') is-invalid @enderror" name="business_hours" value="{{ $company->business_hours }}" required autocomplete="business_hours"   type="text" placeholder="Business hours">
                      @error('business_hours')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                       @enderror
                    </div>
                  </div>


                    <div class="form-group m-t-15 m-checkbox-inline mb-0 custom-radio-ml">
                      <label>Saloon Type</label><br>
                      <div class="radio radio-primary">
                        <input id="radioinline1" type="radio" name="saloon_type" value="women"  @if ($company->saloon_type=='women')
                        checked
                    @endif >
                        <label class="mb-0" for="radioinline1">women</label>
                      </div>
                      <div class="radio radio-primary">
                        <input id="radioinline2" type="radio" name="saloon_type" value="men"  @if ($company->saloon_type=='men')
                        checked
                    @endif>
                        <label class="mb-0" for="radioinline2">men</label>
                      </div>
                      <div class="radio radio-primary">
                        <input id="radioinline3" type="radio" name="saloon_type" value="unisex"  @if ($company->saloon_type=='unisex')
                        checked
                    @endif>
                        <label class="mb-0" for="radioinline3">unisex</label>
                        @error('saloon_type')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                         @enderror
                      </div>
                    </div>

                  <div class="form-group m-form__group mt-4">
                    <label>Logo (.PNG,.JPG)</label>
                    <div class="input-group">
                      <input class="form-control @error('logo_path') is-invalid @enderror" type="file"  name="logo_path" accept="image/jpeg, image/png" value="{{ old('logo_path') }}" required >
                      @error('logo_path')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                       @enderror
                    </div>
                  </div>
                  <div class="form-group m-form__group">
                    <label>License (.PNG,.JPG,.PDF)</label>
                    <div class="input-group">
                        <input class="form-control @error('license_path') is-invalid @enderror" type="file"  name="license_path" accept="image/jpeg, image/png, Application/pdf" value="{{ old('license_path') }}" required >
                        @error('license_path')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                         @enderror
                      </div>
                  </div>
              </div>
            </div>
          </div>
          <input type="hidden" id="rating" name="rating" value="{{ $company->rating }}">
          <input type="hidden" id="total_reviews" name="total_reviews" value="{{ $company->total_reviews }}">
          <div class="card-footer">
            <button class="btn btn-primary" type="submit">Submit</button>
            <button class="btn btn-light" type="submit">Cancel</button>
          </div>
        </div>
      </div>

    </form>
      <!-- user profile first-style end-->
      <!-- user profile second-style start-->
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header">
            <h5>Change Passowrd</span>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-8">
                <form action="{{ route('change_password') }}" method="post">
                    @csrf
                    {{ method_field('PUT') }}

                  <div class="form-group m-form__group">
                    <label>Passowrd</label>
                    <div class="input-group">
                      <input id="password" type="password" placeholder="*********" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                      @error('password')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                       @enderror
                    </div>
                  </div>
                  <div class="form-group m-form__group">
                    <label>Confirm Password</label>
                    <div class="input-group">
                      <input id="password-confirm" type="password" placeholder="*********"  class="form-control" name="password_confirmation" required autocomplete="new-password">

                    </div>
                  </div>

              </div>
            </div>
          </div>

          <div class="card-footer">
            <button class="btn btn-primary" type="submit">Submit</button>
            <button class="btn btn-light" type="submit">Cancel</button>
          </div>
        </div>
    </form>
      </div>


      <div class="col-sm-12">
        <div class="card">
          <div class="card-header">
            <h5>Company Brands</span>
                <div class="float-right">
                    <a href="" class="btn btn-primary"  data-toggle="modal" data-original-title="Purpose Brand" data-target="#exampleModal">Propose Brand</a>


                  </div>
          </div>
          <form action="{{ route('update_brand') }}" method="post">
            @csrf
            {{ method_field('PUT') }}
          <div class="card-body">
            <div class="row">
                <input type="hidden" name="id" value="{{ $company->id }}">
                <div class="col-md-12">
                    <div class="vertical-scroll scroll-demo" style="height: 119px;">
                        <div class="row mt-2" id="chk_boxes_jquery">

                            @foreach($brand as $brand)

                                    <div class='col-md-3 mt-2'>
                                        <label class='d-block' for='chk-ani'>
                                            <input class='checkbox_animated' name='brand[]' id='chk-ani' value="{{ $brand->id }}" type='checkbox'
                                            @foreach ($company_brand as $item)
                                                @if ($item->brand_id==$brand->id)
                                                checked
                                                @endif
                                            @endforeach
                                            >{{ $brand->name }}</label>
                                    </div>

                            @endforeach

                        </div>
                      </div>
                  </div>
            </div>
          </div>

          <div class="card-footer">
            <button class="btn btn-primary" type="submit">Submit</button>
            <button class="btn btn-light" type="submit">Cancel</button>
          </div>
        </div>
    </form>
      </div>
        <div class="col-sm-12">
          <div class="card">
            <div class="card-header">
              <div class="float-left">
              <h5>Company Working Days Details</h5>
              </div>


            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="display" id="basic-2">

                  <thead>
                    <tr>

                      <th>Company Name</th>
                      <th>First Day</th>
                      <th>Last Day</th>
                      <th>Off Day</th>
                      <th>Number of Working Days</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($company_bussines as $company_bussines)
                    <tr>


                      <td>{{ $company_bussines->company_name($company_bussines->company_id) }}</td>
                      <td>{{ $company_bussines->from }}</td>
                      <td>{{ $company_bussines->to }}</td>
                      <td>{{ $company_bussines->is_off_day }}</td>
                      <td>{{ $company_bussines->day }}</td>
                      <div class="col-6">
                     </div>
                     <div class="col-6">

                     </div>
                      <td>
                        <a class="float-left mt-2" name="" id=""  href="{{url('company_days/'.$company->id .'/edit')}} "><i class="fa fa-edit"></i></a>
                         </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>

              </div>
            </div>
          </div>
        </div>
        {{-- <div id="map"></div> --}}
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header">
            <h5>VECTOR WORLD MAP</h5><span>Below Map is displaying the world map.</span>
          </div>
          <div class="card-body">
            <div class="jvector-map-height" id="map"></div>
          </div>
        </div>
      </div>
      <hr>
      <div class="col-sm-12 text-center">
        <div class="social-media">
          <ul class="list-inline">
            <li class="list-inline-item"><a href="#"><i class="fa fa-facebook"></i></a></li>
            <li class="list-inline-item"><a href="#"><i class="fa fa-google-plus"></i></a></li>
            <li class="list-inline-item"><a href="#"><i class="fa fa-twitter"></i></a></li>
            <li class="list-inline-item"><a href="#"><i class="fa fa-instagram"></i></a></li>
            <li class="list-inline-item"><a href="#"><i class="fa fa-rss"></i></a></li>
          </ul>
        </div>
      </div>
      <hr>
    </div>

  </div>
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Propose Brand</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        </div>
        <form action="{{ route('purpose_brand.store') }}" method="post" enctype="multipart/form-data">
          @csrf
        <div class="modal-body">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group m-form__group">
                                <label>Brand Name</label>
                                <div class="input-group">
                                  <input type="text" placeholder="Brand Name" id="name"  class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autofocus autocomplete="name"  >
                                </div>
                              </div>
                        </div>

          </div>

        </div>
        <div class="modal-footer">
          <button class="btn btn-primary" type="button" data-dismiss="modal">Close</button>
          <button class="btn btn-secondary" type="submit">Propose</button>
        </div>
      </form>
      </div>
      <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBxSKFT02vzcoYE93-_ks4BecdUdgN5pDI&callback=initMap&libraries=&v=weekly"
      async
    ></script>
      <script>
        // Initialize and add the map
        function initMap() {
            const uluru = { lat: {{ $company->latitude }}, lng: {{ $company->longitude }} };
            var mapOptions = {
                zoom: 12,
                minZoom: 6,
                maxZoom: 17,
                zoomControl:true,
                zoomControlOptions: {
                      style:google.maps.ZoomControlStyle.DEFAULT
                },
                center: new google.maps.LatLng({{ $company->latitude }}, {{ $company->longitude }}),
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                scrollwheel: true,
                panControl:true,
                mapTypeControl:true,
                scaleControl:true,
                overviewMapControl:true,
                rotateControl:true
              }
          // The location of Uluru
        //  const uluru = { lat: -25.344, lng: 131.036 };
          // The map, centered at Uluru
          const map = new google.maps.Map(document.getElementById("map"),mapOptions);
          const marker = new google.maps.Marker({
            position: uluru,
            map: map,
          });
          // The marker, positioned at Uluru

          // var places = @json($location);

         // for(place in places)
//{

        //    place = places[place];
         // console.log(place);
          //  if(place.latitude && place.longitude)
       //     {

          //      const marker = new google.maps.Marker({
            //      position: new google.maps.LatLng(place.latitude, place.longitude),
             //       map: map,
             //     });
          //  }
      //  }  -
	}



      </script>

@endsection
