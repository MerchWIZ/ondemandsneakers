<form method="POST" class="form" onsubmit="postLogin()>
                <input type="hidden"  name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <input type="email" class="form-control" name="email" placeholder="Email Address" required />
                </div>

                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Password" name="password" required  />
                </div>

                <div class="form-group">
                    <div class="pul-lft">
                        <input type="checkbox" class="checkbox" name="remember"><label>Remember Me</label>
                    </div>

                    <a href="{{ url('forgot') }}" class="link pul-rgt">
                        <i class="fa fa-support"></i>Lost your passward?
                    </a>
                </div>

                <div class="form-group">
                    <button type="submit" class="form-control w100 btn-primary" >LOGIN</button>
                </div>
</form>



<script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
<script>
    
    function postLogin(){
    
    console.log('')
    }
    
    
function postLogin1(){

 var url = '{{ URL::to('/postLogin') }}';

        var comp_url = url + '/' + id+'/'+design_id;

var email = document.getElementById('cart_properties').value;
var pass = document.getElementById('cart_properties').value;
var token = document.getElementById('_token').value;

var datasend = 'email='+email+'&pass='+pass+'&_token='+token;
        
//        $.ajax({
//            type: "POST",
//            url: "<?php echo url('admin/property/ratesandavailability/search'); ?>",
//            data: datasend,
//            cache:false,
//            success: function(success){
//                console.log(success);
////               $("#rates").html(success);
//            }
//        });

console.log('data');
                    $.ajax(
                    {
                        url: comp_url,
                        type: "POST",
                        data: datasend,
                        success: function (data, textStatus, jqXHR) {

console.log(data);
//                            $('#cartModal').modal('show');
//                            document.getElementById('cart_properties').innerHTML = data;

                        },
                        error: function (jqXHR, textStatus, errorThrown) {
                          console.log('errorr');
                        }
                    });

        }
        
        </script>