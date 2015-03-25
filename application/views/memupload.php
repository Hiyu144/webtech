<html>
	<head>
		<link href="<?php echo base_url(); ?>resources/css/dropzone.css" type="text/css" rel="stylesheet" />
		<script src="<?php echo base_url(); ?>resources/dropzone.js"></script>
		<link href="<?php echo base_url('resources/css/bootstrap.min.css') ?>" rel="stylesheet">
		<link href="<?php echo base_url('resources/css/font-awesome.min.css') ?>" rel="stylesheet">
		<script src="<?php echo base_url('resources/js/jquery.min.js') ?>"></script>
		<script src="<?php echo base_url('resources/js/bootstrap.min.js') ?>"></script>
	</head>
	<body>		
		<div class="container">
		<center>
		<div class="panel panel-primary">
		  <div class="panel-heading">
		    <h3 class="panel-title">Welcome, <?php echo $_SESSION['username'];?>.</h3>
		  </div>
		  <div class="panel-body"> Where do we go? <h2>Kéo thả vào ô ở dưới nhoé</h2>
		  <span class="glyphicon glyphicon-heart" aria-hidden="true"></span>
		  <img width="30" height="30" src="<?php echo base_url('resources/ci.png') ?>">
		  <span class="glyphicon glyphicon-heart" aria-hidden="true"></span>
		    
		  </div>
		</div>
		</center>
			
		<form action="<?php echo site_url('/pictoria/upload'); ?>" class="dropzone dz-remove" id="myDropzone"></form>		
		<button type="button" class="btn btn-success" id="submit-all">Submit all files</button>
		<button type="button" class="btn btn-warning" onclick="reload()">Back to homepage</button><br><br>
		<script>
			Dropzone.options.myDropzone = {                        
				addRemoveLinks: true,
				autoProcessQueue: false, // Prevents Dropzone from uploading dropped files immediately
				maxFilesize:100,
				parallelUploads:100,
				acceptedFiles: "image/*",                        
				init: function() {
					var submitButton = document.querySelector("#submit-all"),
					myDropzone = this;
					submitButton.addEventListener("click", function() {
						myDropzone.processQueue(); // Tell Dropzone to process all queued files
					});
					
					this.on("success", function (file, response) {
						if (this.getUploadingFiles().length === 0 && this.getQueuedFiles().length === 0) {
							window.location.href = "<?php echo site_url('/pictoria/album'); ?>/";
						}
					});
				}
			};
			
			function reload() {
				window.location.href = "<?php echo site_url('/pictoria/index/') ?>";
			};
		</script>
		</div>
	</body>
</html>