@extends("layouts.app_detail")

@section("content")
<style>
    #map {
       height: 350px;
       width: 100%;
    }
    </style>
<div class="row">
    <div class="col-sm-12">
      <div class="card">
        <div class="card-header">
            <h5>Company Details</h5>
            <div class="card-header-right">
                {{--  <a href="/services" class="btn btn-light">Back</a>  --}}
            </div>
        </div>
        <div class="card-body">
            <form class="f1" action="{{ route('company_detail.store') }}" method="post" enctype="multipart/form-data">
                @csrf

            <div class="f1-steps">
              <div class="f1-progress">
                <div class="f1-progress-line" data-now-value="50" data-number-of-steps="2"></div>
              </div>

              <div class="f1-step active " style="width: 50%;" >
                <div class="f1-step-icon "><i class="fa fa-user"></i></div>
                <p>Basic</p>
              </div>
              <div class="f1-step" style="width: 50%;" >
                <div class="f1-step-icon"><i class="fa fa-key"></i></div>
                <p>More Details</p>
              </div>

            </div>

            <fieldset>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group m-form__group">
                          <label>Company Name</label>
                          <div class="input-group">
                            <input id="country_name"  class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autofocus type="text" placeholder="Company Name">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                             @enderror
                          </div>
                          <div id="countryList">
                        </div>
                        </div>
                      </div>
                <div class="col-md-6">
                <div class="form-group m-form__group">
                    <label>City</label>
                    <div class="input-group">
                      <input id="city"  class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}" required autocomplete="city" autofocus type="text" placeholder="City Name">
                      @error('city')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                       @enderror
                    </div>
                  </div>
                </div>



                <div class="col-md-6">
                  <div class="form-group m-form__group">
                    <label>Country</label>
                    <div class="input-group">
                      <select class="js-example-basic-single col-sm-12" name="country">
                        <optgroup label="Country">
                          <option value="AED">Autralia</option>
                          <option value="USD">USA</option>
                          <option value="SAR">Saudia</option>
                          <option value="PKR">Pakistan</option>
                        </optgroup>
                      </select>
                      @error('country')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                       @enderror
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group m-form__group">
                      <label>Currency</label>
                      <div class="input-group">
                        <select class="js-example-basic-single col-sm-12" name="currency">
                          <optgroup label="Currency">
                            <option value="AED">AED</option>
                            <option value="USD">USD</option>
                            <option value="SAR">SAR</option>
                            <option value="PKR">PKR</option>
                          </optgroup>
                        </select>
                        @error('currency')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                         @enderror
                      </div>
                  </div>
                  </div>
                <div class="col-md-6">
                  <div class="form-group m-form__group">
                    <label>Whatsapp Number</label>
                    <div class="input-group">
                      <input id="whatsapp_number"  class="form-control @error('whatsapp_number') is-invalid @enderror" name="whatsapp_number" value="{{ old('whatsapp_number') }}" required autocomplete="whatsapp_number" autofocus type="text" placeholder="Whatsapp Number">
                      @error('whatsapp_number')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                       @enderror
                    </div>
                  </div>
                </div>


                <div class="col-md-6">
                    <div class="form-group m-form__group">
                      <label>Phone Number</label>
                      <div class="input-group">
                          <input id="phone_number"  class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') }}" required autocomplete="phone_number" autofocus type="text" placeholder="Phone Number">
                          @error('phone_number')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                           @enderror
                      </div>
                    </div>
                  </div>


                <div class="col-md-6">
                    <div class="form-group m-form__group">
                        <label>Website</label>
                        <div class="input-group">
                          <input id="website"  class="form-control @error('website') is-invalid @enderror" name="website" value="{{ old('website') }}" required autocomplete="website" autofocus type="url" placeholder="website">
                          @error('website')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                           @enderror
                        </div>
                      </div>
                    </div>
                      <div class="col-md-6">
                      <div class="form-group m-form__group">
                        <label>Business_hours</label>
                        <div class="input-group">
                          <input id="business_hours"  class="form-control @error('business_hours') is-invalid @enderror" name="business_hours" value="{{ old('business_hours') }}" required autocomplete="business_hours" autofocus type="text" placeholder="Business hours">
                          @error('business_hours')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                           @enderror
                        </div>
                      </div>
                    </div>
                <div class="col-md-6">
                    <div class="form-group m-form__group">
                      <label>Address</label>
                      <div class="input-group">
                        <textarea class="form-control" id="exampleFormControlTextarea4" rows="3" name="address" placeholder="Address">{{ old('address') }}</textarea>
                        @error('address')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                       @enderror
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group m-form__group">
                        <label>Description</label>
                        <div class="input-group">
                          <textarea class="form-control" id="exampleFormControlTextarea4" rows="3" name="description" placeholder="Description">{{ old('Description') }}</textarea>
                          @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                         @enderror
                        </div>
                      </div>
                </div>

                  <div class="col-md-6">

                  </div>
                  <div class="col-md-6">
                    <div class="f1-buttons">
                        <button class="btn btn-primary btn-next float-right" type="button">Next</button>
                      </div>
                  </div>

            </div>
            </fieldset>


            <fieldset>
                <div class="row">
                 <div class="col-md-12">
                    <div id="map"></div>
                </div>
                <div class="col-md-6 mt-5" >
                    <div class="form-group m-form__group">
                      <label>Longitude</label>
                      <div class="input-group">
                        <input id="longitude"  class="form-control @error('longitude') is-invalid @enderror" name="longitude" value="{{ old('longitude') }}" required autocomplete="longitude" autofocus type="text" placeholder="longitude">
                        @error('longitude')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                         @enderror
                      </div>
                    </div>
                  </div>

                  <div class="col-md-6  mt-5">
                    <div class="form-group m-form__group">
                      <label>Latitude</label>
                      <div class="input-group">
                        <input id="latitude"  class="form-control @error('latitude') is-invalid @enderror" name="latitude" value="{{ old('latitude') }}" required autocomplete="latitude" autofocus type="text" placeholder="latitude">
                        @error('latitude')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                         @enderror
                      </div>
                    </div>
                  </div>
                <div class="col-md-6">
                    <div class="form-group m-form__group mt-4">
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

                    <div class="col-md-6">
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
                </div>
                <div class="col-md-6 mt-4">
                    <div class="form-group m-t-15 m-checkbox-inline mb-0 custom-radio-ml">
                      <label>Saloon Type</label><br>
                      <div class="radio radio-primary">
                        <input id="radioinline1" type="radio" name="saloon_type" value="women" checked>
                        <label class="mb-0" for="radioinline1">Women</label>
                      </div>
                      <div class="radio radio-primary">
                        <input id="radioinline2" type="radio" name="saloon_type" value="men">
                        <label class="mb-0" for="radioinline2">Men</label>
                      </div>
                      <div class="radio radio-primary">
                        <input id="radioinline3" type="radio" name="saloon_type" value="unisex">
                        <label class="mb-0" for="radioinline3">Unisex</label>
                      </div>
                      @error('saloon_type')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                       @enderror
                    </div>
                </div>
                <div class="col-md-12 mt-5">
                    <label>Select Brand</label>
                    <div class="vertical-scroll scroll-demo" style="height: 119px;">
                        <div class="row mt-2" id="chk_boxes_jquery">
                            @foreach($brand as $brand)
                                <div class='col-md-4 mt-2'>
                                    <label class='d-block' for='chk-ani'>
                                        <input class='checkbox_animated' name='brand[]' id='chk-ani' value="{{ $brand->id }}" type='checkbox'>{{ $brand->name }}</label>
                                </div>
                            @endforeach
                        </div>
                      </div>
                </div>
                <input type="hidden" id="rating" name="rating">
                <input type="hidden" id="total_reviews" name="total_reviews">
                <div class="col-md-6">

                </div>
                <div class="col-md-6 mt-lg-5">
                  <div class="f1-buttons">
                    <button class="btn btn-primary btn-previous " type="button">Previous</button>
                    <button class="btn btn-primary btn-submit " type="submit">Submit</button>

                    </div>
                </div>

            </div>
            </fieldset>



          </form>
        </div>
      </div>
    </div>
  </div>
  <script
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBxSKFT02vzcoYE93-_ks4BecdUdgN5pDI&callback=initMap&libraries=&v=weekly"
  async
