@extends('layout')
<?php
$title = $model->title;
$description = $model->teaser;
$keywords = $model->keywords;
?>
@include('front/common/meta')
@section('content')

<?php echo $model->body;?>
@include('front/common/newsletters')
@endsection