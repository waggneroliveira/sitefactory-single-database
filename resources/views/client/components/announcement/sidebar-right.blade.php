@if (isset($announcement) && $announcement->path_image)
    @if ($announcement->link)
        <a href="{{ $announcement->link }}" target="_blank" rel="noopener noreferrer">
            <picture>
                @if ($announcement->path_image_mobile)
                    <source
                        media="(max-width: 767.98px)"
                        srcset="{{ asset('storage/' . $announcement->path_image_mobile) }}"
                    >
                @endif

                <img
                    src="{{ asset('storage/' . $announcement->path_image) }}"
                    class="w-100 h-100"
                    alt="Anúncio WHI"
                    style="object-fit: cover"
                />
            </picture>
        </a>
    @else
        <picture>
            @if ($announcement->path_image_mobile)
                <source
                    media="(max-width: 767.98px)"
                    srcset="{{ asset('storage/' . $announcement->path_image_mobile) }}"
                >
            @endif

            <img
                src="{{ asset('storage/' . $announcement->path_image) }}"
                class="w-100 h-100"
                alt="Anúncio WHI"
                style="object-fit: cover"
            />
        </picture>
    @endif
@endif