<div style="background-image: url('/images/background.jpg'); width: 100vw; height: 100vh;">
    <div class="container">
        <div class="row">
            <h1 class="h1 text-center py-4">Special Offers For You!</h1>
        </div>
        <div class="row justify-content-center" >

            @foreach($products as $product)
            <div class="item-card">
                <div class="image-box">
                    <img src="{{$product->image}}" alt="" />
                </div>
                <div class="desc">
                    <h6 ><b>{{$product->name}}</b></h6>
                    <h4 style="margin-top: 10px;">{{$product->description}}</h4> 
                    <div class="action-div">
                        <span class="price"  data-amount="{{$product->price}}"> ₦{{$product->formatted_price}}</span>
                        <button class="cart btn btn-sm btn-primary mr-auto" data-amount="{{$product->price}}" data-target="{{$product->id}}">Add to cart</button>
                    </div>
                </div>
            </div>
            @endforeach
            
        </div>
    
    </div>

    <script type="text/javascript">
        var balance = {{auth()->user()->credit_limit}};
        var currentPurchase = 0; //This could be stored and fetched from localStorage
        var cart = [];
        $(document).ready(function(){

            $('.cart').click(function(){

                var cost = parseInt($(this).data('amount'));
                console.log(cost);

                if(cost  + currentPurchase <= balance){
                   //We are good, you can add to cart
                   currentPurchase += parseInt($(this).data('amount'));
                    cart.push(
                            {
                               item: $(this).data('name'),
                               amount: parseInt($(this).data('amount'))
                            }
                        )

                    $('html,body').animate({
                        scrollTop: 0
                    }, 2000);

                    $('.cart-items').html('<li style="background: green; padding: 5px 20px; border-radius: 20px; color: white;"><b>Total:</b> ₦' + currentPurchase / 100 + '</li>')
                }else{
                    Swal.fire({
                        title: "Sorry",
                        text: "You don't have enough credit to purchase this item",
                        icon: "error",
                        confirmButtonText: 'Okay'
                    })
                }
            });
            
        });
    </script>

</div>