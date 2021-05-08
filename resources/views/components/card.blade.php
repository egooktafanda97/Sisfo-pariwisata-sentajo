<div class="{{ isset($costumClass)?$costumClass:'card' }}" {{ isset($addStyle)?$addStyle:'' }}>
    @if (isset($cardTitle) || isset($cardTitleRight))
    <div class="header">
        <h2>
            {{ $cardTitle }}
        </h2>

        {{ isset($cardTitleRight)?$cardTitleRight:'' }}

  {{--       <ul class="header-dropdown m-r--5">
            <li class="dropdown">
                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                    <i class="material-icons">more_vert</i>
                </a>
                <ul class="dropdown-menu pull-right">
                    <li><a href="javascript:void(0);">Action</a></li>
                    <li><a href="javascript:void(0);">Another action</a></li>
                    <li><a href="javascript:void(0);">Something else here</a></li>
                </ul>
            </li>
        </ul> --}}

    </div>
    @endif

    <div class="body">
        {{ isset($Content)?$Content:'' }}
    </div>
</div>