<table class="table table-striped">
  <tr>
    <th>#</th>
    <th>Name</th>
    <th>quantity</th>
  </tr>
  @foreach($cartOrders as $key => $cartOrder)
  <tr>
    <td>{{ ++$key }}</td>
    <td>{{ $cartOrder->orders->name }}</td>
    <td>{{ $cartOrder->quantity }}</td>
  </tr>
  @endforeach
</table>
