<div class="modal fade" id="ubahVisiModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Visi dan Misi</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
    <form action="/admin/pemerintahan" method="post">
      <div class="modal-body">
          @method('PUT')
          @csrf
          <div class="mb-3">
            <label for="visi" class="form-label">Visi desa</label>
            <textarea name="visi" class="form-control @error('visi') is-invalid @enderror" id="visi" rows="3">{{$data[0]->visi}}</textarea>
            @error('visi')
                  <div class="invalid-feedback">
                    {{$message}}
                  </div>
              @enderror
          </div>
          <div class="mb-3">
            <label for="x" class="form-label">Visi</label>
            @error('misi')
                <p class="text-danger">{{$message}}</p>
            @enderror
            <input id="x" type="hidden" name="misi" value="{{$data[0]->misi}}">
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