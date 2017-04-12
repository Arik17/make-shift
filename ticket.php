<html>
    <body>
      <form action="" method="post">
        <input type="submit" value="Pay Now" id="submit" />
        <form>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script type="text/javascript" src="https://api.ravepay.co/flwv3-pug/getpaidx/api/flwpbf-inline.js"></script>
        <script type="text/javascript">
            document.addEventListener("DOMContentLoaded", function(event) {
                document.getElementById('submit').addEventListener('click', function () {
                    var trxref = "PQRQ23", pubkey = "FLWPUBK-bff3bed521f8297a37ce950d6362f8ce-X", seckey = "FLWSECK-7599c9335777c585e002f9951d4dbed1-X";
                    getpaidSetup(
                        {
                            customer_email:"taiwo.aiyerin@arikair.com",
                            amount:100,
                            country:"NG",
                            currency:"NGN",
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
                                          window.location = "https://webapp.arikair.com/IBE/ticket.php?pnr=trxref"; //Add your success page here or do anything you want like issue ticket or give value for payment
                                      } else {
                                          window.location = "https://webapp.arikair.com/IBE/errorpage.php"; //Add your failure page here
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