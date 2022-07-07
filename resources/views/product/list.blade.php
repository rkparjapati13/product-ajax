<div class="agile_top_brands_grids">
    @foreach($products as $product)
       <div class="col-md-4 top_brand_left"  style="margin-bottom: 20px">
          <div class="hover14 column">
             <div class="agile_top_brand_left_grid">
                <div class="agile_top_brand_left_grid_pos">
                   <img src="assets/images/offer.png" alt=" " class="img-responsive" />
                </div>
                <div class="agile_top_brand_left_grid1">
                   <figure>
                      <div class="snipcart-item block" >
                         <div class="snipcart-thumb">
                            <a href="products.html"><img title=" " alt=" " src="assets/images/{{ $product->image }}" /></a>
                            <p>{{ $product->name }}</p>
                            <h4>${{ number_format($product->price, 2) }}</h4>
                         </div>

                         <div class="snipcart-details top_brand_home_details">
                            <form action="{{ route('product.store') }}" method="post" class="cart-form">
                            @csrf
                            <div class="col-3" style="margin-bottom: 5px">
                               <div class="d-flex justify-content-between">
                                 <select class="form-control" name="qunatity" aria-label="Default select example">
                                    <option value="1">Select Qunatity</option>
                                    @for($i=1; $i <= $product->quantity; $i++)
                                    <option value="{{ $i }}" @if ($i == '1') ? selected : ''@endif>{{ $i }}</option>
                                    @endfor
                                 </select>
                               </div>
                            </div>
                               <fieldset>
                                  <input type="hidden" name="product_id" value="{{ $product->id }}">
                                  <input type="button" name="button" value="Add to cart" class="add-cart button" />
                               </fieldset>
                            </form>
                         </div>
                      </div>
                   </figure>
                </div>
             </div>
          </div>
       </div>
   @endforeach
   <div class="clearfix"> </div>
   <div class="container">
     {!! $products->links() !!}
   </div>
</div>
