<div>
    <div class="row">
        <div class="sidebar col-md-2" style="height: 100vh; background: black;">
            <ul>
                <li data-target="user" class="active">Users</li>
                <li>Profile</li>
            </ul>

        </div>
        <div class="col-md-10" style="height: 100vh; margin-top: 10px;">

            <div class="dashboard-card">

                @if(count($clients))
                <table class="table" id="users-table">
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Credit limit</th>
                        <th scope="col">Registered</th>
                        <th scope="col">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($clients as $client)
                      <tr>
                        <th scope="row">{{$loop->index + 1}}</th>
                        <td>{{$client->name}}</td>
                        <td>{{$client->creditLimit()}}</td>
                        <td>{{$client->created_at()}}</td>
                        <td><button class="btn btn-sm btn-primary action" data-target="{{$client->name}}" id="{{$client->id}}">Set Limit</button></td>
                      </tr>
                      @endforeach
                      
                    </tbody>
                </table>
                @endif
                </div>

        </div>
    </div>
</div>