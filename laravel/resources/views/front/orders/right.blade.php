<div class="order-cont">
    <span class="order-total-head">Order Total</span>
    <!--
    <span class="order-total-descrp">Shipping costs and taxes will be evaluated 
    during checkout</span>-->
    <table class="table mb0">
        <td><span class="subtotal-txt">Subtotal:</span></td><td><span class="subtotal-txt subtotal-txt2">{{ $currency[Config::get('params.currency_default')]['symbol']}}<?php echo $sum; ?></span></td>
        <?php
        $discount = 0;
        //d($coupon['coupons']->id,1);
        if (isset($coupon['coupons']->id)) {
            $discount = $coupon['discount'];
            ?>
            <td><span class="subtotal-txt">Discount:</span></td><td><span class="subtotal-txt subtotal-txt2">{{ $currency[Config::get('params.currency_default')]['symbol']}}<?php echo $discount; ?></span></td> 
            <?php
        }
        ?>
        <tr>
		</tr>
		<td><span class="subtotal-txt">Total:</span>
			</td><td>
		<span class="subtotal-txt subtotal-txt2">{{ $currency[Config::get('params.currency_default')]['symbol']}}<?php echo $sum - $discount; ?></span></td>
		</tr>
    </table>
</div>
<div class="order-cont order-cont2">
    <span class="order-total-head">Apply Discount Coupon</span>
    @if (Session::has('error'))
    <div class="alert alert-warning">
        {!! session('error') !!}
    </div>
    @endif
    <form class="" action="<?php echo url(); ?>/coupons/apply" method="post">
        <input type="hidden"  name="_token" value="{{ csrf_token() }}" />
        <div class="input-group">
            <input class="form-control" type="text" name="coupon" id="coupon" />
            <span class="input-group-addon p0"><input class="btn" type="submit" value="Apply" /></span>
        </div>
        <input type="hidden" name="subTotal" value="<?php echo $sum; ?>"/>


    </form>
</div>