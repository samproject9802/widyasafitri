<div align="center">
	<form class="my-5 p-3" style="
	width: 300px;
	border: 1px solid rgba(0,0,0,.125);
	border-radius: 5px;
	background-image: url('assets/foto/bg-login.jpg');
	background-size: cover;
	" method="POST" action="php/loginkaprodi.php">
		<div align=" center">
			<h2 style="color: white;">LOGIN KAPRODI</h2>
		</div>
		<div class="mb-3 mt-3" align="center">
			<img src="assets/foto/images (1).jpeg" class="img-thumbnail" alt="..." style="width: 150px; height: 150px;">
		</div>
		<div class="mb-3" align="left">
			<label for="exampleInputEmail1" class="form-label" style="color: white;">Username</label>
			<input type="text" class="form-control" id="exampleInputEmail1" name="username">
		</div>
		<div class="mb-3" align="left">
			<label for="exampleInputPassword1" class="form-label" style="color: white;">Password</label>
			<input type="password" class="form-control" id="exampleInputPassword1" name="password">
		</div>
		<div class="mb-3 form-check" align="left">
			<input type="checkbox" class="form-check-input" id="exampleCheck1">
			<label class="form-check-label" for="exampleCheck1" style="color: white;">Ingat saya</label>
		</div>
		<div align="center">
			<button type="submit" class="btn btn-success mb-2">Login</button> <br>
			<button type="reset" class="btn btn-danger">Batal</button>
		</div>
	</form>
</div>