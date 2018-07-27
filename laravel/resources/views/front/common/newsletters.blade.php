<section class="newsletter-area text-center">
    <div class="container">

        <div class="newsletter-box">
            <div class="newsletter-box__inr">
                <div class="hed">
                    <h2>NEWSLETTER <span>SUBSCRIPTION</span></h2>
                    <p>Subscribe our Newsletter for latest updates.</p>
                </div>

                <form role="form">
                    <div class="form-group">
                        <input type="text" class="form-control" name="name" id="exampleInputEmail2" placeholder="Enter Your Name" required="required">
                        @if ($errors->has('name'))
                        <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" name="email" id="exampleInputPassword2" placeholder="Enter Your Email Address" required="required">
                        
                        
                    </div>
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <button type="submit" id="subscribe" class="btn btn-default">SUBSCRIBE</button>
                    <div class="form-group">
                    <strong><div id="msg" class="pull-left"></div></strong>
                    </div>
                </form>
                
            </div>
        </div>

    </div>
</section>

<script type="text/javascript">
$('#subscribe').click(function(){
$('form').submit(function(){
  var postData = $(this).serialize();
  
  $.ajax({
    type: 'POST',
    data: postData,
    dataType:'json',
    url: '<?php echo url('newsletter/store'); ?>',
    success: function(data){
      if (data == 1) 
      {
      $('#msg').html('Successfully Submitted!');
      alert('Successfully Submitted!');
      window.location.reload();
      }
      else
      {
      $('#msg').html(data.email[0]);  
      alert('Problem with your input');
      window.location.reload();
      }
    },
    error: function(data){
      console.log(data);
      alert('There was an error adding your comment');
    }
  });
  
  return false;
});
});
</script>