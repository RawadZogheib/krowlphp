<!DOCTYPE html> 
	<?php //instead of account it was user 
		if(!empty($_GET['table']) && !empty($_GET['account'])){
			$room = '"vpaas-magic-cookie-5bea10f9861f4c588b1c164f2f3113de/'.htmlspecialchars($_GET['table']).'"';
      $account = '"'.htmlspecialchars($_GET['account']).'"';
    
    require "(Model)checkUserinVideo.inc.php";
      if($res1["nbr"]==1){
      require "(Model)insertUserinVideo.inc.php";
      if($xx3){
      require "(Model)getTypeTable.inc.php";
      if(mysqli_num_rows($yy)>0){
        $res = mysqli_fetch_assoc($yy);
        $type=$res["isSilent"];
      }
 if($type == "2"){ ?>
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
                  toolbarButtons: ['camera','chat','desktop','download','embedmeeting','etherpad','feedback','filmstrip','fullscreen','help','livestreaming','participants-pane','profile','raisehand','recording','security','settings','sharedvideo','shortcuts','stats','tileview','toggle-camera','videoquality','__end']

                },
                // optionally, we can have the meeting select the devices we want
                devices: {
                  audioInput: '<deviceLabel>',
                  audioOutput: '<deviceLabel>',
                  videoInput: '<deviceLabel>'
                },
                interfaceConfigOverwrite: { SETTINGS_SECTIONS: [ 'devices', 'language', 'moderator', 'calendar', 'sounds' ] },
                userInfo: {
                displayName:<?php echo $account?>
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
        <style>html, body, #jaas-container { height: 99.5%; }</style>
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
                   toolbarButtons: ['camera','chat','closedcaptions','desktop','download','embedmeeting','etherpad','feedback','filmstrip','fullscreen','help','livestreaming','microphone','participants-pane','profile','raisehand','recording','security','settings','shareaudio','sharedvideo','shortcuts','tileview','toggle-camera','videoquality', '__end']
                },
                // optionally, we can have the meeting select the devices we want
                devices: {
                  audioInput: '<deviceLabel>',
                  audioOutput: '<deviceLabel>',
                  videoInput: '<deviceLabel>'
                },
                interfaceConfigOverwrite: { SETTINGS_SECTIONS: [ 'devices', 'language', 'moderator', 'calendar', 'sounds' ] },
                userInfo: {
                displayName:<?php echo $account?>
                },
            });
            
          }
          
        </script>
      </head>
      <body><div id="jaas-container" ></div></body>
    </html>
    <?php }}
    }else{
      echo 'Error';
    }
    }else{
      echo 'Field cannot be empty.';
        } ?>