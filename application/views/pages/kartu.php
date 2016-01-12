	<body>

		<div class="container">
			<div class="panel panel-default logpanel center">
	  		<div class="panel-body">
				
					<form class="form-signin" action="imggen" method="post" enctype="multipart/form-data">
						<h2 class="form-signin-heading">Masukkan keterangan Anda</h2>
						<label>Nama</label>
						<input name="name" placeholder="cth. Akbar Septriyan" required type="text" class="form-control">
						<label>No. Ujian</label>
						<input name="id_num" placeholder="cth. 1405459223" required type="text" class="form-control">
						<label>Asal Sekolah</label>
						<input name="school" placeholder="cth. SMAN 1 Jakarta" required type="text" class="form-control">
						<label>Gambar Pas Foto</label>
						<input type="file" name="selectedFile">
            <br>
		    		<p>(photo must be in JPEG or PNG format and under 5 MB)</p>
            <br>
						<input class="btn btn-lg btn-primary btn-block" name="submit" type="submit" value="Submit">

					</form>
				</div>
			</div>
		</div>
