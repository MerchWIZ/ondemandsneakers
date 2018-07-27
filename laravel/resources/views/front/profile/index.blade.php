@extends('layout')

@section('content')
<?php 
$athlete_id = Auth::user()->id; ?>

<div class="col-lg-12 col-sm-12">
    <br>
    <div class="flash-message">
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </div> <!-- end .flash-message -->

    <div class="card hovercard">
        <div class="card-background">
            @if(is_null($user->image))
            <img class="card-bkimg" alt="" src="{{ asset('front/images/stories-bg.jpg')}}">
            @endif
            <img class="card-bkimg" alt="" src="{{ asset('uploads/users')}}/<?php echo $user->image; ?>">
        </div>
        <div class="useravatar">
            @if(is_null($user->image))
            <img class="card-bkimg" alt="" src="{{ asset('front/images/no_result.jpg')}}"/><br>
            @else
            <img src="{{ asset('uploads/users')}}/<?php echo $user->image; ?>" alt="" /><br>
            @endif

        </div>
        <div class="card-info"> 
            <span class="card-title">
                {{$user->firstName}} {{$user->middleName}} {{$user->lastName}} 
            </span>
            <p>

                @if(is_null($specialities)) Not Added @else {{ $specialities->title }} @endif
            </p>      
        </div>
        <div class="card-subscribe">
            @if (!(Auth::user()->role_id == 3)) 
            <?php if (isset($subscribed) && $subscribed->ambassador_id != $user->id && $user->role_id == 3) { ?>
                <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-default">SUBSCRIBE</button>   
            <?php } ?>
            @if(is_null($subscribed) && $user->role_id == 3)
            <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-default">SUBSCRIBE</button>
            @endif
            <?php if (isset($subscribed) && $subscribed->subscriptionStatus == 1 && $subscribed->ambassador_id == $user->id && $user->role_id == 3) { ?>
                <button type="button" data-toggle="modal" data-target="#myModal-1" class="btn btn-default">UNSUBSCRIBE</button>               
                <div class="modal fade" id="myModal-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header bg-warning">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span></button>
                                <h3 class="modal-title"><strong>Subscription Alert</strong></h3>
                            </div>
                            <div class="modal-body">
                                <h3>Are you sure you want to Unsubscribe?</h3>
                            </div>
                            <div class="modal-footer">
                                <form class="form-inline col-sm-8" method="post" role="form" action="{{ url('subscribe') }}">
                                    <input type="hidden" name="ambassador_id" value="{{ $user->id }}">
                                    <input type="hidden" name="athlete_id" value="{{$athlete_id}}">
                                    <input type="hidden" name="subscriptionRate" value="@if(is_null($rate))@else{{ $rate->subscriptionRate }}@endif">
                                    <input type="hidden" name="subscriptionComission" value="@if(is_null($rate))@else{{ $rate->subscriptionComission }}@endif">

                                    <input type="hidden" name="_token" value="{{csrf_token()}}">    
                                    <!--                <button type="submit" class="btn btn-success pull-left" >Yes</button>-->
                                    <a href="{{ url('unsubscribe/'.$subscribed->id )}}" class="btn pull-left" >Yes</a>
                                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">No</button>
                                </form>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->
            <?php } ?>
            @endif
            <div class="modal fade" id="myModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-warning">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h3 class="modal-title"><strong>Subscription Alert</strong></h3>
                        </div>
                        @if(!(is_null($subscribed)) && $subscribed->subscriptionStatus == 1)
                        <div class="modal-body"><h3>You have already subscribed someone.</h3>
                            <a href="{{ url('user/'.$subscribed->ambassador_id )}}" class="btn">Link</a>
                        </div>
                        @else
                        <div class="modal-body">
                            <label>Subscription Price: </label>
                            <span>@if(is_null($rate))Price Not Added Yet @else{{ $rate->subscriptionRate }}@endif</span>                                   
                            <h3>Are you sure you want to Subscribe?</h3>
                        </div>
                        <div class="modal-footer">
                            <form class="form-inline col-sm-8" method="post" role="form" action="{{ url('subscribe') }}">
                                <input type="hidden" name="ambassador_id" value="{{ $user->id }}">
                                <input type="hidden" name="athlete_id" value="{{$athlete_id}}">
                                <input type="hidden" name="subscriptionRate" value="@if(is_null($rate))@else{{ $rate->subscriptionRate }}@endif">
                                <input type="hidden" name="subscriptionComission" value="@if(is_null($rate))@else{{ $rate->subscriptionComission }}@endif">

                                <input type="hidden" name="_token" value="{{csrf_token()}}">    
                                <button type="submit" class="btn btn-success pull-left" >Yes</button>
                                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">No</button>
                            </form>
                        </div>
                        @endif
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->  
        </div>
    </div>

    <div class="btn-pref btn-group btn-group-justified btn-group-lg" id="stars" role="group" aria-label="...">
        <div class="btn-group" role="group">
            <button type="button" class="btn btn-primary" href="#tab1" data-toggle="tab"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                <div class="hidden-xs">Personal</div>
            </button>
        </div>
        <div class="btn-group" role="group">
            <button type="button"  class="btn btn-default" href="#tab2" data-toggle="tab"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                <div class="hidden-xs">Professional</div>
            </button>
        </div>
        <div class="btn-group" role="group">
            <button type="button" class="btn btn-default" href="#tab3" data-toggle="tab"><span class="fa fa-info" aria-hidden="true"></span>
                <div class="hidden-xs">Contact Info</div>
            </button>
        </div>
    </div>


    <div class="tab-content">
        <div class="tab-pane fade in active" id="tab1">       
            <table class="table table-bordered col-md-12 col-lg-12 table-hover">
                <tbody> 
                    <tr>
                        <td>Date of Birth</td>
                        <td>{{date('d/m/Y',strtotime($user->dob))}}</td>
                    </tr>
                    <tr>
                        <td>Gender</td>
                        <td>@if($user->gender == 'f') Female @else Male @endif</td>
                    </tr>

                    <tr>
                        <td >Height:</td>
                        <td>{{$user->height}} Feet</td>
                    </tr>
                    <tr>
                        <td >Weight:</td>
                        <td>{{$user->weight}} LBS</td>
                    </tr>

                    <tr>
                        <td for="Updates 1">Medical Concerns:</td>
                        <td>{{$user->medicalConcerns}}</td>
                    </tr>                 
                </tbody>
            </table>    
            <div class="profile__desc">
                    <h3>Date of Next Show:</h3>
                    <p>@if(is_null($shows)) No Date
                        @else
                        {{ date('d/m/Y', strtotime($shows->date)) }}
                        @endif
                    </p>
            </div>
            @include('front/profile/'.$role)
        </div>

        <div class="tab-pane fade in" id="tab2">
            <!--                <div class=" col-md-12 col-lg-12 "> -->
            <table class="table table-bordered col-md-12 col-lg-12 table-hover">
                <tbody> 
                <div class="profile__desc">
                    <h3>About me:</h3>
                    <p>
                        {{$user->about}}
                    </p>
                </div>
                <div class="profile__desc">
                    <h3>Goals:</h3>
                    <p>
                        {{$user->goals}}
                    </p>
                </div>
                <div class="profile__desc">
                    @if($user->isCompetitor == 1)
                    <h3>Federation:</h3>
                    <p>
                        {{$user->federation}}
                    </p>
                    @endif
                </div>               
                </tbody>
            </table>

            <!--                </div>-->
        </div>
        <div class="tab-pane fade in" id="tab3">
            <!--                          <div class=" col-md-12 col-lg-12 "> -->
            <table class="table table-bordered col-md-12 col-lg-12 table-hover">
                <tbody> 
                    <tr>
                        <td>Email</td>
                        <td>{{$user->email}}</td>
                    </tr>
                    <tr>
                        <td>Phone:</td>
                        <td>{{$address->phone}}</td>
                    </tr>
                    <tr>
                        <td>Country</td>
                        <td>@foreach($countries as $country)
                            @if($address->country == $country->id)  
                            {{ $country->name}}
                            @endif
                            @endforeach</td>
                    </tr>
                    <tr>
                        <td>State:</td>
                        <td>@foreach($states as $state)
                            @if($address->state == $state->code)  
                            {{ $state->title}}
                            @endif
                            @endforeach
                        </td>
                    </tr>

                </tbody>
            </table>

            <!--                </div>-->
        </div>
    </div>

</div>

<script>
    $(document).ready(function () {
        $(".btn-pref .btn").click(function () {
            $(".btn-pref .btn").removeClass("btn-primary").addClass("btn-default");
            // $(".tab").addClass("active"); // instead of this do the below 
            $(this).removeClass("btn-default").addClass("btn-primary");
        });
    });
</script>
@endsection
