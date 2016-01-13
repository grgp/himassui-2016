<div class="container">
    <div class="panel panel-default profpanel center"> 
      <div class="panel-body">
        <ul class="nav nav-tabs">
          <li role="presentation"><a href="profile">Profile</a></li>
          <li role="presentation"><a href="editprofile">Edit Profile</a></li>
          <li role="presentation"><a href="changepassword">Ganti Password</a></li>
          <li role="presentation" class="active"><a href="buktipembayaran">Upload Foto Pembayaran</a></li>
        </ul>
            <center><br><br><br>
                <p>Silahkan Upload Bukti Pembayaran Kamu</p>
                <br><br>
                <form action="upload" method="post" enctype="multipart/form-data">
                Select image to upload:
                <br><br>
    		    <p>(photo must be in JPEG or PNG format and under 5 MB)</p>
                <br><br>
                <input type="file" name="fileToUpload" id="fileToUpload">
                <input class="btn btn-default" type="submit" value="Upload Image" name="submit"><br><br><br>
            </center>
        </div>
    </div>
</div>
        




     