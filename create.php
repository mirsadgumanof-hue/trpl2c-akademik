<h3 class="mb-4">Data Mahasiswa</h3>

<form action="proses.php?create" method="post">
    <div class="mb-3">
        <label for="nim" class="form-label">NIM</label>
        <input type="text" class="form-control" id="nim" name="nim" aria-describedby="emailHelp">
    </div>
  
    <div class="mb-3">
        <label for="nama_mhs" class="form-label">Nama Mahasiswa</label>
        <input type="text" class="form-control" id="nama_mhs" name="nama_mhs" aria-describedby="emailHelp">
    </div>

    <div class="mb-3">
        <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
        <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" aria-describedby="emailHelp">
    </div>

    <div class="mb-3">
        <label for="alamat" class="form-label">Alamat</label>
        <textarea name="alamat" id="alamat" cols="50" rows="5" class="form-control"></textarea>
    </div>

  <button type="submit" class="btn btn-primary" value="Submit" name="submit">Submit</button>
</form>

