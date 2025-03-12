<x-dynamic-component
    :component="$getFieldWrapperView()"
    :field="$field"
>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
    <style>
{{--        Reset Filament css --}}
         #page, #page * {
            all: unset;
        }
        #page {
            font-family: 'Poppins';
            background-color: #fcfcfc;
        }
        #content {
            width: 100% !important;
            padding: 0 50px !important;
            box-sizing: border-box;
        }
    </style>
    <article class="p-4 border rounded" id="page" style="margin-top: 0; font-family: 'Poppins';">
        <section id="content">
            {!! $getState() !!}
        </section>
    </article>
</x-dynamic-component>
