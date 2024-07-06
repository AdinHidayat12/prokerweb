<div class="modal fade" id="ubahEkoModal" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel2">Kondisi Ekonomi Desa</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
    <form action="/admin/profil_desa/ekonomi" method="post">
      <div class="modal-body">
          @method('PUT')
          @csrf
          <div class="mb-3">
            @error('ekonomi')
                <p class="text-danger">{{$message}}</p>
            @enderror
            <input id="y" type="hidden" name="ekonomi" value="{{$data[0]->ekonomi}}">
            <trix-editor input="y"></trix-editor>
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