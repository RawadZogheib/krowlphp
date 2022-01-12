 <!DOCTYPE html> 
	<?php //instead of account it was user 
		if(!empty($_GET['table']) && !empty($_GET['account'])){
			$room = '"vpaas-magic-cookie-5bea10f9861f4c588b1c164f2f3113de/'.htmlspecialchars($_GET['table']).'"';
      $account = htmlspecialchars("'".$_GET["account"]."'");
      
		}
    else{
      echo 'account id not found';
    }
	?>
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
                  startWithVideoMuted: [true]
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
            api.addListener('readyToClose',api.dispose(); api = null);
            // 
            // require '(Model)config.inc.php';
            //   $con=con("krowl");
            //   $sql="DELETE FROM `occupants` WHERE `account_Id`=(SELECT `account_Id` FROM `account` WHERE `username`='TOTOOO')";
            //     $yy=mysqli_query($con,$sql); 
            
          }
          
        </script>
      </head>
      <body><div id="jaas-container" ></div></body>
    </html>