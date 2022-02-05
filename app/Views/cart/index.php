<div class="row row-pb-lg">
    <div class="col-md-10 offset-md-1">
        <div class="process-wrap">
            <div class="process text-center active">
                <p><span>01</span></p>
                <h3>Shopping Cart</h3>
            </div>
            <div class="process text-center">
                <p><span>02</span></p>
                <h3>Checkout</h3>
            </div>
            <div class="process text-center">
                <p><span>03</span></p>
                <h3>Order Complete</h3>
            </div>
        </div>
    </div>
</div>
<div class="row row-pb-lg cart_shopping">
    
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $("#quantity-1").change(function() {
        $(this).css("background-color", "#7FFF00");
        alert('dls');
    });

    callajax();

});

function callajax(){
    $.ajax({
        url:"./cart/getcart",
        method:"POST",
        data:{getcart:"sss"},
        success:function(data)
        {
            $('.cart_shopping').html(data);
        },
        error:function(data){
            console.log('erreur : '+data);
        }
    });
};

</script>