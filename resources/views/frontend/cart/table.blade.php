<div class="cart-list">
    <table class="table">
        <thead class="thead-primary">
            <tr class="text-center">
                <th>&nbsp;</th>
                <th>&nbsp;</th>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($carts as $cart)
            <tr class="text-center" data-id='{{ $cart->id }}''>



                <td class="image-prod"><div class="img" style="background-image: url( {{ $cart->image }} );"></div></td>

                <td class="product-name">
                    <h3>{{ $cart->product_name }}</h3>
                    <p>Far far away, behind the word mountains, far from the countries</p>
                </td>

                <td class="price"> {{ $cart->price }} </td>

                <td>

            <div class="w-100"></div>
            <div class="input-group col-md-6 d-flex mb-3">
                <span class="input-group-btn mr-2">
        <button type="button" class="quantity-left-minus btn"  data-type="minus" data-field="">
            <i class="ion-ios-remove"></i>
        </button>
        </span>

        <input type="number" id="quantity" name="quantity" class="form-control input-number" style="width: 100px" value="{{ $cart->quantity }}" min="1" max="100" >
     <span class="input-group-btn ml-2">
         <button type="button" class="quantity-right-plus btn" data-type="plus" data-field="">
         <i class="ion-ios-add"></i>
        </button>

     </span>

    </td>

    <td class="total">{{ $total }}</td>
    <td><form onclick="return confirm('are you sure ?');" action="{{ route('carts.destroy', $cart->id) }}" method="post">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-danger">Delete</i></button>
    </form></td>

</tr><!-- END TR-->

@endforeach
</tbody>
</table>

</div>
