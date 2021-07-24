@extends("layouts.app")

@section("content")
@if (count($category)>0)
<div class="row">
    <div class="col-sm-2">
    </div> 
    <div class="col-sm-8">
      <div class="card" style="padding: 20px;">
        <div class="card-header">

            <form action="{{ route('service_category.store') }}" method="post" enctype="multipart/form-data">
                @csrf
          <div class="float-left">
            <h5>Select Services</h5>
            </div>
            <div class="float-right">
              <a name="" id="" class="btn btn-primary text-white"  role="button"  data-toggle="modal" data-original-title="Propose Service" data-target="#exampleModal" >Propose Service</a>
            </div>
        </div>
        <div class="card-body">
            @include("common.error-message")
          <div class="row">

            <?php $count=1;

            ?>
            @foreach( $category as  $category )
            <div class="col-sm-12 col-xl-6">
              <div class="card">
                <div class="card-header b-t-success b-b-info">
                  <h5>{{ $category->name }}</h5>
                </div>
                <div class="card-body animate-chk">

                    @foreach( $service as  $keys =>$services )

                    @if ($services->category_id == $category->id)

                    

                    <?php $count++; ?>
                    <label class="d-block" for="chk-ani">

 <input class="checkbox_animated chk_boxx{{ $count }}" id="chk-ani" name='services[]' value="{{$category->id }},{{ $services->id }},price{{$count }}"

 type="checkbox" @foreach ($service_category as $item)
 @if ($item->category_id==$category->id & $item->services==$services->id & $item->company_id==Auth::user()->id)
 checked disabled
 @endif

@endforeach >
                                                                       {{$services->name}}

                      </label>

                       <div class="form-group m-form__group formm{{ $count }}" >
                        <label>Service Price</label>
                        <div class="input-group">

                          <input type="text" placeholder="Service Price"

                          disabled


                          id="price{{ $count }}"

                          class="form-control @error('price') is-invalid @enderror" name="price[]"
                          @foreach ($service_category as $item)
                                @if (!@empty($item->price) & $item->category_id==$category->id & $item->services==$services->id & $item->company_id==Auth::user()->id)

                                    value="{{ $item->price }}"

                                    @endif
                             @endforeach
                          required autocomplete="price" autofocus>
                        </div>
                      </div>



                      <script type="text/javascript">
                        $(document).ready(function(){

                            $(".chk_boxx{{ $count }}").change(function(){

                             if($(this).prop("checked")){
                                $( "#price{{ $count }}" ).prop( "disabled", false );

                             }else{
                                $( "#price{{ $count }}" ).prop( "disabled", true );

                             }
                             });
                           });


                    </script>
                        
                    @endif


                      @endforeach


                  </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>

        <div class="card-footer pull-right">
          <button class="btn btn-primary" type="submit">Submit</button>
          <button class="btn btn-light" type="submit">Cancel</button>
        </div>
      </div>
    </div>
</form>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Purpose Service</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
          </div>
          <div class="modal-body">




                      <div class="row">
                      <div class="col-md-12 " >

                    <form action="{{ route('purpose_service.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                                  <div class="form-group m-form__group">
                                    <label>Service Name</label>
                                    <div class="input-group">
                                      <input type="text" placeholder="Service Name" id="name"  class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    </div>
                                  </div>
                                  <div class="form-group m-form__group">
                                    <label>Service Price</label>
                                    <div class="input-group">
                                      <input type="text" placeholder="Service Price"  id="price"  class="form-control @error('price1') is-invalid @enderror" name="price1" value="{{ old('price') }}" required autocomplete="price" autofocus>
                                    </div>
                                  </div>
                     </div>



            </div>

          </div>
          <div class="modal-footer">
            <button class="btn btn-primary" type="submit">Submit</button>
          <button class="btn btn-light" type="submit">Cancel</button>
          </div>
        </div>
    </form>
      </div>
    </div>
  </div>

  @else
  <div class="page-wrapper compact-wrapper" id="pageWrapper">
      <!-- error-400 start-->
      <div class="error-wrapper">
        <div class="container"><img class="img-100" src="../assets/images/other-images/sad.png" alt="">
          <div class="error-heading mb-5">
            <h2 class="font-info">Company Category are Not Found</h2>
          </div>
          <div class="col-md-8 offset-md-2">
            <p class="sub-content">Company Categories are not yet added for further Proceding Add Company Categories</p>
          </div>
          <div>
              <a name="" id="" class="btn btn-primary" href="{{ route('purpose_Category.create') }}" role="button">Purpose Category</a>

          </div>
        </div>
      </div>
      <!-- error-400 end-->
    </div>
  @endif
  <div class="col-sm-2">
</div> 
</div>


@endsection
