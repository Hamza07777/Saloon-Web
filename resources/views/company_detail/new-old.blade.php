@extends("layouts.app")

@section("content")
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>Company Details</h5>
                    <div class="card-header-right">
                        <a href="/services" class="btn btn-light">Back</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                    @include("common.error-message")

                    <form action="{{ route('company_detail.store') }}" method="post" enctype="multipart/form-data">
                        @csrf


                          <div class="form-group m-form__group">
                            <label>City</label>
                            <div class="input-group">
                              <input id="city"  class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}" required autocomplete="city" autofocus type="text" placeholder="City Name">
                            </div>
                          </div>
                          <div class="form-group m-form__group">
                            <label>Address</label>
                            <div class="input-group">
                              <textarea class="form-control" id="exampleFormControlTextarea4" rows="3" name="address" placeholder="Address"></textarea>
                            </div>
                          </div>
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
                            </div>
                        </div>

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
                            </div>
                          </div>
                          <div class="form-group m-form__group">
                            <label>Phone Number</label>
                            <div class="input-group">
                                <input id="phone_number"  class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') }}" required autocomplete="phone_number" autofocus type="text" placeholder="Phone Number">

                            </div>
                          </div>
                          <div class="form-group m-form__group">
                            <label>Whatsapp Number</label>
                            <div class="input-group">
                              <input id="whatsapp_number"  class="form-control @error('whatsapp_number') is-invalid @enderror" name="whatsapp_number" value="{{ old('whatsapp_number') }}" required autocomplete="whatsapp_number" autofocus type="text" placeholder="Whatsapp Number">
                            </div>
                          </div>
                          <div class="form-group m-form__group">
                            <label>Latitude</label>
                            <div class="input-group">
                              <input id="latitude"  class="form-control @error('latitude') is-invalid @enderror" name="latitude" value="{{ old('latitude') }}" required autocomplete="latitude" autofocus type="text" placeholder="latitude">
                            </div>
                          </div>
                          <div class="form-group m-form__group">
                            <label>Longitude</label>
                            <div class="input-group">
                              <input id="longitude"  class="form-control @error('longitude') is-invalid @enderror" name="longitude" value="{{ old('longitude') }}" required autocomplete="longitude" autofocus type="text" placeholder="longitude">
                            </div>
                          </div>
                          <div class="form-group m-form__group">
                            <label>Website</label>
                            <div class="input-group">
                              <input id="website"  class="form-control @error('website') is-invalid @enderror" name="website" value="{{ old('website') }}" required autocomplete="website" autofocus type="url" placeholder="website">
                            </div>
                          </div>
                          <div class="form-group m-form__group">
                            <label>Business_hours</label>
                            <div class="input-group">
                              <input id="business_hours"  class="form-control @error('business_hours') is-invalid @enderror" name="business_hours" value="{{ old('business_hours') }}" required autocomplete="business_hours" autofocus type="text" placeholder="Business hours">
                            </div>
                          </div>


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
                            </div>

                          <div class="form-group m-form__group mt-4">
                            <label>Logo (.PNG,.JPG)</label>
                            <div class="input-group">
                              <input class="form-control @error('logo_path') is-invalid @enderror" type="file"  name="logo_path" accept="image/jpeg, image/png" value="{{ old('logo_path') }}" required >
                            </div>
                          </div>
                          <div class="form-group m-form__group">
                            <label>License (.PNG,.JPG,.PDF)</label>
                            <div class="input-group">
                                <input class="form-control @error('license_path') is-invalid @enderror" type="file"  name="license_path" accept="image/jpeg, image/png, Application/pdf" value="{{ old('license_path') }}" required >
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
                      </div>

                    </form>

                </div>
            </div>
        </div>
        <script type="text/javascript">


        </script>
@endsection
