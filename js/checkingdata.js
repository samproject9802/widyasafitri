function checkingData(id) {

    let namaDosen = $(`#namadosen${id}`).val();
    if (namaDosen) {
        $.ajax({
            method: 'POST',
            url: '../php/prodi/updatedata.php',
            data: {
                id:id,
                namaDosen:namaDosen,
            },
            success: function(response) {
                if (response == "Sukses") {
                    window.location.reload();
                } else {
                    alert("Data Gagal Divalidasi");
                }
            } 
        });
    } else {
        alert('Nama Dosen belum terisi, Validasi Gagal!!');
    }
}

function editData(idKel) {
    $.ajax({
        method: 'POST',
        url: '../php/prodi/cruddatamhs.php',
        data:{
            task: "selectSpecificData",
            idKelompok: idKel
        },
        success: function(response) {
            let jsonParse = JSON.parse(response);

            $('#idKelompok').attr('value', jsonParse[0].id_kelompok);
            $('#noreg1').attr('value', jsonParse[0].noreg1);
            $('#nirm1').attr('value', jsonParse[0].nirm1);
            $('#nama1').attr('value', jsonParse[0].nama1);
            $('#noreg2').attr('value', jsonParse[0].noreg2);
            $('#nirm2').attr('value', jsonParse[0].nirm2);
            $('#nama2').attr('value', jsonParse[0].nama2);
            $('#noreg3').attr('value', jsonParse[0].noreg3);
            $('#nirm3').attr('value', jsonParse[0].nirm3);
            $('#nama3').attr('value', jsonParse[0].nama3);
            $('#noreg4').attr('value', jsonParse[0].noreg4);
            $('#nirm4').attr('value', jsonParse[0].nirm4);
            $('#nama4').attr('value', jsonParse[0].nama4);
            $('#noreg5').attr('value', jsonParse[0].noreg5);
            $('#nirm5').attr('value', jsonParse[0].nirm5);
            $('#nama5').attr('value', jsonParse[0].nama5);
            $('#valuebidangppkm').html(jsonParse[0].bidangppkm);
            $('#valuebidangppkm').attr('value',jsonParse[0].bidangppkm);
            $('#judul').html(jsonParse[0].judul);
            $('#valuenama_dosen').html(jsonParse[0].nama_dosen);
            $('#valuenama_dosen').attr('value',jsonParse[0].nama_dosen);
            $('#statusvalue').html(jsonParse[0].status);
            $('#statusvalue').attr('value',jsonParse[0].status);
        }
    });
    $('#editDataMahasiswa').modal('show');

    $('#btnSaveChanges').on('click', function() {
        $.ajax({
            method: 'POST',
            url: '../php/prodi/cruddatamhs.php',
            data:{
                task: "updateSpecificData",
                idKelompok: idKel,
                bidangppkm: $('#bidangppkm').val(),
                judulppkm: $('#judul').val(),
                namadoping: $('#nama_dosen').val(),
                status: $('#status').val(),
            },
            success: function(response) {
                if (response == "Sukses") {
                    window.location.reload();
                } else {
                    alert("Data Gagal Diupdate");
                }
            }
        });
        
    })
}

function hapusData(idK) {
    $.ajax({
        method: 'POST',
        url: '../php/prodi/cruddatamhs.php',
        data:{
            task: "deleteSpecificData",
            idKelompok: idK,
        },
        success: function(response) {
            if (response == "Sukses") {
                window.location.reload();
            } else {
                alert("Data Gagal Diupdate");
            }
        }
    });
}

function closeModal(par) {
    $(`#${par}`).modal('hide');
}