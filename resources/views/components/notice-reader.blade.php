
    <!-- No surplus words or unnecessary actions. - Marcus Aurelius -->
@php
    $elementCount = 0;
@endphp
    @foreach ($table as $key=>$d )
    @if (($renderAll != "true") and ($elementCount == 3))

    @else
    
    @if ($d->active == "true")
        <div class="card border-success mb-3" style="max-width: 18rem;">
            <div class="card-header bg-transparent border-success">मिति : {{$d->date}}</div>
            <div class="card-body text-success">
              <h5 class="card-title">{{$d->topic}}</h5>
              <p class="card-text">{{$d->details}}</p>
            </div>
            <div class="card-footer bg-transparent border-success">लेखक : {{$d->writer}}</div>
          </div>
          @php
    $elementCount = $elementCount + 1;
@endphp
        @endif
    @endif
        
    @endforeach
    