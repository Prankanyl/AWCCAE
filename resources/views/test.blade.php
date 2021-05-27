<div class="card-body">
  <a href="/item"><h5 class="card-title">{{$item->title}}</h5></a>
  @if (strlen($item->description) > 50)
  <p class="card-text">{{substr($item->description, 0, 50)."..."}}</p>
  @else
  <p class="card-text">{{$item->description}}</p>
  @endif
</div>



<div class="card-body">
  <h5 class="card-title">{{strlen($item->title)}}</h5>
  <p class="card-text">{{strlen($item->description)}}</p>
</div>
