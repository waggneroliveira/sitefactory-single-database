<style>
    .loading-indicator {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(255, 255, 255, 0.7);
        text-align: center;
        z-index: 9999;
    }
    .loading-indicator .row img{
        width: 280px;
        margin-bottom: 15px;
        filter: brightness(0) invert(1) !important;
        opacity: 0.7;
    }
    .loading-indicator .row{
        display:flex;
        flex-direction: column;
        height: 100%;
        width: 100%;
        justify-content: center;
        align-items: center;
    }
    .loading-indicator .row h4{
        color:#FFF;
        font-size:1.25rem;
        font-family: Roboto,sans-serif;
        text-align: center;
    }
    #load{
        /* CÓDIGO PARA CHAMAR A ANIMAÇÃO */
        -webkit-animation: rodaroda 3s linear alternate 3;
        -moz-animation: rodaroda 3.0s linear infinite;
        -ms-animation: rodaroda 3.0s linear infinite;
        -o-animation: rodaroda 3.0s linear infinite;
        animation: rodaroda 3.0s linear infinite;
    }
</style>
<div id="loading-indicator"
     style="position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: #7C3AED;
    display: flex;
    justify-content: center;
    align-items: center;" class="loading-indicator">
    <div class="row">
        <img id="load" src="{{asset('build/admin/images/whi-green-horizontal.png')}}" alt="Sincronizando suas preferências..." />
        @php
            $locales = [
                'pt' => __('dashboard.message_sinc_load'), // Português
                'en' => __('dashboard.message_sinc_load'), // Inglês
                'es' => __('dashboard.message_sinc_load'), // Espanhol
            ];
            $locale = session()->get('locale');
        @endphp

        @if (array_key_exists($locale, $locales))
            <h4>{{$locales[$locale]}}</h4>    
        @else      
            <h4>{{ __('dashboard.message_sinc_load') }}</h4>
        @endif
    </div>
</div>