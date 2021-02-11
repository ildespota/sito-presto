<form action="{{route('locale',$lang)}}" method="POST">
                  @csrf
                  <button class="bg-transparent border-0" type="submit">
                  <span class="flag-icon flag-icon-{{$flag}}"></span>
                  </button>
                </form> 