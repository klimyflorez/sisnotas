<ul class="nav nav-tabs" role="tablist">
    @foreach($tabs as $tab)
        <li class="nav-item"> <a class="nav-link {{ $loop->first? 'active':'' }}" data-toggle="tab" href="#tab-{{ $loop->index }}" role="tab"><span><i class="{{ $tab['icon'] }}"></i></span></a> </li>
    @endforeach
</ul>
<!-- Tab panes -->
<div class="tab-content tabcontent-border">
    @foreach($tabs as $tab)
        <div class="tab-pane {{ $loop->first? 'active':'p-20' }}" id="tab-{{ $loop->index }}" role="tabpanel">
            @if($loop->first)
                <div class="p-20">
                    {!! $tab['html'] !!}
                </div>
            @else
                {!! $tab['html'] !!}
            @endif
        </div>
    @endforeach
</div>
