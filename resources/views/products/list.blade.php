@extends("layouts.app")

@section("content")
<div class="row">
    @foreach ($product as $product)
        <div class="col-xl-3 col-sm-6 xl-4">
        <div class="card">
            <div class="product-box">
            <div class="product-img">
                @if (!@empty($product->logo))
                <img src="{{ $product ->logo }}" style="width:314px; height: 161px; " class="img-fluid"    alt="Image description">
                @else
                <img class="img-fluid" src="../assets/images/ecommerce/01.jpg" alt="">
                @endif
                
            </div>
            
            <div class="product-details">
                <h4>{{ $product->name }}</h4>
                <hr>
                <h6>{{ $product->company_names($product->company_id ) }}</h6>
                <hr>
                <p>{{ $product->description }}</p>
                <hr>
                <a name="" id="" class="btn btn-info" href="{{url('product/'.$product->id .'/edit')}} " role="button">edit</a>

            </div>
            </div>
        </div>
        </div>
    @endforeach
  </div>
@endsection