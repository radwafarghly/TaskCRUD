@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    <form action="{{ route('image.store') }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
        <div class="form-group">
            <label class="custom-file-label">Choose file</label>
            <!-- <input type="file" id="image" class="form-control" name="image[]" multiple>  -->
            <input type="file" id="image" class="form-control" name="image">    
        </div>
        <input type="submit" value="Upload" class="btn btn-success ">
    </form>
    </div>
     @foreach($images as $image)
      {{$image->getUrl()}}
       <img class="overlay-img" src="{{asset($image->getUrl())}}"> 

     @endforeach 
</div>

@endsection