<html>
	<head>
		<title>Pictoria!!!</title>
		<link href="<?php echo base_url('resources/css/dropzone.css') ?>" rel="stylesheet">
		<link href="<?php echo base_url('resources/css/bootstrap.min.css') ?>" rel="stylesheet">
		<link href="<?php echo base_url('resources/css/font-awesome.min.css') ?>" rel="stylesheet">				
		<script src="<?php echo base_url('resources/js/jquery.min.js') ?>"></script>
		<script src="<?php echo base_url('resources/dropzone.js') ?>"></script>
		<script src="<?php echo base_url('resources/js/bootstrap.min.js') ?>"></script>		
	</head>
	<body>
		<div class="container">
						<div class="panel panel-primary">
						  <div class="panel-heading">
						    <h3 class="panel-title">Such stranger. Much alien.</h3>
						  </div>
						  <div class="panel-body"> Wow.	Kéo thả vào ô ở dưới coi.					    
						  </div>
						</div>
			        </div>
					<div class="container">
			        <form action="<?php echo site_url('/pictoria/upload'); ?>" class="dropzone dz-remove" id="myDropzone"></form>
					<button type="button" class="btn btn-success" id="submit-all">Submit all files</button>
					<button type="button" class="btn btn-warning" onclick="reload()">Refresh page</button><br><br>
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
								var res = "";
								submitButton.addEventListener("click", function() {
									myDropzone.processQueue(); // Tell Dropzone to process all queued files
								});
								
								this.on("success", function (file, response) {
									res = res.concat(response).concat("&");
									if (this.getUploadingFiles().length === 0 && this.getQueuedFiles().length === 0) {
										location.href = "<?php echo site_url('/pictoria/anon_view'); ?>/" + res;
									}
								});
							}
						};
						
						function reload() {
							location.reload();
						};
					</script>
				</div>
			</body>
		</html>