></script>
  <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>

  <script type="text/javascript">

        function initMap() {
          const myLatlng = { lat: 25.3929771, lng: 55.4564803 };
          const map = new google.maps.Map(document.getElementById("map"), {
            zoom: 4,
            center: myLatlng,
          });
          // Create the initial InfoWindow.
          let infoWindow = new google.maps.InfoWindow({
            content: "Click the map to get Lat/Lng!",
            position: myLatlng,
          });
          infoWindow.open(map);
          // Configure the click listener.
          map.addListener("click", (mapsMouseEvent) => {
            // Close the current InfoWindow.
            infoWindow.close();
            // Create a new InfoWindow.
            infoWindow = new google.maps.InfoWindow({
              position: mapsMouseEvent.latLng,
            });
            infoWindow.setContent(
              JSON.stringify(mapsMouseEvent.latLng.toJSON(), null, 2)
            );
            infoWindow.open(map);
            $('#latitude').val(mapsMouseEvent.lat());
            $('#longitude').val(mapsMouseEvent.lng());
          });
        }
      </script>
  <script>
    $(document).ready(function(){

     $('#country_name').keyup(function(){
        $value=$(this).val();
             $.ajax({
            url : '{{URL::to('search_company')}}',
            type : 'get',

              data:{'search':$value},
              success:function(data){


               $('#countryList').fadeIn();
                        $('#countryList').html(data);

              }
             });

        });

        $(document).on('click', 'li', function(){
            $value=$(this).text();
            $('#country_name').val($(this).text());
            $('#countryList').fadeOut();

            $.ajax({
                url : '{{URL::to('company_detail_Select')}}',
                type : 'get',
                dataType: 'json',
                  data:{'search':$value},
                  success:function(response){
                   var address=response.address;
                   var phone_number=response.phone_number;
                   var business_hours=response.business_hours;
                   var latitude=response.latitude;
                   var longitude=response.longitude;
                   var website=response.website;
                   var rating=response.rating;
                   var total_reviews=response.total_reviews;

                    $('#exampleFormControlTextarea4').html(address);
                    $('#phone_number').val(phone_number);
                    $('#whatsapp_number').val(phone_number);
                    $('#business_hours').val(business_hours);
                    $('#latitude').val(latitude);
                    $('#longitude').val(longitude);
                    $('#website').val(website);
                    $('#rating').val(rating);
                    $('#total_reviews').val(total_reviews);
                  }
                 });

        });

    });
    </script>


    <script type="text/javascript">
    $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
    </script>

@endsection
