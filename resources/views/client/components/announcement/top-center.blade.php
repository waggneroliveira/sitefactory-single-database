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
                    alt="Anúncio WHI"
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
                alt="Anúncio WHI"
            />
        </picture>
    @endif
@endif