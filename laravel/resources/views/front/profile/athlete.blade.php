<?php

use App\Functions\Functions;
?>
<!--<center><h2>RESULTS</h2></center>-->
<div class="profile__desc col-sm-6">
    <h3>Current Meal Plan:</h3>
    @if(count($athleteMp)>0)
    <div class="table-responsive">          
        <table class="table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Download Link</th>
                </tr>
            </thead>
            <tbody>
                <tr> 
                    <td>{{ $athleteMp->title }}</td>
                    <td>{{ $athleteMp->description }}</td>
                    <td>
                        <a href="{{ url('uploads/users/meal-plans/'.$athleteMp->file) }}" download="{{$athleteMp->file}}" class="btn btn-primary"><i class="fa fa-download" aria-hidden="true"></i> Download</a></td>

                </tr>

            </tbody>
        </table>
    </div>
    @else
    <div class="bg-warning">Sorry, there is no plan added yet </div>
    @endif
</div>
<div class="profile__desc col-sm-6">
    <h3>Current Workout Plan:</h3>
    @if(count($athleteWp)>0)
    <div class="table-responsive">          
        <table class="table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>

                    <th>Download Link</th>

                </tr>
            </thead>
            <tbody>
                <tr> 
                    <td>{{ $athleteWp->title }}</td>
                    <td>{{ $athleteWp->description }}</td>
                    <td>
                        <a href="{{ url('uploads/users/workout-plans/'.$athleteWp->file) }}" download="{{$athleteWp->file}}" class="btn btn-primary"><i class="fa fa-download" aria-hidden="true"></i> Download</a></td>

                </tr>

            </tbody>
        </table>
    </div>
    @else
    <div class="bg-warning">Sorry, there is no plan added yet </div>
    @endif
</div>
<div class="update-area p0 col-sm-12">
    <div class="upd__box">
        <div class="hed">
            <h2>Updates</h2>
        </div>
        @if(count($results)>0)
        @foreach($results as $row)
        <div class="upd__table">          
            <table class="text-center">

                <thead>
                    <tr>
                        <th colspan="3" for="Updates 1">{{ $row->caption }}</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="upd__photo__side">
                        <td for="Updates 1">Front Picture</td>
                        <td>Side Picture</td>
                        <td>Back Picture</td>
                    </tr>
                    <tr class="upd__photos__box">
                        <td for="Updates 1">
                            <div class="upd__photos">
                                @if(is_null($row->frontImage))
                                <img  alt="" src="{{ asset('front/images/no_result.jpg')}}"/>
                                @else
                                <img src="{{ url('uploads/users/results/front_images/'. $row->frontImage)}}">
                                @endif
                            </div>
                        </td>
                        <td>
                            <div class="upd__photos">
                                @if(is_null($row->sideImage))
                                <img  alt="" src="{{ asset('front/images/no_result.jpg')}}"/>
                                @else
                                <img src="{{ url('uploads/users/results/side_images/'. $row->sideImage)}}">
                                @endif                             
                            </div>
                        </td>
                        <td>
                            <div class="upd__photos">
                                @if(is_null($row->backImage))
                                <img  alt="" src="{{ asset('front/images/no_result.jpg')}}"/>
                                @else                                 
                                <img src="{{ url('uploads/users/results/back_images/'. $row->backImage)}}">
                                @endif
                            </div>
                        </td>
                    </tr>
                    <tr class="upd__cmt__hdr">
                        <td colspan="2" class="text-left" for="Updates 1"><i class="fa fa-comments-o"></i>Ambassador Reviews</td>
                        <td><i class="fa fa-calendar"></i>{{ $row->date }}</td>
                    </tr>
                </tbody>

            </table>
            <div class="upd__review__box clrlist">
                @foreach($messages as $message)
                @if($message->result_id == $row->id)
                <div class="media">
                    <div class="media-left">

                        <img src="{{ asset('front/images/amb-review-img.png') }}" class="media-object">
                    </div>
<!--                    <div class="review__online"><img src="{{ asset('front/images/online-icon.png') }}"></div>-->

                    <div class="media-body media-body-icon">
                        <p>
                            {{ $message->message }}
                        </p>
                        <ul>
                            <li class="pul-lft"><i class="fa fa-clock-o"></i><?php
                                echo
                                Functions::relativeTime(strtotime($message->created_at), true);
                                ?></li>
                            <li class="pul-rgt"><i class="fa fa-check-circle-o"></i></li>
                        </ul>
                    </div>

                </div>
                @endif

                @endforeach
<?php if (isset($subscribed) && $subscribed->athlete_id == $user->id) { ?>
                    <hr>
                    <div class="row">
                        <div class="form-group col-sm-12">
                            <button type="button" data-result-id="{{ $row->id }}" data-toggle="modal" data-target="#review" class="btn btn-lg btn-default btn-flat pull-right">Add Comment</button>    
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
        @endforeach
        <div class="modal fade" id="review">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-warning">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h3 class="modal-title"><strong>Review</strong></h3>
                    </div>
                    <div class="modal-body">
                        <form role="form" method="post" action="{{ url('messages') }}">
                            <div class="form-group col-sm-12">
                                <textarea name="message" rows="3" class="form-control" placeholder="Type your comment here. . . " maxlength="200" required="required"></textarea>
                            </div>
                            <div class="form-group col-sm-12">
                                <input type="hidden" name="ambassador_id" value="{{ Auth::user()->id }}">
                                <input type="hidden" name="athlete_id" value="{{ $user->id }}">
                                <input type="hidden" name="result_id" value="">
                                <input type="hidden" name="type" value="review">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button type="submit" class="btn btn-lg btn-default btn-flat pull-right">Save</button>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
        @else
        <div class="bg-warning">Sorry, there is no updates to show</div>
        @endif


    </div>
</div>
<script>
    //triggered when modal is about to be shown
    $('#review').on('show.bs.modal', function (e) {

        //get data-id attribute of the clicked element
        var result_id = $(e.relatedTarget).data('result-id');

        //populate the textbox
        $(e.currentTarget).find('input[name="result_id"]').val(result_id);
    });
</script>

