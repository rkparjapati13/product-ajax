<!-- header -->
<div class="agileits_header">
   <div class="container">
      <div class="w3l_offers">
         <p>SALE UP TO 70% OFF. USE CODE "SALE70%" . <a href="#">SHOP NOW</a></p>
      </div>

      <div class="product_list_header" style="position: relative">
         <form action="#" method="post" class="last">
            <button type="button" class="w3view-cart" data-toggle="modal" data-target="#exampleModal">
              <i class="fa fa-cart-arrow-down" aria-hidden="true"></i>
              @if(!empty($cartOrders))
                <span class="badge badge-light custom-badge" style="position: absolute; top: -5px; right: -5px;">{{ count($cartOrders) }}</span>
              @endif
            </button>
         </form>
      </div>
      <div class="clearfix"> </div>
   </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cart Orders</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="card-data">
          @include('product.model')
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
