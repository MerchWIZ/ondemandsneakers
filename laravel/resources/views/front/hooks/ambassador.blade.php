<?php
$currency = Config::get('params.currency');
?> 
<style>
    .prod-box{
        cursor: pointer;
    }
</style>
@if(count($ambassadors)>0)
@foreach ($ambassadors as $ambassador)
<div class="prod-box col-sm-3" onclick="changePage(<?php echo $ambassador->id; ?>);">
    <div class="prod__inr">
        <div class="prod__img">
            @if(is_null($ambassador->image))
            <img  alt="" src="{{ asset('front/images/no_result.jpg')}}">
            @else
           <img src="{{ asset('uploads/users')}}/<?php echo $ambassador->image; ?>" alt="" />
            @endif
            
        </div>
        <div class="prod__cont">
            <h4>
            {{$ambassador->firstName}} {{$ambassador->middleName}} {{$ambassador->lastName}} </h4>
            <p>@foreach($specialities as $speciality)
                @if($ambassador->speciality_id == $speciality->id)
                {{ $speciality->title }}
                @endif
                @endforeach
            </p>
            <div class="prod__price"><?php echo $currency[Config::get('params.currency_default')]['symbol'] ?> <?php echo mt_rand(50,100); ?></div>
        </div>

    </div>
</div>
@endforeach
<div class="row">
<div class="col-sm-12">
{!! $ambassadors->appends(['search' =>$search])->render() !!}  
</div>
</div>

@else
<div class="prod__price bg-danger">Sorry, there is no results for your search</div>
@endif
  <script type="text/javascript">
  function changePage(id) 
  {
   window.location.href = "user/"+id;
  }
  </script>