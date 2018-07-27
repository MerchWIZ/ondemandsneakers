@if($product->sale==1 && $product->price>$product->salePrice)
    <span id="price"><?php echo $product->salePrice?></span>
    @else
    <span id="price"><?php echo $product->price?></span>
@endif