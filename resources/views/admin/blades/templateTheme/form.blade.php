<div class="d-flex flex-column">
    <!-- INFORMAÇÕES DO TEMPLATE -->
    <div class="row mb-3 col-lg-12">
        <div class="col-lg-12">
            <h5 class="mb-3 border-bottom pb-2">Informações do Template</h5>
        </div>
        
        <div class="col-lg-6">
            <div class="mb-3">
                <label for="name" class="form-label">Template</label>
                <input type="text" class="form-control" id="name" readonly value="{{isset($templateTheme)?$templateTheme->name:''}}" placeholder="Template">
            </div>
        </div>
        
        <div class="col-lg-6">
            <div class="mb-3">
                <label for="preview" class="form-label">Preview</label>
                <input type="text" name="preview" class="form-control" id="preview{{isset($templateTheme->id)?$templateTheme->id:''}}" value="{{isset($templateTheme)?$templateTheme->preview:''}}" placeholder="preview">
            </div>
        </div>
        
        <div class="col-lg-6">
            <div class="mb-3">
                <label for="template_variation" class="form-label">Variação do Template</label>
                <input type="text" class="form-control" id="template_variation" readonly value="{{isset($templateTheme)?$templateTheme->template_variation:''}}" placeholder="Ex: dark, light, modern">
            </div>
        </div>
        
        <div class="col-lg-6">
            <div class="mb-3">
                <div class="form-check mt-4">
                    <input name="active" {{ isset($templateTheme->active) && $templateTheme->active == 1 ? 'checked' : '' }} type="checkbox" class="form-check-input" id="invalidCheck{{isset($templateTheme->id)?$templateTheme->id:''}}" />
                    <label class="form-check-label" for="invalidCheck{{isset($templateTheme->id)?$templateTheme->id:''}}">{{__('dashboard.active')}}?</label>
                    <div class="invalid-feedback">
                        You must agree before submitting.
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- CONFIGURAÇÕES DO HEADER -->
    <div class="row mb-3 col-lg-12">
        <div class="col-lg-12">
            <h5 class="mb-3 border-bottom pb-2">Configurações do Header</h5>
        </div>
        
        <div class="col-lg-6">
            <div class="mb-3">
                <label class="form-label">Cor do texto no header</label>
                <input type="text" name="text_color_header" class="form-control" id="colorpicker-text-header" value="{{isset($templateTheme)?$templateTheme->text_color_header:''}}">
            </div>
        </div>
        
        <div class="col-lg-6">
            <div class="mb-3">
                <label class="form-label">Cor do header</label>
                <input type="text" name="bg_header" class="form-control" id="colorpicker-bg-header" value="{{isset($templateTheme)?$templateTheme->bg_header:''}}">
            </div>
        </div>
    </div>

    <!-- CONFIGURAÇÕES DO FOOTER -->
    <div class="row mb-3 col-lg-12">
        <div class="col-lg-12">
            <h5 class="mb-3 border-bottom pb-2">Configurações do Footer</h5>
        </div>
        
        <div class="col-lg-6">
            <div class="mb-3">
                <label for="copyright" class="form-label">Copyright</label>
                <input type="text" name="copyright" class="form-control" id="copyright" value="{{isset($templateTheme)?$templateTheme->copyright:''}}" placeholder="Ex: © 2024 Minha Empresa">
            </div>
        </div>
        
        <div class="col-lg-6">
            <div class="mb-3">
                <label class="form-label">Cor do scroll</label>
                <input type="text" name="bg_scroll" class="form-control" id="colorpicker-bg-scroll" value="{{isset($templateTheme)?$templateTheme->bg_scroll:''}}">
            </div>
        </div>
    </div>

    <!-- CORES GERAIS -->
    <div class="row mb-3 col-lg-12">
        <div class="col-lg-12">
            <h5 class="mb-3 border-bottom pb-2">Cores Gerais</h5>
        </div>
        
        <div class="col-lg-6">
            <div class="mb-3">
                <label class="form-label">Cor primária</label>
                <input type="text" name="primary_color" class="form-control" id="colorpicker-default" value="{{isset($templateTheme)?$templateTheme->primary_color:''}}">
            </div>
        </div>
        
        <div class="col-lg-6">
            <div class="mb-3">
                <label class="form-label">Cor secundária</label>
                <input type="text" name="secondary_color" class="form-control" id="colorpicker-showalpha" value="{{isset($templateTheme)?$templateTheme->secondary_color:''}}">
            </div>
        </div>
        
        <div class="col-lg-6">
            <div class="mb-3">
                <label class="form-label">Cor de destaque (Accent)</label>
                <input type="text" name="accent_color" class="form-control" id="colorpicker-showpaletteonly" value="{{isset($templateTheme)?$templateTheme->accent_color:''}}">
            </div>
        </div>
        
        <div class="col-lg-6">
            <div class="mb-3">
                <label class="form-label">Cor do texto</label>
                <input type="text" name="text_color" class="form-control" id="colorpicker-togglepaletteonly" value="{{isset($templateTheme)?$templateTheme->text_color:''}}">
            </div>
        </div>
    </div>

    <!-- BOTÕES -->
    <div class="row mb-3 col-lg-12">
        <div class="col-lg-12">
            <h5 class="mb-3 border-bottom pb-2">Configurações dos Botões</h5>
        </div>
        
        <div class="col-lg-6">
            <div class="mb-3">
                <label for="color_button_one" class="form-label">Cor do Texto Botão 1</label>
                <input type="text" name="color_button_one" class="form-control" id="colorpicker-color-button1" value="{{isset($templateTheme)?$templateTheme->color_button_one:''}}" placeholder="Ex: Comprar Agora">
            </div>
        </div>
        
        <div class="col-lg-6">
            <div class="mb-3">
                <label class="form-label">Cor Fundo Botão 1</label>
                <input type="text" name="bg_button_one" class="form-control" id="colorpicker-bg-button1" value="{{isset($templateTheme)?$templateTheme->bg_button_one:''}}">
            </div>
        </div>
        
        <div class="col-lg-6">
            <div class="mb-3">
                <label for="color_button_two" class="form-label">Cor do Texto Botão 2</label>
                <input type="text" name="color_button_two" class="form-control" id="colorpicker-color-button2" value="{{isset($templateTheme)?$templateTheme->color_button_two:''}}" placeholder="Ex: Saiba Mais">
            </div>
        </div>
        
        <div class="col-lg-6">
            <div class="mb-3">
                <label class="form-label">Cor Fundo Botão 2</label>
                <input type="text" name="bg_button_two" class="form-control" id="colorpicker-bg-button2" value="{{isset($templateTheme)?$templateTheme->bg_button_two:''}}">
            </div>
        </div>
    </div>

    <!-- IMAGENS -->
    <div class="row col-lg-12">
        <div class="col-lg-12">
            <h5 class="mb-3 border-bottom pb-2">Imagens</h5>
        </div>
        
        <div class="col-lg-6">
            <div class="mb-3">
                <label for="path_image_logo_header" class="form-label">Logo Header</label>
                <input type="file" name="path_image_logo_header" data-plugins="dropify" data-default-file="{{isset($templateTheme)?$templateTheme->path_image_logo_header<>''?url('storage/'.$templateTheme->path_image_logo_header):'':''}}"  />
                <p class="text-muted text-center mt-2 mb-0">{{__('dashboard.text_img_size')}} <b class="text-danger">2 MB</b>.</p>
            </div>
        </div>
        
        <div class="col-lg-6">
            <div class="mb-3">
                <label for="path_image_logo_footer" class="form-label">Logo Footer</label>
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
        
        // Configurações para todos os colorpickers
        const colorpickerConfigs = {
            'colorpicker-default': {
                color: '#3498db',
                showAlpha: false,
                showPaletteOnly: false
            },
            'colorpicker-showalpha': {
                color: '#2c3e50',
                showAlpha: true,
                showPaletteOnly: false
            },
            'colorpicker-showpaletteonly': {
                color: '#f1c40f',
                showAlpha: false,
                showPaletteOnly: true,
                palette: [
                    ['#f1c40f', '#e67e22', '#1abc9c', '#3498db'],
                    ['#2ecc71', '#e74c3c', '#9b59b6', '#34495e'],
                    ['#95a5a6', '#27ae60', '#c0392b', '#8e44ad']
                ]
            },
            'colorpicker-togglepaletteonly': {
                color: '#333333',
                showAlpha: false,
                showPaletteOnly: false,
                palette: [
                    ['#ffffff', '#f8f9fa', '#e9ecef', '#dee2e6'],
                    ['#333333', '#495057', '#6c757d', '#adb5bd'],
                    ['#000000', '#212529', '#343a40', '#000000']
                ]
            },
            'colorpicker-text-header': {
                color: '#ffffff',
                showAlpha: false,
                showPaletteOnly: false
            },
            'colorpicker-bg-header': {
                color: '#2c3e50',
                showAlpha: false,
                showPaletteOnly: false
            },
            'colorpicker-bg-scroll': {
                color: '#f8f9fa',
                showAlpha: false,
                showPaletteOnly: false
            },
            'colorpicker-bg-button1': {
                color: '#3498db',
                showAlpha: false,
                showPaletteOnly: false
            },
            'colorpicker-bg-button2': {
                color: '#2ecc71',
                showAlpha: false,
                showPaletteOnly: false
            }
        };
        
        // Inicializa cada colorpicker
        $('[id^="colorpicker-"]').each(function() {
            const $this = $(this);
            const id = $this.attr('id');
            const config = colorpickerConfigs[id] || {};
            const defaultColor = $this.val() || config.color || '#3498db';
            
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
            
            // Mescla com configurações específicas
            if (config.showAlpha !== undefined) options.showAlpha = config.showAlpha;
            if (config.showPaletteOnly !== undefined) options.showPaletteOnly = config.showPaletteOnly;
            if (config.palette) options.palette = config.palette;
            if (config.showPalette !== undefined) options.showPalette = config.showPalette;
            
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