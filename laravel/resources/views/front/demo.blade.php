@extends('layout')

@section('content')

<style>
.chechout__inr {
    border: 1px solid #eee;
    padding: 15px;
    text-align: center;
    height: 290px;
    margin-bottom: 30px;
}

.chechout__inr:hover {
    box-shadow: 0 0 70px 20px #ddd;
}    
</style>



<div id="fh5co-contact" class="__web-inspector-hide-shortcut__">
  
    Click on below Patterns to Generate Image.
    
    <h1>.</h1>
    
    <h4> <a href="{{ url('demo/tiger')}}">Tiger</a></h4>
    
    <h4><a href="{{ url('demo/heart')}}">Heart</a></h4>
    <h4><a href="{{ url('demo/rock')}}">Rock</a></h4>
    
    </div>
</div>

@endsection
