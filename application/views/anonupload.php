<html>
	<head>
		<title>Pictoria!!!</title>		
		<script src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script>
		<script src="<?php echo base_url('resources/dropzone.js') ?>"></script>
		<script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
		<button onclick="window.location.href='<?php echo site_url('/pictoria/index/') ?>'">Home</button>
		<button onclick="window.location.href='<?php echo site_url('/pictoria/up/') ?>'">Upload</button>
		<button onclick="window.location.href='<?php echo site_url('/pictoria/join/') ?>'">Signup/Login</button>
	</head>
	<body>
		<div class="container">
						<div class="jumbotron">	            
							<center><h1>Kéo thả vào ô ở dưới coi</h1></center>
			            </div>
			        </div>
					<div class="container">
			        <form action="<?php echo site_url('/pictoria/upload'); ?>" class="dropzone dz-remove" id="myDropzone"></form>
					<button id="submit-all">Submit all files</button>
					<button onclick="reload()">Refresh page</button><br><br>
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