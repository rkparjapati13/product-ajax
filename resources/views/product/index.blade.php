@extends('layouts.default')

@section('content')
<div class="top-brands">
   <div class="container">
      <h2>Top selling offers</h2>
      <div class="sorting-left">
          <select id="category-filter" onchange="category(this)" class="form-control">
            <option value="">Select Category</option>
            @foreach($categories as $category)
              <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
          </select>
      </div>
      <div class="grid_3 grid_5">
         <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
            <div class="tab-content">
               <div role="tabpanel" class="tab-pane fade in active" aria-labelledby="expeditions-tab">
                  <div id="product-list">
                        @include('product.list')
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection
@section('javascript')

<script type="text/javascript">
    $(function () {

        $('body').on('click', '.pagination a', function (e) {
            e.preventDefault();
            var url = $(this).attr('href');
            window.history.pushState("", "", url);
            getProducts(url);
        });
    });
    function getProducts(url) {
        $.ajax({
            url: url
        }).done(function (res) {
            $('#product-list').empty().append(res.html);
        }).fail(function () {
            console.log("Failed to load data!");
        });
    }

    function category(_this) {
        var url = "{{ route('product.index') }}" + '?category_id=' + _this.value;
        getProducts(url);
    }

    function addCart(el) {
        toastr.options = {
          "closeButton": true,
          "newestOnTop": true,
          "positionClass": "toast-top-right"
        };
        let form =  $(el).closest('form');
        let formData = form.serialize();
        let formActionUrl = form.attr('action');
        let type = form.attr('method');
        $.ajax({
          url: formActionUrl,
          type: type,
          data: formData,
          success:function(response){
            $('#card-data').empty().append(response.data);
            $('.custom-badge').text(response.count);
            if (response.status) {
              setTimeout(() => {
                toastr.success(response.success);
                },500)
              form[0].reset();
            }
            var url = "{{ route('product.index') }}";
            getProducts(url);
          },
        }).done(function() {
          setTimeout(function(){
            $("#overlay").fadeOut(300);
          },500);
        });
    }

    function deleteProduct(id, t) {
        var tr= $(t).closest("tr");
        let url = "{{ route('product.delete', '') }}"+"/"+id;

        $.ajax({
            type: "POST",
            data: { 'id':id,
                    '_token': "{{ csrf_token() }}" },
            url: url,
            success: function(data){
              if(data.status) {
                tr.find('td').fadeOut(700, function () {
                    tr.remove();
                });
                $('.custom-badge').text(data.count);
                var url = "{{ route('product.index') }}";
                getProducts(url);
              }
            }
        });
    }
</script>
@endsection
