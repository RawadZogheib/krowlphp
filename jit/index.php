 <!DOCTYPE html> 
	<?php //instead of account it was user 
		if(!empty($_GET['table']) && !empty($_GET['account'])){
      $table=htmlspecialchars("".$_GET["table"]."");
      $account = htmlspecialchars("".$_GET["account"]."");
      
        $table_name = base64_decode(urldecode($table));
        $account_Id =base64_decode(urldecode($account));
      
        echo "111111111111111 ".$table_name;
        echo "</br>";
        echo "2222222222222224444 ".$account_Id;

        $room = '"vpaas-magic-cookie-5bea10f9861f4c588b1c164f2f3113de/'.$table_name.'"';
        $type = 'silentoo';
      
		}
    else{
      echo 'account id not found';
    }
	?>
  <?php if($type == "silent"){ ?>
    <html>
      <head>
        <script src='https://8x8.vc/external_api.js' async></script>
        <style>html, body, #jaas-container { height: 100%; }</style>
        <script type="text/javascript">

          const domain = '8x8.vc';
          window.onload = () => {
            var api = new JitsiMeetExternalAPI(domain, {
              roomName: <?php echo $room;?>,
              parentNode: document.querySelector('#jaas-container'),

              configOverwrite: {
                  // disable the prejoin page
                  prejoinPageEnabled: false,
                  
                  //optionally we can control the mute state on join from the emebedding application
                  startWithAudioMuted: [true],
                  startWithVideoMuted: [true],
                  disableInitialGUM: true,
                  toolbarButtons: ['camera','chat','desktop','download','embedmeeting','etherpad','feedback','filmstrip','fullscreen','hangup','help','invite','livestreaming','participants-pane','profile','raisehand','recording','security','select-background','settings','sharedvideo','shortcuts','stats','tileview','toggle-camera','videoquality','__end']

                },
                // optionally, we can have the meeting select the devices we want
                devices: {
                  audioInput: '<deviceLabel>',
                  audioOutput: '<deviceLabel>',
                  videoInput: '<deviceLabel>'
                },
                interfaceConfigOverwrite: { SETTINGS_SECTIONS: [ 'devices', 'language', 'moderator', 'calendar', 'sounds' ] },
                userInfo: {
                displayName:<?php echo $account_Id?>
                },
            });
            
          }
          
        </script>
      </head>
      <body><div id="jaas-container" ></div></body>
    </html>
  <?php }else{ ?>
    <html>
      <head>
        <script src='https://8x8.vc/external_api.js' async></script>
        <style>html, body, #jaas-container { height: 100%; }</style>
        <script type="text/javascript">

          const domain = '8x8.vc';
          window.onload = () => {
            var api = new JitsiMeetExternalAPI(domain, {
              roomName: <?php echo $room;?>,
              parentNode: document.querySelector('#jaas-container'),

              configOverwrite: {
                  // disable the prejoin page
                  prejoinPageEnabled: false,
                  
                  //optionally we can control the mute state on join from the emebedding application
                  startWithAudioMuted: [true],
                  startWithVideoMuted: [true],
                  disableInitialGUM: true,
                },
                // optionally, we can have the meeting select the devices we want
                devices: {
                  audioInput: '<deviceLabel>',
                  audioOutput: '<deviceLabel>',
                  videoInput: '<deviceLabel>'
                },
                interfaceConfigOverwrite: { 
                APP_NAME: 'Krowl',  
                SETTINGS_SECTIONS: [ 'devices', 'language', 'moderator', 'calendar', 'sounds' ] },
                userInfo: {
                displayName:<?php echo $account_Id?>
                },
            });
            
          }
          
        </script>
      </head>
      <body><div id="jaas-container" ></div></body>
    </html>
    <?php } ?>