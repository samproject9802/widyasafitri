function successsignup() {
    Swal.fire({
            title: 'Success',
            text: "Akun mu telah dibuat",
            icon: 'success',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'OK'
            }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = 'index.php?page=login-mahasiswa';
            }
    })
}

function failedsignup() {
    Swal.fire({
            title: 'Error',
            text: "Registrasi Gagal",
            icon: 'error',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'OK'
            }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = 'index.php?page=registrasi';
            }
    })
}

function successloginuser() {
   const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                                        setTimeout(function(){ window.location.href = 'mhsmenu/'; }, 3200);
                                        }
                    })

    Toast.fire({
        icon: 'success',
        title: 'Signed in successfully'
    })
}

function successloginadmin() {
   const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                                        setTimeout(function(){ window.location.href = 'kaprodimenu/'; }, 3200);
                                        }
                    })

    Toast.fire({
        icon: 'success',
        title: 'Signed in successfully'
    })
}

function failedloginuser() {
    const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                                didOpen: (toast) => {
                                    toast.addEventListener('mouseenter', Swal.stopTimer)
                                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                                    setTimeout(function(){ window.location.href = 'index.php?page=login-mahasiswa'; }, 3200);
                                }
                            })

            Toast.fire({
            icon: 'error',
            title: 'Username or Password Wrong!'
            })
}

function failedloginadmin() {
    const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                                didOpen: (toast) => {
                                    toast.addEventListener('mouseenter', Swal.stopTimer)
                                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                                    setTimeout(function(){ window.location.href = 'index.php'; }, 3200);
                                }
                            })

            Toast.fire({
            icon: 'error',
            title: 'Username or Password Wrong!'
            })
}