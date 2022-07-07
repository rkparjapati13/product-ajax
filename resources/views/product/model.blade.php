<table class="table table-striped">
  <tr>
    <th>Name</th>
    <th>Quantity</th>
    <th>Action</th>
  </tr>
  @foreach($cartOrders as $key => $cartOrder)
  <tr>
    <td>{{ $cartOrder->orders->name }}</td>
    <td>{{ $cartOrder->quantity }}</td>
    <td>
      <button type="button" class="btn btn-danger" onclick="deleteProduct({{ $cartOrder->id }}, this)" name="button">Delete</button>
    </td>
  </tr>
  @endforeach
</table>
