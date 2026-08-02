<div class="d-flex justify-content-between">
    <div class="row mb-3 col-lg-6">
        <div class="mb-3">
            <label class="form-label">Cor primária</label>
            <input type="text" name="primary_color" class="form-control" id="colorpicker-default" value="{{isset($templateTheme)?$templateTheme->primary_color:''}}">
        </div>
        <div class="mb-3">
            <label class="form-label">Cor secundária</label>
            <input type="text" name="secondary_color" class="form-control" id="colorpicker-showalpha" value="{{isset($templateTheme)?$templateTheme->secondary_color:''}}">
        </div>
        <div class="mb-3">
            <label class="form-label">Cord gradient</label>
            <input type="text" name="accent_color" class="form-control" id="colorpicker-showpaletteonly" value="{{isset($templateTheme)?$templateTheme->accent_color:''}}">
        </div>
        <div class="mb-3">
            <label class="form-label">Cor do texto</label>
            <input type="text" name="text_color" class="form-control" id="colorpicker-togglepaletteonly" value="{{isset($templateTheme)?$templateTheme->text_color:''}}">
        </div>
        <div class="col-lg-6">
            <label for="name" class="form-label">Template </label>
            <input type="text" name="name" class="form-control" id="name" value="{{isset($templateTheme)?$templateTheme->name:''}}" placeholder="Template">
        </div>
        
        <div class="mb-3 col-lg-6">
            <label for="preview" class="form-label">Preview </label>
            <input type="text" name="preview" class="form-control" id="preview{{isset($templateTheme->id)?$templateTheme->id:''}}" value="{{isset($templateTheme)?$templateTheme->preview:''}}" placeholder="preview">
        </div>
        
        <div class="mb-3">
            <div class="form-check">
                <input name="active" {{ isset($templateTheme->active) && $templateTheme->active == 1 ? 'checked' : '' }} type="checkbox" class="form-check-input" id="invalidCheck{{isset($templateTheme->id)?$templateTheme->id:''}}" />
                <label class="form-check-label" for="invalidCheck">{{__('dashboard.active')}}?</label>
                <div class="invalid-feedback">
                    You must agree before submitting.
                </div>
            </div>
        </div>
    </div>
    
    <div class="row col-lg-6">
        <div class="col-lg-12">
            <div class="mt-3">
                <label for="path_image_logo_header" class="form-label">Logo Header </label>
                <input type="file" name="path_image_logo_header" data-plugins="dropify" data-default-file="{{isset($templateTheme)?$templateTheme->path_image_logo_header<>''?url('storage/'.$templateTheme->path_image_logo_header):'':''}}"  />
                <p class="text-muted text-center mt-2 mb-0">{{__('dashboard.text_img_size')}} <b class="text-danger">2 MB</b>.</p>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="mt-3">
                <label for="path_image_logo_footer" class="form-label">Logo Footer </label>
                <input type="file" name="path_image_logo_footer" data-plugins="dropify" data-default-file="{{isset($templateTheme)?$templateTheme->path_image_logo_footer<>''?url('storage/'.$templateTheme->path_image_logo_footer):'':''}}"  />
                <p class="text-muted text-center mt-2 mb-0">{{__('dashboard.text_img_size')}} <b class="text-danger">2 MB</b>.</p>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
    // Função para destruir todos os colorpickers
    function destroyColorpickers() {
        try {
            $('.sp-container').remove();
            $('.sp-replacer').remove();
            // Remove qualquer instância do Spectrum
            $.each($('[id^="colorpicker-"]'), function() {
                if ($(this).data('spectrum')) {
                    $(this).spectrum('destroy');
                }
            });
        } catch(e) {
            console.log('Erro ao destruir colorpickers:', e);
        }
    }
    
    function initColorpickers() {
        destroyColorpickers();
        
        // Inicializa cada colorpicker
        $('[id^="colorpicker-"]').each(function() {
            const $this = $(this);
            const id = $this.attr('id');
            const defaultColor = $this.val() || '#3498db';
            
            let options = {
                color: defaultColor,
                showInput: true,
                showInitial: true,
                preferredFormat: "hex",
                change: function(color) {
                    $this.val(color.toHexString());
                },
                move: function(color) {
                    $this.val(color.toHexString());
                }
            };
            
            // Configurações específicas por ID
            if (id === 'colorpicker-showalpha') {
                options.showAlpha = true;
                options.color = $this.val() || '#2c3e50';
            }
            
            if (id === 'colorpicker-showpaletteonly') {
                options.showPaletteOnly = true;
                options.showPalette = true;
                options.color = $this.val() || '#f1c40f';
                options.palette = [
                    ['#f1c40f', '#e67e22', '#1abc9c', '#3498db'],
                    ['#2ecc71', '#e74c3c', '#9b59b6', '#34495e'],
                    ['#95a5a6', '#27ae60', '#c0392b', '#8e44ad']
                ];
            }
            
            if (id === 'colorpicker-togglepaletteonly') {
                options.showPalette = true;
                options.color = $this.val() || '#333333';
                options.palette = [
                    ['#ffffff', '#f8f9fa', '#e9ecef', '#dee2e6'],
                    ['#333333', '#495057', '#6c757d', '#adb5bd'],
                    ['#000000', '#212529', '#343a40', '#000000']
                ];
            }
            
            $this.spectrum(options);
        });
    }
    
    // Inicializa no document ready
    setTimeout(initColorpickers, 100);
    
    // Reinicializa quando modal é aberto
    $(document).on('shown.bs.modal', function() {
        setTimeout(initColorpickers, 200);
    });
    
    // Para Bootstrap 5
    document.addEventListener('shown.bs.modal', function() {
        setTimeout(initColorpickers, 200);
    });
});
</script>