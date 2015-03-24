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
						<div class="jumbotron">	
							<center><h1>Chào bạn <?php echo $_SESSION['username'];?></h1></center>
							<center><h2>Kéo thả vào ô ở dưới nhé <3</h2></center>
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
							window.location.reload();
						};
					</script>
	</body>
</html>