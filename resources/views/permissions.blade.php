<x-layout
    title="Gestione permessi"
>

<div class="container-fluid ">
    <div class="row">
        <div class="col-12">
                @foreach ($users as $user)
                <table class="table">

                  <tr><span class="text-center h3">{{$user->name}}</span></tr>
                  <tr>
                      <th>Revisore</th>
                      <th>Rendi Revisore</th>
                      <th>Canella Revisore</th>
                      {{-- <th>Admin</th>
                      <th>Rendi Admin</th>
                      <th>Cancella Admin</th> --}}
                  </tr>
                  <tr>
                      <td class="@if($user->is_revisor) bg-success @else bg-danger @endif"></td>
                      <td>
                          <form action="{{route('make.revisor', $user->id)}}" method="POST">
                              @csrf
                              @method('PUT')
                              <button type="submit" class="btn btn-success">Rendi revisore</button>
                          </form>
                      </td>
                      <td>
                          <form action="{{route('cancel.revisor', $user->id)}}" method="POST">
                              @csrf
                              @method('PUT')
                              <button type="submit" class="btn btn-danger">Cancella revisore</button>
                          </form>
                      </td>
                      {{-- <td class="@if($user->is_admin) bg-success @else bg-danger @endif"></td>
                      <td>
                          <form action="{{route('make.admin', $user->id)}}" method="POST">
                              @csrf
                              @method('PUT')
                              <button type="submit" class="btn btn-success">Rendi amministratore</button>
                          </form>
                      </td>
                      <td>
                          <form action="{{route('cancel.admin', $user->id)}}" method="POST">
                              @csrf
                              @method('PUT')
                              <button type="submit" class="btn btn-danger">Cancella amministratore</button>
                          </form>
                      </td> --}}
                  </tr>
                  <tr>
                    <th>Admin</th>
                    <th>Rendi Admin</th>
                    <th>Cancella Admin</th>
                  </tr>
                  <tr>
                    <td class="@if($user->is_admin) bg-success @else bg-danger @endif"></td>
                    <td>
                        <form action="{{route('make.admin', $user->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-success">Rendi amministratore</button>
                        </form>
                    </td>
                    <td>
                        <form action="{{route('cancel.admin', $user->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-danger">Cancella amministratore</button>
                        </form>
                    </td>
                  </tr>
                </table>

                @endforeach
        </div>
    </div>
</div>

</x-layout>