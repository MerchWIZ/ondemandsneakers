<form method="POST" class="form" action="{{ url('postLogin') }}">
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
email = demo@yopmail.com
pass = gOlpik0!
                <div class="form-group">
                    <button type="submit" class="form-control w100 btn-primary" >LOGIN</button>
                </div>
</form>