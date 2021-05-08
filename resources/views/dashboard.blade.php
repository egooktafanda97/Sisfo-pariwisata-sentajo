<div class="menu__" data-menu="home" data-child="home"></div>
<x-app-layout>
    <x-slot name="StyleResource">
        @component('assetsResources.header.indexStyle')
        @endcomponent
    </x-slot>

    <x-card>
        <x-slot name="Content">
            <div class="row clearfix">
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="info-box bg-pink hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">spa</i>
                        </div>
                        <div class="content">
                            <div class="text">WISATA</div>
                            <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20">
                                <?=\App\Models\Wisata::all()->count()?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="info-box bg-cyan hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">spa</i>
                        </div>
                        <div class="content">
                            <div class="text">BUDAYA</div>
                            <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20"><?=\App\Models\Budaya::all()->count()?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="info-box bg-light-green hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">spa</i>
                        </div>
                        <div class="content">
                            <div class="text">CAGAR BUDAYA</div>
                            <div class="number count-to" data-from="0" data-to="243" data-speed="1000" data-fresh-interval="20"><?=\App\Models\CagarBudaya::all()->count()?></div>
                        </div>
                    </div>
                </div>
            </div>
        </x-slot>
    </x-card>

    <x-slot name="ScriptResource">
        @component('assetsResources.footer.indexScript')
        @slot('createScript')

        @endslot
        @endcomponent
    </x-slot>

</x-app-layout>


{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-jet-welcome />
            </div>
        </div>
    </div>
</x-app-layout> --}}
