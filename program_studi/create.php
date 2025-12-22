
<h1>Input Program Studi</h1>
<form action="/web_programming/Akademik/proses.php" method="post">
    
    <div class="mb-3">
        <label for="nama_prodi" class="form-label">Nama Program Studi</label>
        <input type="text" class="form-control" id="nama_prodi" name="nama_prodi">
    </div>
    <div class="mb-3">
        <label class="form-label">Jenjang</label>
        <select name="jenjang" class="form-select" required>
            <option value="">-- Pilih Jenjang --</option>
            <option value="D2">D2</option>
            <option value="D3">D3</option>
            <option value="D4">D4</option>
            <option value="S2">S2</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="keterangan" class="form-label">Keterangan</label>
        <textarea class="form-control" id="keterangan" rows="3" name="keterangan"></textarea>
    </div>
    <div class="d-flex gap-2">
        <input type="submit" class="btn btn-info btn-md" name="submit_prodi">
        <input type="reset" class="btn btn-secondary btn-md" name="reset">
        <a href = 'index.php?page=prodi' class = "btn btn-dark btn-md ms-auto">Lihat Data</a>
    </div>
</form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>


