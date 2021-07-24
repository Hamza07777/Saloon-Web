
 @foreach ($service as $item)
    <div class='col-md-6 mt-3'>
        <label class='d-block' for='chk-ani'>
        <input class='checkbox_animated' name='services[]' id='chk-ani' value="{{ $item->id }}" type='checkbox' 
        @foreach ($empoloyee_service as $empoloyee_servic) @if($empoloyee_servic->service_id== $item->id ) checked {{ $empoloyee_servic->service_id  }}  @endif @endforeach >{{ $item->name }}</label>
    </div>
@endforeach 

