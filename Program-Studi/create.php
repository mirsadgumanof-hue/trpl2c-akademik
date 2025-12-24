<h3 class="mb-4">Input Program Studi</h3>

<form action="Program-Studi/proses.php" method="post">
    <div class="mb-3">
        <label>Program Studi</label>
        <select name="nama_prodi" class="form-control" required>
            <option value="">-- Pilih Program Studi --</option>
            <option value="Teknologi Rekayasa Perangkat Lunak">Teknologi Rekayasa Perangkat Lunak</option>
            <option value="Manajemen Informatika">Manajemen Informatika</option>
            <option value="Teknik Komputer">Teknik Komputer</option>
            <option value="Animasi">Animasi</option>
            <option value="Sistem Informasi">Sistem Informasi</option>
        </select>

    </div>
  
    <div class="mb-3">
        <label>Jenjang</label>
        <select name="jenjang" class="form-control" required>
            <option value="">-- Pilih Jenjang --</option>
            <option value="D2">D2</option>
            <option value="D3">D3</option>
            <option value="D4">D4</option>
            <option value="S2">S2</option>
        </select>
    </div>

    <div class="mb-3">
        <label>Akreditasi</label>
        <select name="akreditasi" class="form-control" required>
            <option value="">-- Akreditasi Program Studi --</option>
            <option value="Cukup">Cukup</option>
            <option value="Baik">Baik</option>
            <option value="Baik Sekali">Baik Sekali</option>
        </select>
    </div>

    <div class="mb-3">
        <label for="keterangan" class="form-label">Keterangan</label>
        <textarea name="keterangan" id="keterangan" cols="50" rows="5" class="form-control"></textarea>
    </div>

  <button type="submit" class="btn btn-primary" value="Submit" name="submit">Submit</button>
</form>

