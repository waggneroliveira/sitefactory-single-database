@if (isset($announcement) && $announcement->link <> null && $announcement->path_image <> null)
    <a href="{{$announcement->link}}" target="_blank" rel="noopener noreferrer">
        <img
            src="{{asset('storage/' . $announcement->path_image)}}"
            class="w-100 h-100"
            alt="Anuncio Delifast"
            style="object-fit: cover"
        />
    </a>
    @elseif(isset($announcement) && $announcement->link == null && $announcement->path_image <> null)
    <img
        src="{{asset('storage/' . $announcement->path_image)}}"
        class="w-100 h-100"
        alt="Anuncio Delifast"
        style="object-fit: cover"
    />
@endif