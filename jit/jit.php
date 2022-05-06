<html>
      <head>
        <script src='https://8x8.vc/external_api.js' async></script>
        <style>html, body, #jaas-container { height: 99.5%; }</style>
        <script type="text/javascript">
          history.replaceState(null, document.querySelector("account").innerText, window.location.pathname)
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
                  <?php  if($type == "2"){ ?>
                  toolbarButtons: ['camera','chat','closedcaptions','desktop','download','embedmeeting','etherpad','feedback','filmstrip','fullscreen','help','livestreaming','participants-pane','raisehand','recording','security','settings','shareaudio','sharedvideo','shortcuts','stats','tileview','toggle-camera','videoquality']
                  <?php }else if($type == "1"){ ?>
                  toolbarButtons: ['camera','chat','closedcaptions','desktop','download','embedmeeting','etherpad','feedback','filmstrip','fullscreen','help','livestreaming','participants-pane','raisehand','recording','security','settings','shareaudio','sharedvideo','shortcuts','stats','tileview','toggle-camera','videoquality','microphone']
                  <?php } ?>
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