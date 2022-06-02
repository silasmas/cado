<div class="content-title-box">
    <div class="title">Photo</div>
    <div class="subtitle">Modifiez votre photo.</div>
    @include("client.parties.error")
</div>
<form enctype="multipart/form-data" action="{{ url('photo') }}" method="post" class='form-group' data-parsley-validate>
    @csrf
    <div class="content-box">
        <div class="email-group">
            <div class="form-group">
                <label for="user_image">Uploader une image:</label>
                <input type="file" class="form-control" name="photo" id="user_image" />
            </div>
        </div>
    </div>
    <div class="content-update-box">
        <button type="submit" class="btn">Enregistrer</button>
    </div>
</form>