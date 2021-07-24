@extends("layouts.app")

@section("content")
    <div class="row">
        <div class="col-sm-2">
        </div>    
        <div class="col-sm-8">
            <div class="card" style="padding: 20px;">
                <div class="card-header">
                    <h5>Propose Service</h5>
                    <div class="card-header-right">
                        <a href="/services" class="btn btn-light">Back</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                    {{--  @include("common.error-message")  --}}

                    <form action="{{ route('purpose_service.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                                  <div class="form-group m-form__group">
                                    <label>Service Name</label>
                                    <div class="input-group">
                                      <input type="text" placeholder="Service Name" id="name"  class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                      @error('name')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                       @enderror
                                    </div>
                                  </div>
                                  <div class="form-group m-form__group">
                                    <label>Service Price</label>
                                    <div class="input-group">
                                      <input type="text" placeholder="Service Price"  id="price1"  class="form-control @error('price1') is-invalid @enderror" name="price1" value="{{ old('price') }}" required autocomplete="price" autofocus>
                                      @error('price1')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                       @enderror
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
            <div class="col-sm-2">
            </div> 
        </div>

        <script type="text/javascript">


        </script>
@endsection
