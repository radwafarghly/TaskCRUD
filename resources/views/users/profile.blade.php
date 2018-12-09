@extends('layouts.app')
  <style>
        .card {
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            transition: 0.3s;
            border-radius: 5px;
        }

        .card:hover {
            box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
        }

        img {
            border-radius: 5px 5px 0 0;
        }

 </style>

@section('content')
<div class="container">
    <div class="row">
    
    <form action="{{ route('image.store') }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
        <div class="col-md-6">
            <div class="form-group">
                <label class="custom-file-label">Choose file</label>
                <!-- <input type="file" id="image" class="form-control" name="image[]" multiple>  -->
                <input type="file" id="image" class="form-control" required name="image" accept="image/x-png,image/gif,image/jpeg">    
            </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
                <input type="submit" value="Upload" class="btn btn-success">
                </div>
        </div>
    </form>
    </div>
    @foreach ($images->chunk(3) as $chunk)
    <div class="row">
        @foreach ($chunk as $image)
            <div class="col-xs-4">
                <div class="card">
                    <img src="{{$image->getUrl('card')}}" alt="Image" style="width:100% ; height:60%">
                        <div class="container">
                            <h4><b>John Doe</b></h4> 
                            <p>Architect & Engineer</p> 
                        </div>
                </div>     
            </div>
        @endforeach
    </div>
@endforeach






 {{--  <div class="row">
            @foreach($images as $image)
           
            <div class="col-lg-6">
               
                <img class="hover-shadow" alt="Image" style="width:50% ; " src="{{$image->getUrl()}}">  
                
            </div>
            
            @endforeach 
    </div>
   
    <div class="row">  
        <div class="col-lg-4">
            @foreach($images as $image) 
                <div class="card">
                    <img src="{{$image->getUrl()}}" alt="Image" style="width:100%">
                        <div class="container">
                            <h4><b>John Doe</b></h4> 
                            <p>Architect & Engineer</p> 
                        </div>
                </div>
                <br>
                <br>
         
            @endforeach 
       </div>
    </div>--}}
</div>

@endsection