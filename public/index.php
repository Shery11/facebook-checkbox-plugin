<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Check box</title>



  </head>
    <body>

<script>
   
   <?php
  $random = mt_rand (10,100000)
?>

  window.fbAsyncInit = function() {
   
    FB.init({
      appId      : '746035795585118',
      xfbml      : true,
      version    : 'v2.11'
    });
    FB.AppEvents.logPageView();
  

   FB.Event.subscribe('messenger_checkbox', function(e) {
            console.log("messenger_checkbox event");
            console.log(e);

            if (e.event == 'rendered') {
                console.log("Plugin was rendered");
            } else if (e.event == 'checkbox') {
                var checkboxState = e.state;
                console.log("Checkbox state: " + checkboxState);
                 
                 if(checkboxState == 'checked'){

                   console.log("inside");
                   confirmOptIn();

                

                 }

            } else if (e.event == 'not_you') {
                console.log("User clicked 'not you'");
            } else if (e.event == 'hidden') {
                console.log("Plugin was hidden");
            }
        });
    };



    function confirmOptIn() {
          FB.AppEvents.logEvent('MessengerCheckboxUserConfirmation', null, {
            'app_id':'746035795585118',
            'page_id':'442721082524277',
            'ref':'textit',
            'user_ref':'<?= $random ?>'
          });

          console.log("clicked");
      }

      (function(d, s, id){
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {return;}
        js = d.createElement(s); js.id = id;
        js.src = "https://connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
</script>
   

   <h1>Checkbox plugin</h1>

  
<div class="fb-messenger-checkbox"  
      origin="https://test.aaaw.co"
      page_id="442721082524277"
      messenger_app_id="746035795585118"
      user_ref="<?= $random ?>"
      prechecked= "true"
      allow_login="true"
      size="standard">
</div>


<!-- <input type="button" onclick="confirmOptIn()" value="Confirm Opt-in"/> -->
 
</body>
  
</html>
 
    

</body>
</html>
