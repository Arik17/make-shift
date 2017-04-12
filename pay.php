<html>
    <body>
       

        <input type="submit" value="Pay Now" id="submit" />

 
     
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script type="text/javascript" src="https://api.ravepay.co/flwv3-pug/getpaidx/api/flwpbf-inline.js"></script>
        <script type="text/javascript">
            document.addEventListener("DOMContentLoaded", function(event) {
                document.getElementById('submit').addEventListener('click', function () {
                    var trxref = "Arik-"+ Math.random(), pubkey = "FLWPUBK-80cfe068bcf754b723a226c75885b8ad-X", seckey = "FLWSECK-8209abb02d12ff9425619a37132e5325-X";
                    getpaidSetup(
                        {
                            customer_email:"taiwo.aiyerin@arikair.com",
                            amount:100,
                            country:"NG",
                            currency:"NGN",
                            custom_logo: "https://webapp.arikair.com/integral/images/arikpay.jpg",
                          //  custom_description:"",
                            custom_title: "Arik Pay",
                            txref:trxref,
                            PBFPubKey:pubkey,
                            onclose:function(response) {
                            },
                            callback:function(response) {
                                $.ajax({
                                  url: "https://api.ravepay.co/flwv3-pug/getpaidx/api/verify",
                                  type: "POST", //send it through get method
                                  data: {tx_ref: trxref, SECKEY: seckey},
                                  success: function(response) {
                                      if (response.data.status == "successful") {
					        	  		window.location = "https://webapp.arikair.com/integral/tik.php?transaction_id="+trxref; //Add your success page here
					        	  	} else {
					        	  		window.location = "https://webapp.arikair.com/integral/errorpage.php"; //Add your failure page here
					        	  	}
					        	  },
                                  error: function(xhr) {
                                    //Do Something to handle error
                                  }
                                });
                            }
                        }
                    );
                });
            });
        </script>
    </body>
</html>


