<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <form id="paymentForm">
     <div class="form-group">
       <label for="email">Email Address</label>
       <input type="hidden" value="idowujulius92@gmail.com" id="email-address" required />
     </div>
     <div class="form-group">
       <label for="amount">Amount</label>
       <input type="hidden" value="5000" id="amount" required />
     </div>
     <div class="form-group">
       <label for="first-name">First Name</label>
       <input type="hidden" value="julius" id="first-name" />
     </div>
     <div class="form-group">
       <label for="last-name">Last Name</label>
       <input type="hidden" value="idowu" id="last-name" />
     </div>
     <div class="form-submit">
       <button type="submit" onclick="payWithPaystack()"> Pay </button>
     </div>
   </form>

   <script src="https://js.paystack.co/v1/inline.js"></script>
   <script type="text/javascript">
   var paymentForm = document.getElementById('paymentForm');
paymentForm.addEventListener('submit', payWithPaystack, false);
function payWithPaystack() {
var handler = PaystackPop.setup({
  key: 'pk_test_d6b71efab64e5f58107f8a0b6835c73e9c182181', // Replace with your public key
  email: 'idowujulius92@gmail.com',
  amount: 5000, // the amount value is multiplied by 100 to convert to the lowest currency unit
  currency: 'NGN', // Use GHS for Ghana Cedis or USD for US Dollars
  ref: 'my_personal_ref', // Replace with a reference you generated
  callback: function(response) {
    //this happens after the payment is completed successfully
    var reference = response.reference;
    alert('Payment complete! Reference: ' + reference);
    // Make an AJAX call to your server with the reference to verify the transaction
  },
  onClose: function() {
    alert('Transaction was not completed, window closed.');
  },
});
handler.openIframe();
}
   </script>

  </body>
</html>
