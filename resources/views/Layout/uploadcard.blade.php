
<div style="display: none" class="overlay-card">
    <div class="card-content">
        <h2>upload your Video</h2>
        <hr>
        <form method="POST" action="UploadVideo" enctype="multipart/form-data">
            @csrf
            <label for="title" class="inline-block text-red mb-4"> Video Title: </label>
            <input type="text" class="border border-danger rounded" name="title" />
            @error('title')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
            <br>
            <label for="description" class="inline-block text-red mb-4 textarea_label"> Video Description: </label>
            <textarea placeholder='Enter description...' rows="4" cols="48"
                class="border border-danger rounded large_text_box" name="description"></textarea>
            @error('description')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
            <br>
            <br>
            <label for="thumbnail" class="inline-block text-red mb-4">Video Thumbnail:</label>
            <input type="file" class="border border-danger rounded" name="thumbnail" accept="image/*" />

            @error('thumbnail')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
            <br>
            <label for="path" class="inline-block text-red mb-4">Upload Video:</label>
            <input type="file" class="border border-danger rounded" name="path" accept="video/mp4, video/avi, video/quicktime, video/x-matroska" />

            @error('path')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
            <br>
            <button class="btn btn-outline-danger" type="submit">Upload</button>
            <hr>
        </form>
        <button class="btn btn-danger" onclick="hideOverlay()">close</button>
    </div>
</div>