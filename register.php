<div class="card mt-5">
<div class="card-body register-card-body">
<div class="text-center">
<font color="black">
	<b>REGISTRATION</b>
	</font>
</div>
<hr>
<form action="index.php?page=postregister" method="post">
	<div class="input-group mb-3">
<input type="text" class="form-control" placeholder="UserId" name="UserId" hidden>

</div>
<div class="input-group mb-3">
<input type="text" class="form-control" placeholder="Username" name="Username" required>
<div class="input-group-append">
<div class="input-group-text">
<span class="fas fa-user"></span>
</div>
</div>
</div>
<div class="input-group mb-3">
<input type="password" class="form-control" placeholder="Password" name="Password" required>
<div class="input-group-append">
<div class="input-group-text">
<span class="fas fa-lock"></span>
</div>
</div>
</div>
<div class="input-group mb-3">
<input type="email" class="form-control" placeholder="Email" name="Email" required>
<div class="input-group-append">
<div class="input-group-text">
<span class="fas fa-envelope"></span>
</div>
</div>
</div>
<div class="input-group mb-3">
<input type="text" class="form-control" placeholder="NamaLengkap" name="NamaLengkap" required>
<div class="input-group-append">
<div class="input-group-text">
<span class="fas fa-user"></span>
</div>
</div>
</div>
<div class="input-group mb-3">
<input type="text" class="form-control" placeholder="Alamat" name="Alamat" required>
<div class="input-group-append">
<div class="input-group-text">
<span class="fas fa-user"></span>
</div>
</div>
</div>
<div class="text-center">
    <button type="submit" name="register_tombol" class="btn btn-dark btn-block">Sign Up</button>
</div>
<p class="text-center">
<a href="index.php?page=login" style="color:black">kembali</a>
</p>