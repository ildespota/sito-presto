<form action="{{route('locale',$lang)}}" method="POST">
                  @csrf
                  <button type="submit">
                  <span class="flag-icon flag-icon-{{$flag}}"></span>
                  </button>
                </form> 