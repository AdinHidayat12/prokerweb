<div class="modal fade" id="ubahGeoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Kondisi Geografis Desa</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
    <form action="/admin/profil_desa/geografis" method="post" id="ubahVisi">
      <div class="modal-body">
          @method('PUT')
          @csrf
          <div class="mb-3">
            <label for="x" class="form-label">Kondisi Geografis Desa</label>
            @error('geografis')
                <p class="text-danger">{{$message}}</p>
            @enderror
            <input id="x" type="hidden" name="geografis" value="{{$data[0]->geografis}}">
            <trix-editor input="x"></trix-editor>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </form>
    </div>
  </div>
</div>
<style>
  trix-toolbar [data-trix-button-group="file-tools"] {
    display:none;
  }
</style>
<script>
  document.addEventListener('trix-file-accept', function(e){
    e.preventDefault();
  });
</script>