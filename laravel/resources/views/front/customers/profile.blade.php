@extends('customer')

@section('content')

<section class="dashboard-area">
    <div class="container">
        <div class="dash__lft col-sm-3">
            <div class="dash__tabs">
                @include('front/common/left')
            </div>
        </div>
        <div class="dash__rgt col-sm-9">
            <div class="tab-content">
                <div id="profile" class="tab-pane fade active in">

                    <div class="profile__dtl col-sm-12">
                        <div class="profile__btns clrlist">
                            <ul class="pul-rgt">
                                @if($user->status == 1)
                                <li><a href="#" class="profile__approve__btn"><i class="fa fa-check-square-o"></i>Approved</a></li>
                                @endif
                                <li><a href="{{url('profile/edit')}}" class="profile__edit__btn"><i class="fa fa-pencil"></i>Edit Profile</a></li>
                            </ul>
                        </div>
                        <div class="profile__info">
                            <table>
                                <tbody><tr>
                                        <td for="Updates 1">Name:</td>
                                        <td>{{$user->firstName}} {{$user->middleName}} {{$user->lastName}}</td>
                                    </tr>

                                    <tr>
                                        <td for="Updates 1">Email:</td>
                                        <td>{{$user->email}}</td>
                                    </tr>
                                    <tr>
                                        <td for="Updates 1">Age:</td>
                                        <td>{{$age}}</td>
                                    </tr>
                                    <tr>
                                        <td for="Updates 1">Gender:</td>
                                        <td>@if($user->gender == 'f') Female @else Male @endif</td>
                                    </tr>
                                    <tr>
                                        <td for="Updates 1">Phone:</td>
                                        <td>{{$address->phone}}</td>
                                    </tr>



                                </tbody></table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>  


@endsection